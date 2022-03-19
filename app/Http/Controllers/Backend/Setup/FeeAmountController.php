<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FeeCategoryAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;

class FeeAmountController extends Controller
{
   public function ViewFeeAmount(){

        //$data['allData']=FeeCategoryAmount::all();
      $data['allData'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();

        return view('backend.setup.fee_amount.view_amount',$data);

   }

   public function AddFeeAmount(){


    $data['fee_categories'] =FeeCategory::all();
    $data['classes'] =StudentClass::all();


      return view('backend.setup.fee_amount.add_fee_amount',$data);
   }

   public function StoreFeeAmount(Request $request){

      $countClass= count($request->class_id);

      if ($countClass !=NUll) {
         
           for ($i=0; $i < $countClass; $i++) { 
               $fee = new FeeCategoryAmount();

               $fee->fee_category_id =$request->fee_category_id;
               $fee->class_id =$request->class_id[$i];
               $fee->amount =$request->amount[$i];

               $fee->save();




           } //forloop

      } //end if
      return redirect()->route('fee.amount.view');
   }//method end



   public function EditFeeAmount($fee_category_id){

    $data['editData']=FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
    //dd($data['editData']);

    $data['fee_categories'] =FeeCategory::all();
    $data['classes'] =StudentClass::all();

    return view('backend.setup.fee_amount.edit_fee_amount',$data);
   }
}
