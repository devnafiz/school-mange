<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Admin;
//use admin;
class ProfileController extends Controller
{
    

    public function ViewProfile(){
              //$id = Ad::id();
            //dd($id );
        //dd(Auth::guard('admin')->id());
            //dd(Auth::guard());
     
         if( Auth::guard('admin')){
             $id=Auth::guard('admin')->id();
            $user=Admin::find($id);
         }else{
            $id = Auth::user()->id;
             $user=User::find($id);

         }
       
        return view('backend.user.view_profile',compact('user'));

    }
}
