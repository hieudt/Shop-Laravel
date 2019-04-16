<?php

namespace App\Http\Controllers;

use App\Shipper;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
class ShipperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.shiper.list');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        if($req->ajax()){
            $this->validate(
            $req,
                [
                    'txtTen' => 'required|min:3|max:150', /* không trùng tiêu đề khác */
                    'txtFee' => 'required|numeric',
                    'txtTime' => 'required',
                    'txtImg'=>  'required',
                ],
                [
                    'txtTen.required' => 'Vui lòng nhập tên dịch vụ',
                    'txtTen.min' => 'Họ tên tối thiểu 3 ký tự',
                    'txtTen.max' => 'Họ tên tối đa 150 ký tự',
                    'txtFee.required' => 'Vui lòng điền chi phí',
                    'txtFee.numeric' => 'chi phí phải là số',
                    'txtTime.required' => 'Thời gian cho mỗi đơn hàng',
                    'txtImg.required' => 'Logo nhà vận chuyển'
                   
                ]
            );


            $data = new Shipper;
            $data->name = $req->get('txtTen');
            $data->fee = $req->get('txtFee');
            $data->Time  = $req->get('txtTime');
            $data->image = $req->get('txtImg');
            

            $data->save();

            return response()->json(['success'=>'Thêm mới thành công'],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shipper  $shipper
     * @return \Illuminate\Http\Response
     */
    public function show(Shipper $shipper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shipper  $shipper
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipper $shipper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shipper  $shipper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req){
        if($req->ajax()){
            $this->validate(
            $req,
                [
                    'txtTen' => 'required|min:3|max:150', /* không trùng tiêu đề khác */
                    'txtFee' => 'required|numeric',
                    'txtTime' => 'required',
                    'txtImg'=>  'required',
                ],
                [
                    'txtTen.required' => 'Vui lòng nhập tên dịch vụ',
                    'txtTen.min' => 'Họ tên tối thiểu 3 ký tự',
                    'txtTen.max' => 'Họ tên tối đa 150 ký tự',
                    'txtFee.required' => 'Vui lòng điền chi phí',
                    'txtFee.numeric' => 'chi phí phải là số',
                    'txtTime.required' => 'Thời gian cho mỗi đơn hàng',
                    'txtImg.required' => 'Logo nhà vận chuyển'
                   
                ]
            );


            $data = Shipper::findOrFail($req->get('txtId'));
            $data->name = $req->get('txtTen');
            $data->fee = $req->get('txtFee');
            $data->Time  = $req->get('txtTime');
            $data->image = $req->get('txtImg');

            $data->save();

            return response()->json(['success'=>'Cập nhật thành công'],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shipper  $shipper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipper $shipper)
    {
        //
    }

    public function fetchAll(){
        $data = Shipper::all();

        return Datatables::of($data)
                ->editColumn('fee',function($ship){
                    return formatMoney($ship->fee);
                })
                ->editColumn('image',function($ship){
                    return "<img src='".$ship->image."'>";
                })
                ->addColumn('action',function($ship){
                    return '<button class="btn btn-outline-primary edited md-trigger md-setperspective" data-modal="modal-18" data-id="'.$ship->id.'" data-name="'.$ship->name.'" data-fee="'.$ship->fee.'" data-time="'.$ship->Time.'" data-images="'.$ship->image.'">Sửa </button>&nbsp<button class="btn btn-outline-danger delete" data-id="'.$ship->id.'">Xóa </button>';
                })->rawColumns(['fee','image','action'])->make(true);
    }
}
