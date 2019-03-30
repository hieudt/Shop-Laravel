<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = "Color";

    public function Product()
    {
        return $this->belongsToMany('App\Product','product_details','id_color','id_product');
    }

    public function product_details()
    {
        return $this->hasMany('App\product_details','id_color','id');
    }
}
