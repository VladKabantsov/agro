<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'goods_id', 'quantity', 'date', 'user_id', 'price1', 'price2'
    ];
}
