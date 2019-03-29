<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanhPho extends Model
{
    protected $table = "thanhpho";

    public function Quan()
    {
        return $this->hasMany('App\Quan','id_thanhpho','id');
    }

    public function InfoShip()
    {
        return $this->hasManyThrough('App\Quan','App\InfoShip','id_thanhpho','id_quan','id');
    }
}
