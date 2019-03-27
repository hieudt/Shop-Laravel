<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "Bill";

    public function Shipper()
    {
        return $this->belongsTo('App\Shipper','id_shipper','id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Status','id_status','id');
    }

    public function InfoShip()
    {
        return $this->belongsTo('App\InfoShip','id_infoship','id');
    }

    public function coupons()
    {
        return $this->belongsTo('App\coupons','id_coupon','id');
    }

    public function Users()
    {
        return $this->belongsTo('App\User','id_user','id');
    }

    public function AttributeProduct()
    {
        return $this->belongsToMany('App\AttributeProduct','App\Detailsbill','id_bill','id_products_attribute');
    }

    public function DetailsBill()
    {
        return $this->hasMany('App\Detailsbill','id_bill','id');
    }
}
