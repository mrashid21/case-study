<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Spatie\Permission\Models\Role;
use Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(auth::user()->hasRole('superadmin')) {
            $users = User::all();
        } else {
            $users = User::role(['employee','employer'])->get();
        }
        return view('admins.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $create = true;
        $roles = Role::pluck('name','name');
        return view('admins.users.create', compact('roles', 'create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'same:confirm-password|required',
            'roles' => 'required',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
            ->with('toast_success', 'User created successfully');
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
        //
        $create = null;
        $user = User::where('id', $id)->first();
        $user_roles = $user->roles->pluck('name')->toArray();
        $roles = Role::pluck('name','name');
        return view('admins.users.edit', compact('user', 'user_roles', 'roles', 'create'));
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
        //
        $this->validate($request, [
            'name' => 'required',
            // 'email' => 'required|email|unique:users',
            // 'password' => 'same:confirm-password|required',
            'roles' => 'required',
        ]);

        $input = $request->except('roles');
        $user = User::updateOrCreate(['id' => $id], $input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
            ->with('toast_success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::where('id', $id)->delete();
        return redirect()->route('users.index')
            ->with('toast_success', 'User deleted successfully');
    }
}
