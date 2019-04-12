<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\product_details;
use App\Product;
use Pusher\Pusher;
use App\User;
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
        return view('checkout');
    }
}
