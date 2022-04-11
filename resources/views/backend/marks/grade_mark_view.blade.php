@extends('admin.admin_master')

@section('admin')

 <div class="row">
 	<div class="col-md-12 col-lg-12">
 		<div class="card">

 			<div class="card-body">
 				<a href="{{route('marks.grade.add')}} " class="btn btn-success">Add  Grade Marks</a>
 				 <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Sl</th>
                        <th>Grade name  </th>
                        <th>Grade point </th>
                        <th>Start mark</th>
                        <th>End Marks</th>
                        <th>Point Range </th>
                        <th>Remarks </th>
                       
                     
                        <th>Action</th>
                      </tr>
                    </thead>
                    
                    <tbody>

                    	@foreach($allData as $k=>$mark)
                      <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$mark->grade_name}}</td>
                        <td>{{$mark->grade_point}}</td>
                        <td>{{$mark->start_marks}}</td>
                        <td>{{$mark->end_marks}}</td>
                        <td>{{$mark->start_point}}-{{$mark->end_point}}</td>
                        <td>{{$mark->remarks}}</td>
                      
                       
                       
                        <td><a href="{{route('marks.grade.edit',$mark->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>&nbsp<a href="" class="btn btn-danger" ><i class="fa fa-eye"></i></a></td>
                      </tr>
                      
                     @endforeach
                     
                    </tbody>
                  </table>
 			</div>
 		</div>
 	</div>
 </div>



@endsection