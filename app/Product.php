<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "Product";

    public function Color(){
        return $this->belongsToMany('App\Color','product_details','id_product','id_color');
    }

    public function Size()
    {
        return $this->belongsToMany('App\Size','product_details','id_product','id_size');
    }

    public function product_details()
    {
        return $this->hasMany('App\product_details','id_product','id');
    }

    public function Images(){
        return $this->hasMany('App\Images','id_product','id');
    }

    public function ChatLieu()
    {
        return $this->belongsTo('App\ChatLieu','id_chatlieu','id');
    }

    public function SubCategory()
    {
        return $this->belongsTo('App\SubCategory','id_sub','id');
    }

    
}
