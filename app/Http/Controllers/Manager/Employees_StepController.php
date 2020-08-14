<?php

namespace App\Http\Controllers\Manager;

use App\Employees_Step;
use App\Http\Controllers\Controller;
use App\Step;
use App\Sub_Step;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Employees_StepController extends Controller
{
    public function index()
    {
        $employees_steps=Employees_Step::orderBy('created_at','desc')->paginate(10);
        return view('manager.employees_step_index',compact('employees_steps'));
    }

  public function create()
    {
        $users=User::pluck('name','id')->all();
        $steps=Step::pluck('name','id')->all();
        $sub_steps=Sub_Step::pluck('name','id')->all();
        return view('manager.employees_step_create',compact('users','steps','sub_steps'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id'=>'required',
            'step_id'=>'required',
            'sub_step_id'=>'required',
        ]);
        $input=$request->all();
        $employees_steps=Employees_Step::create($input);
        Session::flash('status', 1);
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $employees_steps=Employees_Step::find($id);
        $users=User::pluck('name','id')->all();
        $steps=Step::pluck('name','id')->all();
        $sub_steps=Sub_Step::pluck('name','id')->all();
        return view('manager.employees_step_edit',compact('employees_steps','users','steps','sub_steps'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'user_id'=>'required',
            'step_id'=>'required',
            'sub_step_id'=>'required',
        ]);
        $employees_steps=Employees_Step::find($id);
        $employees_steps->update($request->all());
        Session::flash('status', 1);
        return back();
    }

    public function destroy($id)
    {
        Employees_Step::find($id)->delete();
        Session::flash('status',1);
        return back();
    }
}
