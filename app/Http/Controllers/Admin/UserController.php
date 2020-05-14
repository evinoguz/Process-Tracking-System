<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\Role_User;
use App\RoleUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Integer;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at','desc')->paginate(5); // kulanıcı sayısı çoksa hepsini çekmesin
        return view('admin.user_index', compact('users'));
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('admin.user_edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "name" => "required|max:255",
            "email" => "required|email|unique:users,email," . $id,
            "password" => !empty($request->password) ? "required|min:6" : ""
        ]);
        if (!empty($request->password)) {
            $input = $request->all();
            $input["password"] = bcrypt($request->password);
            User::find($id)->update($input);
        } else {
            User::find($id)->update([
                "name" => $request->name,
                "email" => $request->email
            ]);
        }
        RoleUser::where('user_id',$id)->delete();
        foreach($request->rol as $rol)
        {
            RoleUser::create(["role_id" => $rol[0], "user_id" => $id]);
        }
        Session::flash("status",1);
        return redirect("/user");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Session::flash("status",1);
        return redirect("/user");

    }
}
