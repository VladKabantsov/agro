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
        'rec_price', 'description', 'subcategories_id'
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
            ->join('sub_categories', 'goods.subcategories_id', '=', 'sub_categories.id')
            ->select('goods.id', 'g_name', 'barcode', 'categories.cat_name', 'manufacturers.manfac_name',
                    'measures.meas_name',  'rec_price', 'sub_categories.subcategories_name', 'quantity')
            ->get();

        return $goods;
    }

    /**
     *
     * @return array
     */
    public function getGoodsCategory()
    {
        $goods = \DB::table('categories')
            ->groupBy('cat_name')
            ->get();

        return $goods;
    }

    /**
     *
     * @return array
     */
    public function getGoodsSubCategory()
    {
        $goods = \DB::table('sub_categories')
            ->groupBy('subcategories_name')
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

    public function getGoodsOnIndexSubCategory($id){
        $goods = \DB::table('goods')
            ->join('categories', 'goods.categories_id', '=', 'categories.id')
            ->join('manufacturers', 'goods.categories_id', '=', 'manufacturers.id')
            ->join('measures', 'goods.categories_id', '=', 'measures.id')
            ->join('sub_categories', 'goods.subcategories_id', '=', 'sub_categories.id')
            ->select('goods.id', 'g_name', 'barcode', 'categories.cat_name', 'manufacturers.manfac_name',
                'measures.meas_name',  'rec_price', 'sub_categories.subcategories_name')
            ->where('subcategories_id','=',$id)
            ->get();

        return $goods;
    }

}
