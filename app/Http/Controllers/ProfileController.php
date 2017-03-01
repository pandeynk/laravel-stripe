<?php

namespace App\Http\Controllers;

//use App\Quote;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile.index');
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function password(Request $request)
    {
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            return redirect('/profile')->with('success', 'Password changed successfully.');
        } else {
            return redirect('/profile')->with('success', 'Error occurred while changing password.');
        }
    }

    public function avatar(Request $request)
    {
        $path = Storage::putFile('avatars', $request->file('avatar'), 'public');
        $user = Auth::user();
        $user->image_url = $path;
        if ($user->save()) {
            return redirect('/profile')->with('success', 'Profile picture changed successfully.');
        } else {
            return redirect('/profile')->with('success', 'Error occurred while changing profile picture.');
        }
    }

    public function email(Request $request)
    {
        $u = User::where('email', $request['email'])->first();
        if ($u) {
            return redirect('/profile')->with('danger', 'User with provided email already exists.');
        }
        $user = Auth::user();
        $user->email = $request['email'];
        if ($user->save()) {
            return redirect('/profile')->with('success', 'Email changed successfully.');
        } else {
            return redirect('/profile')->with('success', 'Error occurred while updating email.');
        }
    }
}
