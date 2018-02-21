<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Money extends Model
{
    protected $table = 'money';

    public $timestamps = false;

    protected $fillable = [
        'id', 'type', 'value'
    ];

    public function getActiveMoney()
    {   
        $activeMoney = DB::table('money')
                    ->select('value')
                    ->where('type','=','active')
                    ->get();
        $activeMoney = $activeMoney[0]->value/100; // we divide value on 100 because value saves on DB in pennis
        return $activeMoney;
    }
    
    public function getRevenueMoney()
    {   
        $revenueMoney = DB::table('money')
                    ->select('value')
                    ->where('type','=','revenue')
                    ->get();
        $revenueMoney = $revenueMoney[0]->value/100;
        return $revenueMoney;
    }

    public static function updateActiveMoney($sum)
    {
        DB::table('money')
            ->where('type','=','active')
            ->increment('value', $sum*100);
    }

    public static function updateRevenueMoney($sum, $type)
    {
        if ($type=='get') {
            DB::table('money')
                ->where('type','=','revenue')
                ->decrement('value', $sum*100);
        } else {
            DB::table('money')
                ->where('type','=','revenue')
                ->increment('value', $sum*100);
        }
        
    }
}
