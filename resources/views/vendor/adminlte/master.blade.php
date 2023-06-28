<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
        @yield('title', config('adminlte.title', 'AdminLTE 2'))
        @yield('title_postfix', config('adminlte.title_postfix', ''))</title>

    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script>
        window.laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'api_token' => (Auth::user()) ? Auth::user()->api_token : null
        ]) !!};
    </script>

    {{-- <script src="{{asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js')}}"></script> --}}

    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Montserrat&family=Open+Sans&family=Raleway:wght@200&family=Roboto&family=Roboto+Mono:wght@200;229&family=Roboto+Slab&display=swap" rel="stylesheet">
   
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}

    <!-- Tell the browser to be responsive to screen width -->
    <!-- Bootstrap 3.3.7 -->
    {{-- <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css"/> --}}
{{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/css/bootstrap.min.css" integrity="sha512-SgMx4umLagm9ctwfuw66X5M/nLu7gTZrh8gYKfzxgHQBxQeIelAG2hyfnjveLfkuRProaaw55KKPCFlIulOzjQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css"/>  --}}
    <!-- Font Awesome -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/ionic/1.3.2/css/ionic.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">


    <link href="//gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/custom-css.css') }}">
    <link rel="stylesheet" href="{{ asset('css/awesome-bootstrap-checkbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">

    @if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css"> -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/select2-bootstrap.min.css') }}">
    @endif

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    @if(config('adminlte.plugins.datatables'))
    <!-- DataTables with bootstrap 3 style -->
    <!-- <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css"> -->
    <!--  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/tabulator/4.2.1/css/tabulator.min.css"> -->
    <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/tabulator/4.2.1/css/bootstrap/tabulator_bootstrap.min.css"> -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    @endif

    @yield('adminlte_css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition @yield('body_class')">

    @yield('body')
    <script src="{{mix('js/app.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js" integrity="sha512-nBe/MAVnca0bCImmi2/WzJoGCgaUOMVDtTXFXUcxuLuFLUc3FGdOx8LR28WxgocUumd4Db5k5Ppjqz1M1Ijy1A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
    {{-- <script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha512-iztkobsvnjKfAtTNdHkGVjAYTrrtlC7mGp/54c40wowO7LhURYl3gVzzcEqGl/qKXQltJ2HwMrdLcNUdo+N/RQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="{{ asset('vendor/adminlte/dist/js/bootstrap-datepicker.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/3.3.0/bootbox.min.js" integrity="sha512-Qisy1IxwPUCsMbNiKyqHq/9f9FMI7U8XHQ40+elAuhKFu3euy9pycN+NlXLYNmqe0kOWYLL4+OJW5GOMIjuIQg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.3.3/bootbox.min.js" integrity="sha512-Zs9YYOYICEEWix8IqIhLByapX+5xL04HdfzjPEMEHKcGS1UyQ4tLKnEagml8KXJhEm5d0DZSldFxl8lPE9rVPw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js" integrity="sha512-RdSPYh1WA6BF0RhpisYJVYkOyTzK4HwofJ3Q7ivt/jkpW6Vc8AurL1R+4AUcvn9IwEKAPm/fk7qFZW3OuiUDeg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/df-number-format/2.1.6/jquery.number.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js"></script>


    <script src="{{ asset('vendor/adminlte/dist/js/jquery.sparkline.min.js') }}"></script>

    @if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <!--<script src="//https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>-->
    <script src="{{ asset('vendor/adminlte/dist/js/select2.full.min.js') }}"></script>
    <!--  <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/js/select2.full.min.js"></script> -->
    @endif

    @if(config('adminlte.plugins.datatables'))
    <!-- DataTables with bootstrap 3 renderer -->
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    @endif

    @if(config('adminlte.plugins.tabulator'))
    <!-- DataTables with bootstrap 3 renderer -->
    <!-- <script src="{{ asset('vendor/adminlte/dist/js/tabulator.min.js') }}"></script> -->
    <!--  <script src="//cdnjs.cloudflare.com/ajax/libs/tabulator/4.2.1/js/tabulator.min.js"></script> -->
    @endif

    @if(config('adminlte.plugins.chartjs'))
    <!-- ChartJS -->
    <!-- <script src="{{ asset('vendor/adminlte/dist/js/Chart.js') }}"></script> -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js"></script>
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script> -->
    @endif

    @yield('adminlte_js')

    {{-- @if (env('APP_ENV') == 'local')  --}}
    <script src="http://localhost:35729/livereload.js"></script>
    {{-- @endif --}}
</body>

</html>