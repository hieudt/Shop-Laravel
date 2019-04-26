<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = "reviews";

    public function Product()
    {
        return $this->belongsTo('App\Product','id_product','id');
    }

    public function User()
    {
        return $this->belongsTo('App\User', 'id_users', 'id');
    }

    public static function ratings($productid){
        $star = 0;
        $stars = Review::where('id_product',$productid)->avg('rating');
        if ($stars != ""){
            $stat = explode('.',$stars);
            if ($stat[1] != 0){
                $star = intval($stars)+1;
            }else{
                $star = $stars;
            }
        }
        return $star;
    }
}
