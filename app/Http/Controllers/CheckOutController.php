<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\product_details;
use App\Product;
use Pusher\Pusher;
use App\User;
use App\Shipper;
use Illuminate\Support\Facades\Auth;
use App\coupons;
use Gloudemans\Shoppingcart\Facades\Cart;

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
}
