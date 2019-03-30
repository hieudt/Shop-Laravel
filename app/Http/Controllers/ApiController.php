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

    public function minmax($min,$max)
    {
        $A = new Chatfuel();
        if($min>$max)
        {
            $A->sendText('Lỗi : giá trị min phải nhỏ hơn max');
        }

        $A->sendText("Số ngẫu nhiên là : ".rand($min,$max)." nhé =)) ");
    }
}
