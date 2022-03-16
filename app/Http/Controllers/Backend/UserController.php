<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function UserView(){

      $allData=User::all();

      return view('backend.user.view_user',compact('allData'));
  }


  public function UserAdd(){


     return view('backend.user.add_user');
  }

  public function UserStore(Request $request){


    $validateData =$request->validate([

      'email'=>'required|unique:users',
      'name' =>'required|max:255'
    ]);

    $data =new User();
    $data->usertype=$request->usertype;
    $data->email=$request->email;
    $data->name=$request->name;
    $data->password=bcrypt($request->usertype);
    $data ->save();

    return redirect()->route('view.user');



  }
}
