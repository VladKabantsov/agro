<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Vendor extends Model
{
    use Notifiable;

    protected $table = 'goods';

    protected $fillable = [
        'g_name', 'barcode', 'quantity', 'rec_price'
    ];

    public  function  getAllGoods(){
        $goods = DB::table('goods')
            ->select('g_name', 'barcode', 'quantity', 'rec_price')
            ->get();
        return $goods;
    }


}
