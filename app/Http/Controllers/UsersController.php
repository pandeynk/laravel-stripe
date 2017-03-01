<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', ['users'=>$users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $u = User::where('email', $request['email'])->first();
        if ($u) {
            return redirect('/users/create')->with('danger', 'User with provided email already exists.');
        }
        if (User::create([
                'name'=>$request['name'],
                'email'=>$request['email'],
                'image_url'=>'avatar.png',
                'password'=>Hash::make(env('PASSWORD', 'welcome')),
            ])) {
            $user = User::where('email', $request['email'])->first();
            foreach ($request['roles'] as $role) {
                $role = Role::where('name', $role)->first();
                $user->attachRole($role);
            }
            $users = User::all();
            return redirect('/users')->with('success', 'User added successfully.');
        } else {
            return redirect('/users')->with('danger', 'Error occurred while creating user.');
        }
    }

    public function view($id)
    {
        $user = User::find($id);
        if ($user) {
            return view('users.create', ['user'=>$user]);
        } else {
            return redirect('/users')->with('danger', 'User was not found.');
        }
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $user = User::find($id);
        $roles = Role::whereIn('name', $request['roles'])->get();
        $user->roles()->sync($roles);
        if ($user) {
            $user->name = $request['name'];
            $user->email = $request['email'];
            if ($user->save()) {
                return redirect('/users')->with('success', 'User was updated successfully.');
            } else {
                return redirect('/users')->with('danger', 'Error occurred while saving user.');
            }
        } else {
            return redirect('/users')->with('danger', 'user was not found.');
        }
    }

    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            if ($user->delete()) {
                return redirect('/users')->with('success', 'User deleted successfully.');
            } else {
                return redirect('/users')->with('danger', 'User was not found.');
            }
        }
    }
}
