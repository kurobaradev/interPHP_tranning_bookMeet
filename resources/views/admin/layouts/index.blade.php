<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    @yield('title')

    <!-- Custom fonts for this template-->
    <link href="{{ asset('adminlte/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('adminlte/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        @yield('css')
    <!-- Custom styles for this template-->

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('admin.partials.siderbar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- header -->
                @include('admin.partials.header')
                <!-- End of header -->

                <!-- Page Content -->
                @yield('content')
                <!-- end Page Content -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
 <!-- Bootstrap core JavaScript-->
 <script src="{{ asset('adminlte/vendor/jquery/jquery.min.js') }}"></script>
 <script src="{{ asset('adminlte/js/popper.js.map') }}"></script>
    
 <script src="{{ asset('adminlte/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

 <!-- Core plugin JavaScript-->
 <script src="{{ asset('adminlte/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

 <!-- Custom scripts for all pages-->
 <script src="{{ asset('adminlte/js/sb-admin-2.min.js') }}"></script>

 <!-- Page level plugins -->
 {{-- <script src="{{ asset('adminlte/vendor/chart.js/Chart.min.js') }}"></script> --}}

 <!-- Page level custom scripts -->
 {{-- <script src="{{ asset('adminlte/js/demo/chart-area-demo.js') }}"></script> --}}
 {{-- <script src="{{ asset('adminlte/js/demo/chart-pie-demo.js') }}"></script> --}}
  <!-- Page level plugins -->
  <script src="{{ asset('adminlte/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('adminlte/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('adminlte/js/demo/datatables-demo.js') }}"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  @yield('js')
</body>

</html>
