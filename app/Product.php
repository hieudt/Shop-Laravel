<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "Product";

    public function AttributeValue(){
        return $this->belongsToMany('App\AttributeValue','AttributeProduct','id_product','id_attr_value');
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
