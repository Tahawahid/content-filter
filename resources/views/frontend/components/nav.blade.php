<!--Main Menu/Navbar Area Start -->

<section class="menu-section-area home-2">
    <!-- Navigation -->
    <nav class="navbar sticky-header navbar-expand-lg" aria-label="Dark offcanvas navbar" id="mainNav">
        <div class="container">
            <a class="navbar-brand mobile-navbar-brand" href="index.html">
                <img class="img-fluid" src="{{ asset('assets/img/home2-logo.png') }}" alt="AiLand">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbarDark" aria-controls="offcanvasNavbarDark">
                <span class="iconify" data-icon="heroicons-outline:menu"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarDark"
                aria-labelledby="offcanvasNavbarDarkLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarDarkLabel"><img class="img-fluid"
                            src="{{ asset('assets/img/home2-logo-dark.png') }}" alt="AiLand"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="col-md-2">
                        <a class="navbar-brand desktop-navbar-brand" href="/">
                            <img class="img-fluid" src="{{ asset('assets/img/home2-logo.png') }}" alt="AiLand">
                        </a>
                    </div>
                    <ul class="navbar-nav mb-2 mb-lg-0 col-md-7 navbar-nav-middle">
                        <li class="nav-item dropdown">
                            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                        </li>
                        <li class="nav-item">
                            <x-nav-link href="#feature" :active="request()->is('#feature')">Features</x-nav-link>

                        </li>
                        <li class="nav-item">
                            <x-nav-link href="#how-it-works" :active="request()->is('#how-it-works')">How Works</x-nav-link>

                        </li>
                        <li class="nav-item">
                            <x-nav-link href="#pricing" :active="request()->is('#pricing')">Pricing</x-nav-link>

                        </li>
                        <li class="nav-item">
                            <x-nav-link href="#faqs" :active="request()->is('#faqs')">Faqs</x-nav-link>

                        </li>
                        <li class="nav-item">
                            <x-nav-link href="/contact-us" :active="request()->is('/contact-us')">Contact Us</x-nav-link>

                        </li>
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0 col-md-3 navbar-nav-right">
                        <li class="nav-item">
                            <x-nav-link href="/sign-up" :active="request()->is('/sign-up')">Sign-up</x-nav-link>
                        </li>
                        <li class="nav-item">
                            <x-nav-link href="/sign-in" :active="request()->is('/sign-in')" isButton="true">Login</x-nav-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navigation -->
</section>
<!--Main Menu/Navbar Area End -->
