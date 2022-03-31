@extends('admin.admin_master')

@section('admin')

<div class="row mb-3">
	<div class="col-md-12 mb-4">

	<div class="card">
		<div class="card-body">
			<div class="box">
			<a href="{{route('employee.salary.view')}}" class="btn btn-success">Employee Salary  List</a>

      <h2>Employee salary Increment</h2>
			
		</div>
            <form method="POST" action="{{route('update.increment.store',$editData->id)}}">
              @csrf
                    


                      <div class="row">

                 

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Increment Salary Amount</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Salary increment" name="increment_salary">
                        </div>
                        
                      </div>
                      <div class="col-md-6">

                        <div class="form-group">
                          <label for="exampleFormControlInput1"> Effected date</label>
                          <input type="date" class="form-control" id="exampleFormControlInput1"
                            placeholder="Effected date " name=" effected_salary ">
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