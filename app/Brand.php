<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = "brands";

    public function Product()
    {
        return $this->hasMany('App\Product', 'id_brand', 'id');
    }
}
