@extends('admin.admin_master')

@section('admin')

 <div class="row">
  <div class="col-md-12 col-lg-12">
    <div class="card">

      <div class="card-body">
        <a href="{{route('fee.amount.add')}} " class="btn btn-success">Add student Fee Category Amount</a>
         <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Fee category</th>
                     
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

                      @foreach($allData as $k=>$amount)
                      <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$amount->fee_category_id}}</td>
                       
                       
                        <td><a href="{{route('fee.category.edit',$amount->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>&nbsp<a href="{{route('fee.category.delete',$amount->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      
                     @endforeach
                     
                    </tbody>
                  </table>
      </div>
    </div>
  </div>
 </div>



@endsection