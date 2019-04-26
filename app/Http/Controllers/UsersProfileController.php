<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Category;
use App\coupons;
use Illuminate\Support\Facades\Session;
use App\User;
use Cache;
class UsersProfileController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $user = User::find(Auth::user()->id);
        $coupons = coupons::where('Date','>',now())->where('typeEnable','1')->get();
        $couponsVip = coupons::where('Date','>',now())->where('typeEnable','2')->get();
        $listproduct = User::find(Auth::user()->id)->DetailsBill()->orderBy('created_at','Desc')->get();
        return view('account',compact('user','coupons','couponsVip','listproduct'));
    }

    public function update(Request $req){
        $this->validate($req,[
            'name'=>'required|max:40',
            'Address'=>'required',
            'Phone'=>'required|numeric',
        ],[
            'name.required'=>'Vui lòng nhập họ và tên',
            'name.max' => 'Tên tối đa 40 ký tự',
            'Address.required'=>'Vui lòng nhập địa chỉ',
            'Phone.required' => 'Vui lòng nhập số điện thoại',
            'Phone.numeric'=>'Số điện thoại phải là số'
        ]);

        $User = User::find($req->id);
        $User->name = $req->name;
        $User->email = $req->email;
        $User->Address = $req->Address;
        $User->Phone = $req->Phone;
        $User->save();

        return response()->json(['success' => 'Cập nhật thành công']);
    }

    public function changePass(Request $req){
        $user = User::find($req->id);
        $input = "";
        $this->validate($req,[
            'oldpass'=>'required',
            'newpass'=>'required',
            'renewpass'=>'required|same:newpass',
        ],[
            'oldpass.required'=>'Vui lòng nhập mật khẩu cũ',
            'newpass.required'=>'Vui lòng nhập mật khẩu mới',
            'renewpass.required'=>'Vui lòng xác thực mật khẩu mới',
            'renewpass.same'=>'Xác thực mật khẩu không khớp'
        ]);

        if ($req->oldpass){
            if (Hash::check($req->oldpass, $user->password)){

                if ($req->newpass == $req->renewpass){
                    $input['password'] = Hash::make($req->newpass);
                }else{
                    return response()->json(['errors'=>['faillogin'=>[0=>'Xác nhận mật khẩu mới không khớp']]],422);
                }
            }else{
                return response()->json(['errors'=>['faillogin'=>[0=>'Mật khẩu cũ không hợp lệ']]],422);
            }
        }
        $user->password = bcrypt($req->newpass);
        $user->save();
        return response()->json(['success' => 'Thay đổi mật khẩu thành công']);
    }
}
