<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public  function category(){
        return $this->belongsTo('App/Category');
    }
    public function order(){
        return $this->belongsToMany('App\Order','order_details','item_id','order_id','quantity');
    }
}
