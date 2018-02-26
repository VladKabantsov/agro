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

    /**
     * 
     * @param $id
     * @param $number
     * @return integer
     */
    public static function devideOnActiveAndRevenue($id, $number)
    {
        $goods = DB::table('goods')
                    ->select('rec_price', 'price_purchase')
                    ->where('id', '=', $id)
                    ->get();
       
        DB::table('goods')
            ->where('id',$id)
            ->decrement('quantity', $number);

        $activeMoney = $goods[0]->price_purchase * $number;
        $revenueAll = ($goods[0]->rec_price - $goods[0]->price_purchase) * $number;
        Money::updateActiveMoney($activeMoney);
        Money::updateRevenueMoney($revenueAll, 'add');

        $revenue = $goods[0]->rec_price - $goods[0]->price_purchase;
        
        return $revenue;
    }
}
