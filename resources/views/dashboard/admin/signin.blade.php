@include('dashboard.admin.components.head')
<div class="container-fluid position-relative d-flex p-0">
    {{-- @include('dashboard.admin.components.spinner') --}}
    {{-- @include('frontend.components.preloader') --}}

    <!-- Sign In Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <a href="{{ route('frontend.home') }}" class="">
                            <img src="{{ asset('assets/img/LOGO-GRADIANT.png') }}" width="200px" alt="" />
                        </a>
                        <h3>Sign In</h3>
                    </div>
                    {{-- Display session messages --}}
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <form action="{{ route('dashboard.admin.login') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" id="floatingInput"
                                placeholder="name@example.com" value="{{ old('email') }}" />
                            <label for="floatingInput">Email address</label>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="floatingPassword"
                                placeholder="Password" />
                            <label for="floatingPassword">Password</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">
                            Sign In
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In End -->
</div>
@include('dashboard.admin.components.foot')
</body>

</html>
