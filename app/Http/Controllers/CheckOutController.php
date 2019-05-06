<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\product_details;
use App\Product;
use Pusher\Pusher;
use Illuminate\Support\Facades\Input;
use App\User;
use Session;
use App\Shipper;
use App\InfoShip;
use Illuminate\Support\Facades\Auth;
use App\coupons;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Bill;
use App\Notification;
use Illuminate\Support\Facades\Log;
use App\CustomClass\NganLuong;
use Illuminate\Support\Facades\Cache;
use App\Detailsbill;
use SEO;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
class CheckOutController extends CacheController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        SEO::setTitle('Thanh toán đơn hàng');
        SEO::setDescription('Thanh toán đơn hàng');
        SEOMeta::addKeyword(['Thanh toán đơn hàng']);

        $shipper = Shipper::where('Display',1)->get();
        return view('checkout',compact('shipper'));
    }

    public function paymentWall(){
        $error_code = Input::get('error_code');
        $token = Input::get('token');
        $order = Input::get('order_code');

        if($error_code == 00){
            $getData = explode('@', $order);
            $unHashData = base64_decode($getData[0]);
            $Bill = Bill::find($unHashData);
            $Bill->statusPay = 1;
            $Bill->save();
            $url = null;
            Session::forget('url');
            return view('payreturn', compact('Bill', 'url'));
        }
    }

    public function postOrder(Request $req){
        if($req->ajax()){
            $total = 0;
            $idcoupon = null;
            foreach(Cart::content() as $item){
                $total += priceDiscount($item->price*$item->qty,$item->options['discount']);
            }
            if(session()->get('coupon')){
                $idcoupon = session()->get('coupon')['id'];
                if(deformatMoney(Cart::subtotal()) < session()->get('coupon')['require']){
                    return response()->json(['errors'=>['errorcoupons'=>[0=>'Để dùng mã giảm giá này hóa đơn của bạn giá trị gốc tối thiểu phải từ '.formatMoney(session()->get('coupon')['require'],true).' trở lên']]],422);
                }
            }
            
            $this->validate($req,[
                'firstname' => 'required',
                'address' => 'required',
                'phone' => 'required|numeric',
                'email'=>'required|email',
                'selMethod'=>'required|numeric|min:0|max:3'
            ],[
                'firstname.required' => 'Vui lòng nhập họ tên',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không đúng định dạng',
                'address.required' => 'Vui lòng nhập Địa chỉ',
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'phone.numeric' => 'Số điện thoại phải là số',
                'selMethod.required' => 'Vui lòng chọn phương thức thanh toán',
                'selMethod.numeric' => 'Phương thức thanh toán không hợp lệ hãy làm mới lại trang (F5)',
                'selMethod.min' => 'Phương thức thanh toán không hợp lệ hãy làm mới lại trang (F5)',
                'selMethod.max'=>'Phương thức thanh toán không hợp lệ hãy làm mới lại trang (F5)'
            ]);

           
            if($req->selMethod == 2){
                if (empty($req->option_payment)) {
                    return response()->json(['errors' => ['errorcoupons' => [0 => 'Vui lòng chọn kiểu thanh toán']]], 422);
                }
            }

            $shiper = '';
            $feeship = 0;
            if(session()->get('idShip')){
                $shiper = Shipper::find(session()->get('idShip'));
                if(!empty($shiper)){
                    $feeship = $shiper->fee;
                }
            }else {
                return response()->json(['errors'=>['errorcoupons'=>[0=>'Vui lòng chọn phương thức vận chuyển']]],422);
            }

            $idUser = User::where('role',2)->first()->id;
            if(Auth::check()){
                $idUser = Auth::user()->id;
            }
            $InfoShip = new InfoShip;
            $InfoShip->FullName = $req->firstname;
            $InfoShip->Address = $req->address;
            $InfoShip->Phone = $req->phone;
            $InfoShip->Email = $req->email;
            $InfoShip->Note = $req->note;
            $InfoShip->save();

            $Bill = new Bill;
            $Bill->status = 0;
            $Bill->statusPay = 0;
            $Bill->PayMethod = $req->selMethod;
            $Bill->id_user = $idUser;
            $Bill->id_coupon = $idcoupon;
            $Bill->id_infoship = $InfoShip->id;
            $Bill->id_shipper = $shiper->id;
            $Bill->TotalMoney = $total;
            $Bill->feeship = $feeship;
            $Bill->save();


            $NewNotif = new Notification;
            if (Auth::check()) {
                $NewNotif->nameUser = Auth::user()->name;
            } else {
                $NewNotif->nameUser = "Khách Vãng Lai";
            }

            $random = str_random(10);
            $value = $Bill->id;
            $token = base64_encode($value).'@'.$random;

            if($req->selMethod == 2){
                
                $Bill->PayMethod = 2;
                $nlcheckout = new NganLuong;
                $total_amount = $Bill->TotalMoney;
                $payment_method = $req->option_payment;
                $bankcode = $req->bankcode;
                $returnurl = url('/checkout/paymentWall');
                $cancelurl = url('/checkout/redirectback/');
                if($payment_method == "VISA"){
                    $nl_result = $nlcheckout->VisaCheckout(
                        $token,$total_amount,1,$req->note,0,$Bill->feeship,null,
                        $returnurl,$cancelurl,$req->firstname,$req->email,$req->phone,$req->address,null,$bankcode
                    );
                }

                if($payment_method == "ATM_ONLINE"){
                    $nl_result = $nlcheckout->BankCheckout(
                        $token,
                        $total_amount,
                        $bankcode,
                        1,
                        $req->note,
                        0,
                        $Bill->feeship,
                        null,
                        $returnurl,
                        $cancelurl,
                        $req->firstname,
                        $req->email,
                        $req->phone,
                        $req->address,
                        null
                    );

                }

                if($payment_method == "NL"){
                    $nl_result = $nlcheckout->NLCheckout($token,$total_amount,1,$req->note,0,
                    $Bill->feeship,null,$returnurl,$cancelurl,$req->firstname,$req->email,$req->phone,$req->address,null
                    );
                }

                if($payment_method == "IB_ONLINE"){
                    $nl_result = $nlcheckout->IBCheckout($token,
                        $total_amount,
                        $bankcode,
                        1,
                        $req->note,
                        0,
                        $Bill->feeship,
                        null,
                        $returnurl,
                        $cancelurl,
                        $req->firstname,
                        $req->email,
                        $req->phone,
                        $req->address,
                        null);
                }
                
                
                if ($nl_result->error_code == '00') {
                    $token .= '@'.$nl_result->token;
                    Session::put('url','/checkout/bill/'.$token);
                } else {
                    return response()->json(['errors' => ['errorcoupons' => [0 => $nl_result->error_message]]], 422);
                }
            }

            
            foreach (Cart::content() as $Item) {
                $Details = new Detailsbill;
                $Details->id_bill = $Bill->id;
                $Details->id_products_details = $Item->id;
                $Details->Number = $Item->qty;
                $Details->price = $Item->price;
                $Details->discount = $Item->options['discount'];
                $Details->save();
            }
            $NewNotif->action = "Đặt";
            $NewNotif->task = "Hóa Đơn";
            $NewNotif->save();
           

            eventLoadBill();
            eventLoadNotification();
            RemoveSession();
            Log::info($NewNotif->nameUser . ' Đã đặt hàng');
            return response()->json(['success'=>'Đặt hàng thành công','token'=>$token]);
         }
    }

    
}
