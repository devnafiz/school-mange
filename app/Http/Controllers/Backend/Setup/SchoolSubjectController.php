<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SchoolSubject;

class SchoolSubjectController extends Controller
{
     public function ViewSubject(){

               $data['allData']=SchoolSubject::all();

           return view('backend.setup.school_sub.view_subject',$data);

     }

     public function SubjectAdd(){
            return view('backend.setup.school_sub.add_subject');

     }
    public function SubjectStore(Request $request){

           $validateData =$request->validate([
               'name'=>'required'
          ]);

          $subject= new SchoolSubject();

          $subject->name=$request->name;
          $subject->save();

          return redirect()->route('school.subject.view');
    }

  public function SubjectEdit($id){
         $data['editData']=  SchoolSubject::find($id);
     return view('backend.setup.school_sub.edit_subject',$data);

  }

   public function SubjectUpdate(Request $request,$id){
           $subject=  SchoolSubject::find($id);

          $subject->name=$request->name;
          $subject->save();

          return redirect()->route('school.subject.view');

   }

   public function SubjectDelete($id){

       $subject=  SchoolSubject::find($id);

        
          $subject->delete();

          return redirect()->route('school.subject.view');
   }

}
