<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role_User;
use App\Talep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TalepController extends Controller
{
    public function index()
    {
        $taleps=Talep::orderBy('created_at','desc')->paginate(10);
        return view('admin.talep_index',compact('taleps'));
    }
    public function destroy($id)
    {
        Talep::destroy($id);
        Session::flash('status',1);
        return redirect('/talep');
    }
    public function status_change(Request $request)
    {
        $id=$request->id;
        $status=($request->status=='true')? 1:0;
        if($status)
        {
            Role_User::create(['user_id'=>$id,'role_id'=>2]);
        }
        else{
            Role_User::where('user_id',$id)->where('role_id',2)->delete();
        }
    }
}
