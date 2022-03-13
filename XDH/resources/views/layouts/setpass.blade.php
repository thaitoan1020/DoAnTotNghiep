<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>@yield('title', 'AGU') - {{ config('app.name', 'Laravel') }}</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/dist/img/favicon.ico') }}" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/plugins/fontawesome-free/css/all.min.css')}}"/>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}"/>
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}"/>
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('public/plugins/jqvmap/jqvmap.min.css')}}"/>
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/dist/css/adminlte.min.css')}}"/>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}"/>
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('public/plugins/daterangepicker/daterangepicker.css')}}"/>
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('public/plugins/summernote/summernote-bs4.min.css')}}"/>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
     

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" style="padding-top: 3px;">
          <div class="user-panel d-flex">
            <div class="image">
              <img src="{{ asset('public/dist/img/nobody_m.original.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              {{ Auth::user()->name }}
            </div>
          </div>
        </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
              <i class="fas fa-sign-out-alt mr-2"></i> Đăng xuất
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
              @csrf
            </form>
           
          </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
     

    @yield('content')

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Bản quyền &copy; {{ date('Y') }} bởi lớp DH18TH.</strong>
   <!--  All rights reserved. -->
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('public/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script> -->
<!-- Bootstrap 4 -->
<script src="{{ asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('public/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('public/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('public/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('public/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('public/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('public/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('public/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('public/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('public/dist/js/pages/dashboard.js')}}"></script>
</body>
</html>
