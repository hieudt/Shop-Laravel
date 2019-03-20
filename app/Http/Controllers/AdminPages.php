<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPages extends Controller
{
    function index()
    {
        return view('admin.home');
    }
}
