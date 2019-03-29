<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = "Images";

    public function Product(){
        return $this->belongsTo('App\Product','id_product','id');
    }
}
