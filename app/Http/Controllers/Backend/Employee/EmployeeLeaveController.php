<?php

namespace App\Http\Controllers\Backend\Employee;

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
use App\Models\EmployeeSallaryLog;
use App\Models\Designation;
use App\Models\EmployeeLeave;

use App\Models\LeavePurpose;


class EmployeeLeaveController extends Controller
{
      public function LeaveView(){

          $data['allData']=EmployeeLeave::orderBy('id','desc')->get();

          return view('backend.Employee.employee_leave.employee_leave_view',$data);

      }

      public function LeaveAdd(){

               $data['employees']=User::where('usertype','Employee')->get();
               $data['leave_purposes']=LeavePurpose::all();

               return view('backend.Employee.employee_leave.employee_leave_add',$data);

      }


       public function LeaveStore(Request $request){


        if($request->leave_purpose_id == '0'){

            $leave= new LeavePurpose();
            $leave->name=$request->name;
            $leave->save();
            $leave_purpose_id = $leave->id;


        }else{

            $leave_purpose_id = $request->leave_purpose_id;


        }

        $employee_leave = new EmployeeLeave();
         $employee_leave->employee_id = $request->employee_id;  
         $employee_leave->leave_purpose_id = $leave_purpose_id;
         $employee_leave->start_date = date('Y-m-d',strtotime($request->start_date));
                                //$date= $request->start_date;

                                //dd($date);
         $employee_leave->end_date = date('Y-m-d',strtotime($request->end_date));
         $employee_leave->save();

        return redirect()->route('employee.leave.view');

     }

}
