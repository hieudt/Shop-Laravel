<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = "Attribute";

    public function AttributeValue()
    {
        return $this->hasMany('App\AttributeValue','id_att','id');
    }

    public function AttributeProduct(){
        return $this->hasManyThrough('App\AttributeProduct','App\AttributeValue','id_attr_value','id_att','id');
    }
}
