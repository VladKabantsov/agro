<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Log;

class LogController extends Controller
{
    public function index() {
        
        $logs = Log::with('order')->get();
//        $logs = Log::join('orders', 'order_id', '=', 'orders.id')->get();
        
        return view('logs.logs_index', ['logs' => $logs]);
    }
}
