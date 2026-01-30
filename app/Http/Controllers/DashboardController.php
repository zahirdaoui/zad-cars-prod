<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function index(Request $request){

        if($request->user()->hasRole('user')){
            return view('userdash');
        }elseif($request->user()->hasRole('blogwriter')){
            return view('blogdash');
        }elseif($request->user()->hasRole('admin')){
            return view('admindash');
        }elseif($request->user()->id == null){
            return view('/login');
        }
    }
}
