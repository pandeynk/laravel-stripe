<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function index($locale)
    {
        //Session::put('applocale', $locale);
        session(['applocale' => $locale]);
        //dd(session('applocale'));
        return redirect('/lang');
        //return redirect->back();
    }

    public function lang()
    {
        //dd(currency(12.00, 'USD', 'INR'));
        return view('lang');
    }
}
