<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- App Title --}}
    <title>{{ config('app.name', 'Laravel') }}@yield('title-complement')</title>
    <!-- Scripts Package -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles Package -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>