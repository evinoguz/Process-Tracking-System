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


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $makales=Makale::where('status',1)->orderBy('created_at','desc')->get();
//        return view('homepage',compact('makales'));
        return view('homepage');

    }
    public function view($id)
    {
//        $makales=Makale::find($id);
//        return view('view',compact('makales'));
    }
}
