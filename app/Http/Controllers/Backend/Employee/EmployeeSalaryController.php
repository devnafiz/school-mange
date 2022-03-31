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

class EmployeeSalaryController extends Controller
{
     

     public function SalaryView(){

            $data['allData']=User::where('usertype','Employee')->get();

            return view('backend.Employee.employee_salary.employee_salary_view',$data);

     }

     public function SalaryIncrement($id){

             $data['editData']=User::find($id);

             return view('backend.Employee.employee_salary.employee_salary_incriment',$data);

     }

     public function SalaryStore(Request $request,$id){

        
     }
}
