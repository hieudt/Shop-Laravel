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
use App\Pages;
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
            Cache::put('categorycache', $danhmuc, 30);
            view()->share('danhmuc', $danhmuc);
        }

        if (Cache::has('pagescache')) {
            $pages = Cache::get('pagescache');
            view()->share('pages', $pages);
        } else {
            $pages = Pages::nested()->get();;
            Cache::put('pagescache', $pages, 30);
            view()->share('pages', $pages);
        }

        if (Cache::has('settingcache')) {
            $setting = Cache::get('settingcache');
            view()->share('setting', $setting);
        } else {
            $setting = Setting::find(1);
            Cache::put('settingcache', $setting, 30);
            view()->share('setting', $setting);
        } 
    }


}
