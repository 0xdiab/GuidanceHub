<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - @yield('page_name', 'Unknown page')</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" />
    <link rel="stylesheet" href="{{ asset('libs/fonts/fontawesome-free-6.7.2-web/css/all.min.css') }}">
    {{-- Bootstrap Framework version 5 --}}
    <link rel="stylesheet" href="{{ asset('libs/bootstrap/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    {{-- Style css --}}
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">

    {{-- other css files --}}
    @yield('styles')
</head>

<body>
    <div class="app">
        {{-- App content --}}
        <div class="app-content d-flex">

            {{-- sidebar --}}
            @section('sidebar')
                @include('include.dashboard.sidebar')
            @show

            {{-- Main Content --}}
            <main class="main-content">
                {{-- Navbar --}}
                @section('navbar')
                    @include('include.dashboard.navbar')
                @show

                {{-- Content --}}
                <div class="content p-4">
                    {{-- breadcrumb --}}
                    @section('breadcrumb')
                        @include('include.dashboard.breadcrumb')
                    @show

                    @yield('main-content')
                </div>
                {{-- End of Content --}}

                {{-- footer --}}
                @section('footer')
                    @include('include.dashboard.footer')
                @show
            </main>

        </div>
        {{-- End of App content --}}

    </div>

    <script src="{{ asset('libs/bootstrap/bootstrap-5.0.2-dist/js/bootstrap.min.js') }}"></script>
    {{-- Main JavaScript file --}}
    <script src="{{ asset('admin/js/main.js') }}"></script>
    {{-- other JavaScript files --}}
    @yield('scripts')
</body>

</html>
