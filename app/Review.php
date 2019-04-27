<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Review extends Model
{
    use SoftDeletes;
    protected $table = "reviews";
    protected $dates = ['deleted_at'];
    
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
