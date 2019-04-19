<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    public function index(){
        
        return view('admin.setting.db.index');
    }
}
