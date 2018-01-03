<?php

use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

Route::resource('nerds', 'NerdController');

//Route::get('/', function(){
//    
//    //Event::fire('dfdfdf');
//});

Route::get('/array', 'DatatablesController@index');
Route::get('/array-data', 'DatatablesController@data');

//Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
//Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallBack');
//
//Auth::routes();
//
//Route::get('/', 'HomeController@index')->name('home');

Route::get('/order', function(){
    
    $orders = \App\Order::all();
    
    return view('order', ['orders' => $orders]);
});

Route::post('/order', function(Request $request){
    
    $data = $request->validate([
        'goods_id' => 'required',
        'quantity' => 'required',
        'price'    => 'required',
    ]);
    $data['rem_goods'] = $data['quantity'];
    $data['user_id'] = 1;
    $data['date'] = Carbon::now();
    
    $order = new \App\Order($data);
    $order->save();
    //$order = tap(new App\Order(data))->save();
    
    return redirect('/');
});

Route::get('/price', function(){
    
    if (Gate::allows('go')) {

        $sellings = \App\Selling::all();
    
        return view('selling', ['sellings' => $sellings]);
    }
});

Route::post('/price', function(Request $request){
    
    $data = $request->validate([
        'goods_id' => 'required',
        'sprice'    => 'required',
    ]);
    $data['user_id'] = 1;
    $data['date'] = Carbon::now();
    
    //dd($data);
    
    $selling = new \App\Selling($data);
    $selling->save();
    //$order = tap(new App\Order(data))->save();
    
    return redirect('/price');
});

Route::get('/warehouse', function(){
    
    $sql =  "select a.*, b.sprice
            from 
            (
                select o.goods_id, sum(o.rem_goods) as rem_goods
                from orders o 
                group by o.goods_id
            ) a 
            join 
            (
                select s1.goods_id, s1.sprice 
                from selling_prices s1
                join 
                (
                    select goods_id, max(date) as date
                    from selling_prices
                    group by goods_id
                ) s2
                on s1.goods_id = s2.goods_id
                        and s1.date = s2.date
            ) b
            on a.goods_id = b.goods_id";
    
    $goods = DB::select($sql);
    
    return view('warehouse', compact('goods')); 
});

Route::post('/warehouse', function(Request $request){
    
    $data = $request->validate([
        'goods_id' => 'required',
        'quantity' => 'required'
    ]);
    $data['sprice'] = 60;
    
    //получаем все накладные по нашему товару
    $orders = \App\Order::where('goods_id', $data['goods_id'])
                          ->orderBy('date')->get();
    
    $need = $data['quantity'];
    $price1 = 0; // стоимость товара по накладной  ед * цена_покупки
    $price2 = 0; // прибль, которую мы молучаем ед * цена_продажи - price1
    
    $max = App\Selling::where('goods_id', $data['goods_id'])->max('date');
    
    dd($max);
    
    foreach( $orders as $order) {
        
        if ( $order->rem_goods >= $need) {
            
            $order->rem_goods -= $need;
            $price1 += $need * $order->price; // это отправить на счет 1
            $price2 += $need * $data['sprice']; // отправить в прибль
            $need = 0;
//            $upd = \App\Order::findOrFail($order['id']);
//            $upd->rem_goods = $order->rem_goods; 
            $order->save();
            break;
        } else {
            
            $need -= $order->rem_goods;
            $price1 += $order->rem_goods * $order->price;
            $price2 += $order->rem_goods * $data['sprice'];
            $order->rem_goods = 0;
            
            $order->save();
        }
    }
    
    $data['date'] = Carbon::now();
    $data['user_id'] = 1;
    $data['price1'] = $price1;
    $data['price2'] = $price2;
    
//    dd($data);
    
    $log = tap(new App\Log($data))->save();
    echo $log->id;
    
    //$price2 -= $price1;
//    echo $price1. '<br>';
//    echo $price2;
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');