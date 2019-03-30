<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_details extends Model
{
    protected $table = "product_details";

    public function Bill()
    {
        return $this->belongsToMany('App\Bill','App\Detailsbill','id_products_details','id_bill');
    }

    public function DetailsBill()
    {
        return $this->hasMany('App\Detailsbill','id_products_details','id');
    }
    
}
