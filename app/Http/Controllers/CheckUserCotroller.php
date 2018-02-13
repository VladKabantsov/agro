<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 31.01.18
 * Time: 13:46
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


class CheckUserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {



        /*check if user in system return him view of needed page*/
        if( Auth::check() )
        {
            $role = Auth::user()->getAttributes()["role"];
            switch ($role){
                case 1:
//                    return view('layouts.agro_layout');
                    return redirect()->route('goods.index');
                    break;
                case 2:
                    return redirect('/vendor');
                    break;
                case 3:
                    return view('layouts.agent');
                    break;
            }
        }else{
//            dd($user);
            return view('auth.login');
        }

        
    }



}
