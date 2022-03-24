<?php

namespace App\Http\Controllers\Backend\Student;

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

use DB;

use PDF;


class StudentRollController extends Controller
{
   public function StudentRollView(){

           $data['years']=StudentYear::all();
           $data['classes']=StudentClass::all();

           return view('backend.student.roll_generate.roll_generate_view',$data);
   }


   public function GetStudents(){

    dd('ok done');
   }
}
