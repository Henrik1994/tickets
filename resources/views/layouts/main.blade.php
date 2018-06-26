<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href=" {{ asset('/css/material-dashboard.css?v=2.1.0 ')}} "  rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('/demo/demo.css')}}/" rel="stylesheet" />
</head>

<body>
<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('/img/sidebar-1.jpg')}}">
 
 <div class="logo">
   <a href="{{ url('/') }}" class="simple-text logo-normal">
     Tickets
   </a>
 </div>

</div>
    @yield('content')
      <!--   Core JS Files   -->
  <script src="{{asset('/js/core/jquery.min.js ')}}" type="text/javascript"></script>
  <script src="{{asset('/js/core/popper.min.js ')}}" type="text/javascript"></script>
  <script src="{{asset('/js/core/bootstrap-material-design.min.js ')}}" type="text/javascript"></script>
  <script src="{{asset('/js/plugins/perfect-scrollbar.jquery.min.js ')}}"></script>

  <!-- Chartist JS -->
  <script src="{{asset('/js/plugins/chartist.min.js ')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('/js/plugins/bootstrap-notify.js ')}}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('/js/material-dashboard.min.js?v=2.1.0 ')}}" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{asset('/demo/demo.js ')}}"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>
</html>