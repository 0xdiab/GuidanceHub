{{-- Sidebar --}}
<div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 100vh">
    <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none logo"
        href="{{ route('dashboard.home') }}">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap" />
        </svg>
        <span class="fs-4">GuidanceHub</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link" aria-current="page">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#home" />
                </svg>
                Home
            </a>
        </li>
        <li>
            <a href="#" class="nav-link">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#speedometer2" />
                </svg>
                Users
            </a>
        </li>
        <li>
            <a href="#" class="nav-link">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#table" />
                </svg>
                Specializations
            </a>
        </li>
        <li>
            <a href="#" class="nav-link ">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#grid" />
                </svg>
                Skills
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            id="profileSiderbar" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ Auth::user()->image }}" alt="" width="32" height="32"
                class="rounded-circle me-2">
            <strong>{{Auth::user()->name}}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="profileSiderbar">
            @auth
                @if (Auth::user()->is_admin)
                    <li><a class="dropdown-item" href="{{ route('dashboard.home') }}">Admin Dashboard</a></li>
                @endif
            @endauth
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Settings</a></li>
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
    </div>
</div>
{{-- End of Sidebar --}}
