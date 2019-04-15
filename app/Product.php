<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Product extends Model
{
    protected $table = "Product";
    use Searchable;

    public function Color(){
        return $this->belongsToMany('App\Color','product_details','id_product','id_color');
    }

    public function Size()
    {
        return $this->belongsToMany('App\Size','product_details','id_product','id_size');
    }

    public function product_details()
    {
        return $this->hasMany('App\product_details','id_product','id');
    }

    public function Images(){
        return $this->hasMany('App\Images','id_product','id');
    }

    public function ChatLieu()
    {
        return $this->belongsTo('App\ChatLieu','id_chatlieu','id');
    }

    public function SubCategory()
    {
        return $this->belongsTo('App\SubCategory','id_sub','id');
    }

    public function Review(){
        return $this->hasMany('App\Review','id_product','id');
    }

    public function formatMoney($number, $fractional=false) {  
	    if ($fractional) {  
	        $number = sprintf('%d', $number);  
	    }  
	    while (true) {  
	        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);  
	        if ($replaced != $number) {  
	            $number = $replaced;  
	        } else {  
	            break;  
	        }  
	    }  
	    return $number;  
    }
    
    public function priceDiscount($Money,$Discount)
    {
       return  $Money - ($Money / 100 * $Discount);
    }
    
}
