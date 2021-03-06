@extends('admin.admin_master')

@section('admin')

 <div class="row">
 	<div class="col-md-12 col-lg-12">
 		<div class="card">

 			<div class="card-body">
 				<a href="{{route('employee.leave.add')}} " class="btn btn-success">Add Emplyee Leave</a>
 				 <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>ID No</th>
                        <th>Purpose</th>
                        <th>start date</th>
                        <th>End date</th>
                     
                        <th>Action</th>
                      </tr>
                    </thead>
                  
                    <tbody>

                    	@foreach($allData as $k=>$leave)
                      <tr>
                        <td>{{$k+1}}</td>
                         <td>{{$leave['user']['name']}}</td>
                         <td>{{$leave['user']['id_no']}}</td>
                         <td>{{$leave['purpose']['name']}}</td>
                          <td>{{$leave->start_date}}</td>
                          <td>{{$leave->end_date}}</td>
                       
                       
                        <td><a href="{{route('designation.edit',$leave->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>&nbsp<a href="{{route('designation.delete',$leave->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      
                     @endforeach
                     
                    </tbody>
                  </table>
 			</div>
 		</div>
 	</div>
 </div>



@endsection