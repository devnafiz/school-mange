<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use App\Models\AssignSubject;

use App\Models\FeeCategoryAmount;
use App\Models\FeeCategory;

use App\Models\SchoolSubject;

use App\Models\AssignStudent;

use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\DiscountStudent;
use App\Models\StudentMarks;
use App\Models\ExamType;
use App\Models\MarksGrade;


use DB;

use PDF;

class GradeController extends Controller
{
    public function MarksGradeView(){


       $data['allData']=MarksGrade::all();
       return view('backend.marks.grade_mark_view',$data);
    }


    public function MarksGradeAdd(){

        return view('backend.marks.grade_mark_add');
    }


    public function MarksGradeStore(Request $request){


              $grade = new  MarksGrade();
              $grade->grade_name =$request->grade_name;
              $grade->grade_point =$request->grade_point;
              $grade->start_marks =$request->start_marks;
              $grade->end_marks =$request->end_marks;
              $grade->start_point =$request->start_point;
              $grade->end_point =$request->end_point;
              $grade->remarks =$request->remarks;
              $grade->save();

              return redirect()->route('marks.entry.grade');
    }


    public function MarksGradeEdit($id){
           $data['editData']=MarksGrade::find($id);

              return view('backend.marks.grade_mark_edit',$data);

    }
}
