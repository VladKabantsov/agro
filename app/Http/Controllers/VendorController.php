<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index(){
        $goods = new Vendor();
        $goods = $goods->getAllGoods();
        return view('layouts.vendor', [
           'goods'  => $goods, 
        ]);
    }
}
