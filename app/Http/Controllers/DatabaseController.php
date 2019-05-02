<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class DatabaseController extends Controller
{
    public function index(){

        Log::info('Quản trị ' . Auth::user()->name . ' Đã xem cấu hình csdl');
        return view('admin.setting.db.index');
    }
}
