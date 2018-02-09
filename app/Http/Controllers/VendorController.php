<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;
use JavaScript;


class VendorController extends Controller
{
//    use JavaScript;
    
    public function index(){
        $goods = new Vendor();
        $goods_cat = new Vendor();
        $goods_subcat = new Vendor();
        $goods_name = new Vendor();
        $goods = $goods->getAllGoods();
        $goods_cat = $goods_cat->getGoodsCategory();
        $goods_subcat = $goods_subcat->getGoodsSubCategory();
        $goods_name = $goods_name->getGoodsForAName();
        $array = array();
        foreach ($goods_name as $value) {
            array_push($array, $value->g_name);

        }
//        dd($array);
//        $goods_name = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
//        dd($goods_name[0]->g_name);
        JavaScript::put([
            'goods_name' => $array,
        ]);
        return view('layouts.vendor', [
            'goods'                 => $goods,
            'goodsCat'              => $goods_cat,
            'goodsSubCat'           => $goods_subcat,
            'goods_name'            => $goods_name,
            'idActiveSubCategory'   => '0',
        ]);
    }
}
