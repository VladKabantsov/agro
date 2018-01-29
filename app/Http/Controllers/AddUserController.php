<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 29.01.18
 * Time: 13:46
 */

namespace App\Http\Controllers;


class AddUserController extends Controller
{
    public function index() {

       return view('auth.register');
    }

    

}
