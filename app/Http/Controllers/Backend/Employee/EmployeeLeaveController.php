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

}
