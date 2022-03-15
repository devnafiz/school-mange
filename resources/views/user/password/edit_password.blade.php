@extends('user.user_master')

@section('user')

 <div class="row mb-3">
 	<div class="col-lg-12">
 		<div class="card">
 			<div class="card-body">
                 <div class="row">
 				<div class="col-lg-4">
 				<h5>Change Password</h5>
 				</div>

 				<div class="col-lg-8">
                   <form name="form" method="POST" action="{{route('password.update')}}">
                    @csrf
                       
                        <div class="mb-3">
                        <label>Current Password</label>
                        <input type="password" id="current_password"  name="oldpassword" class="form-control">
                        
                    </div>
                    <div class="mb-3">
                        <label>New Password</label>
                        <input type="password" id="password" name="password"  class="form-control">
                        
                    </div>
                     <div class="mb-3">
                        <label>Connfirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"  class="form-control">
                        
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
