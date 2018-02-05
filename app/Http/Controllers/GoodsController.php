<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Controllers\StoreGoods; 
use App\Goods;
use App\Category;
use App\Manufacturer;
use App\Measure;

use Auth;

use Illuminate\Support\Facades\DB;
use Yajra\Datatables\DataTables;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $goods = new Goods();
        $goodsCollection = $goods->findGoodsCollection();

        return view('goods.goods_index', ['goods' => $goodsCollection]);
    }
    
    public function data()
    {
        // TODO: сделать вьюху
        $sql = "select g.id, g.g_name, g.barcode, c.cat_name, mf.manfac_name, 
                       m.meas_name, g.rec_price
                from goods g 
                    join measures m on g.measure_id = m.id
                    join manufacturers mf on g.manfac_id = mf.id
                    join categories c on g.manfac_id = c.id";
        
        $goods = DB::select($sql);
        
        
        return Datatables::of($goods)->make(true);
    }        
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $сategories = Category::all();
        $manfacs = Manufacturer::all();
        $measures = Measure::all();
        $title = "Добавление товара";
        $route = route('goods.store');
        $good[0] = new Goods();

        return view('goods.goods_create', [
            'title'         => $title,
            'route'         => $route,
            'сategories'    => $сategories,
            'manfacs'       => $manfacs,
            'measures'      => $measures,
            'good'          => $good,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([

            'g_name'        => 'required',
            'barcode'       => 'required',
            'categories_id' => 'required',
            'manfac_id'     => 'required',
            'measure_id'    => 'required',
            'rec_price'     => 'required',
            'description'   => 'required',
        ]);
        $data = $request->except('_token');

        $goods = new \App\Goods();
        $goods->fill($data);
        $goods->save();

        return redirect()->route('goods.create')
                         ->with('status', 'Добавлен успешно');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Goods::findOrFail($id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit($id = null, Request $request)
    {

        if ($id)
        {
           Goods::findOrFail($id)->get();
        }

        $goods = new Goods();

        $good = $goods->getGoodsFromTable($id);
        $сategories = Category::all();
        $manfacs = Manufacturer::all();
        $measures = Measure::all();
        $title = "Редактирование товара";
        $route = route('goods.update', $id);
        return view('goods.goods_create', [
            'title'         => $title,
            'route'         => $route,
            'сategories'    => $сategories,
            'manfacs'       => $manfacs,
            'measures'      => $measures,
            'good'          => $good,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id = null ,Request $request)
    {
        $data = $request->validate([

            'g_name'        => 'required',
            'barcode'       => 'required',
            'categories_id' => 'required',
            'manfac_id'     => 'required',
            'measure_id'    => 'required',
            'rec_price'     => 'required',
            'description'   => 'required',
        ]);
//        dd($data);
        $data = $request->except('_token');

        $goods = new \App\Goods();
        $goods->fill($data);
//        $goods->save();

        DB::table('goods')
            ->where('id', $id)
            ->update($data);
        return redirect()->route('goods.create')
                        ->with('status', 'Обновлен успешно');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Goods::find($id)->delete();
        return redirect()->route('goods.index');
    }

}
