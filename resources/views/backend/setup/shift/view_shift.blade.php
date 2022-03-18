@extends('admin.admin_master')

@section('admin')

 <div class="row">
 	<div class="col-md-12 col-lg-12">
 		<div class="card">

 			<div class="card-body">
 				<a href="{{route('student.shift.add')}} " class="btn btn-success">Add shift Group</a>
 				 <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                     
                        <th>Action</th>
                      </tr>
                    </thead>
                    <!-- <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                      </tr>
                    </tfoot> -->
                    <tbody>

                    	@foreach($allData as $k=>$shift)
                      <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$shift->name}}</td>
                       
                       
                        <td><a href="{{route('student.shift.edit',$shift->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>&nbsp<a href="{{route('student.shift.delete',$shift->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      
                     @endforeach
                     
                    </tbody>
                  </table>
 			</div>
 		</div>
 	</div>
 </div>



@endsection