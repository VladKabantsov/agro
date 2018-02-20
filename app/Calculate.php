<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Calculate 
{
    //Use to calculate revenue
//    protected $table = 'goods';
//
//    public $timestamps = false;
//
//    protected $fillable = [
//        'id', 'rec_price', 'price_purchase',
//    ];

    public static function getRevenueById($id)
    {
        $goods = DB::table('goods')
                    ->select('rec_price', 'price_purchase')
                    ->where('id', '=', $id)
                    ->get();
        
        return $goods[0]->rec_price-$goods[0]->price_purchase;
    }
}
