<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailsbill extends Model
{
    protected $table = "DetailsBill";

    public function product_details(){
        return $this->belongsTo('App\product_details','id_products_details','id');
    }

    public function Bill(){
        return $this->belongsTo('App\Bill','id_bill','id');
    }
}
