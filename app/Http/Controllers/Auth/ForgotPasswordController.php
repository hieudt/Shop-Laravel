<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth as log;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Mail;
use App\User;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest');
    }

    public function sendmailForgot(Request $req){
        if($req->ajax()){
            $app = User::where('email',$req->email)->get();
            if(count($app) > 0){
                $remember_token = $app[0]->remember_token;
                if($remember_token == null) 
                {
                    $app[0]->remember_token = str_random(60);
                    $app[0]->save();
                    $remember_token = $app[0]->remember_token;
                }


                Mail::send('emails.forgotpass', ['token' => $remember_token], function ($message) use ($req) {
                    $message->from('hieumai@rog.vn', 'Trung Hieu');
                    $message->to($req->email);
                });

                return response()->json(['success'=>'Vui lòng kiểm tra hòm thư']);
            } else {
                return response()->json(['errors'=>['forgotfail'=>[0=>'Email không tồn tại']]],422);
            }
        }
    }

    public function forgotconfirm($token){
        $app = User::where('remember_token',$token)->first();
        
        if(empty($app)){
            return redirect()->back();
        }else {
            $token = $app->remember_token;
            return view('forgotconfirm',compact('token'));
        }
    }

    public function forgotaccept(Request $req){
        if($req->ajax()){
            $app = User::where('remember_token',$req->token)->first();
            if(empty($app)){
                return redirect('/');
            } else {
                $newpass = bcrypt($req->password);
                $app->password = $newpass;
                $app->save();
                log::logoutUsingId($app->id);
                return response()->json(['success' => 'OK']);
            }
        }
    }
}
