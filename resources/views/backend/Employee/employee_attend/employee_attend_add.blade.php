@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="row mb-3">
	<div class="col-md-12 mb-4">

	<div class="card">
		<div class="card-body">
			<div class="box">
			<a href="{{route('employee.attendance.view')}}" class="btn btn-success">Employee Attendance  List</a>

      <h2>Employee Attendance</h2>
			
		</div>
            <form method="POST" action="{{route('store.employee.attendance')}}">
              @csrf
                    


                      <div class="row">

                 

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Emplyee Name</label>
                           <select class="form-control" id="exampleFormControlSelect1" name="employee_id">
                                  <option value="">Select Name</option>
                                @foreach($employees as $employee)
                                  <option value="{{$employee->id}}">{{$employee->name}}</option>
                                  @endforeach
                                 </select>
                        </div>
                        
                      </div>
                      <div class="col-md-6">

                        <div class="form-group">
                          <label for="exampleFormControlInput1"> Attendance date</label>
                          <input type="date" class="form-control"  name="date">
                        </div>
                        
                      </div>
                      
                      
                      
                    </div>


                      <div class="row">

                 

                          
                          <div class="col-md-12">

                                <table class="table table-bordered table-striped" width="100%">
                                  <thead>
                                         <tr>
                                           <th rowspan="2" class="text-center" style="vertical-align:middle;">SL</th>
                                            <th rowspan="2" class="text-center" style="vertical-align:middle;">employee List</th>
                                            <th colspan="3"  class="text-center" style="vertical-align:middle;width: 30%;">Attendance Status</th>
                                         </tr>
                                         <tr>
                                           
                                           <th class="text-center btn  present_all" style="display:table-cell;">present</th>
                                            <th class="text-center btn  present_all" style="display:table-cell;">Leave</th>
                                            <th class="text-center btn  present_all" style="display:table-cell;">Absent</th>


                                         </tr>
                                  </thead>
                                  <tbody>
                                       <tr>
                                         <td>SL</td>
                                         <td>Employee list</td>
                                         <td colspan="3">
                                            <div class="switch-toggle switch-3 switch-candy">
                                              <input type="radio" name="attend_status" checked id="radio_1">
                                              <label for="radio_1">present</label>
                                               <input type="radio" name="attend_status"  id="radio_2">
                                              <label for="radio_2">Leave</label>
                                               <input type="radio" name="attend_status"  id="radio_3">
                                              <label for="radio_3">Absent</label>
                                              
                                            </div>
                                           
                                         </td>
                                       </tr>
                                  </tbody>
                                  

                                </table>
                            
                          </div>
                      
                      
                      
                    </div>
                   

                    
                     
                   
                     <!-- <div class="form-group">
                      <label for="exampleFormControlTextarea1">Example textarea</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div> -->
                   
                    
                   
                    <input type="submit" value="submit" class="btn btn-success">
                    
                   
                  </form>

			
		</div>
	</div>
</div>

<!-- <script >
  $(document).ready(function(){



    $(document).on('change','#leave_purpose_id',function(){

        //alert('hi');

        var leave_purpose_id = $(this).val();

        if(leave_purpose_id == '0'){


          $('#add_another').show();
        }else{
            $('#add_another').hide();
        }


    });
  });

</script> -->

<script type="text/javascript">
  $(document).ready(function(){
    $('#leave_purpose_id').on('change', function(){

      var leave_purpose_id = $(this).val();
      //alert(leave_purpose_id);
      if (leave_purpose_id == '0') {
        $('#add_another').show();
      }else{
        $('#add_another').hide();
      }
    });
  });
</script>

@endsection