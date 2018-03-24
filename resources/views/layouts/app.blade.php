<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keyword" content="@yield('meta_keywords')">
    <meta name="author" lang="ru" content="@yield('author')">
    <meta name="copyright" content="Blog" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/responsiveCarousel.js')}}"></script>
</head>
<body>
@yield('header')

<main>
    <div class="app-container">
        @yield('layout')
    </div>
</main>

<footer>
    <div class="footer">

    </div>
</footer>

    <!-- Scripts -->

</body>
</html>
