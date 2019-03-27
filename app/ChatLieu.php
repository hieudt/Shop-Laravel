<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatLieu extends Model
{
    protected $table = "ChatLieu";

    public function Product()
    {
        return $this->hasMany('App\Product','id_chatlieu','id');
    }
}
