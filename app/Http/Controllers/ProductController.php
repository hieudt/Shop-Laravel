<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\product_details;
use App\Images;
use App\Size;
use Yajra\Datatables\Datatables;
use App\Color;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info('Quản trị ' . Auth::user()->name . ' Đã xem danh sách sản phẩm');
        return view('admin.product.list2');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.add2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */


    public function fetch(){
        $data = Product::orderBy('id','desc')->get();
        return Datatables::of($data)
        ->editColumn('cost',function($data){
            return formatMoney($data->cost);
        })
        ->editColumn('discount',function($data){
            return formatMoney(priceDiscount($data->cost,$data->discount))." (KM $data->discount %)";
        })
        ->editColumn('featured',function($data){
            if ($data->featured == 1)
                return '<label class="badge badge-info badge-pill">Nổi Bật </label>';
            else
                return '<label class="badge badge-danger badge-pill">Không </label>';
        })
        ->editColumn('title',function($row){
            return $row->title;
        
        })
        ->addColumn('action',function($data){
           $output = '<a href="edit/'.$data->id.'"><button class="btn btn-outline-primary edited" id="' . $data->id . '" title="' . $data->title . '" slug="' . $data->slug . '"><span class="mdi mdi-square-edit-outline"></span></button></a>
                     <button type="button" class="btn btn-outline-danger delete" id="' . $data->id . '"><span class="mdi mdi-delete"></span></button>
                     <button type="button" class="btn btn-outline-success upfb" id="'.$data->id. '"><span class="mdi mdi-facebook"></span></button>
                     <button type="button" class="btn btn-outline-primary xemProduct" thumbnail="'.$data->thumbnail.'" title="'.$data->title.'" slug="'.$data->slug.'" id="' . $data->id . '">Xem</button>';
                     return $output;
        })
        ->rawColumns(['cost','discount','featured','action','title'])
        ->make(true);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($Product = Product::find($id))
        {
            $Count = count($Product->product_details);
            $Size = Size::all();
            $Color = Color::all();
            return view('admin.product.edit',compact('Product','Count','Size','Color'));
        }      
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function formatMoney($number, $fractional=false) {  
	    if ($fractional) {  
	        $number = sprintf('%d', $number);  
	    }  
	    while (true) {  
	        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);  
	        if ($replaced != $number) {  
	            $number = $replaced;  
	        } else {  
	            break;  
	        }  
	    }  
	    return $number;  
    }
    
    public function priceDiscount($Money,$Discount)
    {
       return  $Money - ($Money / 100 * $Discount);
    }
}
