<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\SubCategory;
use App\Category;
use App\Images;
use App\Review;
use App\User;
class FrontEndController extends Controller
{
    public function index(){
        $features = Product::where('featured','1')->orderBy('id','desc')->take(8)->get();
        $lastes = Product::orderBy('id','desc')->take(8)->get();
        $discounts = Product::where('discount','>','0')->orderBy('id','desc')->take(8)->get();
        return view('index',compact('features','lastes','discounts'));
    }

    public function productDetails($id,$slug){
        $productdata = Product::findOrFail($id);
        $gallery = Images::where('id_product',$id)->get();
        $reviews = Review::where('id_product',$id)->get();
        $relateds = Product::where('id_sub',$productdata->id_sub)->where('id','!=',$productdata->id)->take(8)->get();
        return view('product',compact('productdata','gallery','reviews','relateds'));
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
        return redirect()->route('front.index');
    }

    public function signUpPost(Request $req){
        $this->validate($req,[
            'name'=>'required|max:40',
            'email'=>'email|required|unique:users,email',
            'Address'=>'required',
            'Phone'=>'required|numeric',
            'password'=>'required',
        ],[
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email đã có người sử dụng',
            'name.required'=>'Vui lòng nhập họ và tên',
            'name.max' => 'Tên tối đa 40 ký tự',
            'Address.required'=>'Vui lòng nhập địa chỉ',
            'Phone.required' => 'Vui lòng nhập số điện thoại',
            'Phone.numeric'=>'Số điện thoại phải là số',
            'password.required'=>'Vui lòng nhập mật khẩu'
        ]);

        $User = new User;
        $User->name = $req->name;
        $User->email = $req->email;
        $User->Address = $req->Address;
        $User->Phone = $req->Phone;
        $User->password = bcrypt($req->password);

        $User->save();
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){
            return response()->json(['success' => 'Đăng ký thành công']);
        }
    }
}
