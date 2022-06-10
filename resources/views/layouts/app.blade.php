<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <link rel="icon" type="image" href="{{ asset('/images/logo.JPG') }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-danger">
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <script src="{{asset('plugins/fullcalendar/main.js')}}"></script>
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
</body>

</html>
