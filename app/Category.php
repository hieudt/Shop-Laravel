<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = "categories";
    protected $fillable = ['title', 'slug'];
    protected $dates = ['deleted_at'];
    public function SubCategory()
    {
        return $this->hasMany('App\SubCategory','id_category','id');
    }

    public function Product()
    {
        return $this->hasManyThrough('App\Product','App\SubCategory','id_category','id_sub','id');
    }
    
}
