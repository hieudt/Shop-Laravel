<?php

namespace App\Http\Controllers;

uss DB;
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
                echo $text;
                $A = new Chatfuel;
                $A->sendText($text);
        } else {
            $A->sendText("Đéo Hiểu");
        }
    }
}
