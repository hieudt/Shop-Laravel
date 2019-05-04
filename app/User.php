<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','created_at','updated_at','settings','role','provider_id','provider',
    ];

    public function Bill()
    {
        return $this->hasMany('App\Bill','id_user','id');
    }

    public function DetailsBill()
    {
        return $this->hasManyThrough('App\Detailsbill','App\Bill','id_user','id_bill','id');
    }

    public function Review()
    {
        return $this->hasMany('App\Review', 'id_users', 'id');
    }

    public function getCountBill($id){
        $Data = \App\Bill::where('id_user',$id)->where('statusPay',1)->where('status',2)->get();
        return count($Data);
    }

    public function getTotalMoney($id){
        return $Data = \App\Bill::where('id_user',$id)->where('statusPay',1)->where('status',2)->sum('TotalMoney');        
    }

    public static function getReview($idproduct){
        $star = 0;
        $data = Review::where('id_product', $idproduct)->where('id_users',Auth::user()->id)->take(1)->get();
        if($data->count() == 0){
            return $star;
        }else {
            return $data[0]->rating;
        }
    }

    public function getTitle($totalMoney,$id){
        if($id == 1){
            return 0;
        }

        if($totalMoney > 1000000){
            return 2; // Tiềm Năng
        }elseif($totalMoney > 100000){
            return 1; // Khách hàng
        }else{
            return 3; // Mới Đ Ký
        }
        
    }

  
}
