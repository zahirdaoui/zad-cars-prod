<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index()
    {


        $dataUsers = User::whereHas('roles', function($q){$q->whereIn('name', ['user']);})->get();
        $dataAdmins = User::whereHas('roles', function($q){$q->whereIn('name', ['admin']);})->get();

        return view('dashboard.usersadmins',compact("dataUsers","dataAdmins"));
    }

    public function myaccount()
    {
        return view('dashboard.account');
    }

    public function updatemyaccount(Request $request)
    {
        $admin = Auth::user()->id;
        $user = User::find($admin);

        $request->validate([
            'nom' => "required|max:255",
            'email' =>"required|email|max:255",
            'img_admin' => "image|mimes:jpg,png,jpeg",
        ]);

            if($file_img_admin = $request->file('img_admin')){
                $imag_nam = md5(rand(1000,100000));
                $ext = $file_img_admin->getClientOriginalExtension();
                $upload_path = 'dataimg/adminimg/';
                $img_full_name_admin = $imag_nam.'.'.$ext;
                $file_img_admin->move($upload_path,$img_full_name_admin);

                $user->img = $img_full_name_admin;
                $user->save();
         }

         if($request->password !== null){

            $password = Hash::make($request->password);
            $user->password = $password;
            $user->save();

         }

        $user->update([
            "name" => $request->nom,
            "number_phone" => $request->phone,
            "email" => $request->email,

         ]);
         return redirect()->back();

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.accountadmin')->with("user",$user);
    }

    public function editRole($id)
    {
        $user = User::find($id);
        $user->roles()->detach(Role::where('name', 'user')->first());
        $user->roles()->attach(Role::where('name', 'admin')->first());
        return redirect()->back();
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->forceDelete();

        return redirect()->back()->with('message' , 'L\'élément sélectionné a été supprimé avec succès');
    }
    public function deleteAdmins($id)
    {
        $user = User::find($id);
        $user->forceDelete();

        return redirect()->back()->with('message' ,'L\'élément sélectionné a été supprimé avec succès');
    }




    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'nom' => "required|max:255",
            'email' =>"required|email|max:255",
            'img_admin' => "image|mimes:jpg,png,jpeg",
        ]);

            if($file_img_admin = $request->file('img_admin')){
                $imag_nam = md5(rand(1000,100000));
                $ext = $file_img_admin->getClientOriginalExtension();
                $upload_path = 'dataimg/adminimg/';
                $img_full_name_admin = $imag_nam.'.'.$ext;
                $file_img_admin->move($upload_path,$img_full_name_admin);

                $user->img = $img_full_name_admin;
                $user->save();
         }

         if($request->password !== null){

            $password = Hash::make($request->password);
            $user->password = $password;
            $user->save();

         }

        $user->update([
            "name" => $request->nom,
            "number_phone" => $request->phone,
            "email" => $request->email,

         ]);


        /*  return redirect()->back();  */

    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
