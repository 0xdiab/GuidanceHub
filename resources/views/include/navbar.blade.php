{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-light">
    {{-- Container --}}
    <div class="container">
        {{-- Navbar logo --}}
        <a class="navbar-brand" href="#">GuidanceHub</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navGuidanceHub"
            aria-controls="navGuidanceHub" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navGuidanceHub">
            {{-- Navbar Links --}}
            <ul class="navbar-nav m-auto mb-2">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.specialization.index') }}">Specializations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.about') }}">About Us</a>
                </li>
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li> --}}
            </ul>
            {{-- End of Navbar Links --}}
            @guest
                <div class="buttons">
                    <ul class="m-0 navbar-nav m-auto">
                        <li class="nav-item me-2">
                            <a class="nav-link btn btn-nav btn-login" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link btn btn-nav btn-register" href="{{ route('register') }}">Register</a>
                        </li>
                    </ul>
                </div>
            @else
                <ul class="profile list-unstyled px-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profile" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="profile">
                            @auth
                                @if (Auth::user()->is_admin)
                                    <li><a class="dropdown-item" href="{{ route('dashboard.home') }}">Admin Dashboard</a></li>
                                @endif
                            @endauth
                            <li><a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a></li>
                            @if (Auth::user()->account_type == 'mentor')
                                <li><a class="dropdown-item" href="{{ route('sessions.mentorSessions', Auth::user()->id) }}">My Session</a></li>
                            @endif

                            @if (Auth::user()->account_type == 'mentee')
                                <li><a class="dropdown-item" href="{{ route('sessions.menteeSessions', Auth::user()->id) }}">My Session</a></li>
                            @endif
                            
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Settings</a></li>
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
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @endguest
        </div>
    </div>
    {{-- End of  Container --}}
</nav>
{{-- End of navbar --}}
