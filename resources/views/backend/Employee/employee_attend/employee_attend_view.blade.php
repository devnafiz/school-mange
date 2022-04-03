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
                        
                        <th>Date</th>
                       
                        
                     
                        <th>Action</th>
                      </tr>
                    </thead>
                  
                    <tbody>

                    	@foreach($allData as $k=>$attend)
                      <tr>
                        <td>{{$k+1}}</td>
                       
                         <td>{{$attend->date}}</td>
                        
                          
                       
                       
                        <td><a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>&nbsp<a href="" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      
                     @endforeach
                     
                    </tbody>
                  </table>
 			</div>
 		</div>
 	</div>
 </div>



@endsection