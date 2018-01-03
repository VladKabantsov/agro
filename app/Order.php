<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'goods_id', 'quantity', 'rem_goods', 'price', 'user_id', 'date'
    ];
    public $timestamps = false;
}
