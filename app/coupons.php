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

    public function Match($idCode,$idTitle){
        if($idCode == 1){
            if($idTitle != 4){
                return true;
            }
            return false;
        }

        if($idCode == 2){
            if($idTitle == 2 || $idTitle == 0){
                return true;
            }
            return false;
        }

        return true;

    }

    
}
