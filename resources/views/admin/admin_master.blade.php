<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Admin - Dashboard</title>
  <link href="{{asset('userbackend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('userbackend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('userbackend/css/ruang-admin.min.css')}}" rel="stylesheet">
   <link href="{{asset('userbackendvendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css
">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
      @include('admin.body.sidebar')
     <!-- Sidebar -->
  
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
         @include('admin.body.header')
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

        <!--main -->
           @yield('admin')
        <!--main end-->

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
     @include('admin.body.footer')
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="{{asset('userbackend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('userbackend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('userbackend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('userbackend/js/ruang-admin.min.js')}}"></script>

   <script src="{{asset('userbackend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('userbackend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript">
    
    $(function(){

      $(document).on('click','#delete',function(e){

        e.preventDefault();
        var link =$(this).attr("href");


                     Swal.fire({
            title: 'Are you sure?',
            text: "Delete This Data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = link
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          })





      });
    });
  </script>
<!-- Include a required theme -->
<link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">
<script src="sweetalert2/dist/sweetalert2.min.js"></script>

  <script src="{{asset('userbackend/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('userbackend/js/demo/chart-area-demo.js')}}"></script>  
  <script  src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   

  <script>
      @if(Session::has('message'))
  
    var type ="{{Session::get('alert-type','info')}}"

    switch(type){
         case 'info':
         toastr.info(" {{Session::get('message') }}");
         break;

         case 'success':
         toastr.success(" {{Session::get('message') }}");
         break;

         case 'warning':
         toastr.warning(" {{Session::get('message') }}");
         break;

         case 'error'
         toastr.error("{{Session::get('message')}}");
         break;

    }
   
     @endif
  </script>
  
</body>

</html>