<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Calculate 
{

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
                    ->find($id);
       
        $activeMoney = $goods->price_purchase * $number;
        $revenueAll = ($goods->rec_price - $goods->price_purchase) * $number;
        Money::updateActiveMoney($activeMoney);
        Money::updateRevenueMoney($revenueAll, 'add');

    }

    /**
     * @return int
     */
    public static function moneyInGoods()
    {
        $goods = DB::table('goods')
            ->select('price_purchase', 'quantity')
            ->get();
        
        $money = 0;

        foreach ($goods as $good) {
            $money += $good->price_purchase * $good->quantity;
        }

        return $money;
    }

}
