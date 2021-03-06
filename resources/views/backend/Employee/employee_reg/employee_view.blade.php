@extends('admin.admin_master')

@section('admin')

 <div class="row">
 	<div class="col-md-12 col-lg-12">
 		<div class="card">

 			<div class="card-body">
 				<a href="{{route('employee.registration.add')}} " class="btn btn-success">Add  employee</a>
 				 <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>ID No </th>
                        <th>Mobile</th>
                        <th>Gender</th>
                        <th> join Date </th>
                        <th>salary </th>
                        <th>code</th>
                     
                        <th>Action</th>
                      </tr>
                    </thead>
                    
                    <tbody>

                    	@foreach($allData as $k=>$employee)
                      <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->id_no}}</td>
                        <td>{{$employee->mobile}}</td>
                        <td>{{$employee->gender}}</td>
                        <td>{{$employee->join_date}}</td>
                        <td>{{$employee->salary}}</td>
                        <td>{{$employee->code}}</td>
                       
                       
                        <td><a href="{{route('employee.registration.edit',$employee->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>&nbsp<a href="{{route('employee.registration.details',$employee->id)}}" class="btn btn-danger" ><i class="fa fa-eye"></i>Details</a></td>
                      </tr>
                      
                     @endforeach
                     
                    </tbody>
                  </table>
 			</div>
 		</div>
 	</div>
 </div>



@endsection