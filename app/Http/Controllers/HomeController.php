<?php

namespace App\Http\Controllers;

use App\Post;
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
        $posts=Post::where('status',1)->orderBy('created_at','desc')->get();
        return view('homepage',compact('posts'));
    }
    public function view($id)
    {
        $posts=Post::find($id);
        return view('yazar.view',compact('posts'));
    }
}
