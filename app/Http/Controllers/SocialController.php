<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zalo;
class SocialController extends Controller
{
    public function index(){
        $data = Zalo::all();
        return view('admin.social.config',compact('data'));
    }

    public function updateZalo(Request $req){
        if($req->ajax()){
            $data = Zalo::where('name','Zalo')->first();

            $data->app_id = $req->app_id;
            $data->app_secrect = $req->app_secrect;
            $data->app_code = $req->app_code;
            $data->app_token = $req->app_token;
            $data->save();


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


            return response()->json(['success' => "Cập nhật thành công"]);
        }
    }
}
