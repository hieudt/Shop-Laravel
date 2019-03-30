<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use juno_okyo\Chatfuel;
class ApiController extends Controller
{
    public function index($msg)
    {
        $A = new Chatfuel();
        $A->sendText($msg);
    }
}
