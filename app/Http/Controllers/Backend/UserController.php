<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Session;

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

    $notification =array(

           'message'=>'User Insert Successfully',

           'alert-type'=>'success'

    );

    return redirect()->route('view.user')->with($notification);



  }


  public function UserEdit($id){

    $editData=User::find($id);

     return view('backend.user.edit_user',compact('editData'));

  }

  public function UserUpdate(Request $request,$id){
 //dd($id);

    $validateData =$request->validate([
       'email'=>'required',
       'name'=>'required|max:255'
    ]);


    $user=User::find($id);

    $user->usertype =$request->usertype;
    $user->email =$request->email;
    $user->name =$request->name;

    $user->save();

    return redirect()->route('view.user');


  }

  public function UserDelete($id){

    $user=User::find($id);

    $user->delete();

    return redirect()->back();
  }
}
