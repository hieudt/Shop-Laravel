<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quan extends Model
{
    protected $table = "quan";

    public function ThanhPho()
    {
        return $this->belongsTo('App\ThanhPho','id_thanhpho','id');
    }

    public function InfoShip()
    {
        return $this->hasMany('App\InfoShip','id_quan','id');
    }
}
