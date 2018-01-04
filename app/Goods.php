<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';
    
    public $timestamp = false;
    
    protected $fillable = [
        'barcode', 'categories_id', 'manfac_id', 'measure_id', 'g_name', 
        'rec_price', 'description'
    ];
}
