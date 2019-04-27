<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcriber;
class SubcriberController extends Controller
{
    public function store(Request $req){
        if($req->ajax()){
            $this->validate($req,[
                'email' => 'required|email|unique:subcribers,email'
            ],[
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email này đã đăng ký nhận tin trước đó'
            ]);

            $data = new Subcriber;
            $data->email = $req->email;
            $data->save();

            return response()->json(['success'=>'Đã đăng ký nhận tin tức từ cửa hàng']);
        }
    }
}
