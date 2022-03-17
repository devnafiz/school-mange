 
@extends('admin.admin_master')

@section('admin')
 <div class="row mb-3">
 	<div class="col-lg-12">
 		<div class="card">
 			<div class="card-body">
                 <div class="row">
 				<div class="col-lg-4">
 					<img src="{{(!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path) : url('upload/user_images/stan1.jpg') }}" width="200">

 				</div>

 				<div class="col-lg-8">
 					<p>User Name:{{$user->name}}</p>
 					<p>User Email:{{$user->email}}</p>
 					<a href="{{route('user.profile.edit')}}" class="btn btn-success"> Edit Profile</a>
 				</div>
 			</div>
 				
 			</div>
 			
 		</div>
 		
 	</div>

 </div>
 @endsection