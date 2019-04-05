<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminPages extends Controller
{
    function index()
    {
        return view('admin.home');
    }

    public function attIndex(){
        return view('admin.attribute.home');
    }
    
    public function loginIndex(){
        return view('admin.login');
    }

    public function loginPost(Request $req){
        $this->validate($req,[
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=>'Vui lòng nhập email',
            'password.required'=>'Vui lòng nhập password'
        ]);

        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){
            return response()->json(['success' => 'Đăng nhập thành công']);
        } else {
            return response()->json(['errors'=>['faillogin'=>[0=>'Sai tên tài khoản hoặc mật khẩu']]],422);
        }
    }

    public function logoutIndex(){
        Auth::logout();
        return view('admin.login');
    }
}
