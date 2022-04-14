@extends('admin.admin_master')

@section('admin')


<br>

 <div class="row">
 	<div class="col-md-12 col-lg-12">
 		<div class="card">

 			<div class="card-body">
 				<a href="{{route('account.salary.add')}} " class="btn btn-success"> Add Employee salary</a>

      
       				 <table class="table align-items-center table-flush" id="dataTable">
                          <thead class="thead-light">
                            <tr>
                              <th width="5%">SL</th>
                             
                            <th>ID No</th>
                            <th>Name</th>
                            <th>Amount</th>
                            
                         
                             
                           
                              <th width="25%">date</th>
                            </tr>
                          </thead>
                         
                          <tbody>

                          	@foreach($allData as $k=>$student)
                            <tr>
                               <td>{{$k+1}}</td>
                               <td></td>

                               <td></td>
                               <td></td>
                              
                              
                                  
                             
                             
                                
                            </tr>
                            
                           @endforeach
                           
                          </tbody>
                        </table>

                 
 			</div>
 		</div>
 	</div>
 </div>



@endsection