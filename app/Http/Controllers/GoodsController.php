<?php

namespace App\Http\Controllers;

use App\Calculate;
use App\SubCategories;
use App\SubCategory;
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
        $goods_cat = new Goods();
        $goods_subcat = new Goods();
        $goodsCollection = $goods->findGoodsCollection();
        $goods_cat = $goods_cat->getGoodsCategory();
        $goods_subcat = $goods_subcat->getGoodsSubCategory();

        return view('layouts.products_list', [
            'goods'                 => $goodsCollection,
            'goodsCat'              => $goods_cat,
            'goodsSubCat'           => $goods_subcat,
            'idActiveSubCategory'   => '0',
        ]);
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
        $subcategories = SubCategories::all();

        return view('goods.goods_create', [
            'title'         => $title,
            'route'         => $route,
            'сategories'    => $сategories,
            'manfacs'       => $manfacs,
            'measures'      => $measures,
            'good'          => $good,
            'subcategories' => $subcategories,
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
//        dd($request);
        $data = $request->validate([

            'g_name'            => 'required',
            'barcode'           => 'required',
            'categories_id'     => 'required',
            'manfac_id'         => 'required',
            'measure_id'        => 'required',
            'rec_price'         => 'required',
            'description'       => 'required',
            'subcategories_id'  => 'required',
        ]);
        $data = $request->except('_token');
//        dd($data);
        $goods = new \App\Goods();
        $goods->fill($data);
        $goods->save();

        return redirect()->route('goods.index')
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
        $goods = new Goods();
        $goods_cat = new Goods();
        $goods_subcat = new Goods();
        $goods_cat = $goods_cat->getGoodsCategory();
        $goods_subcat = $goods_subcat->getGoodsSubCategory();
        $goods = $goods->getGoodsOnIndexSubCategory($id);
//        dd($goods);
        return view('layouts.products_list', [
            'goods'                 => $goods,
            'goodsCat'              => $goods_cat,
            'goodsSubCat'           => $goods_subcat,
            'idActiveSubCategory'   => $id,
        ]);
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
        $subcategories = SubCategories::all();
        $title = "Редактирование товара";
        $route = route('goods.update', $id);
        return view('goods.goods_create', [
            'title'         => $title,
            'route'         => $route,
            'сategories'    => $сategories,
            'manfacs'       => $manfacs,
            'measures'      => $measures,
            'good'          => $good,
            'subcategories' => $subcategories,
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
        return redirect()->route('goods.index')
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
