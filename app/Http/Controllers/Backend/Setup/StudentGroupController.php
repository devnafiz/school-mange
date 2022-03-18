<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    
     public function ViewGroup(){
         $data['allData']=StudentGroup::all();

         return view('backend.setup.group.view_group',$data);

     }

     public function StudentGroupAdd(){
     return view('backend.setup.group.add_group');

     }

     public function StudentGroupStore(Request $request){

          $validateData =$request->validate([
            'name'=>'required|unique:student_groups,name'
          ]);

          $group = new StudentGroup();
          $group->name =$request->name;
          $group->save();

          return redirect()->route('student.group.view');
     }

     public function StudentGroupEdit($id){
         $editData =  StudentGroup::find($id);

          return view('backend.setup.group.edit_group',compact('editData'));
     }

     public function StudentGroupUpdate(Request $request,$id){

         $group =  StudentGroup::find($id);
          $group->name =$request->name;
          $group->save();

          return redirect()->route('student.group.view');
     }

     public function StudentGroupDelete($id){

             $group =  StudentGroup::find($id);

             $group->delete();

             return redirect()->route('student.group.view');
     }

}
