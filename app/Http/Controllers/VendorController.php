<?php

namespace App\Http\Controllers;

use App\Calculate;
use App\Goods;
use App\Vendor;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JavaScript;


class VendorController extends Controller
{

    public function index()
    {
        $goods = new Vendor();
        $categories = new Goods();
        $listOfGoods = new Goods();
        $subCategories = new Goods();
        $goodsName = new Vendor();
        $listOfGoods = $listOfGoods->findGoodsCollection();
        $goods = $goods->getAllGoods();
        $categories = $categories->getGoodsCategory();
        $subCategories = $subCategories->getGoodsSubCategory();
        $goodsName = $goodsName->getGoodsForAName();
        $array = array();
        $arrayName = array();

        foreach ($goods as $value) {
            array_push($array, [
                'id'        =>$value->id,
                'name'      =>$value->g_name,
                'barcode'   =>$value->barcode,
                'price'     =>$value->rec_price,
                'quantity'  =>$value->quantity,
            ]);
        }

        foreach ($goodsName as $value) {
            $arrayName [] = $value->g_name;
        }

        $errorMessages = trans('messages'); //get error messages from resources/en/messages.php

        JavaScript::put([
            'goodsName'     => $arrayName,
            'goods_params'  => $array,
            'errorMessages' => $errorMessages,
        ]);

        return view('layouts.vendor', [

            'goods'                 => $goods,
            'categories'            => $categories,
            'subCategories'         => $subCategories,
            'goods_name'            => $goodsName,
            'listOfGoods'           => $listOfGoods,
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
            Goods::updateQuantity($idItem, $numberItem);
        }

        return response()->json([
            'message'   => 'Чек подтвержден!',
        ]);
    }
}
