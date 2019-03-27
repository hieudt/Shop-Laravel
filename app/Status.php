<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "Status";

    public function Bill()
    {
        return $this->hasMany('App\Bill','id_status','id');
    }

    
}
