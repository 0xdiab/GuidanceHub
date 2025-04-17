<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>GuidanceHub - @yield("page_name", "Unknown page")</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" />
        <link rel="stylesheet" href="{{ asset("libs/fonts/fontawesome-free-6.7.2-web/css/all.min.css") }}">
        {{-- Bootstrap Framework version 5 --}}
        <link rel="stylesheet" href="{{ asset("libs/bootstrap/bootstrap-5.0.2-dist/css/bootstrap.min.css") }}">
        {{-- Style css --}}
        <link rel="stylesheet" href="{{ asset("css/app.css") }}">
        {{-- other css files --}}
        @yield("styles")
    </head>
    <body class="font-sans antialiased">

        <div class="app">
            
            {{-- Navbar --}}
            @section('navbar')
                @include('include.navbar')
            @show

            {{-- Container --}}
            <div class="container">
                <!-- Page Content -->
                <main>
                    @yield("content")
                </main>
            </div>
            {{-- End of container --}}


            {{-- Navbar --}}
            @section('footer')
                @include('include.footer')
            @show

        </div>

        {{-- Bootstrap JS --}}
        <script src="{{ asset("libs/bootstrap/bootstrap-5.0.2-dist/js/bootstrap.min.js") }}"></script>
        {{-- main JavaScript file --}}
        <script src="{{ asset("js/app.js") }}"></script>
        {{-- other js files --}}
        @yield("scripts")
    </body>
</html>
