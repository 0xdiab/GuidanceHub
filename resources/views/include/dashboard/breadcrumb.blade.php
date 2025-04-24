{{-- breadcrumb --}}
<nav aria-label="breadcrumb my-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
        {{-- Other breadcrumb items --}}
        @yield('breadcrumb-items')

    </ol>
</nav>

{{-- End of breadcrumb --}}