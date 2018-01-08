<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'order_id', 'quantity', 'user_id', 'shop_id', 'price1', 'price2'
    ];
    
    public function order() {
        
        return $this->belongsTo(\App\Order::class);
    }
}
