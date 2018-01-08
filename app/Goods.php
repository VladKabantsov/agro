<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';
    
    public $timestamps = false;
    
    protected $fillable = [
        'barcode', 'categories_id', 'manfac_id', 'measure_id', 'g_name', 
        'rec_price', 'description'
    ];
    
    public function orders() {
        
        return $this->hasMany(\App\Order::class);
    }
    
    public function category() {
        
        return $this->belongsTo(\App\Category::class);
    }
}
