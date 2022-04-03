@extends('admin.admin_master')

@section('admin')

 <div class="row">
 	<div class="col-md-12 col-lg-12">
 		<div class="card">

 			<div class="card-body">
 				<a href="{{route('employee.attendance.add')}} " class="btn btn-success">Add Emplyee Attendance</a>
 				 <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>ID No</th>
                        <th>Date</th>
                        <th>Attend Status</th>
                        
                     
                       
                      </tr>
                    </thead>
                  
                    <tbody>

                      @foreach($details as $k=>$attend)
                      <tr>
                        <td>{{$k+1}}</td>
                         <td>{{$attend['user']['name']}}</td>
                         <td>{{$attend['user']['id_no']}}</td>
                         <td>{{$attend->date}}</td>
                          <td>{{$attend->attend_status}}</td>
                          
                       
                       
                     
                      </tr>
                      
                     @endforeach
                     
                    </tbody>
                  </table>
 			</div>
 		</div>
 	</div>
 </div>



@endsection