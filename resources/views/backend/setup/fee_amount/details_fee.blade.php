@extends('admin.admin_master')

@section('admin')

 <div class="row">
  <div class="col-md-12 col-lg-12">
    <div class="card">

      <div class="card-body">
        <a href="{{route('fee.amount.add')}} " class="btn btn-success">Add student Fee Category Amount</a>
        <h3 class="text-center">view details fee amount</h3>

        <h4>Fee Category: {{$detailsData['0']['fee_category']['name']}}</h4>
         <table class="table align-items-center table-flush" >
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Class Name</th>
                     
                        <th>Amount</th>
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

                      @foreach($detailsData as $k=>$amount)
                      <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$amount['class_name']['name']}}</td>
                       
                       
                        <td>{{$amount->amount}}</td>
                      </tr>
                      
                     @endforeach
                     
                    </tbody>
                  </table>
      </div>
    </div>
  </div>
 </div>



@endsection