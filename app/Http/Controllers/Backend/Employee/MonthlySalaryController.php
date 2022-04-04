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

class MonthlySalaryController extends Controller
{
     public function MonthlySalaryView(){


        return view('backend.Employee.monthly_salary.monthly_salary_view');
     }

     public function MonthlySalaryGet(Request $request){

        
     }
}
