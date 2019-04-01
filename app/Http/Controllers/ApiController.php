<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use juno_okyo\Chatfuel;
use App\Category;
use App\Product;
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
        if ($msg == "category") {
            $data = DB::table('categories')->select(DB::raw('title'))->orderBy('id', 'desc')->get();
            $text = '';
            foreach ($data as $_data) {
                    foreach ($_data as $key => $value) {
                        $text .= $value . "\n";
                    }
                }
            $A = new Chatfuel;
            $A->sendText($text);
        } elseif ($msg == "product") {
            $A = new Chatfuel;
            $data = Product::all();
            
            foreach ($data as $_data) {
                    $text = '';
                    $text .= "Tên sản phẩm : " . $_data['title'] . "\n";
                    $text .= "Giá tiền :" . $_data['cost'] . "\n";
                    $text .= "Hình ảnh :" . "\n";
                    $A->sendText($text);
                    echo $text;
            }
        } else {
            $A->sendText("Đéo Hiểu");
        }
    }
}
