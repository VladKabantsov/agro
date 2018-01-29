<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 29.01.18
 * Time: 13:46
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class SaveUserFieldsController extends Controller
{
    public function create() {
        
        $user = new \stdClass;

        $user->username = Input::get('name');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
//        $user->save();
        DB::table('users')->insert(
            [
                'name'      => $user->username,
                'email'     => $user->email,
                'password'  => $user->password
            ]
        );

        dd($user);
//       return view('auth.register');
    }

    

}
