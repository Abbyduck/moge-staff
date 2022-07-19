<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MOGE | Admin</title>

    <!-- Google Font: Source Sans Pro -->
{{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">--}}
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('assets/plugins/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-ui/jquery-ui.css') }}">

    @yield('stylesheet')
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('dashboard') }}" class="nav-link">{{ __('Dashboard') }}</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item" title="{{ __('Log Out') }}">
                <a class="nav-link"  href="{{ route('logout') }}" role="button">
                    <i class="fas fa-power-off"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('dashboard') }}" class="brand-link">
            <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="MOGE Logo" class="brand-image img-circle
            elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a class="d-block "  href="#">
                        {{ Auth::user()->name }}
                    </a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
{{--            <div class="form-inline">--}}
{{--                <div class="input-group" data-widget="sidebar-search">--}}
{{--                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">--}}
{{--                    <div class="input-group-append">--}}
{{--                        <button class="btn btn-sidebar">--}}
{{--                            <i class="fas fa-search fa-fw"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                @include('admin.elements.nav-sidebar')
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('menu.' . Route::currentRouteName()) }}</h1>
                    </div><!-- /.col -->
{{--                    <div class="col-sm-6">--}}
{{--                        <ol class="breadcrumb float-sm-right">--}}
{{--                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{ __('Dashboard') }}</a></li>--}}
{{--                            <li class="breadcrumb-item active">{{ __('menu.' . Route::currentRouteName()) }}</li>--}}
{{--                        </ol>--}}
{{--                    </div><!-- /.col -->--}}
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        @yield('main-content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- todo Control Sidebar -->
{{--    <aside class="control-sidebar control-sidebar-dark">--}}
{{--        <!-- Control sidebar content goes here -->--}}
{{--        <div class="p-3">--}}
{{--            <h5>Title</h5>--}}
{{--            <p>Sidebar content</p>--}}
{{--        </div>--}}
{{--    </aside>--}}
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2022 <a href="https://moge.tv">MOGE.tv</a>.</strong> All rights reserved.
    </footer>
</div>
@include('sweetalert::alert')

<div class="modal fade" id="defaultModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@yield('modal')

<button type="button" id="show-modal" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg" style="display:none;"></button>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width:1024px !important;">
        <div class="modal-content">
            <div class="modal-body p-3 p-md-5" >
                <button type="button" class="btn-close" data-dismiss="modal"></button>
                <iframe id="inner-frame"  style="border:0;min-height: 200px" width="100%" height="500"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="modal fade haha" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width:1024px !important;">
        <div class="modal-content">
            <div class="modal-body p-3 p-md-5" >
                <button type="button" class="btn-close" data-dismiss="modal"></button>
                <div class="text-center mb-4">
                    <h4>编辑人员</h4>
                </div>
                <form id="defaultForm" class="row" >
                    @csrf
                    <div class="form-group col-md-6">
                        <label >姓名</label>
                        <input type="text" name="name" class="form-control " placeholder="输入姓名" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label >考勤编号</label>
                        <input type="text" name="attendance_no" class="form-control" placeholder="输入考勤编号" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label >邮箱</label>
                        <input type="email" name="email" class="form-control "  placeholder="输入邮箱" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label >部门</label>
                        <select name="department_id" class="form-control ">
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label >入职日期</label>
                        <input type="date" name="entry_date" class="form-control">

                    </div>

                    <div class="form-group col-md-6">
                        <label >生日</label>
                        <input type="date" name="birthday" class="form-control" >
                    </div>
                    {{--    <div class="modal-footer justify-content-between">--}}
                    {{--        <button type="submit" class="btn btn-dark" >新增</button>--}}
                    {{--    </div>--}}
                </form>
                <div class="text-center">
                    <button class="btn btn-dark m-md-3">提交</button>

                    <button class="btn btn-default" data-dismiss="modal">取消</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-validation/jquery.validate.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.js')}}"></script>
<script src="{{asset('js/common.js')}}"></script>

@yield('js')

<script>
    let currentRoute = "{{ Route::current()->uri() }}";

    @if($message = session('success_message'))
    Swal.fire(
        'Good job!',
        '{{ $message }}',
        'success'
    )
    @endif
</script>

@stack('scripts')
</body>
</html>
