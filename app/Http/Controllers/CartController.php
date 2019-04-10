<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\product_details;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function __construct()
    {
        $danhmuc = Category::all();
        view()->share('danhmuc',$danhmuc);
    }

    public function destroy(Request $req){
        if($req->ajax()){
            Cart::remove($req->rowid);
            return response()->json(['success'=>'Xóa sản phẩm thành công']);
        }
    }

    public function cart(){
        $carts = array();
        return view('cart',compact('carts'));
    }

    public function store(Request $req){
        if($req->ajax()){
            
            $this->validate($req,[
                'idProduct' => 'required',
                'Number' => 'required|numeric|min:1|max:100',
                'idSize' => 'required',
                'idColor' => 'required'
            ],[
                'idProduct.required' => 'Sản phẩm không hợp lệ',
                'Number.required' => 'Vui lòng chọn số lượng',
                'Number.numeric' => 'Số lượng phải là số',
                'Number.min' => 'Số lượng ít nhất là 1',
                'Number.max' => 'Số lượng nhiều nhất là 100',
                'idSize.required' => 'Kích thước không hợp lệ',
                'idColor.required' => 'Màu sản phẩm không hợp lệ'
            ]);

            $product = product_details::where('id_product',$req->idProduct)
            ->where('id_size',$req->idSize)
            ->where('id_color',$req->idColor)
            ->first();

            if(empty($product))
            return response()->json(['errors'=>['faillogin'=>[0=>'Sản phẩm không hợp lệ,kiểm tra lại kích thước và màu sắc [ERROR 101]']]],422);
            
            if($req->Number > $product->soluong)
            return response()->json(['errors'=>['failnumber'=>[0=>'Số lượng trong kho không đủ [ERROR102]']]],422);

            $pr = Product::find($req->idProduct);

            $price = priceDiscount($pr->cost,$pr->discount);
            $checkNumber = Cart::search(function($cartItem,$rowId) use($product){
                return $cartItem->id === $product->id;
            });

            if($checkNumber->isNotEmpty()){
                foreach($checkNumber as $item){
                    if(($item->qty + $req->Number) > $product->soluong)
                    return response()->json(['errors'=>['failnumber'=>[0=>'Số lượng trong kho không đủ [ERROR104]']]],422);
                }
                
            }
            


            Cart::add($product->id,$pr->title,$req->Number,$price)
            ->associate('App\product_details');
    
            return response()->json(['success'=>'Thêm giỏ hàng thành công'],200);
        }
        
    }
}
