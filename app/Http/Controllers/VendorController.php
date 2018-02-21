<?php

namespace App\Http\Controllers;

use App\Calculate;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JavaScript;


class VendorController extends Controller
{

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

        return view('layouts.vendor', [
            'goods'                 => $goods,
            'goodsCat'              => $goods_cat,
            'goodsSubCat'           => $goods_subcat,
            'goods_name'            => $goods_name,
            'idActiveSubCategory'   => '0',
        ]);
    }
    
    public function acceptCheck(Request $request) 
    {
        $data = $request->all();

        foreach ($data['goods'] as $key=>$item) {
            $idItem = $item['id'];
            $numberItem = $item['number'];
            Calculate::devideOnActiveAndRevenue($idItem, $numberItem);
//          $idGoods[$key] = $idItem;
//          $numOfGoods[$key] = $numberItem;
//
        }
//        var_dump('id = ', $idGoods, ' numbers = ', $numOfGoods); die;

        return response()->json([
            'message'   => 'Чек подтвержден!',
        ]);
    }
}
