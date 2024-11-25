<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <form class="d-none d-md-flex ms-4">
        <input class="form-control bg-dark border-0" type="search" placeholder="Search" />
    </form>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2"
                    src="{{ auth('admin')->user()->profile_picture ? asset('storage/' . auth('admin')->user()->profile_picture) : asset('dashboard/img/user.jpg') }}"
                    alt="" style="width: 40px; height: 40px; object-fit: cover;" />
                <span class="d-none d-lg-inline-flex">
                    {{ Auth::guard('admin')->user()->name }}
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="{{ route('admin.profile.edit') }}" class="dropdown-item">My Profile</a>
                <a href="{{ route('dashboard.admin.logout') }}" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>

</nav>
<!-- Navbar End -->
