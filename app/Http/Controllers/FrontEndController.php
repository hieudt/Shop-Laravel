<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\SubCategory;
use App\Category;
use App\Images;
use App\Review;
class FrontEndController extends Controller
{
    public function index(){
        $features = Product::where('featured','1')->orderBy('id','desc')->take(8)->get();
        $lastes = Product::orderBy('id','desc')->take(8)->get();
        $discounts = Product::where('discount','>','0')->orderBy('id','desc')->take(8)->get();
        return view('index',compact('features','lastes','discounts'));
    }

    public function productDetails($id,$slug){
        $productdata = Product::findOrFail($id);
        $gallery = Images::where('id_product',$id)->get();
        $reviews = Review::where('id_product',$id)->get();
        $relateds = Product::where('id_sub',$productdata->id_sub)->where('id','!=',$productdata->id)->take(8)->get();
        return view('product',compact('productdata','gallery','reviews','relateds'));
    }
}
