<?php

namespace App\Http\Controllers;

use App\Money;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Calculate;

class MoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = new Money();
        $revenue = new Money();

        $active = $active->getActiveMoney();
        $revenue = $revenue->getRevenueMoney();
        $moneyInGoods = Calculate::moneyInGoods();
        
        return view('money.money_index', [
            'active'        => $active,
            'revenue'       => $revenue,
            'moneyInGoods'  => $moneyInGoods,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd("store");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd("show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd("edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $typeMoney)
    {
        if ($typeMoney=='active') {
            $sum = Input::get('active');
            Money::updateActiveMoney($sum);
        } else {
            $sum = Input::get('revenue');
            Money::updateRevenueMoney($sum, 'get');
        }  
        return redirect()
                ->route('money.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd("destroy");
    }
}
