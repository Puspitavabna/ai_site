<?php

namespace App\Http\Controllers;
use App\Models\Tutorial;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view( 'home.index');
        $tutorials = Tutorial::all();
        return view('home.index', compact('tutorials'));
    }

}
