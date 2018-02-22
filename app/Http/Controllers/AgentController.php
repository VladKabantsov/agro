<?php

namespace App\Http\Controllers;

use App\Agent;
use Illuminate\Http\Request;
use JavaScript;

class AgentController extends Controller
{
    public function index(){
        $goods = new Agent();
        $goods_cat = new Agent();
        $goods_subcat = new Agent();
        $goods_name = new Agent();
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

    public function acceptCheck(Request $request)
    {
        $data = $request->all();

        foreach ($data['goods'] as $key=>$item) {
            $idItem = $item['id'];
            $numberItem = $item['number'];
            Calculate::devideOnActiveAndRevenue($idItem, $numberItem);
        }

        return response()->json([
            'message'   => 'Чек подтвержден!',
        ]);
    }

    public function edit($id)
    {
        return redirect()
                    ->route('layouts.agent');
    }
}
