<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'goods_id', 'quantity', 'rem_goods', 'price', 'user_id', 'shop_id'
    ];
    
    public function logs() {
        
        return $this->hasMany(\App\Log::class); 
    }
    
    public function goods() {
        
        return $this->belongsTo(\App\Goods::class);
    }
}
