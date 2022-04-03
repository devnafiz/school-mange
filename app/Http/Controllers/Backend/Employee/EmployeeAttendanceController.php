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
use App\Models\EmployeeAttendance;


class EmployeeAttendanceController extends Controller
{
     public function AttendanceView(){

            $data['allData']=EmployeeAttendance::select('date')->groupBy('date')->orderBy('id','desc')->get();
             //$data['allData']=EmployeeAttendance::orderBy('id','desc')->get();

            return view('backend.Employee.employee_attend.employee_attend_view',$data);

     }


     public function AttendanceAdd(){
            $data['employees']=User::where('usertype','Employee')->get();

            return view('backend.Employee.employee_attend.employee_attend_add',$data);


     }

     public function AttendanceStore(Request $request){
          $countEmployee=count($request->employee_id);

          for ($i=0; $i <  $countEmployee ; $i++) {

              $attend_status ='attend_status'.$i;

              $attend = new EmployeeAttendance();

              $attend->employee_id =$request->employee_id[$i];
              $attend->date =date('Y-m-d',strtotime($request->date));
              $attend->attend_status =$request->$attend_status;
              $attend->save();


              
          }
          return redirect()->route('employee.attendance.view');
        
     }
}
