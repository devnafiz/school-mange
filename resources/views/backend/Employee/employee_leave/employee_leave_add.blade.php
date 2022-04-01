@extends('admin.admin_master')

@section('admin')

<div class="row mb-3">
	<div class="col-md-12 mb-4">

	<div class="card">
		<div class="card-body">
			<div class="box">
			<a href="{{route('employee.salary.view')}}" class="btn btn-success">Employee Leave  List</a>

      <h2>Employee Leave</h2>
			
		</div>
            <form method="POST" action="{{route('store.employee.leave')}}">
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
                          <label for="exampleFormControlInput1"> Start date</label>
                          <input type="date" class="form-control" id="exampleFormControlInput1"
                            placeholder="Start Date " name="start_date ">
                        </div>
                        
                      </div>
                      
                      
                      
                    </div>


                      <div class="row">

                 

                          <div class="col-lg-6">
                              <div class="form-group">
                                  <label for="exampleFormControlInput1">Leave Purpose</label>
                                  <select class="form-control" id="exampleFormControlSelect1" name="employee_leave_id">
                                  <option value="">Select Name</option>
                                @foreach($leave_purposes as $leave)
                                  <option value="{{$leave->id}}">{{$leave->name}}</option>
                                  @endforeach
                                 </select>
                              </div>
                            
                          </div>
                          <div class="col-md-6">

                                <div class="form-group">
                                  <label for="exampleFormControlInput1"> End date</label>
                                  <input type="date" class="form-control" id="exampleFormControlInput1"
                                    placeholder="End date " name="end_date ">
                              </div>
                            
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

@endsection