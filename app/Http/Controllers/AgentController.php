<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Employee;
use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use JavaScript;

class AgentController extends EmployeeController
{
    public function edit(Request $request)
    {
        $data = $request->all();
        Agent::updateGoodsPrice($data['id'], $data['goodsPrice']);
        return redirect()
                ->route('agent');
    }

    
}
