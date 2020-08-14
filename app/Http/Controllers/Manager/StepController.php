<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Step;
use App\Sub_Step;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StepController extends Controller
{
    public function index()
    {
        $steps=Step::all();
        return view("manager.step_index", compact("steps"));
    }

    public function create()
    {
        return view("manager.step_create");
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
        ]);
        $steps=Step::create($request->all());
        Session::flash('status', 1);
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $steps=Step::find($id);
        return view("manager.step_edit",compact("steps"));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
        ]);
        $steps=Step::find($id);
        $steps->update($request->all());
        Session::flash('status', 1);
        return back();
    }

    public function destroy($id)
    {
        $steps=Step::find($id)->delete();
        $sub_steps=Sub_Step::where("step_id",$id)->delete();
        Session::flash('status',1);
        return back();
    }
}
