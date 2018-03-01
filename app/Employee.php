<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 23.02.18
 * Time: 10:12
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public  function  getAllGoods()
    {
        $goods = \DB::table('goods')
            ->join('categories', 'goods.categories_id', '=', 'categories.id')
            ->join('manufacturers', 'goods.categories_id', '=', 'manufacturers.id')
            ->join('measures', 'goods.categories_id', '=', 'measures.id')
            ->join('sub_categories', 'goods.subcategories_id', '=', 'sub_categories.id')
            ->select('goods.id', 'g_name', 'barcode', 'categories.cat_name', 'manufacturers.manfac_name',
                'measures.meas_name',  'rec_price', 'sub_categories.subcategories_name', 'quantity', 'price_purchase')
            ->paginate(6);

        return $goods;
    }

    public function getGoodsCategory()
    {
        $goods = \DB::table('categories')
            ->groupBy('cat_name')
            ->get();

        return $goods;
    }

    public function getGoodsSubCategory()
    {
        $goods = \DB::table('sub_categories')
            ->groupBy('subcategories_name')
            ->get();

        return $goods;
    }

    public function getGoodsForAName()
    {
        $goods = \DB::table('goods')
            ->select('g_name')
            ->get();

        return $goods;
    }
    
    
}