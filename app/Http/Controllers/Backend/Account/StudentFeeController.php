<?php

namespace App\Http\Controllers\Backend\Account;

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
use App\Models\AccountStudentFee;


use DB;

use PDF;

class StudentFeeController extends Controller
{
     public function StudentFeeView(){
             $data['allData']=AccountStudentFee::all();


             return view('backend.account.student_fee.student_fee_view',$data);

     }
}
