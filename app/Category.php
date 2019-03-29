<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = ['title', 'slug'];
    public function SubCategory()
    {
        return $this->hasMany('App\SubCategory','id_category','id');
    }

    public function Product()
    {
        return $this->hasManyThrough('App\Product','App\SubCategory','id_sub','id_category','id');
    }
    
}
