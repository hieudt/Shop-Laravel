<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Location;

class SafeModeController extends Controller
{
    public function AlertLogin(Request $req){
        echo $req->server('HTTP_USER_AGENT');
        echo $req->ip();
        echo Location::get($req->ip());
    }
}
