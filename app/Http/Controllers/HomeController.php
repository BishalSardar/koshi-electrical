<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home');
    }

    // admin profile function
    public function adminProfile()
    {
        return view('profile.index');
    }

    // admin profile edit function
    public function adminProfileEdit()
    {
        return view('profile.edit');
    }
}
