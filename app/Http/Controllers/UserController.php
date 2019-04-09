<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Psy\Util\Json;
use App\User;
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
        }
    
        return response()->json($data,200);
    }
}
