<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Cache;
use App\Category;
use App\Setting;
use App\Shipper;
use App\Pages;

class CacheController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $minute = 60;
        $danhmuc = Cache::remember('categorycache', $minute, function () {
            $data = Category::with('SubCategory')->get();
            return $data;
        });
        view()->share('danhmuc', $danhmuc);

        $pages = Cache::remember('pagescache', $minute, function () {
            $data = Pages::nested()->get();
            return $data;
        });
        view()->share('pages', $pages);
        Cache::remember('pagesallcache', $minute, function () {
            $data = Pages::all();
            return $data;
        });

        $setting = Cache::remember('settingcache', $minute, function () {
            $data = Setting::find(1);
            return $data;
        });
        view()->share('setting', $setting);

        $shipper = Cache::remember('shippercache', $minute, function () {
            $data = Shipper::all();
            return $data;
        });
        view()->share('shipper', $shipper);
    }
}
