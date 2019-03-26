<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $table = "AttributeValue";

    public function Product(){
        return $this->belongsToMany('App\Product','AttributeProduct','attribute_value_id','product_id');
    }

    public function Attribute(){
        return $this->belongsTo('App\Attribute','id_att','id');
    }

    public function AttributeProduct(){
        return $this->hasMany('App\AttributeProduct','attribute_value_id','id');
    }
}
