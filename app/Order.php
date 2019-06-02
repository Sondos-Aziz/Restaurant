<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    public function customer(){
        return $this->belongsTo('App\Customer');
    }
    public function item(){
        return $this->belongsToMany('App\Item','order_details','order_id','item_id','quantity');

    }
    public  function user(){
        return $this->belongsTo('App/User');
    }
}
