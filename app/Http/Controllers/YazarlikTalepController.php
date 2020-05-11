<?php

namespace App\Http\Controllers;

use App\Talep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class YazarlikTalepController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        if(Talep::where('user_id',Auth::user()->id)->count())
        {
            Session::flash('status',3);
            return redirect('/');
        }
        return view('yazarlik_talebi');
    }
    public function send(Request $request)
    {
        $this->validate($request,[
            'explanation'=>'required',
        ]);

        $input=$request->all();
        $input['user_id']=Auth::user()->id;
        Talep::create($input);
        Session::flash('status',2);
        return redirect('/');
    }
}
