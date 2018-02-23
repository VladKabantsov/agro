<?php

namespace App\Http\Controllers;

use App\Calculate;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\View\View;
use JavaScript;

class EmployeeController extends Controller
{
    public function index()
    {
        $goods = new Employee();
        $goods_cat = new Employee();
        $goods_subcat = new Employee();
        $goods_name = new Employee();
        $goods = $goods->getAllGoods();
        $goods_cat = $goods_cat->getGoodsCategory();
        $goods_subcat = $goods_subcat->getGoodsSubCategory();
        $goods_name = $goods_name->getGoodsForAName();
        $array = array();

        foreach ($goods as $value) {
            array_push($array, [
                'id'        =>$value->id,
                'name'      =>$value->g_name,
                'barcode'   =>$value->barcode,
                'price'     =>$value->rec_price,
                'quantity'  =>$value->quantity,
            ]);
        }

        $errorMessages = trans('messages'); //get error messages from resources/en/messages.php

        JavaScript::put([
            'goods_params' => $array,
            'errorMessages'=> $errorMessages,
        ]);

        return view('layouts.agent', [
            'goods'                 => $goods,
            'goodsCat'              => $goods_cat,
            'goodsSubCat'           => $goods_subcat,
            'goods_name'            => $goods_name,
            'idActiveSubCategory'   => '0',
        ]);
    }

    

    
}
