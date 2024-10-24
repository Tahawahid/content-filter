@include('frontend.components.head')

<!-- Begin Headless page -->
<div id="headless-wrapper">

    <!-- Sing In Area Start -->
    <section class="sign-up-page bg-secondary">

        <img src="{{ asset('assets/img/hero-floating-img.png') }}" alt="footer-bg"
            class="footer-floating-bg-img theme-common-floating-bg-img position-absolute img-fluid">

        <div class="container-fluid p-0">
            <div class="row sign-up-page-wrap-row justify-content-center">
                <div class="col-md-6">
                    <div class="sign-up-right-content position-relative bg-white radius-10">
                        <form action="{{ route('frontend.userLogin') }}" method="POST">

                            @csrf
                            <div class="mb-25 sign-up-top-logo text-center">
                                <a href="/">
                                    <span class="logo-lg">
                                        <img src="assets/img/logo-dark.png" alt="">
                                    </span>
                                </a>
                            </div>

                            <h2 class="mb-25 font-bold">Log In</h2>

                            <p class="font-16 mb-30">Don’t have an account? <a href="{{ route('frontend.signUp') }}"
                                    class="color-hover font-medium">Sign up</a>
                            </p>
                            <div class="row mb-20">
                                @if (Session::has('success'))
                                    <div class="alert alert-success"> {{ Session::get('success') }} </div>
                                @endif

                                @if (Session::has('error'))
                                    <div class="alert alert-danger"> {{ Session::get('error') }} </div>
                                @endif
                            </div>
                            <div class="row mb-25">
                                <div class="col-md-12">
                                    <label class="label-text-title color-heading mb-2">Your Email</label>
                                    <input type="text" value="{{ old('email') }}" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="abraham@gmail.com">
                                </div>
                                @error('email')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row mb-25">
                                <div class="col-md-12">
                                    <label class="label-text-title color-heading mb-2">Your Password</label>
                                    <div class="form-group mb-0 position-relative">
                                        <input class="form-control password @error('password') is-invalid @enderror"
                                            name="password" id="password" placeholder="Enter your password"
                                            type="password">
                                        <span class="toggle cursor fas fa-eye pass-icon"></span>
                                    </div>
                                </div>
                                @error('password')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-25"><a href="account/forget-password"
                                        class="theme-link font-18 d-block text-start font-medium"
                                        title="Forgot password?">Forgot password?</a></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="theme-btn font-15 fw-bold" title="Log In">Log
                                        In</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sing In Area End -->

</div>
<!-- End Headless page -->


<x-foot>
</x-foot>
