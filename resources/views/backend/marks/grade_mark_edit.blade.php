@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="row mb-3">
	<div class="col-md-12 mb-4">

	<div class="card">
		<div class="card-body">
			<div class="box">
			<a href="{{route('marks.entry.grade')}}" class="btn btn-success">Grade Mark List</a>
			
		</div>
            <form method="POST" action="{{route('update.marks.grade',$editData->id)}}">
              @csrf
                    


                       <div class="row">

                           <div class="col-lg-4">
                                 <div class="form-group">
                                   <label for="exampleFormControlInput1">Grade Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="grade_name" value="{{$editData->grade_name}}">
                                  </div>
                           </div>
                           <div class="col-lg-4">
                                <div class="form-group">
                                   <label for="exampleFormControlInput1">Grade Point</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="grade_point" value="{{$editData->grade_point}}">
                                 </div>
                             
                           </div>
                           <div class="col-lg-4">
                                 <div class="form-group">
                                   <label for="exampleFormControlInput1">Start Mark</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="start_marks" value="{{$editData->start_marks}}">
                                 </div>
                           </div>
                         
                       </div>

                        <div class="row">

                           <div class="col-lg-4">
                                 <div class="form-group">
                                   <label for="exampleFormControlInput1">End Mark</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="end_marks" value="{{$editData->end_marks}}">
                                  </div>
                           </div>
                           <div class="col-lg-4">
                                <div class="form-group">
                                   <label for="exampleFormControlInput1">Start Point</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="start_point" value="{{$editData->start_point}}">
                                 </div>
                             
                           </div>
                           
                         
                       </div>

                       

                        <div class="row">
                              <div class="col-lg-6">
                                <div class="form-group">
                                   <label for="exampleFormControlInput1">End point</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="end_point" value="{{$editData->end_point}}">
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                <div class="form-group">
                                   <label for="exampleFormControlInput1">Remarks</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="remarks" value="{{$editData->remarks}}">
                                 </div>
                             
                           </div>
                         
                       </div>


                       
  
                    <input type="submit" value="submit" class="btn btn-success">
                    
                   
                  </form>

			
		</div>
	</div>
</div>



@endsection