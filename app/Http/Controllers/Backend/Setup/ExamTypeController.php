<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ExamType;

class ExamTypeController extends Controller
{
     public function ViewExamType(){
           $data['allData']=ExamType::all();

           return view('backend.setup.exam_type.view_exam',$data);

     }

     public function ExamTypeAdd(){
        return view('backend.setup.exam_type.add_exam');

     }

     public function ExamTypeStore(Request $request){
          $validateData =$request->validate([
               'name'=>'required'
          ]);

          $exam= new ExamType();

          $exam->name=$request->name;
          $exam->save();

          return redirect()->route('exam.type.view');

     }

     public function ExamTypeEdit($id){

          $data['editData']=  ExamType::find($id);
     return view('backend.setup.exam_type.edit_exam',$data);
             
     }

     public function ExamTypeUpdate(Request $request,$id){

             $exam=  ExamType::find($id);

          $exam->name=$request->name;
          $exam->save();

          return redirect()->route('exam.type.view');
     }

     public function ExamTypeDelete($id){

            $exam=  ExamType::find($id);

        
          $exam->delete();

          return redirect()->route('exam.type.view');
     }
}
