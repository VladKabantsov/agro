<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'shop_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * 
     */
    public function getAllUser()
    {
        $users = DB::table('users')
            ->join('role', 'users.role','=','role.id')
            ->select('users.id', 'name', 'email', 'password', 'role.role_name', 'shop_id')
            ->where('users.role','!=',1)
            ->paginate(6);
        return $users; 
    }

    /**
     * 
     */
    public function getUser($id)
    {
        $user = DB::table('users')->select('name', 'email', 'role')->where('id','=',$id)->get();
        return $user;
    }
    /**
     * 
     */
    public static function checkUser()
    {
//        dd(Auth::check());
        if( Auth::check() )
        {
            $role = Auth::user()->getAttributes()["role"];
            switch ($role){
                case 1:
                    return view('layouts.agro_layout');
                    break;
                case 2:
                    return view('layouts.vendor');
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
