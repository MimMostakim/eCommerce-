<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function shipping(){
        return $this->belongsTo(Shipping::class,'shipping_id');
    }

    public function payment(){
        return $this->hasMany(Payment::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetails::class);
    }
}
