<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoShip extends Model
{
    protected $table = "InfoShip";

    public function Quan()
    {
        return $this->belongsTo('App\Quan','id_quan','id');
    }

    public function Bill()
    {
        return $this->hasMany('App\Bill','id_infoship','id');
    }
}
