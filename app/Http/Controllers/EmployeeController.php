<?php

namespace App\Http\Controllers;

use App\Calculate;
use App\Employee;
use App\Goods;
use Illuminate\Http\Request;
use Illuminate\View\View;
use JavaScript;

class EmployeeController extends Controller
{
    public function index()
    {
        $goods = new Employee();
        $listOfGoods = new Goods();
        $categories = new Goods();
        $subCategories = new Goods();
        $goods_name = new Employee();
        $goods = $goods->getAllGoods();
        $listOfGoods = $listOfGoods->findGoodsCollection();
        $categories = $categories->getGoodsCategory();
        $subCategories = $subCategories->getGoodsSubCategory();
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
            'listOfGoods'           => $listOfGoods,
            'categories'            => $categories,
            'subCategories'         => $subCategories,
            'goods_name'            => $goods_name,
            'idActiveSubCategory'   => '0',
        ]);
    }

    

    
}
