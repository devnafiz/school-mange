@extends('admin.admin_master')

@section('admin')

<div class="row mb-3">
	<div class="col-md-12 mb-4">

	<div class="card">
		<div class="card-body">
			<div class="box">
			<a href="{{route('view.user')}}" class="btn btn-success">Users list</a>
      <h3 class="text-center">User Update</h3>
			
		</div>
            <form method="POST" action="{{route('users.update',$editData->id)}}">
              @csrf
                    <div class="row">
                      <div class="col-lg-6">

                          <div class="form-group">
                        <label for="exampleFormControlSelect1">user Roll</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="usertype">
                          <option value="">Select roll</option>
                          <option value="Admin" {{($editData->usertype=="Admin"? 'selected': '')}}>Admin</option>
                          <option value="User"  {{($editData->usertype=="User"? 'selected': '')}}>User</option>
                         
                         </select>
                         </div>
                        
                      </div>
                       <div class="col-lg-6">
                           <div class="form-group">
                          <label for="exampleFormControlInput1">User Name</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="User name" name="name" value="{{$editData->name}}">
                        </div>
                        
                      </div>
                      
                      
                    </div>


                      <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="exampleFormControlInput1">User Email</label>
                          <input type="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="User Email" name="email" value="{{$editData->email}}">
                        </div>
                        
                      </div>
                       <div class="col-lg-6">
                        
                        
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