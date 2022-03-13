<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>@yield('title', 'Đăng Nhập') - {{ config('app.name', 'Laravel') }}</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/dist/img/favicon.ico') }}" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page" style="background: url('{{ asset('public/dist/img/bg_login.jpg')}}');" >
  @yield('content')
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('public/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
