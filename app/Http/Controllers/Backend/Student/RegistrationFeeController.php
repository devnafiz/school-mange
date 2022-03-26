<?php

namespace App\Http\Controllers\Backend\Student;

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

class RegistrationFeeController extends Controller
{
    public function RegFeeView(){

         $data['years']=StudentYear::all();
           $data['classes']=StudentClass::all();

           return view('backend.student.registration_fee.registration_fee_view',$data);
    }


    public  function RegFeeClassData(Request $request){


        $year_id =$request->year_id;


        $class_id= $request->class_id;

        if($year_id != ''){

            $where[]=['year_id','like',$year_id.'%'];
        }

        if($class_id){

             $where[]=['class_id','like',$class_id.'%'];
        }

        $allStudent =AssignStudent::with(['discount'])->where($where)->get();

        $html['thsource'] = '<th>Sl</th>';
        $html['thsource']. = '<th>Id No</th>';
        $html['thsource']. = '<th>Student Name</th>';
        $html['thsource']. = '<th>Roll No</th>';
        $html['thsource']. = '<th>Reg Fee</th>';
        $html['thsource']. = '<th>Discount</th>';
        $html['thsource'].= '<th>Student Fee</th>';
        $html['thsource']. = '<th>Action</th>';


        foreach($allStudent as $k=>$v){

            $registrationfee=FeeCategoryAmount::where('fee_category_id','1')->where('class_id',$v->class_id)->first();

             $color ='success';

             $html[$k]['tdsource'] = '<td>'.($k+1).'</td>';
             $html[$k]['tdsource'] = '<td>'.$v['student']['id_no'].'</td>';
             $html[$k]['tdsource'] = '<td>'.$v['student']['name'].'</td>';
             $html[$k]['tdsource'] = '<td>'.$v->roll.'</td>';
             $html[$k]['tdsource'] = '<td>'. $registrationfee->amount.'</td>';
             $html[$k]['tdsource'] = '<td>'.$v['discount']['discount'].'</td>';
            


        }

           

        
    }
}
