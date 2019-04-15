<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\product_details;
use App\Product;
use Pusher\Pusher;
use App\User;
use App\Shipper;
use App\InfoShip;
use Illuminate\Support\Facades\Auth;
use App\coupons;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Bill;
use App\Notification;
use App\Detailsbill;

class CheckOutController extends Controller
{
    public function __construct()
    {
        $danhmuc = Category::all();
        view()->share('danhmuc',$danhmuc);
    }

    public function index(){
        $shipper = Shipper::where('Display',1)->get();
        return view('checkout',compact('shipper'));
    }

    public function postOrder(Request $req){
        if($req->ajax()){
            $total = 0;
            $idcoupon = null;
            $total = deformatMoney(Cart::subtotal());
            if(session()->get('coupon')){
                $idcoupon = session()->get('coupon')['id'];
                if(deformatMoney(Cart::subtotal()) < session()->get('coupon')['require']){
                    return response()->json(['errors'=>['errorcoupons'=>[0=>'Để dùng mã giảm giá này hóa đơn của bạn tối thiểu phải từ '.formatMoney(session()->get('coupon')['require'],true).' trở lên']]],422);
                } else {
                    $total = deformatMoney(priceDiscount(Cart::subtotal(),session()->get('coupon')['discount']));
                }
            }
            
            $this->validate($req,[
                'firstname' => 'required',
                'address' => 'required',
                'phone' => 'required|numeric',
                'selMethod'=>'required|numeric|min:0|max:3'
            ],[
                'firstname.required' => 'Vui lòng nhập họ tên',
                'address.required' => 'Vui lòng nhập Địa chỉ',
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'phone.numeric' => 'Số điện thoại phải là số',
                'selMethod.required' => 'Vui lòng chọn phương thức thanh toán',
                'selMethod.numeric' => 'Phương thức thanh toán không hợp lệ hãy làm mới lại trang (F5)',
                'selMethod.min' => 'Phương thức thanh toán không hợp lệ hãy làm mới lại trang (F5)',
                'selMethod.max'=>'Phương thức thanh toán không hợp lệ hãy làm mới lại trang (F5)'
            ]);

            $shiper = '';
            if(session()->get('idShip')){
                $shiper = Shipper::find(session()->get('idShip'));
                if(!empty($shiper)){
                    $total = deformatMoney($total) + $shiper->fee;
                }
            }else {
                return response()->json(['errors'=>['errorcoupons'=>[0=>'Vui lòng chọn phương thức vận chuyển']]],422);
            }

            $idUser = 12;
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
            $Bill->save();

            foreach (Cart::content() as $Item) {
                $Details = new Detailsbill;
                $Details->id_bill = $Bill->id;
                $Details->id_products_details = $Item->id;
                $Details->Number = $Item->qty;
                $Details->save();
            }

            $random = str_random(10);
            $value = $Bill->id;
            $token = base64_encode($value).'-'.$random;
            

            $NewNotif = new Notification;
            if(Auth::check()){
                $NewNotif->nameUser = Auth::user()->name;
            }else {
                $NewNotif->nameUser = "Khách Vãng Lai";
            }

            $NewNotif->action = "Đặt";
            $NewNotif->task = "Hóa Đơn";
            $NewNotif->save();

            eventLoadBill();
            eventLoadNotification();
            return response()->json(['success'=>'Đặt hàng thành công','token'=>$token]);
         }
    }

    function RemoveSession(){
        Cart::destroy();
        if(session()->get('coupon')){
            session()->remove('coupon');
        }
        session()->remove('idShip');
    }
}
