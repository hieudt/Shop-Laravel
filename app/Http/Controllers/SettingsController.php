<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
class SettingsController extends Controller
{
    public function index(){
        $data = Setting::find(1);
        Log::info('Quản trị ' . Auth::user()->name . ' Đã xem cấu hình hệ thống');
        return view('admin.setting.config.index',compact('data'));
    }

    public function updateui(Request $req){
        if($req->ajax()){
            
            $data = Setting::find(1);
            $oldColor = $data->theme_color;
            $newColor = $req->colorValue;
            $actual_path = base_path();
            $fileStyle1 = $actual_path . '/public/assets/css/genius1.css';
            $fileStyle2 = $actual_path . '/public/assets/css/style.css';

            $file1_contents = file_get_contents($fileStyle1);
            $file2_contents = file_get_contents($fileStyle2);
            $file1_contents = str_replace($oldColor, $newColor, $file1_contents);
            $file2_contents = str_replace($oldColor, $newColor, $file2_contents);
            file_put_contents($fileStyle1, $file1_contents);
            file_put_contents($fileStyle2, $file2_contents);
            
            $data->theme_color = $newColor;
            $data->nameshop = $req->nameshop;
            $data->addressshop = $req->addressshop;
            $data->phoneshop = $req->phoneshop;
            Cache::pull('settingcache');
            $data->save();
            Log::info('Quản trị ' . Auth::user()->name . ' Đã cập nhật màu giao diện');
            return response()->json(['success'=>'Cập nhật thành công']);
        }
    }

    public function sociallinks(Request $req){
        if($req->ajax()){
            $data = Setting::find(1);
            $data->fblink = $req->fblink;
            $data->twitterlink = $req->twitterlink;
            $data->instagramlink = $req->instagramlink;
            $data->youtubelink = $req->youtubelink;
            Cache::pull('settingcache');
            $data->save();
            Log::info('Quản trị ' . Auth::user()->name . ' Đã cập nhật đường dẫn mxh');
            return response()->json(['success'=>'Cập nhật thành công']);
        }
    }
}
