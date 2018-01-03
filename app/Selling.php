<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Selling extends Model
{
    protected $table = 'selling_prices';
    
    protected $fillable = [
        'goods_id', 'sprice', 'date', 'user_id'
    ];
    
    public $timestamps = false;
}
