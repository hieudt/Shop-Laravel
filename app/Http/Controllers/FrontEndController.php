<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class FrontEndController extends Controller
{
    public function index(){
        $features = Product::where('featured','1')->orderBy('id','desc')->take(8)->get();
        $lastes = Product::orderBy('id','desc')->take(8)->get();
        $discounts = Product::where('discount','>','0')->orderBy('id','desc')->take(8)->get();
        return view('index',compact('features','lastes','discounts'));
    }
}
