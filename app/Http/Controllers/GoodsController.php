<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Goods;
use App\Category;
use App\Manufacturer;
use App\Measure;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods = Goods::all();
        $сategories = Category::all();
        $manfacs = Manufacturer::all();
        $measures = Measure::all();
        
        return view('goods.goods_index', [
            'goods'      => $goods,
            'сategories' => $сategories,
            'manfacs'     => $manfacs,
            'measures'   => $measures
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            
            'g_name' => 'required',
            'barcode' => 'required',
            'categories_id' => 'required',
            'manfac_id' => 'required',
            'manfac_id' => 'required',
            'measure_id' => 'required',
            'rec_price' => 'required',
            'description' => 'required',
        ]);
        $data = $request->except('_token');
                    
        $goods = new \App\Goods();
        $goods->fill($data);
        $goods->save();
        
        return redirect('/goods')->flash('status', 'Task was successful!');;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
