<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    protected $table = "Shipper";

    public function Bill()
    {
        return $this->hasMany('App\Bill','id_shipper','id');
    }
}
