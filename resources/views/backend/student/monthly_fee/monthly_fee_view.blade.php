@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
             <h4 class="text-center">Monthly Fee</h4>
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

                     <select name="month"  required="" class="form-control" id="month">
                    <option value="" selected="" disabled="">Select month</option>
                   
                    <option value="january" >january</option>
                    <option value="Fabruary" >Fabruary</option>
                    <option value="March" >March</option>
                    <option value="April" >April</option>
                    <option value="May" >May</option> 
                    <option value="Jun" >Jun</option>
                    <option value="July" >July</option>
                    <option value="August" >August</option>
                    <option value="September" >September</option>
                    <option value="October" >October</option>
                    <option value="November" >November</option>
                    <option value="December" >December</option>
                  
                     
                  </select>
                 
               </div>

               <div class="col-md-3">
                  <a  id="search" name="search" class="btn btn-primary">Search</a>
               </div>
             

            </div>

                <div class="row " >
                     <div class="col-md-12">
                        <div id="DocumentResults">
                            <script id="document-template" type="text/x-handlebars-template">
                                


                           
                            <table class="table table-bordered"  style="width:100%">
                                <thead>
                                       <tr>
                                          @{{{thsource}}}
                                       </tr>
                                </thead>
                                <tbody>
                                     @{{#each this}}
                                     
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
    var month = $('#month').val();
       //alert(month);

     $.ajax({
      url: "{{ route('student.monthly.fee.classwise.get')}}",
      type: "get",
      data: {'year_id':year_id,'class_id':class_id,'month':month},
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