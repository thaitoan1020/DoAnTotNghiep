<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', 'Trang chủ') - {{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/dist/img/favicon.ico') }}" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('public/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/custom.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/plugins/fontawesome-free/css/all.min.css') }}" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" />
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('public/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('public/plugins/jqvmap/jqvmap.min.css') }}" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/dist/css/adminlte.min.css') }}" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}" />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('public/plugins/daterangepicker/daterangepicker.css') }}" />
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('public/plugins/summernote/summernote-bs4.min.css') }}" />


    <!-- su dung datatable de tim kiem du lien -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    @yield('css')
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
                                <img src="{{ asset('public/dist/img/nobody_m.original.jpg') }}"
                                    class="img-circle elevation-2" alt="User Image">
                            </div>
                            <div class="info">
                                {{ Auth::user()->name }}
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <a href="{{ route('manager.doimatkhau') }}" class="dropdown-item">
                            <i class="fas fa-sync mr-2"></i> Đổi mặt khẩu
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                            class="dropdown-item">
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

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('manager.home') }}" class="brand-link">
                <img src="{{ asset('public/dist/img/favicon.ico') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">P.DT</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    QUẢN LÝ
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('manager.hocphan') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách học phần</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('manager.giangvien') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách giảng viên</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('manager.nhomgiangvien') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách nhóm giảng viên</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="{{ route('manager.ctdt_hocphan_hocky') }}" class="nav-link"
                                title="Chương trình đào tạo theo học kỳ">
                                <i class="nav-icon fas fa-desktop"></i>
                                <p>
                                    CTĐT theo học kỳ
                                </p>
                            </a>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="{{ route('manager.ctdt_hocphan_khoikienthuc') }}" class="nav-link"
                                title="Chương trình đào tạo theo khối kiến thức">
                                <i class="nav-icon fas fa-desktop"></i>
                                <p>
                                    CTĐT theo khối kiến thức
                                </p>
                            </a>
                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->

            <!-- Main content -->



            @yield('content')


            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <!--  All rights reserved. -->
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0-rc
            </div>
            <strong>Bản quyền &copy; {{ date('Y') }} bởi lớp DH18TH.</strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('public/js/jquery-3.5.1.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('public/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('public/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('public/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('public/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('public/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('public/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('public/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('public/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('public/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('public/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('public/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('public/dist/js/pages/dashboard.js') }}"></script>
    <!-- datatable js de tim kiem du lieu -->
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('public/plugins/select2/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#TableTimKiem').DataTable({
                language: {
                    url: "{{ asset('public/js/vi.json') }}"
                }
            });
        });

    </script>


    @yield('javascript')
</body>

</html>
