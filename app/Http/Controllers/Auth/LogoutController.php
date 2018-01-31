<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LogoutController extends Controller
{

    protected $redirectTo = '/';

    public function logout() {
        Auth::logout();
        
        return view('auth.login');
    }

}
