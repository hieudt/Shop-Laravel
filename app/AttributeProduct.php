<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeProduct extends Model
{
    protected $table = "AttributeProduct";

    public function Bill()
    {
        return $this->belongsToMany('App\Bill','App\Detailsbill','id_products_attribute','id_bill');
    }

    public function DetailsBill()
    {
        return $this->hasMany('App\Detailsbill','id_products_attribute','id');
    }
}
