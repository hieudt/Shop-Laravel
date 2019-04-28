<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Sarfraznawaz2005\VisitLog\Facades\VisitLog;
use App\VisitLog as vl;
use Mail;
class SafeModeController extends Controller
{
    public function AlertLogin(Request $req){
        $data = vl::orderBy('updated_at','DESC')->first();
        $output = "";
        $output .= "Địa chỉ IP : ".$data->ip."<br/>";
        $output .= "Hệ điều hành :".$data->os."<br/>";
        $output .= "Tài khoản hiện hành :".$data->user_name."<br/>";
        $output .= "Vị trí :".$data->city."<br/>";
        $setting =\App\Setting::find(1);
        $mailadmin = $setting->emailadmin;
        $setting->authtokenbackend = str_random(50);
        $setting->save();
        Mail::send('emails.alertlogin', ['output' => $output,'token'=>$setting->authtokenbackend], function ($message) use ($mailadmin) {
            $message->from('hieumai@rog.vn', 'Trung Hieu');
            $message->to($mailadmin);
        });

    }
    
    public function rememberauth($token){
        $app = \App\Setting::find(1);
        if($token == $app->authtokenbackend){
            $app->authtokenbackend = null;
            $app->save();
            return "<script type='text/javascript'>window.localStorage.setItem('admintoken','YES')</script>";
            //return redirect()->route('admin.index')->script("window.localStorage.setItem('admintoken', 'YES')");;        
        } else {
            return redirect('/');
        }
    }
}
