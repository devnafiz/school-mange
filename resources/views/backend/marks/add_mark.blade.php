@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
           <form method="POST" action="{{route('roll.generate.store')}}">
            @csrf
            <div class="row">
               <div class="col-md-3">

                    <select name="year_id" required="" class="form-control" id="year_id">
                  <option value="" selected="" disabled="">Select Year</option>
                   @foreach($years as $year)
                 <option value="{{ $year->id }}"  >{{ $year->name }}</option>
                  @endforeach
                   
                </select>
                 
               </div>

               <div class="col-md-3">

                     <select name="class_id"  required="" class="form-control" id="class_id">
                    <option value="" selected="" disabled="">Select Class</option>
                     @foreach($classes as $class)
                    <option value="{{ $class->id }}" >{{ $class->name }}</option>
                    @endforeach
                     
                  </select>
                 
               </div>
               <div class="col-md-3">

                     <select name="assign_subject_id"  required="" class="form-control" id="assign_subject_id">
                    <option value="" selected="" >Select Subject</option>
                   
                     
                  </select>
                 
               </div>

                <div class="col-md-3">

                     <select name="exam_type_id"  required="" class="form-control" id="exam_type_id">
                    <option value="" selected="" disabled="">Select Exam</option>
                     @foreach($exam_types as $exam)
                    <option value="{{ $exam->id }}" >{{ $exam->name }}</option>
                    @endforeach
                     
                  </select>
                 
               </div>

               <div class="col-md-3">
                  <a  id="search" name="search" class="btn btn-primary">Search</a>
               </div>
             

            </div>

            <div class="row d-none" id="mark_entry">
                 <div class="col-md-12">
                  <table class="table table-bordered" style="width:100%">

                      <thead>
                        <tr>
                             <th>Id No</th>
                             <th>Student Name</th>
                             <th>Father Name</th>
                             <th>Gender</th>
                             <th>Mark</th>
                            


                        </tr>
                      </thead>
                      <tbody id="mark_entry_tr">
                        
                      </tbody>
                    
                  </table>
                   
                 </div>
                   
              
            </div>


           </form>
       

 
 			
 			</div>
 		</div>
 	</div>
 </div>

 <script type="text/javascript">
   
   $(document).ready(function(){
          $(document).on('click','#search',function (){


       var year_id = $('#year_id').val();

       var class_id = $('#class_id').val();
       var assign_subject_id=$('#assign_subject_id').val();
       var exam_type_id=$('#exam_type_id').val();


 
         $.ajax({

               url: "{{route('student.marks.getstudents')}}",
               type: "GET",
               data: {'year_id':year_id,'class_id':class_id},

               success: function(data){
                  $("#mark_entry").removeClass('d-none');
                  var html = '';

                  $.each(data, function(key, v){

                    html +=
                         '<tr>'+
                              '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"><input type="hidden" name="id_no[]" value="'+v.student.id_no+'"></td>'+
                              '<td>'+v.student.name+'</td>'+
                              '<td>'+v.student.fname+'</td>'+
                              '<td>'+v.student.gender+'</td>'+
                              '<td><input type="text" name="marks[]" ></td>'+
                              '</tr>';

                       });
                html = $('#mark_entry_tr').html(html);


               }

        });


  

    });
   });
 </script>

  

 <script >
    $(function(){

          $(document).on('change','#class_id',function(){
             var class_id =$('#class_id').val();

             //alert(class_id);

             $.ajax({

                  url:"{{ route('marks.getsubject') }}",
                  type:"GET",
                  data:{class_id:class_id},
                  success: function(data){


                          var html ='<option value="">Select Subject</option>';

                          $.each(data,function(key,v){

                            html +='<option value="'+v.id+'">'+v.school_subject.name+'</option>';
                          });

                          $('#assign_subject_id').html(html);


                  }







             })






          });






     });


 </script>


@endsection