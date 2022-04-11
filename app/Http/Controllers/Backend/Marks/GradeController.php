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
}
