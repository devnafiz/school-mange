<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountStudentFee;
use App\Models\AccountSalary;
use App\Models\AccountOtherCost;
use App\Models\User;
use DB;

use PDF;



class ProfiteController extends Controller
{
    public function MonthlyProfitView(){

         return view('backend.report.profit.profit_view');
    }


    public function MonthlyProfitDatewais(Request $request){

         $start_date = date('Y-m',strtotime($request->start_date));
          $end_date = date('Y-m',strtotime($request->end_date));
            $sdate = date('Y-m-d',strtotime($request->start_date));
             $edate = date('Y-m-d',strtotime($request->end_date));

            $student_fee = AccountStudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');

            $other_cost = AccountOtherCost::whereBetween('date',[$sdate,$edate])->sum('amount');

             $student_fee = AccountStudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');

       $html['thsource'] = '<th>SL</th>';
       $html['thsource'] .= '<th>Employee Name</th>';
       $html['thsource'] .= '<th>Basic Salary</th>';
       $html['thsource'] .= '<th>Salary This month</th>';
       $html['thsource'] .= '<th>Action</th>';

       foreach($data as $key =>$attend){

         $totalattend =EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$attend->employee_id)->get();
         $absentCount= count($totalattend->where('attend_status','absent'));
         //dd($absentCount);

         $color ='success';
         $html[$key]['tdsource'] = '<td>'.($key+1).'</td>';
         $html[$key]['tdsource'] .= '<td>'.$attend['user']['name'].'</td>';
         $html[$key]['tdsource'] .= '<td>'.$attend['user']['salary'].'</td>';

         $salary = (float)$attend['user']['salary'];
         $salaryPerDay = (float)$salary/30;
         $totalsalaryminus =(float)$salaryPerDay*$absentCount;
         $totalsalary=(float)$salary-(float)$totalsalaryminus;


         $html[$key]['tdsource'] .= '<td>'.$totalsalary.'</td>';

        $html[$key]['tdsource'] .= '<td>';

            
        $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("employee.monthly.salary.payslip",$attend->employee_id).'">Fee Slip</a>';

        $html[$key]['tdsource'] .= '</td>';
       }

       return response()->json(@$html);


    }
}
