<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Psy\Util\Json;
use App\User;
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
                    return formatMoney($user->TotalMoney)."₫";
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
                    return '<button class="btn btn-outline-primary edited md-trigger md-setperspective" data-modal="modal-18">Sửa </button><button class="btn btn-outline-danger delete">Xóa </button>';
                })->rawColumns(['name','action','TotalMoney','Title'])->make(true);
    }
}
