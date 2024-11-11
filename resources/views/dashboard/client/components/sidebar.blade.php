<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark justify-content-center">
        <div class="d-flex flex-column justify-content-center align-items-center mb-3 mt-1">
            <a href="{{ route('frontend.home') }}" style="width: 100px">
                <img src="{{ asset('dashboard/img/logo.png') }}" alt="" style="width: 100px" />
            </a>
            <div class="d-flex align-items-center mb-3 mt-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="{{ asset('dashboard/img/user.jpg') }}" alt=""
                        style="width: 40px; height: 40px" />
                    <div
                        class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                    </div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                </div>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('dashboard.client.home') }}"
                class="nav-item nav-link {{ request()->routeIs('dashboard.client.home') ? 'active' : '' }}">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>
            <a href="{{ route('content-filters.index') }}"
                class="nav-item nav-link {{ request()->routeIs('content-filters.index') ? 'active' : '' }}">
                <i class="fa fa-tachometer-alt me-2"></i>Send Request
            </a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
