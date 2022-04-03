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

                 

                      
                      <div class="col-md-6">

                        <div class="form-group">
                          <label for="exampleFormControlInput1"> Attendance date</label>
                          <input type="date" class="form-control"  name="date" value="{{$editData[0]->date}}">
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

                                      @foreach($editData as $key=>$data)
                                       <tr id="div{{$data->id}}">
                                        <input type="hidden" name="employee_id[]" value="{{$data->employee_id}}">
                                         <td>{{$key+1}}</td>
                                         <td>{{$data['user']['name']}}</td>
                                         <td colspan="3">
                                            <div class="switch-toggle switch-3 switch-candy">
                                              <input type="radio" name="attend_status{{$key}}" value="Present" checked id="Present{{$key}}" checked="checked" {{($data->attend_status=='Present')? 'checked' :''}}>
                                              <label for="Present{{$key}}">present</label>

                                               <input type="radio" name="attend_status{{$key}}" value="Leave" id="Leave{{$key}}" {{($data->attend_status=='Leave')? 'checked' :''}}>
                                              <label for="Leave{{$key}}">Leave</label>

                                               <input type="radio" name="attend_status{{$key}}" value="Absent"  id="Absent{{$key}}" {{($data->attend_status=='Absent')? 'checked' :''}}>
                                              <label for="Absent{{$key}}">Absent</label>
                                              
                                            </div>
                                           
                                         </td>
                                       </tr>
                                        @endforeach

                                  </tbody>
                                  

                                </table>
                            
                          </div>
                      
                      
                      
                    </div>
                   

                    
                     
                   
                     <!-- <div class="form-group">
                      <label for="exampleFormControlTextarea1">Example textarea</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div> -->
                   
                    
                   
                    <input type="submit" value="update" class="btn btn-success">
                    
                   
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