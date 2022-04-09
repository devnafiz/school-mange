<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;
use App\Models\User;

use App\Models\AssignSubject;

use App\Models\FeeCategoryAmount;
use App\Models\FeeCategory;

//use App\Models\SchoolSubject;

use App\Models\AssignStudent;

use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\DiscountStudent;
use App\Models\StudentMarks;
use App\Models\ExamType;


use DB;

use PDF;

class DefaultController extends Controller
{
    
     public function GetSubject(Request $request){

        $class_id = $request->class_id;
        $allData = AssignSubject::with(['school_subject'])->where('class_id',$class_id)->get();
          return response()->json($allData);


    }
}
