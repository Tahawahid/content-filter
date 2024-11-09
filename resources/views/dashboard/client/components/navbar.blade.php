<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">


    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="{{ asset('dashboard/img/user.jpg') }}" alt=""
                    style="width: 40px; height: 40px" />
                <span class="d-none d-lg-inline-flex">Hello, {{ Auth::user()->name }} </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">My Profile</a>
                <a href="#" class="dropdown-item">Settings</a>
                <a href="{{ route('frontend.userLogout') }}" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->
