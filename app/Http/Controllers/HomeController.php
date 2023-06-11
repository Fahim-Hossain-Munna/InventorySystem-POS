<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home.home');
    }

    public function profile ()
    {
        return view('dashboard.profile');
    }

    public function settings (Request $request)
    {
        return view('dashboard.settings');
    }

    // public function settings_insert (Request $request)
    // {
    //     return $request;
    // }
}
