<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignSubject;

use App\Models\FeeCategoryAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use App\Models\SchoolSubject;


class AssignSubjectController extends Controller
{
   
   public function ViewAssignSubject(){
          //$data['allData'] = AssignSubject::all();

           $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();

        return view('backend.setup.assign_subject.view_assign_subject',$data);
   }


   public function AddAssignSubject(){

        $data['subjects']=SchoolSubject::all();
        $data['classes'] =StudentClass::all();

        return view('backend.setup.assign_subject.add_assign_subject',$data);
   }


   public function StoreAssignSubject(Request $request){

     $countSubject= count($request->subject_id);

      if ($countSubject !=NUll) {
         
           for ($i=0; $i < $countSubject; $i++) { 
               $subject = new AssignSubject();

               $subject->class_id =$request->class_id;
               $subject->subject_id =$request->subject_id[$i];
               $subject->full_mark =$request->full_mark[$i];
               $subject->pass_mark =$request->pass_mark[$i];
               $subject->subjective_mark =$request->subjective_mark[$i];

               $subject->save();




           } //forloop

      } //end if
      return redirect()->route('assign.subject.view');

   }

   public function EditAssignSubject($class_id){
          $data['editData']=AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
          $data['subjects']=SchoolSubject::all();
          $data['classes'] =StudentClass::all();

          return view('backend.setup.assign_subject.edit_assign_subject',$data);

   }
}
