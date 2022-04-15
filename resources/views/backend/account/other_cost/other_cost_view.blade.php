@extends('admin.admin_master')

@section('admin')


<br>

 <div class="row">
 	<div class="col-md-12 col-lg-12">
 		<div class="card">

 			<div class="card-body">
 				<a href="{{route('other.cost.add')}} " class="btn btn-success"> Add   other Cost</a>

      
       				 <table class="table align-items-center table-flush" id="dataTable">
                          <thead class="thead-light">
                            <tr>
                              <th width="5%">SL</th>
                             
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>image</th>
                         
                             
                           
                              <th width="25%">date</th>
                            </tr>
                          </thead>
                         
                          <tbody>

                          	@foreach($allData as $k=>$cost)
                            <tr>
                               <td>{{$k+1}}</td>
                               <td>{{$cost->date}}</td>

                               <td>{{$cost->amount}}</td>
                               <td>{{$cost->description}}</td>

                                <td><img src="{{ (!empty($cost->image)) ? url('uploads/other_cost/'.$cost->image) :url('uploads/no-image.jpg')}}"></td>
                              
                              
                                  <td>
                                    
                                    <a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                  </td>
                             
                             
                                
                            </tr>
                            
                           @endforeach
                           
                          </tbody>
                        </table>

                 
 			</div>
 		</div>
 	</div>
 </div>



@endsection