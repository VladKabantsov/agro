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
//        dd($goods);
        foreach ($goods as $value) {
            array_push($array, [
                'id'=>$value->id,
                'name'=>$value->g_name,
                'barcode'=>$value->barcode,
                'price'=>$value->rec_price,
            ]);

        }
        JavaScript::put([
            'goods_params' => $array,
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
