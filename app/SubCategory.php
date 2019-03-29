<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = "SubCategory";

    public function Category()
    {
        return $this->belongsTo('App\Category','id_category','id');
    }

    public function Product()
    {
        return $this->hasMany('App\Product','id_sub','id');
    }
}
