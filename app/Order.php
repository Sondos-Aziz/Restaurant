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
        return $this->belongsToMany('App\Item','OrderDetail','order_id','item_id','quantity');

    }
}
