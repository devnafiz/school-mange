@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="row mb-3">
	<div class="col-md-12 mb-4">

	<div class="card">
		<div class="card-body">
			<div class="box">
			<a href="{{route('view.user')}}" class="btn btn-success">Employee list</a>
			
		</div>
            <form method="POST" action="{{route('store.employee.registration')}}">
              @csrf
                    


                       <div class="row">

                           <div class="col-lg-4">
                                 <div class="form-group">
                                   <label for="exampleFormControlInput1">Employee  Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="User name" name="name">
                                  </div>
                           </div>
                           <div class="col-lg-4">
                                <div class="form-group">
                                   <label for="exampleFormControlInput1">Father Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Father Name" name="fname">
                                 </div>
                             
                           </div>
                           <div class="col-lg-4">
                                 <div class="form-group">
                                   <label for="exampleFormControlInput1">Mother Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Student Mother Name" name="mname">
                                 </div>
                           </div>
                         
                       </div>

                        <div class="row">

                           <div class="col-lg-4">
                                 <div class="form-group">
                                   <label for="exampleFormControlInput1">Mobile No</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Student Mobile" name="mobile">
                                  </div>
                           </div>
                           <div class="col-lg-4">
                                <div class="form-group">
                                   <label for="exampleFormControlInput1">Address</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Studen Address" name="address">
                                 </div>
                             
                           </div>
                           <div class="col-lg-4">
                                 <div class="form-group">
                                   <label for="exampleFormControlInput1">Gender</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="gender">
                                  <option value="">Select Gender</option>
                                
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                  
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
                                
                                  <option value="Muslim">Muslim</option>
                                  <option value="Hindu">Hindu</option>
                                  <option value="christian">christian</option>
                                 </select>
                                  </div>
                           </div>
                           <div class="col-lg-4">
                                <div class="form-group">
                                   <label for="exampleFormControlInput1">Date of Birth</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="User name" name="dob">
                                 </div>
                             
                           </div>
                           <div class="col-lg-4">
                                  <div class="form-group">
                                   <label for="exampleFormControlInput1">Designation</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="designation_id">
                                  <option value="">Select Year</option>
                                  @foreach($designation as $desig)
                                  <option value="{{$desig->id}}">{{$desig->name}}</option>
                                  
                                  @endforeach
                                 </select>
                                  </div>
                           </div>
                         
                       </div>

                        <div class="row">
                              <div class="col-lg-6">
                                <div class="form-group">
                                   <label for="exampleFormControlInput1">Salary</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Employee salary" name="salary">
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                <div class="form-group">
                                   <label for="exampleFormControlInput1">Joining date</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1" placeholder=" Join date" name="join_date">
                                 </div>
                             
                           </div>
                         
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
                              <img id="showImage" src="{{ url('upload/no_image.jpg') }}" style="width: 100px; width: 100px; border: 1px solid #000000;"> 

                               </div>
                               </div>
                        
                          </div> <!-- End Col md 4 --> 
                           
                         
                       </div>
  
                    <input type="submit" value="submit" class="btn btn-success">
                    
                   
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