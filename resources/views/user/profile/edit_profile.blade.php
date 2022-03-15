@extends('user.user_master')

@section('user')

 <div class="row mb-3">
 	<div class="col-lg-12">
 		<div class="card">
 			<div class="card-body">
                 <div class="row">
 				<div class="col-lg-4">
 					<img src="{{(!empty($editData->profile_photo_path))? url('upload/user_images/'.$editData->profile_photo_path) : url('upload/user_images/stan1.jpg') }}" width="200">

 				</div>

 				<div class="col-lg-8">
                   <form>
                       
                        <div class="mb-3">
                        <label>Email</label>
                        <input type="text" name="email" value="{{$editData->email}}" class="form-control">
                        
                    </div>
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" value="{{$editData->name}}" class="form-control">
                        
                    </div>
                    <div class="mb-3">
                        <label>Profile image</label>
                        <input type="file"   class="form-control">
                        
                    </div>
                    <button type="submit">Submit</button>
                   </form>
                   
 					
 					
 				</div>
 			</div>
 				
 			</div>
 			
 		</div>
 		
 	</div>

 </div>

@endsection
