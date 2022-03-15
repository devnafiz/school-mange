<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MainUserController extends Controller
{
    
    public function Userprofile(){
        $id =Auth::user()->id;
        $user = User::find($id);

        return view('user.profile.view_profile',compact('user'));

    }


    public function UserprofileEdit(){
        $id =Auth::user()->id;
        $editData = User::find($id);

        return view('user.profile.edit_profile',compact('editData'));


    }
  //logout
    public function logout(){

        Auth::logout();

        return Redirect()->route('login');
    }

    public function UserPassword(){

        return view('user.password.edit_password');
    }


    public function UserPasswordUpdate(Request $request){

           $validateData =$request->validate([

              'oldpassword' =>'required',
              'password'  =>'required|confirmed'
           ]);

           $hashedPassword = Auth::user()->password;

           if(Hash::check($request->oldpassword,$hashedPassword)){

                   $user=User::find(Auth::id());

                   $user->password= Hash::make($request->password);
                   $user->save();
                   Auth::logout();

                   return redirect()->route('login');

           }else{
            return redirect()->back();
           }
    }
}
