<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
class SettingsController extends Controller
{
    public function index(){
        $data = Setting::find(1);
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
            $data->save();
            response()->json(['success'=>'Cập nhật thành công']);
        }
    }
}
