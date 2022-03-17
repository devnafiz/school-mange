@extends('admin.admin_master')

@section('admin')

<div class="row mb-3">
	<div class="col-md-12 mb-4">

	<div class="card">
		<div class="card-body">
			<div class="box">
			
			
		</div>
            <form method="POST" action="{{route('update.student.year',$editData->id)}}">
              @csrf
                    


                      <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Student Year Name</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1"
                           name="name" value="{{$editData->name}}">
                        </div>
                        
                      </div>
                      
                      
                      
                    </div>
                   

                    
                     
                   
                     <!-- <div class="form-group">
                      <label for="exampleFormControlTextarea1">Example textarea</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div> -->
                   
                    
                   
                    <input type="submit" value="Update" class="btn btn-success">
                    
                   
                  </form>

			
		</div>
	</div>
</div>

@endsection