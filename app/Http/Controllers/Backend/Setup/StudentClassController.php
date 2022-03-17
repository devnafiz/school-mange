<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
     public function ViewStudent(){

        $data['allData'] = StudentClass::all();

        return view('backend.setup.student_class.view_class',$data);
     }


     public function StudentClassAdd(){

        return view('backend.setup.student_class.add_class');
     }

     public function StudentClassStore(Request $request){

            $validateData =$request->validate([

              'name'=>'required|unique:student_classes'
            ]);


            $student_class = new StudentClass();

            $student_class->name =$request->name;
            $student_class->save();

            return redirect()->route('student.class.view');

     }


     public function StudentClassEdit($id){
          $class=StudentClass::find($id);

          return view('backend.setup.student_class.edit_class',compact('class'));

     }

     public function StudentClassUpdate(Request $request,$id){
            $student_class =  StudentClass::find($id);

            $student_class->name =$request->name;
            $student_class->save();

            return redirect()->route('student.class.view');

     }

     public function StudentClassDelete($id){


          $class=StudentClass::find($id);

          $class->delete();

          return redirect()->back();
     }
}
