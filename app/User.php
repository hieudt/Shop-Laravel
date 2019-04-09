<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Bill()
    {
        return $this->hasMany('App\Bill','id_user','id');
    }

    public function DetailsBill()
    {
        return $this->hasManyThrough('App\DetailsBill','App\Bill','id_bill','id_user','id');
    }

    public function getCountBill($id){
        $Data = \App\Bill::where('id_user',$id)->get();
        return count($Data);
    }

    public function getTotalMoney($id){
        return $Data = \App\Bill::where('id_user',$id)->sum('TotalMoney');        
    }
}
