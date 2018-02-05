<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class Goods extends Model
{
    protected $table = 'goods';
    
    public $timestamps = false;
    
    protected $fillable = [
        'barcode', 'categories_id', 'manfac_id', 'measure_id', 'g_name', 
        'rec_price', 'description'
    ];
    
    public function orders()
    {
        
        return $this->hasMany(\App\Order::class);
    }
    
    public function category()
    {
        
        return $this->belongsTo(\App\Category::class);
    }

    /**
     *
     * @return array
     */
    public function findGoodsCollection()
    {
        $goods = \DB::table('goods')
            ->join('categories', 'goods.categories_id', '=', 'categories.id')
            ->join('manufacturers', 'goods.categories_id', '=', 'manufacturers.id')
            ->join('measures', 'goods.categories_id', '=', 'measures.id')
            ->select('goods.id', 'g_name', 'barcode', 'categories.cat_name', 'manufacturers.manfac_name', 'measures.meas_name',  'rec_price')
            ->get();

        return $goods;
    }

    /**
     *
     */
    public function getGoodsFromTable($id){
        $goods = DB::table('goods')
            ->where('id', '=', $id)
            ->get()->all();
        return $goods;
    }
//    public function getGoodInputs()
//    {
//        $good = new \stdClass;
//
//        $good->barcode = Input::get('barcode');
//        $good->g_name = Input::get('g_name');
//        $good->rec_price = Input::get('rec_price');
//        $good->description = Input::get('description');
//        $good->categories_id = Input::get('categories_id');
//        $good->manfac_id = Input::get('manfac_id');
//        $good->measure_id = Input::get('measure_id');
//        DB::table('goods')->insert(
//            [
//                'barcode'       => $good->barcode,
//                'g_name'        => $good->g_name,
//                'rec_price'     => $good->rec_price,
//                'description'   => $good->description,
//                'categories_id' => $good->categories_id,
//                'manfac_id'     => $good->manfac_id,
//                'measure_id'    => $good->measure_id,
//            ]
//        );
////        dd($good);
//        return $good;
//    }

}
