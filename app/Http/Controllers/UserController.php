<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Psy\Util\Json;
use App\User;
use Illuminate\Support\Str;
use Mail;
use Yajra\Datatables\Datatables;
class UserController extends Controller
{
    public function index(){
        return view('admin.users.list');
    }

    public function fetchAll(){
        $data = User::all();
        foreach($data as $usr){
            $usr['SoBill'] = $usr->getCountBill($usr->id);
            $usr['TotalMoney'] = $usr->getTotalMoney($usr->id);
            $usr['Title'] = $usr->getTitle($usr['TotalMoney'],$usr->id);
        }
    
        return Datatables::of($data)
                ->editColumn('name',function($user){
                    $text = '<table class="table table-bordered"><tbody> <tr> <td>Email</td>';
                    $text .= "<td> " . $user->email . "</td></tr>";
                    $text .= "<tr><td>Địa chỉ</td><td>".$user->Address."</td></tr>";
                    $text .= "<tr><td>Số Điện Thoại</td><td>".$user->Phone."</td></tr>";
                    return '<div class="tool">' . $user->name . '<span class="tool2">'.$text.'</span></div>';
                })
                ->editColumn('TotalMoney',function($user){
                    return formatMoney($user->TotalMoney);
                })
                ->editColumn('Title',function($user){
                    if($user->Title == 0)
                    return '404';
                    elseif($user->Title == 1)
                    return '<div class="badge badge-primary">Khách Hàng</div>';
                    elseif($user->Title == 2)
                    return '<div class="badge badge-warning">Tiềm Năng</div>';
                    else
                    return '<div class="badge badge-success">Mới Đăng Ký</div>';
                })
                ->addColumn('action',function($user){
                    return '<button class="btn btn-outline-primary edited md-trigger md-setperspective" data-modal="modal-18" data-id="'.$user->id.'" data-hoten="'.$user->name.'" data-email="'.$user->email.'" data-phone="'.$user->Phone.'" data-address="'.$user->Address.'">Sửa </button>&nbsp<button class="btn btn-outline-danger delete" data-id="'.$user->id.'">Xóa </button>';
                })->rawColumns(['name','action','TotalMoney','Title'])->make(true);
    }

    public function store(Request $req){
        if($req->ajax()){
            $this->validate(
            $req,
                [
                    'txtTen' => 'required|min:3|max:150', /* không trùng tiêu đề khác */
                    'txtEmail' => 'required|email|unique:users,email,'.$req->txtId,
                    'txtAddress' => 'required',
                ],
                [
                    'txtTen.required' => 'Vui lòng nhập họ tên',
                    'txtTen.min' => 'Họ tên tối thiểu 3 ký tự',
                    'txtTen.max' => 'Họ tên tối đa 150 ký tự',
                    'txtEmail.required' => 'Vui lòng nhập email',
                    'txtEmail.email' => 'Định dạng email không hợp lệ',
                    'txtEmail.unique' => 'Email đã có người sử dụng',
                    'txtAddress.required' => 'Địa chỉ không được để trống'
                   
                ]
            );


            $User = new User;
            $User->name = $req->txtTen;
            $User->email = $req->txtEmail;
            $User->Address = $req->txtAddress;
            $User->Phone = $req->txtPhone;
            $pw = "SHOPROG".Str::random(6);
            $User->password = bcrypt($pw);
            
            Mail::send('emails.send',['title'=>'Thông tin tài khoản tại cửa hàng ShopHieuMai','content'=>'Email : '.$req->txtEmail.' Mật khẩu : '.$pw],function($message) use ($req){
                $message->from('hieumai@rog.vn','Trung Hieu');
                $message->to($req->txtEmail);
            });
            $User->save();

            return response()->json(['success'=>'Thêm tài khoản thành công, thông tin đã được gửi vào mail khách hàng'],200);
        }
    }

    public function update(Request $req){
        if($req->ajax()){
            $this->validate(
            $req,
                [
                    'txtTen' => 'required|min:3|max:150', /* không trùng tiêu đề khác */
                    'txtEmail' => 'required|email|unique:users,email,'.$req->txtId,
                    'txtAddress' => 'required',
                ],
                [
                    'txtTen.required' => 'Vui lòng nhập họ tên',
                    'txtTen.min' => 'Họ tên tối thiểu 3 ký tự',
                    'txtTen.max' => 'Họ tên tối đa 150 ký tự',
                    'txtEmail.required' => 'Vui lòng nhập email',
                    'txtEmail.email' => 'Định dạng email không hợp lệ',
                    'txtEmail.unique' => 'Email đã có người sử dụng',
                    'txtAddress.required' => 'Địa chỉ không được để trống'
                   
                ]
            );


            $data = User::findOrFail($req->get('txtId'));
            $data->name = $req->get('txtTen');
            $data->email = $req->get('txtEmail');
            $data->Phone  = $req->get('txtPhone');
            $data->Address = $req->get('txtAddress');

            $data->save();

            return response()->json(['success'=>'Cập nhật thành công'],200);
        }
    }
}
