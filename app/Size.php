<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = "Size";

    public function Product()
    {
        return $this->belongsToMany('App\Product','product_details','id_size','id_product');
    }

    public function product_details()
    {
        return $this->hasMany('App\product_details','id_size','id');
    }
}
