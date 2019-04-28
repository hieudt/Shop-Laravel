<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Location;

class SafeModeController extends Controller
{
    public function AlertLogin(Request $req){
        echo $req->server('HTTP_USER_AGENT')."<br/>";
        $ip = trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));
        echo $ip."<br/>";
        echo Location::get($req->ip());
    }
}
