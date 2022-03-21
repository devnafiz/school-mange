@extends('admin.admin_master')

@section('admin')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
           <form method="GET" action="{{route('student.year.class.wise')}}">

            <div class="row">
               <div class="col-md-4">

                    <select name="year_id" required="" class="form-control">
                  <option value="" selected="" disabled="">Select Year</option>
                   @foreach($years as $year)
                 <option value="{{ $year->id }}" {{ (@$year_id == $year->id)? "selected":"" }} >{{ $year->name }}</option>
                  @endforeach
                   
                </select>
                 
               </div>

               <div class="col-md-4">

                     <select name="class_id"  required="" class="form-control">
                    <option value="" selected="" disabled="">Select Class</option>
                     @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ (@$class_id == $class->id)? "selected":"" }}>{{ $class->name }}</option>
                    @endforeach
                     
                  </select>
                 
               </div>

               <div class="col-md-4">
                  <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search" value="Search">
               </div>
             

            </div>

           </form>
        
      </div>
      
    </div>
    
  </div>
  
</div>
<br>

 <div class="row">
 	<div class="col-md-12 col-lg-12">
 		<div class="card">

 			<div class="card-body">
 				<a href="{{route('student.registration.add')}} " class="btn btn-success">Assign Student</a>

       @if(!isset($search))
       				 <table class="table align-items-center table-flush" id="dataTable">
                          <thead class="thead-light">
                            <tr>
                              <th width="5%">SL</th>
                              <th>Name</th>
                            <th>ID No</th>
                            <th>Roll</th>
                            <th>Year</th>
                            <th>Class</th>
                            <th>Image</th>
                          @php
                            //if(Auth::user()->role == "Admin")
                          @endphp
                            <th>Code</th>
                             
                           
                              <th width="25%">Action</th>
                            </tr>
                          </thead>
                         
                          <tbody>

                          	@foreach($allData as $k=>$student)
                            <tr>
                               <td>{{$k+1}}</td>
                               <td>{{$student['student']['name']}}</td>

                               <td>{{$student['student']['id_no']}}</td>
                               <td>{{$student->roll}}</td>
                               <td>{{$student['student_year']['name']}}</td>
                               <td>{{$student['student_class']['name']}}</td>
                                <td><img src="http://127.0.0.1:8000/userbackend/img/logo/logo2.png" width="40" height="40"></td>
                                <td>{{$student['student']['code']}}</td>
                                  
                             
                             
                                <td><a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>&nbsp<a href="" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            
                           @endforeach
                           
                          </tbody>
                        </table>

                  @else

                           <table class="table align-items-center table-flush" id="dataTable">
                            <thead class="thead-light">
                              <tr>
                                <th width="5%">SL</th>
                                <th>Name</th>
                              <th>ID No</th>
                              <th>Roll</th>
                              <th>Year</th>
                              <th>Class</th>
                              <th>Image</th>
                            @php
                              //if(Auth::user()->role == "Admin")
                            @endphp
                              <th>Code</th>
                               
                             
                                <th width="25%">Action</th>
                              </tr>
                            </thead>
                           
                            <tbody>

                              @foreach($allData as $k=>$student)
                              <tr>
                                 <td>{{$k+1}}</td>
                                 <td>{{$student['student']['name']}}</td>

                                 <td>{{$student['student']['id_no']}}</td>
                                 <td>{{$student->roll}}</td>
                                 <td>{{$student['student_year']['name']}}</td>
                                 <td>{{$student['student_class']['name']}}</td>
                                  <td><img src="http://127.0.0.1:8000/userbackend/img/logo/logo2.png" width="40" height="40"></td>
                                  <td>{{$student['student']['code']}}</td>
                                    
                               
                               
                                  <td><a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>&nbsp<a href="" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a></td>
                              </tr>
                              
                             @endforeach
                             
                            </tbody>
                          </table>
                  @endif
 			</div>
 		</div>
 	</div>
 </div>



@endsection