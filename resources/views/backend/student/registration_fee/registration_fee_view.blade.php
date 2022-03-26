@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
           
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

                <div class="row " >
                     <div class="col-md-12">
                        <div id="DocumentResults">
                            <script id="document-template" type="text/x-handlebars-template">
                                


                           
                            <table class="table table-bordered" width="100%">
                                <thead>
                                       <tr>
                                          @{{{thsource}}}
                                       </tr>
                                </thead>
                                <tbody>
                                     @{{#each people}}
                                     
                                     <tr>
                                        @{{{tdsource}}}

                                     </tr>

                                    @{{/each}}
                                            
                                </tbody>
                                
                            </table>
                             </script>


                            
                        </div>
                      
                       
                     </div>
                       
                  
                </div>

       

 
 			
 			</div>
 		</div>
 	</div>
 </div>

<script type="text/javascript">
  $(document).on('click','#search',function(){
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
     $.ajax({
      url: "{{ route('student.registration.fee.classwise.get')}}",
      type: "get",
      data: {'year_id':year_id,'class_id':class_id},
      beforeSend: function() {       
      },
      success: function (data) {
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });
</script>


@endsection