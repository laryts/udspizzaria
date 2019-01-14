<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="theme-color" content="#333">

    <!--keyworkds-->
    <meta name="keywords" content="@yield('')" />

    <!--description-->
    <meta name="description" content="@yield('description','')" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Início |') {{ config('app.name', '') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/manifest.js') }}" defer></script>
    <script src="{{ asset('js/vendor.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('js')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="favicon.ico"/>
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
    <script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaInit&render=explicit" defer></script>
</body>
</html>