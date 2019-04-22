<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;
class PagesController extends Controller
{
    public function index(){
        $pages = Pages::nested()->get();
        return view('admin.pages.index',compact('pages'));
    }
}
