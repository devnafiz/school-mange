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

use App\Models\AccountSalary;
use App\Models\EmployeeAttendance;

class AccountSalaryController extends Controller
{
    public function AccountSalaryView(){

           $data['allData']=AccountSalary::all();
           return view('backend.account.account_salary.account_salary_view',$data);
    }


    public function AccountSalaryAdd(){

        return view('backend.account.account_salary.employee_salary_add');
    }

    public function AccountSalaryGetEmployee(Request $request){

         $date = date('Y-m',strtotime($request->date));

       if($date!==''){

         $where[]=['date','like',$date.'%'];


       }

       $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
       //dd($data);

       $html['thsource'] = '<th>SL</th>';
       $html['thsource'] .= '<th>Id No</th>';
       $html['thsource'] .= '<th>Employee Name</th>';
       $html['thsource'] .= '<th>Basic Salary</th>';
       $html['thsource'] .= '<th>Salary this month</th>';
       $html['thsource'] .= '<th>date</th>';

       foreach($data as $key => $attend){

                   $account_salary= AccountSalary::where('employee_id',$attend->employee_id)->where('date',$date)->first();
                   //dd($account_salary);

                   if($account_salary !=null){
                     $checked = 'checked';

                   }else{
                       $checked ='';

                   }

         $totalattend =EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$attend->employee_id)->get();
         //dd($totalattend);
         $absentCount= count($totalattend->where('attend_status','absent'));
         //dd($absentCount);

         
         $html[$key]['tdsource'] = '<td>'.($key+1).'</td>';
         $html[$key]['tdsource'] .= '<td>'.$attend['user']['id_no'].'<input type="hidden" name="date" value="'.$date.'" >'.'</td>';
        $html[$key]['tdsource'] .= '<td>'.$attend['user']['name'].'</td>';
         
         $html[$key]['tdsource'] .= '<td>'.$attend['user']['salary'].'</td>';

         $salary = (float)$attend['user']['salary'];
         $salaryPerDay = (float)$salary/30;
         $totalsalaryminus =(float)$salaryPerDay*(float)$absentCount;
         $totalsalary=(float)$salary-(float)$totalsalaryminus;


         $html[$key]['tdsource'] .= '<td>'.$totalsalary.'<input type="hidden" name="amount[]" value="'.$totalsalary.'">'.'</td>';

        $html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="employee_id[]" value="'.$attend->employee_id.'">'.'<input type="checkbox" name="checkmanage[]" id="'.$key.'" value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</td>'; 


      }
    return response()->json(@$html);
    } // end Method



    public function AccountSalaryStore(Request $request){


    }
}
