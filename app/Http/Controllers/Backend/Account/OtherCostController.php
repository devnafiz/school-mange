<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountOtherCost;

class OtherCostController extends Controller
{
    public function OtherCostView(){
      
         $data['allData']= AccountOtherCost::orderBy('id','desc')->get();

         return view('backend.account.other_cost.other_cost_view',$data);

    }

    public function OtherCostAdd(){
        return view('backend.account.other_cost.other_cost_add');
    }

}
