<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coupons extends Model
{
    protected $table = "coupons";

    public function Bill()
    {
        return $this->hasMany('App\Bill','id_coupon','id');
    }

    
}
