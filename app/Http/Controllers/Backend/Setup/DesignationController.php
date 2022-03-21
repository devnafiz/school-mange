<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Designation;

class DesignationController extends Controller
{
     public function ViewDesignation(){

         $data['allData']=Designation::all();

         return view('backend.setup.designation.view_desig',$data);
     }
     public function DesignationAdd(){

      return view('backend.setup.designation.add_desig');
     }
     public function DesignationStore(Request $request){

            $validateData =$request->validate([

               'name'=>'required'
            ]);

            $desig =new Designation();

            $desig->name=$request->name;
            $desig->save();

            return redirect()->route('designation.view');
     }

     public function DesignationEdit($id){
      $data['editData'] = Designation::find($id);
      return  view('backend.setup.designation.edit_desig',$data);

     }

     public function DesignationUpdate(Request $request,$id){

            $desig =Designation::find($id);
            $desig->name=$request->name;
            $desig->save();

            return redirect()->route('designation.view');


     }

     public function DesignationDelete($id){


           $desig =Designation::find($id);
          
            $desig->delete();

            return redirect()->route('designation.view');

     }
}
