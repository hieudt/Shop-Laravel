<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;
use App\Category;
use Yajra\Datatables\Datatables;
use Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use SEO;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
class BillController extends CacheController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function fetchAll(){
        $data = Bill::all();
       
        return Datatables::of($data)
        ->editColumn('PayMethod',function($data){
            if($data->PayMethod == 0)
            return "Ship COD";
            if($data->PayMethod == 1)
            return "Paypal";
            if($data->PayMethod == 2)
            return "RogCoin";
        })
        ->editColumn('statusPay',function($data){
            if($data->statusPay == 0)
            return '
            <div class="dropdown'.$data->id.'">
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Chưa thanh toán
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                <button class="dropdown-item checkPay" data-id='.$data->id.'>Đã thanh toán</button>
                </div>
            </div>
            ';
            if($data->statusPay == 1)
            return '<button type="button" class="btn btn-success btn-fw">Đã Thanh Toán <i class="mdi mdi-check"></i></button>';
        })
        ->editColumn('TotalMoney',function($data){
            return formatMoney($data->TotalMoney);
        })
        ->editColumn('id',function($data){
            return '<a href="'.url('/admin/bill/details').'/'.$data->id.'">'.$data->id.'</a>';
        })
        ->editColumn('id_user',function($data){
            $text = '<table class="table table-bordered"><tbody> <tr> <td>Email</td>';
            $text .= "<td> " . $data->users->email . "</td></tr>";
            $text .= "<tr><td>Địa chỉ</td><td>".$data->users->Address."</td></tr>";
            $text .= "<tr><td>Số Điện Thoại</td><td>".$data->users->Phone."</td></tr>";
            return '<div class="tool">' . $data->users->name . '<span class="tool2">'.$text.'</span></div>';
        })
        ->editColumn('created_at',function($data){
            return date('d-m-Y H:m:s', strtotime($data->created_at));
        })
        ->editColumn('status',function($data){
            $output = '<div class="dropdown">';
            if($data->status == 0)
            $output .=  '<button class="btn btn-secondary dropdown-toggle xacthuc'.$data->id.'" type="button" id="dropdownMenuButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Chưa xác thực
                </button>';
            if($data->status == 1)
            $output .=  '<button class="btn btn-primary dropdown-toggle xacthuc'.$data->id.'" type="button" id="dropdownMenuButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Chờ Nhận Hàng
                </button>';
            if($data->status == 2)
            $output .=  '<button class="btn btn-success dropdown-toggle xacthuc'.$data->id.'" type="button" id="dropdownMenuButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Đã Giao Hàng
                </button>';
            if($data->status == 3)
            $output .=  '<button class="btn btn-danger dropdown-toggle xacthuc'.$data->id.'" type="button" id="dropdownMenuButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Hủy Đơn Hàng
                </button>';
            $output .=  '
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                <button class="dropdown-item checkVerify" data-id='.$data->id.'>Xác thực</button>
                <button class="dropdown-item checkShip" data-id='.$data->id.'>Đã Giao Hàng</button>
                <button class="dropdown-item checkDel" data-id='.$data->id.'>Hủy Đơn Hàng</button>
                </div>
            </div>
            ';
            return $output;
        })
        ->rawColumns(['statusPay','TotalMoney','status','id_user','id','created_at'])
        ->make(true);
    }

    public function updateStatus(Request $req){
        if($req->ajax()){
            $this->validate($req,[
               'value' => 'required|numeric' 
            ],[
                'value.required' => 'Giá trị bị lỗi vui lòng tải lại trang',
                'value.numeric' => 'Giá trị bị lỗi vui lòng tải lại trang [2]'
            ]);

            $data = Bill::find($req->idBill);
            if(empty($data))
            return response()->json(['errors'=>['fail'=>[0=>'Lỗi ! vui lòng tải lại trang [200]']]],422);
            if($req->type == "status")
            $data->status = $req->value;
            if($req->type == "statusPay")
            $data->statusPay = $req->value;

            $data->save();
            Log::info('Quản trị ' . Auth::user()->name . ' Đã cập nhật trạng thái hóa đơn '.$req->idBill);
            return response()->json(['success'=>"Cập nhật thành công"]);
        }
    }

    public function store(Request $request)
    {
        //
    }

    public function showbillbyId($id){
        $Bill = Bill::find($id);
        if($Bill){
            Log::info('Quản trị ' . Auth::user()->name . ' Đã xem hóa đơn ' . $id);
            return view('admin.bill.details',compact('Bill'));
        }
        
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        Log::info('Quản trị ' . Auth::user()->name . ' Đã xem danh sách hóa đơn');
        return view('admin.bill.list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }

    public function getDetailsbyId($token){

        SEO::setTitle('Tình trạng đơn hàng');
        SEO::setDescription('Tình trạng đơn hàng');
        SEOMeta::addKeyword(['Tình trạng đơn hàng']);

        $getData = explode('-',$token);
        $id = base64_decode($getData[0]);
        $Bill = Bill::find($id);

        if(!empty($Bill)){
            return view('payreturn',compact('Bill'));
        } else {
            return redirect()->back();
        }
    }

    public function verifyPaypal(Request $req){
        if($req->ajax()){
            $Bill = Bill::find($req->id);
            $Bill->statusPay = 1;
            $Bill->save();
            return response()->json(['success'=>"OK"]);
        }
    }
}
