<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }} | {{ $title }}</title>

    <link href="{{ asset('vendor/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    @stack('css')
    <link href="{{ asset('vendor/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    {{ $slot }}

    <!-- Mainly scripts -->
    <script src="{{ asset('vendor/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('vendor/js/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>

    @stack('js')
</body>

</html>
