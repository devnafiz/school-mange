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

             $employees_salary = AccountSalary::whereBetween('date',[$start_date,$end_date])->sum('amount');
        $totalCost=$other_cost +$employees_salary;
        $profit = $student_fee- $student_fee;
       $html['thsource'] = '<th>Student Fee</th>';
       $html['thsource'] .= '<th>Other cost</th>';
       $html['thsource'] .= '<th>Employee salary</th>';
       $html['thsource'] .= '<th>Total Cost</th>';
       $html['thsource'] .= '<th>Profit</th>';
       $html['thsource'] .= '<th>Action</th>';

        $color ='success';
        $html['tdsource'] = '<td>'. $student_fee.'</td>';
        $html['tdsource'] .= '<td>'. $other_cost.'</td>';
        $html['tdsource'] .= '<td>'. $employees_salary.'</td>';
        $html['tdsource'] .= '<td>'. $totalCost.'</td>';
        $html['tdsource'] .= '<td>'. $profit.'</td>';
         $html['tdsource'] .= '<td>';

            
        $html['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("report.profit.pdf").'?start_date='. $sdate.'&end_date='.$edate.'">pay Slip</a>';

        $html['tdsource'] .= '</td>';
       


       return response()->json(@$html);


    }

    public function MonthlyProfitPdf(Request $request){

         $start_date = date('Y-m',strtotime($request->start_date));
          $end_date = date('Y-m',strtotime($request->end_date));
          $sdate = date('Y-m-d',strtotime($request->start_date));
         $edate = date('Y-m-d',strtotime($request->end_date));

        $data['details']=EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$employee_id)->get();

       $pdf =PDF::loadView('backend.Employee.monthly_salary.monthly_salary_pdf',$data);
       $pdf->SetProtection(['copy','print'],'','pass');
       return $pdf->stream('document.pdf');
    }
}
