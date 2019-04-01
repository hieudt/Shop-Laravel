<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use juno_okyo\Chatfuel;
use App\Category;

class ApiController extends Controller
{
    public function index($msg)
    {
        $A = new Chatfuel();
        $A->sendText($msg);
    }

    public function minmax($min, $max)
    {
        $A = new Chatfuel();
        if ($min > $max) {
                $A->sendText('Lỗi : giá trị min phải nhỏ hơn max');
            }

        $A->sendText("Số ngẫu nhiên là : " . rand($min, $max) . " nhé =)) ");
    }

    public function service($msg)
    {
        $A = new Chatfuel();
        if ($msg == "category") {
                $data = DB::table('categories')->select(DB::raw('title'))->orderBy('id', 'desc')->get();
                $text = '';
                foreach($data as $_data)
                {
                    foreach ($_data as $key => $value) {
                        $text .= $value."\n";
                    }
                }
                $A = new Chatfuel;
                $A->sendText($text);
        }
        elseif($msg == "product"){
            $data = DB::table('product')->get();
            $A->sendImage('http://123.16.227.89/Shop-Laravel/public/images/product/gMyc_fdsfds.jpg');
        }
        else {
            $A->sendText("Đéo Hiểu");
        }
        
    }
}
