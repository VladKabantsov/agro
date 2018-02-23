<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Employee;
use Illuminate\Support\Facades\DB;

class Agent extends Employee
{
    public static function updateGoodsPrice ($id, $pricePurchase)
    {
        DB::table('goods')
            ->where('id', $id)
            ->update([
                'price_purchase' => $pricePurchase,
            ]);
    }
}
