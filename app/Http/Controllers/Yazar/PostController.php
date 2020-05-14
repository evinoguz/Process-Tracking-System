<?php

namespace App\Http\Controllers\Yazar;

use App\Http\Controllers\Controller;
use App\ImageSlug;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderBy('created_at','desc')->paginate(10);
        return view('yazar.post_index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('yazar.post_create');

    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'location'=>'required',
            'image'=>'required',
            'content'=>'required',
        ]);
        $input=$request->all();
        $input['user_id']=Auth::user()->id;
        $input['status']=0;
        $posts=Post::create($input);
        $image = $request->file('image');
        if ($image) //eğer resim varsa
        {
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $thumb = 'thumb_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image->getRealPath())->fit(1900, 872)->fill(0, 0, 0, 0.5)->save(public_path('uploads/' . $image_name));
            Image::make($image->getRealPath())->fit(600, 400)->save(public_path('uploads/' . $thumb));

            $input = [];
            $input['name'] = $image_name;
            $input['imageable_id'] = $posts->id;
            $input['imageable_type'] = 'App\Post';
            ImageSlug::create($input);
        }
        Session::flash('status', 1);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts=Post::find($id);
        return view('yazar.post_edit',compact('posts'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'location'=>'required',
            'content'=>'required',
        ]);
        $input=$request->all();
        $input['status']=0;
        $posts=Post::find($id);
        $posts->update($input);
        $image = $request->file('image');
        if ($image) //eğer resim varsa
        {
            $image_name = $posts->image_slugs->name;
            $thumb ='thumb_'.$posts->image_slugs->name;
            Image::make($image->getRealPath())->fit(1900, 872)->fill(0, 0, 0, 0.5)->save(public_path('uploads/' . $image_name));
            Image::make($image->getRealPath())->fit(600, 400)->save(public_path('uploads/' . $thumb));
        }
        Session::flash('status', 1);
        return redirect('mypost');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts_image=Post::find($id)->image_slugs->name;
        unlink(public_path('uploads/'.$posts_image));
        unlink(public_path('uploads/thumb_'.$posts_image));
        ImageSlug::where('imageable_id',$id)->where('imageable_type','App\Post')->delete();
        Post::destroy($id);
        Session::flash('status',1);
        return back();
    }
    public function status_change(Request $request)
    {
        $id=$request->id;
        $status=($request->status=='true')? 1:0;
        Post::find($id)->update(['status'=>$status]);
    }
}
