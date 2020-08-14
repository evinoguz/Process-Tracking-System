<?php

namespace App\Http\Controllers\Employees;

use App\Employees_Step;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Order_StepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {/**

        $user_id=Auth::user()->id;
        $employees=Employees_Step::where('user_id',$user_id)->get()->pluck('sub_step_id','user_id')->all();
        $orders=Order::where('status',$employees)->orderBy('created_at','desc')->paginate(10);
        return view('customer.order_index',compact('orders'));**/
        return view('customer.order_index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
