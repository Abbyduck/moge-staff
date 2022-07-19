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
<body >
<div class="wrapper " style="overflow: hidden">


    <!-- Content Wrapper. Contains page content -->
    <div class="" id="frame-wrapper">
        <!-- Content Header (Page header) -->
        <!-- /.content-header -->

        <!-- Main content -->
        @yield('main-content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</div>
@include('sweetalert::alert')

@yield('modal')

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

    $(function () {
        //iframe 自适应高度
        setTimeout(() => {
            const height = $("#frame-wrapper").height()
            window.parent.document.getElementById("inner-frame").height= height+ 50;
        }, 50)
    })
    $(window).resize(function () {
        setTimeout(() => {
            const height = $("#frame-wrapper").height()
            window.parent.document.getElementById("inner-frame").height= height+ 50;
        }, 50)
    })

    @if($message = session('success_message'))
        Swal.fire({
            icon:'success',
            title: '{{ $message }}',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            /* Read more about isConfirmed, isDenied below */
           console.log('close modal and refresh window')
            window.parent.location.reload();

        })
    @endif
</script>

@stack('scripts')
</body>
</html>
