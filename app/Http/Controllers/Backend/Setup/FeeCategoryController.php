<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    

    public function ViewFeeCat(){

          $allData = FeeCategory::all();

          return view('backend.setup.feeCat.view_feeCategory',compact('allData'));
    }

    public function FeeCatAdd(){

     return view('backend.setup.feeCat.add_feeCategory');
    }
    public function FeeCatStore(Request $request){
          $validateData = $request->validate([
             'name'=>'required'

          ]);

          $data = new FeeCategory();


          $data->name = $request->name;
          $data->save();

          return redirect()->route('fee.category.view');



    }

    public function FeeCatEdit($id){
       $editData=FeeCategory::find($id);
       return view('backend.setup.feeCat.edit_feeCategory',compact('editData'));

    }

    public function FeeCategoryUpdate(Request $request,$id){

      $data=FeeCategory::find($id);


          $data->name = $request->name;
          $data->save();

          return redirect()->route('fee.category.view');
    }

    public function FeeCategoryDelete($id){

           $data=FeeCategory::find($id);


          
          $data->delete();

          return redirect()->route('fee.category.view');
    }
}
