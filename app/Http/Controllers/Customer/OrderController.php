<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Step;
use App\Sub_Step;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        $orders=Order::orderBy('created_at','desc')->paginate(10);
        return view('customer.order_index',compact('orders'));
    }

    public function create()
    {
        $products=Product::pluck('name','id')->all();
        $steps=Step::pluck('name','id')->all();
        return view('customer.order_create',compact('products','steps'));

    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'product_id'=>'required',
        ]);
        $input=$request->all();
        $input['user_id']=Auth::user()->id;
        $input['status']=0;
        $products=Order::create($input);
        Session::flash('status', 1);
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $orders=Order::find($id);
     //   $status=$orders->status;
        $products=Product::find($orders->product_id);
        $steps=Step::find($products->step_id);
        $sub_steps=Sub_Step::find($products->step_id)->all();
        $steps_count=$sub_steps->count();
        return view('status','customer.order_see_more',compact('products','steps','sub_steps','steps_count'));
        //return view('customer.order_see_more',compact('orders'));

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
