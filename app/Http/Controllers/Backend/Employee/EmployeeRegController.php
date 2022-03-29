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


class EmployeeRegController extends Controller
{
    public function EmployeeView(){

         $data['allData']=User::where('usertype','Employee')->get();
         return view('backend.Employee.employee_reg.employee_view',$data);
    }


    public function EmployeeAdd(){
          $data['designation']=Designation::all();
        return view('backend.Employee.employee_reg.employee_add',$data);
    }
}
