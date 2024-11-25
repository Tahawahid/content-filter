<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">


    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2"
                    src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('assets/img/default_profile.jpg') }}"
                    alt="" style="width: 40px; height: 40px; object-fit: cover" />
                <span class="d-none d-lg-inline-flex">Hello, {{ Auth::user()->name }} </span>
            </a>

            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="{{ route('profile') }}" class="dropdown-item">My Profile</a>
                <a href="{{ route('frontend.userLogout') }}" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->
