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
use App\Models\ExamType;

use DB;

use PDF;


class ExamFeeController extends Controller
{
    public function ExamFeeView(Request $request){

           $data['years']=StudentYear::all();
           $data['classes']=StudentClass::all();
           $data['examtypes']=ExamType::all();

           return view('backend.student.exam_fee.exam_fee_view',$data);
    }

     public function MonthlyFeeClassData(Request $request){
         $year_id = $request->year_id;
         $class_id = $request->class_id;
         if ($year_id !='') {
            $where[] = ['year_id','like',$year_id.'%'];
         }
         if ($class_id !='') {
            $where[] = ['class_id','like',$class_id.'%'];
         }
         $allStudent = AssignStudent::with(['discount'])->where($where)->get();
          //dd($allStudent);
         $html['thsource']  = '<th>SL</th>';
         $html['thsource'] .= '<th>ID No</th>';
         $html['thsource'] .= '<th>Student Name</th>';
         $html['thsource'] .= '<th>Roll No</th>';
         $html['thsource'] .= '<th>Monthly Fee</th>';
         $html['thsource'] .= '<th>Discount </th>';
         $html['thsource'] .= '<th>Student Fee </th>';
         $html['thsource'] .= '<th>Action</th>';


         foreach ($allStudent as $key => $v) {
            $registrationfee = FeeCategoryAmount::where('fee_category_id','3')->where('class_id',$v->class_id)->first();
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registrationfee->amount.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';
            
            $originalfee = $registrationfee->amount;
            $discount = $v['discount']['discount'];
            $discounttablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discounttablefee;

            $html[$key]['tdsource'] .='<td>'.$finalfee.'$'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("student.exam.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'&exam_type='.$request->exam_type.' ">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';

         }  
        return response()->json(@$html);

    }// end method 
}
