@extends('admin.admin_master')

@section('admin')

<div class="row mb-3">
	<div class="col-md-12 mb-4">

	<div class="card">
		<div class="card-body">
			<div class="box">
			<a href="{{route('student.shift.view')}}" class="btn btn-success">Student Shift List</a>
			
		</div>
            <form method="POST" action="{{route('store.student.shift')}}">
              @csrf
                    


                      <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Gorup Name</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Student Shift Name" name="name">
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