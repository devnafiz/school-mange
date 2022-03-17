<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentYear;

class StudentYearController extends Controller
{
    

    public function ViewYear(){

        $allData =StudentYear::all();

        return view('backend.setup.student_year.view_year',compact('allData'));

    }

    public function StudentYearAdd(){
        return view('backend.setup.student_year.add_year');

    }

    public function StudentYearStore(Request $request){
        $validateData = $request->validate([

          'name'=>'required|unique:student_years,name'
        ]);
        $year =new StudentYear();

        $year->name =$request->name;

        $year->save();

        return redirect()->route('student.year.view');


    }

    public function StudentYearEdit($id){

          $editData =StudentYear::find($id);
     return view('backend.setup.student_year.edit_year',compact('editData'));

    }

    public function StudentYearUpdate(Request $request,$id){
            $year = StudentYear::find($id);

        $year->name =$request->name;

        $year->save();

        return redirect()->route('student.year.view');

    }

    public function StudentYearDelete($id){

             $year = StudentYear::find($id);

             $year->delete();
               return redirect()->route('student.year.view');
    }

}
