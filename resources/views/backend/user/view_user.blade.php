@extends('admin.admin_master')

@section('admin')

<div class="row mb-3">
	<div class="col-md-12 mb-4">

	<div class="card">
		<div class="card-body">
			<div class="box">
			<a href="{{route('users.add')}}" class="btn btn-success">Add User</a>
			
		</div>
			 <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Start date</th>
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

                    	@foreach($allData as $k=>$data)
                      <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->usertype}}</td>
                        <td>2011/04/25</td>
                        <td><a href="{{route('users.edit',$data->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>&nbsp<a href="{{route('users.delete',$data->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      
                     @endforeach
                     
                    </tbody>
                  </table>
		</div>
	</div>
</div>

@endsection