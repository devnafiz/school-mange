@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
           <h3> Employee Monthly salary</h3>
            <div class="row">
               <div class="col-md-6">
                     <div class="form-group">
                          <label for="exampleFormControlInput1"> Attendance date</label>
                          <input type="date" class="form-control"  name="date" id="date">
                      </div>
                 
               </div>

               

               <div class="col-md-6">
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
    var date = $('#date').val();
   
     $.ajax({
      url: "{{ route('employee.monthly.salary.get')}}",
      type: "get",
      data: {'date':date},
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