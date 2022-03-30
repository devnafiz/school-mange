@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="row mb-3">
	<div class="col-md-12 mb-4">

	<div class="card">
		<div class="card-body">
			<div class="box">
			<a href="{{route('employee.registration.view')}}" class="btn btn-success">Employee list</a>
			
		</div>
            <form method="POST" action="{{route('update.employee.registration',$editData->id)}}">
              @csrf
                    


                       <div class="row">

                           <div class="col-lg-4">
                                 <div class="form-group">
                                   <label for="exampleFormControlInput1">Employee  Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="name" value="{{$editData->name}}">
                                  </div>
                           </div>
                           <div class="col-lg-4">
                                <div class="form-group">
                                   <label for="exampleFormControlInput1">Father Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="fname" value="{{$editData->fname}}">
                                 </div>
                             
                           </div>
                           <div class="col-lg-4">
                                 <div class="form-group">
                                   <label for="exampleFormControlInput1">Mother Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="mname" value="{{$editData->mname}}">
                                 </div>
                           </div>
                         
                       </div>

                        <div class="row">

                           <div class="col-lg-4">
                                 <div class="form-group">
                                   <label for="exampleFormControlInput1">Mobile No</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="mobile" value="{{$editData->mobile}}">
                                  </div>
                           </div>
                           <div class="col-lg-4">
                                <div class="form-group">
                                   <label for="exampleFormControlInput1">Address</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="address" value="{{$editData->address}}">
                                 </div>
                             
                           </div>
                           <div class="col-lg-4">
                                 <div class="form-group">
                                   <label for="exampleFormControlInput1">Gender</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="gender">
                                  <option value="">Select Gender</option>
                                
                                  <option value="Male" {{($editData->gender=="Male" )? "selected" :""}}>Male</option>
                                  <option value="Female"  {{($editData->gender=="Female" )? "selected" :""}}>Female</option>
                                  
                                 </select>
                                 </div>
                           </div>
                         
                       </div>

                       <div class="row">

                           <div class="col-lg-4">
                                 <div class="form-group">
                                   <label for="exampleFormControlInput1">Religion</label>
                                     <select class="form-control" id="exampleFormControlSelect1" name="religion">
                                  <option value="">Select Religion</option>
                                
                                  <option value="Muslim" {{($editData->religion=="Muslim" )? "selected" :""}}>Muslim</option>
                                  <option value="Hindu" {{($editData->religion=="Hindu" )? "selected" :""}}>Hindu</option>
                                  <option value="christian" {{($editData->religion=="christian" )? "selected" :""}}>christian</option>
                                 </select>
                                  </div>
                           </div>
                           <div class="col-lg-4">
                                <div class="form-group">
                                   <label for="exampleFormControlInput1">Date of Birth</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1"  name="dob" value="{{$editData->dob}}">
                                 </div>
                             
                           </div>
                           <div class="col-lg-4">
                                  <div class="form-group">
                                   <label for="exampleFormControlInput1">Designation</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="designation_id">
                                  <option value="">Select Year</option>
                                  @foreach($designation as $desig)
                                  <option value="{{$desig->id}}" {{($editData->designation_id==$desig->id )? "selected" :""}} >{{$desig->name}}</option>
                                  
                                  @endforeach
                                 </select>
                                  </div>
                           </div>
                         
                       </div>

                        <div class="row">
                            @if(!@$editData)
                              <div class="col-lg-6">
                                <div class="form-group">
                                   <label for="exampleFormControlInput1">Salary</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Employee salary" name="salary" value="{{$editData->salary}}">
                                 </div>
                             </div>
                             @endif
                               @if(!@$editData)
                             <div class="col-lg-6">
                                <div class="form-group">
                                   <label for="exampleFormControlInput1">Joining date</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1"  name="join_date" value="{{$editData->join_date}}">
                                 </div>
                             
                           </div>
                             @endif
                       </div>


                       <div class="row">

                           
                           <div class="col-lg-6">
                                <div class="form-group">
                                   <label for="exampleFormControlInput1">Profile Image</label>
                                    <input type="file" class="form-control"  name="image" id="image">
                                 </div>
                             
                           </div>


                          <div class="col-md-4">

                                <div class="form-group">
                                <div class="controls">
                              <img id="showImage" src="{{ ($editData->image)? url('upload/employee_images/'.$editData->image) : url('upload/no_image.jpg')}}" style="width: 100px; width: 100px; border: 1px solid #000000;"> 

                               </div>
                               </div>
                        
                          </div> <!-- End Col md 4 --> 
                           
                         
                       </div>
  
                    <input type="submit" value="update" class="btn btn-success">
                    
                   
                  </form>

			
		</div>
	</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){


    $('#image').change(function(e){
      //alert('hi');
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>

@endsection