<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>
    Shamsuddin Kadir Foundation
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="{{ asset('/assets')}}/css/bootstrap-4.min.css">
  <!-- <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets')}}/img/apple-icon.png"> -->
  <link rel="icon" type="image/png" href="{{ asset('/assets')}}/img/favicon.png">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="{{ asset('/assets')}}/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('/assets')}}/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('/assets')}}/demo/demo.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.material.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.bootstrap4.css" rel="stylesheet" />

  @yield('header_link')

</head>

<body class="">
  <div class="wrapper ">
    <!--Sidebar-->
    @include('layouts.sidebar')
    <!--End Sidebar-->
    <div class="main-panel">
      <!-- Navbar -->
      @include('layouts.topbar')
      <!-- End Navbar -->
      <!--Main Content -->
      @yield('main-content')
      <!--End Main Content -->


     @include('layouts.footer')
    </div>
  </div>
  <!--   Core JS Files   -->

  

  <script src="{{ asset('/assets') }}/script/jquery3.min.js" type="text/javascript"></script>
  <script src="{{ asset('/assets') }}/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="{{ asset('/assets') }}/js/core/popper.min.js" type="text/javascript"></script>
  <script src="{{ asset('/assets') }}/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="{{ asset('/assets') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="{{ asset('/assets') }}/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('/assets') }}/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('/assets') }}/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('/assets') }}/demo/demo.js"></script>
  <!-- <script src="{{ asset('/assets')}}/css/bootstrap-4.min.js"></script> -->
  <script src="{{ asset('/assets')}}/script/jquery-datatable.min.js"></script>
  <script src="{{ asset('/assets')}}/script/main-script.js"></script>
  

@yield('footer_script')

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>