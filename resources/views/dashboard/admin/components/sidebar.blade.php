<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark justify-content-center">
        <div class="d-flex flex-column justify-content-center align-items-center mb-3 mt-1">
            <a href="{{ route('frontend.home') }}" style="width: 100px">
                <img src="{{ asset('assets/img/Logo.png') }}" alt="" style="width: 100px" />
            </a>
            <div class="d-flex align-items-center mb-3 mt-4">
                <div class="position-relative">
                    <img class="rounded-circle"
                        src="{{ auth('admin')->user()->profile_picture ? asset('storage/' . auth('admin')->user()->profile_picture) : asset('dashboard/img/user.jpg') }}"
                        alt="" style="width: 40px; height: 40px; object-fit: cover;" />
                    <div
                        class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                    </div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">
                        {{ Auth::guard('admin')->user()->name }}
                    </h6>
                    <span>
                        <span class="badge bg-success">Admin</span>
                    </span>
                </div>
            </div>

        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('dashboard.admin.home') }}"
                class="nav-item nav-link {{ request()->routeIs('dashboard.admin.home') ? 'active' : '' }}">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>
            <a href="{{ route('users.index') }}"
                class="nav-item nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                <i class="fas fa-users me-2"></i>All users
            </a>
            <a href="{{ route('orders.index') }}"
                class="nav-item nav-link {{ request()->routeIs('orders.index') ? 'active' : '' }}">
                <i class="fas fa-boxes me-2"></i>All Order
            </a>
            <a href="{{ route('orders.today') }}"
                class="nav-item nav-link {{ request()->routeIs('orders.today') ? 'active' : '' }}">
                <i class="fas fa-box me-2"></i>Todays Orders
            </a>
            <a href="{{ route('filter.index') }}"
                class="nav-item nav-link {{ request()->is('filter.index') ? 'active' : '' }}">
                <i class="fas fa-box me-2"></i>Content Filter Request
            </a>
            {{-- <a href="AllContentFilterRequest.html"
                class="nav-item nav-link {{ request()->is('AllContentFilterRequest.html') ? 'active' : '' }}">
                <i class="fas fa-box me-2"></i> Content Filter Request
            </a> --}}
            <a href="/account/admin/packages"
                class="nav-item nav-link {{ request()->is('account/admin/packages') ? 'active' : '' }}">
                <i class="fas fa-box me-2"></i>Packages
            </a>

            @if (auth('admin')->id() === 1)
                <a href="{{ route('admin.create') }}"
                    class="nav-item nav-link {{ request()->routeIs('admin.create') ? 'active' : '' }}">
                    <i class="fas fa-user-plus me-2"></i>Add Admin
                </a>
                <a href="{{ route('admin.list') }}"
                    class="nav-item nav-link {{ request()->routeIs('admin.list') ? 'active' : '' }}">
                    <i class="fas fa-users-cog me-2"></i>Manage Admins
                </a>
                {{-- <a href="{{ route('manage-site.index') }}"
                    class="nav-item nav-link {{ request()->routeIs('manage-site.index') ? 'active' : '' }}">
                    <i class="fas fa-cog me-2"></i>Manage Site
                </a> --}}
                <a href="{{ route('manage-site.index') }}"
                    class="nav-item nav-link {{ request()->routeIs('manage-site.index') ? 'active' : '' }}">
                    <i class="fas fa-cog me-2"></i>Manage Site
                </a>
                <a href="{{ route('manage-site.features') }}"
                    class="nav-item nav-link {{ request()->routeIs('manage-site.features') ? 'active' : '' }}">
                    <i class="fas fa-boxes me-2"></i>Manage Features
                </a>

                <a href="{{ route('manage-site.faqs') }}"
                    class="nav-item nav-link {{ request()->routeIs('manage-site.faqs') ? 'active' : '' }}">
                    <i class="fas fa-question-circle me-2"></i>Manage FAQs
                </a>
                <a href="{{ route('manage-site.testimonials') }}"
                    class="nav-item nav-link {{ request()->routeIs('manage-site.testimonials') ? 'active' : '' }}">
                    <i class="fas fa-quote-right me-2"></i>Manage Testimonials
                </a>
            @endif

        </div>

    </nav>
</div>
<!-- Sidebar End -->
