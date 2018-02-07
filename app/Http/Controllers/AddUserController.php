<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 29.01.18
 * Time: 13:46
 */

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;

class AddUserController extends Controller
{
    public function index() {

       return view('auth.register');
    }

    public function createAdmin()
    {
        $data ['name'] = 'Vlad';
        $data ['email'] = 'vlad@gmail.com';
        $data ['role'] = '1';
        $data ['shop_id'] = '0';
        $data['password'] = bcrypt('123123');
//        dd($data);
        DB::table('users')->insert($data);
//        $user = new User();
//        $user ->fill($data);
//        dd($user);
//        $user ->save();
    }

    

}
