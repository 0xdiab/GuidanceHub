{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    {{-- Contianer --}}
    <div class="container">
        {{-- Navbar toggler --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navGuidancehub"
            aria-controls="navGuidancehub" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navGuidancehub">
            {{-- Nav links --}}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 pe-2 profile">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profile" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="profile">
                        @auth
                            @if ((Auth::user()->is_admin))
                                <li><a class="dropdown-item" href="{{ route('dashboard.home') }}">Admin Dashboard</a></li>
                            @endif
                        @endauth
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="{{route('profile.edit')}}">Settings</a></li>
                        {{-- <li><a class="dropdown-item" href="#">Another action</a></li> --}}
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            {{-- Nav links --}}
        </div>
    </div>
    {{-- End of Contianer --}}
</nav>
{{-- End of Navbar --}}
