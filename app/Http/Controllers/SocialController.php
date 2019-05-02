<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zalo;
use App\Setting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
class SocialController extends Controller
{
    public function index(){
        $data = Zalo::all();
        $setting = Setting::find(1);
        Log::info('Quản trị ' . Auth::user()->name . ' Đã xem cấu hình mạng xã hội');
        return view('admin.social.config',compact('data','setting'));
    }

    public function updateZalo(Request $req){
        if($req->ajax()){
            $data = Zalo::where('name','Zalo')->first();

            $data->app_id = $req->app_id;
            $data->app_secrect = $req->app_secrect;
            $data->app_code = $req->app_code;
            $data->app_token = $req->app_token;
            $data->save();
            Log::info('Quản trị ' . Auth::user()->name . ' Đã cập nhật cấu hình mạng xã hội');

            return response()->json(['success'=>"Cập nhật thành công"]);
        }
    }

    public function updateFacebook(Request $req)
    {
        if ($req->ajax()) {
            $data = Zalo::where('name', 'Facebook')->first();

            $data->pages_id = $req->pages_id;
            $data->app_token = $req->app_token;
            $data->save();
            Log::info('Quản trị ' . Auth::user()->name . ' Đã cập nhật cấu hình mạng xã hội');

            return response()->json(['success' => "Cập nhật thành công"]);
        }
    }
}
