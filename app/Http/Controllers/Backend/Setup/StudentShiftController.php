<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    
    public function ViewShift(){
            $data['allData']=StudentShift::all();

            return view('backend.setup.shift.view_shift',$data);


    }
    public function StudentShiftAdd(){
          return view('backend.setup.shift.add_shift');

    }

    public function StudentShiftStore(Request $request){

        $validateData =$request->validate([

          'name'=>'required|unique:student_shifts,name'
        ]);

        $shift =new StudentShift();

        $shift->name = $request->name;

        $shift->save();

        return redirect()->route('student.shift.view');



    }

    public function StudentShiftEdit($id){
                 $editData =StudentShift::find($id);
         return view('backend.setup.shift.edit_shift',compact('editData'));

    }

    public function StudentShiftUpdate(Request $request,$id){


        $shift =StudentShift::find($id);

        $shift->name = $request->name;

        $shift->save();

        return redirect()->route('student.shift.view');

    }

    public function StudentShiftDelete($id){

         $shift =StudentShift::find($id);

        $shift->delete(); 

       

        return redirect()->route('student.shift.view');

    }
}
