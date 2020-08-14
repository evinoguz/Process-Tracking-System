<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Step;
use App\Sub_Step;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Sub_StepController extends Controller
{
    public function index()
    {
        $steps=Step::all();
        return view("manager.step_index", compact("steps"));
    }

    public function create()
    {
        $steps=Step::pluck('name','id')->all(); // list kullanılmıyor. pluck kullan
        return view("manager.sub_step_create",compact('steps'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'step_id'=>'required',
            'name'=>'required',
        ]);
        $input=$request->all();
        $sub_steps=Sub_Step::create($input);
        Session::flash('status', 1);
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
       // $steps=Step::all();
        $sub_steps=Sub_Step::find($id);
        $steps=Step::pluck('name','id')->all(); // list kullanılmıyor. pluck kullan
        return view("manager.sub_step_edit",compact('sub_steps','steps'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'step_id'=>'required',
            'name'=>'required',
        ]);
        $sub_steps=Sub_Step::find($id);
        $sub_steps->update($request->all());
        Session::flash('status', 1);
        return back();
    }

    public function destroy($id)
    {
        Sub_Step::find($id)->delete();
        Session::flash('status',1);
        return back();
    }
}
