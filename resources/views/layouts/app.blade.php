<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('vendor/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset('vendor/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ asset('vendor/js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/style.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireStyles
</head>

<body>
    <div id="wrapper">
        <x-admin-sidebar />

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <x-admin-navbar />
            </div>

            {{ $slot }}

            <x-admin-footer />
        </div>

        <x-admin-chat />
        <x-admin-sidebar-right />
    </div>



    <!-- Mainly scripts -->
    <script src="{{ asset('vendor/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('vendor/js/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('vendor/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Flot -->
    <script src="{{ asset('vendor/js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('vendor/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('vendor/js/plugins/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('vendor/js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('vendor/js/plugins/flot/jquery.flot.pie.js') }}"></script>

    <!-- Peity -->
    <script src="{{ asset('vendor/js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('vendor/js/demo/peity-demo.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('vendor/js/inspinia.js') }}"></script>
    <script src="{{ asset('vendor/js/plugins/pace/pace.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('vendor/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- GITTER -->
    <script src="{{ asset('vendor/js/plugins/gritter/jquery.gritter.min.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ asset('vendor/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Sparkline demo data  -->
    <script src="{{ asset('vendor/js/demo/sparkline-demo.js') }}"></script>

    <!-- ChartJS-->
    <script src="{{ asset('vendor/js/plugins/chartJs/Chart.min.js') }}"></script>

    <!-- Toastr -->
    <script src="{{ asset('vendor/js/plugins/toastr/toastr.min.js') }}"></script>

    @stack('js')

    @livewireScripts
</body>

</html>
