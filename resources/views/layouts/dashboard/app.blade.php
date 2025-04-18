<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - @yield("page_name", "Unknown page")</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" />
    <link rel="stylesheet" href="{{ asset("libs/fonts/fontawesome-free-6.7.2-web/css/all.min.css") }}">
    {{-- Bootstrap Framework version 5 --}}
    <link rel="stylesheet" href="{{ asset("libs/bootstrap/bootstrap-5.0.2-dist/css/bootstrap.min.css") }}">
    {{-- Style css --}}
    <link rel="stylesheet" href="{{ asset("dashboard/css/style.css") }}">

    {{-- other css files --}}
    @yield("styles")
</head>
<body>
    <div class="app">
        {{-- Navbar --}}
        @include("include.dashboard.navbar")
        {{-- Main Content --}}
        <main class="main-content">
            @yield("main-content")
        </main>
    </div>

    <script src="{{ asset("libs/bootstrap/bootstrap-5.0.2-dist/js/bootstrap.min.js") }}"></script>
    {{-- Main JavaScript file --}}
    <script src="{{ asset("dashboard/js/main.js") }}"></script>
    {{-- other JavaScript files --}}
    @yield("scripts")
</body>
</html>