@extends('admin.admin_master')

@section('admin')

 <div class="row">
 	<div class="col-md-12 col-lg-12">
 		<div class="card">

 			<div class="card-body">
        <h3 class="text-center">Employee Salary details</h3>
        <h4 class="text-center"><strong>Employee Name</strong>:{{$details->name}}</h4>
 				
 				 <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Sl</th>
                        <th>Previous salary</th>
                        <th>Increment salary </th>
                        <th>Present salary</th>
                        <th>Effected date</th>
                       
                       
                     
                       
                      </tr>
                    </thead>
                    
                    <tbody>

                    	@foreach($salary_log as $k=>$salary)
                      <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$salary->previous_salary}}</td>
                        <td>{{$salary->increment_salary}}</td>
                        <td>{{$salary->present_salary}}</td>
                        <td>{{date('d-m-Y',strtotime($salary->effected_salary))}}</td>
                       
                      </tr>
                      
                     @endforeach
                     
                    </tbody>
                  </table>
 			</div>
 		</div>
 	</div>
 </div>



@endsection