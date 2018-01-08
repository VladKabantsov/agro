<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Selling extends Model
{
    protected $table = 'selling_prices';
    
    protected $fillable = [
        'goods_id', 'sprice', 'user_id'
    ];
}
