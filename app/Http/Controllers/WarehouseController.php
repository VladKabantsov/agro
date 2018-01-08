<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
//use Carbon\Carbon;

use App\Order;
use App\Log;

class WarehouseController extends Controller
{
    /**
     * Show total amount of goods in current shop
     * @return type Responce
     */
    
    public function index() {
        
        $sql =  "select a.*, b.sprice
            from 
            (
                select o.shop_id, o.goods_id, sum(o.rem_goods) as rem_goods
                from orders o 
                group by o.shop_id, o.goods_id
            ) a 
            join 
            (
                select s1.goods_id, s1.sprice 
                from selling_prices s1
                join 
                (
                    select goods_id, max(created_at) as created_at
                    from selling_prices
                    group by goods_id
                ) s2
                on s1.goods_id = s2.goods_id
                        and s1.created_at = s2.created_at
            ) b
            on a.goods_id = b.goods_id";
    
        $goods = DB::select($sql);

        return view('warehouse.warehouse_index', compact('goods'));
    }
    
    public function store(Request $request) {
      
        $data = $request->validate([
            'goods_id' => 'required',
            'quantity' => 'required'
        ]);
        $data['sprice'] = 60;

        //получаем все накладные по нашему товару
        $orders = \App\Order::where('goods_id', $data['goods_id'])->orderBy('date')->get();

        $need = $data['quantity'];
        $price1 = 0; // стоимость товара по накладной  ед * цена_покупки
        $price2 = 0; // прибль, которую мы молучаем ед * цена_продажи - price1

    //    $max = App\Selling::where('goods_id', $data['goods_id'])->max('date');
    //    dd($max);

//        $data['log_date'] = Carbon::now();
        $data['user_id'] = 1;
        $data['shop_id'] = 1;
        $data['price2'] = $data['sprice'];

        //dd($data);

        foreach( $orders as $order) {

            if ( $order->rem_goods >= $need) {

                $order->rem_goods -= $need;
                $data['quantity'] = $need;   // количество в чеке - сколько попросили

    //            $price1 += $need * $order->price; // это отправить на счет 1
    //            $price2 += $need * $data['sprice']; // отправить в прибль
                $need = 0;
    //            $upd = \App\Order::findOrFail($order['id']);
    //            $upd->rem_goods = $order->rem_goods; 
                $order->save();

                $data['price1'] = $order->price;
                $data['order_id'] = $order->id;

                $log = tap(new Log($data))->save();
                break;
            } else {

                $need -= $order->rem_goods;

                // а тут в чек попадает, все что было по этому ордеру (цене), но
                //   нам нужно больше, поэтому логируем и переходим к следующей позиции.
                $data['quantity'] = $order->rem_goods; 
    //            $price1 += $order->rem_goods * $order->price;
    //            $price2 += $order->rem_goods * $data['sprice'];
                $price1 = $order->price;
                $price2 = $data['sprice'];
                $order->rem_goods = 0;

                $order->save();

                $data['price1'] = $order->price;
                $data['order_id'] = $order->id;
                $data['quantity'] = 
                $log = tap(new Log($data))->save();
            }
        }
        return redirect()->route('logs.index')
                         ->with('status', 'Добавлен успешно');
    }
}
