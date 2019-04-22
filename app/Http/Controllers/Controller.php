<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Cache;
use App\Category;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        if (Cache::has('categorycache')) {
            $danhmuc = Cache::get('categorycache');
            view()->share('danhmuc', $danhmuc);
        } else {
            $danhmuc = Category::with('SubCategory')->get();
            Cache::put('categorycache', $danhmuc, 3);
            view()->share('danhmuc', $danhmuc);
        }
    }


}
