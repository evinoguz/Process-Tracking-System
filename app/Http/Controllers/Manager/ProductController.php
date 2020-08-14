<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use App\Step;
use App\Sub_Step;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use App\ImageSlug;
class ProductController extends Controller
{
    public function index(){
        $steps=Step::all();
        $products=Product::orderBy('created_at','desc')->paginate(10);
        return view('manager.product_index',compact('products','steps'));
    }

    public function create()
    {
        $steps=Step::pluck('name','id')->all();
        return view('manager.product_create',compact('steps'));

    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'slug'=>'required',
            'content'=>'required',
            'price'=>'required',
            'step_id'=>'required',
        ]);
        $input=$request->all();
        $input['status']=0;
        $products=Product::create($input);
        $image = $request->file('image');
        if ($image) //eğer resim varsa
        {
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $thumb = 'thumb_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image->getRealPath())->fit(1900, 872)->fill(0, 0, 0, 0.5)->save(public_path('uploads/' . $image_name));
            Image::make($image->getRealPath())->fit(600, 400)->save(public_path('uploads/' . $thumb));

            $input = [];
            $input['name'] = $image_name;
            $input['imageable_id'] = $products->id;
            $input['imageable_type'] = 'App\Product';
            $imgslugs=ImageSlug::create($input);
        }
        Session::flash('status', 1);
        return back();
    }
    public function edit($id)
    {
        $sub_steps=Sub_Step::find($id);
        $steps=Step::pluck('name','id')->all(); // list kullanılmıyor. pluck kullan
        $products=Product::find($id);
        return view('manager.product_edit',compact('products','steps','sub_steps'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'slug'=>'required',
            'content'=>'required',
            'price'=>'required',
            'step_id'=>'required',
        ]);
        $products=Product::find($id);
        $products->update($request->all());
        $image = $request->file('image');
        if ($image) //eğer resim varsa
        {
            $image_name = $products->image_slugs->name;
            $thumb ='thumb_'.$products->image_slugs->name;
            Image::make($image->getRealPath())->fit(1900, 872)->fill(0, 0, 0, 0.5)->save(public_path('uploads/' . $image_name));
            Image::make($image->getRealPath())->fit(600, 400)->save(public_path('uploads/' . $thumb));
        }
        Session::flash('status', 1);
        return redirect('product');
    }

    public function destroy($id)
    {
        $products_image=Product::find($id)->image_slugs->name;
        unlink(public_path('uploads/'.$products_image));
        unlink(public_path('uploads/thumb_'.$products_image));
        ImageSlug::where('imageable_id',$id)->where('imageable_type','App\Product')->delete();
        Product::destroy($id);
        Session::flash('status',1);
        return back();
    }
    }
