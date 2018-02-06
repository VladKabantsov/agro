<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = new User();
        $users = $users->getAllUser();
        return view('user.user_index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Добавить пользователя';
        $route = route('user.store');
        $user[0] = new User();
//        dd($user[0]);
        return view('auth.register', [
            'route' => $route,
            'title' => $title,
            'user'  => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required',
            'email'       => 'required',
            'password'    => 'required',
            'role'        => 'required',
        ]);

        $user = new User();
        $user ->fill($data);
        $user ->save();

        return redirect()->route('user.index')
            ->with('status', 'Пользователь добавлен успешно');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id)
        {
            User::findOrFail($id)->get();
        }

        $user = new User();
        $user = $user->getUser($id);
        $title = "Редактирование пользователя";
        $route = route('user.update', $id);
        return view('auth.register', [
            'user'     => $user,
            'title'    => $title,
            'route'    => $route,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'        => 'required',
            'email'       => 'required',
            'password'    => 'required',
            'role'        => 'required',
        ]);

        $user = new User();
        $user->fill($data);

        DB::table('users')
            ->where('id', $id)
            ->update($data);
        return redirect()->route('user.index')
            ->with('status', 'Обновлен успешно');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        User::find($id)->delete();
        return redirect()->route('user.index');
    }
}
