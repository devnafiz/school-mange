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
               <div class="col-md-4">

                    <select name="year_id" required="" class="form-control" id="year_id">
                  <option value="" selected="" disabled="">Select Year</option>
                   @foreach($years as $year)
                 <option value="{{ $year->id }}"  >{{ $year->name }}</option>
                  @endforeach
                   
                </select>
                 
               </div>

               <div class="col-md-4">

                     <select name="class_id"  required="" class="form-control" id="class_id">
                    <option value="" selected="" disabled="">Select Class</option>
                     @foreach($classes as $class)
                    <option value="{{ $class->id }}" >{{ $class->name }}</option>
                    @endforeach
                     
                  </select>
                 
               </div>

               <div class="col-md-4">
                  <a  id="search" name="search" class="btn btn-primary">Search</a>
               </div>
             

            </div>

            <div class="row d-none" id="roll_generate">
                 <div class="col-md-12">
                  <table class="table table-bordered" style="width:100%">

                      <thead>
                        <tr>
                             <th>Id No</th>
                             <th>Student Name</th>
                             <th>Father Name</th>
                             <th>Gender</th>
                             <th>Roll</th>
                            


                        </tr>
                      </thead>
                      <tbody id="roo-generate_tr">
                        
                      </tbody>
                    
                  </table>
                   
                 </div>
                   
              
            </div>
<input type="submit"  value="Roll generator" class="btn btn-info">

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

 
         $.ajax({

               url: "{{route('student.registration.getstudents')}}",
               type: "GET",
               data: {'year_id':year_id,'class_id':class_id},

               success: function(data){
                  $("#roll_generate").removeClass('d-none');
                  var html = '';

                  $.each(data, function(key, v){

                    html +=
                         '<tr>'+
                              '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
                              '<td>'+v.student.name+'</td>'+
                              '<td>'+v.student.fname+'</td>'+
                              '<td>'+v.student.gender+'</td>'+
                              '<td><input type="text" name="roll[]" value="'+v.roll+'"></td>'+
                              '</tr>';

                       });
                html = $('#roo-generate_tr').html(html);


               }

        });


  

    });
   });
 </script>

  <script>


   

       
     $(document).on('click','#search',function (){

    //alert('hi');


      
       


     });






  

 </script>


@endsection