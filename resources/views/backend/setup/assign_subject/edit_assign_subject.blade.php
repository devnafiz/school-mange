@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="row mb-3">
	<div class="col-md-12 mb-4">

	<div class="card">
		<div class="card-body">
			<div class="box">
			<a href="{{route('assign.subject.view')}}" class="btn btn-success">Assign Subject list </a>
			
		</div>
            <form method="POST" action="{{route('update.assign.subject',$editData[0]->class_id)}}">
              @csrf
                    
                   <div>
                       <div class="add_item">
                         
                      
                      <div class="row">
                      <div class="col-lg-12">


                       <div class="form-group">
                        <label for="exampleFormControlSelect1">Class Name</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="class_id">
                          <option value="">Select Class Name</option>

                          @foreach($classes as $class)
                          <option value="{{$class->id}}" {{($editData[0]->class_id==$class->id)? "selected" :""}}>{{$class->name}}</option>
                         @endforeach
                         
                         </select>
                         </div>
                        
                      </div>

                      
                      
                      
                    </div>
                 @foreach($editData as $data)  
                  <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                   <div class="row">
                      <div class="col-lg-4">
                         <div class="form-group">
                        <label for="exampleFormControlSelect1">Student Subject</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="subject_id[]">
                          <option value="">Select Subject</option>
                          
                         @foreach($subjects as $subject)
                          <option value="{{$subject->id}}" {{($data->subject_id== $subject->id)? "selected" : ""}}>{{$subject->name}}</option>
                         @endforeach
                         
                         </select>
                         </div><!--end lg-5-->
                      </div>
                       <div class="col-lg-2">
                           <div class="form-group">
                            <label for="exampleFormControlInput1">Full Mark </label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                              placeholder="Full mark" name="full_mark[]" value="{{$data->full_mark}}">
                          </div>
                      </div>
                      <div class="col-lg-2">
                           <div class="form-group">
                            <label for="exampleFormControlInput1">Pass Mark </label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                              placeholder="Pass Mark" name="pass_mark[]" value="{{$data->pass_mark}}">
                          </div>
                      </div>
                      <div class="col-lg-2">
                           <div class="form-group">
                            <label for="exampleFormControlInput1">Subjective Mark </label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                              placeholder="Subjective Mark" name="subjective_mark[]" value="{{$data->subjective_mark}}">
                          </div>
                      </div>
                       <div class="col-lg-2">
                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                         <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                      </div>
                     
                   </div>
                    </div>
                     @endforeach
                   
                     <!-- <div class="form-group">
                      <label for="exampleFormControlTextarea1">Example textarea</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div> -->
                     </div><!-- end add item-->
                    </div>
                   
                    <input type="submit" value="submit" class="btn btn-success">
                    
                   
                  </form>

			
		</div>
	</div>
</div>

<div style="visibility: hidden;">
  <div class="whole_extra_item_add" id="whole_extra_item_add">
     <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
      <div class="form-row">

          
                     <div class="col-lg-4">
                         <div class="form-group">
                        <label for="exampleFormControlSelect1">Student Subject</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="subject_id[]">
                          <option value="">Select Subject</option>
                          
                         @foreach($subjects as $subject)
                          <option value="{{$subject->id}}">{{$subject->name}}</option>
                         @endforeach
                         
                         </select>
                         </div><!--end lg-5-->
                      </div>
                       <div class="col-lg-2">
                           <div class="form-group">
                            <label for="exampleFormControlInput1">Full Mark </label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                              placeholder="Full mark" name="full_mark[]">
                          </div>
                      </div>
                      <div class="col-lg-2">
                           <div class="form-group">
                            <label for="exampleFormControlInput1">Pass Mark </label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                              placeholder="Pass Mark" name="pass_mark[]">
                          </div>
                      </div>
                      <div class="col-lg-2">
                           <div class="form-group">
                            <label for="exampleFormControlInput1">Subjective Mark </label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                              placeholder="Subjective Mark" name="subjective_mark[]">
                          </div>
                      </div>
                       <div class="col-lg-2">
                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                      </div>
                     
                   
        
      </div>
       

     </div>
    
  </div>
  
</div>

<script type="text/javascript">
  
  $(document).ready(function(){

    var counter = 0;
    $(document).on('click','.addeventmore',function(){
        var whole_extra_item_add = $("#whole_extra_item_add").html();
        $(this).closest(".add_item").append(whole_extra_item_add);
         counter++;  
    });

    $(document).on('click','.removeeventmore',function(event){
      $(this).closest('.delete_whole_extra_item_add').remove();
        counter -=1;
    });
  });
</script>

@endsection