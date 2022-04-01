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

        $user =User::find($id);

        $previous_salary =$user->salary;

        $present_salary = (float)$previous_salary+(float)$request->increment_salary;
        $user->salary =$present_salary;
        $user->save();

          $salaryData = new EmployeeSallaryLog();
          $salaryData->employee_id =$id;

          $salaryData->previous_salary =$previous_salary;
          $salaryData->present_salary =$present_salary;
          $salaryData->increment_salary =$request->increment_salary;
          $salaryData->effected_salary =date('Y-m-d',strtotime($request->effected_salary));

          $salaryData->save();

          return redirect()->route('employee.salary.view');

     }


     public function SalaryDetails($id){

        $data['details']=User::find($id);

        $data['salary_log']=EmployeeSallaryLog::where('employee_id',$data['details']->id)->get();

        //dd($data['salary_log']);
        return view('backend.Employee.employee_salary.employee_salary_details',$data);

     }

    
}
