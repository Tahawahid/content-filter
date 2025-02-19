<x-c-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <!-- Remaining Tokens -->
            @if ($user_tokens > 0)
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-2">
                        <i class="fa fa-coins fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Remaining Tokens</p>
                            <h6 class="mb-0">{{ $user_tokens ?? '0' }}</h6>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Total Subscriptions -->
            @if (array_sum($status_counts) > 0)
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-2">
                        <i class="fa fa-chart-pie fa-3x text-info"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Subscriptions</p>
                            <h6 class="mb-0">{{ array_sum($status_counts) }}</h6>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Active Subscriptions -->
            @if (isset($status_counts['active']) && $status_counts['active'] > 0)
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-2">
                        <i class="fa fa-check-circle fa-3x text-success"></i>
                        <div class="ms-3">
                            <p class="mb-2">Active Subscriptions</p>
                            <h6 class="mb-0">{{ $status_counts['active'] ?? '0' }}</h6>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Pending Subscriptions -->
            @if (isset($status_counts['pending']) && $status_counts['pending'] > 0)
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-2">
                        <i class="fa fa-clock fa-3x text-warning"></i>
                        <div class="ms-3">
                            <p class="mb-2">Pending Subscriptions</p>
                            <h6 class="mb-0">{{ $status_counts['pending'] ?? '0' }}</h6>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Approved Subscriptions -->
            @if (isset($status_counts['approved']) && $status_counts['approved'] > 0)
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-2">
                        <i class="fa fa-thumbs-up fa-3x text-success"></i>
                        <div class="ms-3">
                            <p class="mb-2">Approved Subscriptions</p>
                            <h6 class="mb-0">{{ $status_counts['approved'] ?? '0' }}</h6>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Rejected Subscriptions -->
            @if (isset($status_counts['rejected']) && $status_counts['rejected'] > 0)
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-2">
                        <i class="fa fa-times-circle fa-3x text-danger"></i>
                        <div class="ms-3">
                            <p class="mb-2">Rejected Subscriptions</p>
                            <h6 class="mb-0">{{ $status_counts['rejected'] ?? '0' }}</h6>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Cancelled Subscriptions -->
            @if (isset($status_counts['cancelled']) && $status_counts['cancelled'] > 0)
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-2">
                        <i class="fa-solid fa-ban fa-3x text-dark"></i>
                        <div class="ms-3">
                            <p class="mb-2">Cancelled Subscriptions</p>
                            <h6 class="mb-0">{{ $status_counts['cancelled'] ?? '0' }}</h6>
                        </div>
                    </div>
                </div>
            @endif

            <!-- On-Hold Subscriptions -->
            @if (isset($status_counts['on-hold']) && $status_counts['on-hold'] > 0)
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-2">
                        <i class="fa fa-pause-circle fa-3x text-info"></i>
                        <div class="ms-3">
                            <p class="mb-2">On-Hold Subscriptions</p>
                            <h6 class="mb-0">{{ $status_counts['on-hold'] ?? '0' }}</h6>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="container-fluid pt-4 px-4">
        @if ($active_subscriptions->isNotEmpty())
            <div class="bg-secondary rounded p-5 shadow-lg">
                <div class="text-center">
                    <i class="fa fa-check-circle fa-4x text-success mb-4"></i>
                    <h3 class="text-success">Your Active Subscriptions</h3>

                    <div class="row mt-4">
                        @foreach ($active_subscriptions as $subscription)
                            <div class="col-md-4 mb-4">
                                <div class="card bg-dark text-white p-3 shadow-sm">
                                    <h5 class="text-primary">Package: {{ $subscription->package->name }}</h5>
                                    <p>Price: <strong>${{ number_format($subscription->price, 2) }}</strong></p>
                                    <p>Tokens: <strong>{{ $subscription->tokens }}</strong></p>
                                    <p>Remaining Tokens:
                                        <strong>{{ $subscription->userToken->remaining_tokens ?? '0' }}</strong>
                                    </p>
                                    <p>Purchase Date: <strong>{{ $subscription->created_at->format('Y-m-d') }}</strong>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="text-center">
                    <i class="fa fa-info-circle fa-4x text-primary mb-4"></i>
                    <h3 class="text-primary">No Active Subscription</h3>
                    <p class="text-white-50">Explore our packages to access exclusive features. Contact us if you need
                        assistance!</p>

                    <div class="mt-4">
                        <a href="{{ route('frontend.home') }}#pricing" class="btn btn-primary btn-lg me-2">View
                            Packages</a>
                        <a href="{{ route('frontend.contact') }}" class="btn btn-outline-primary btn-lg">Contact Us</a>
                    </div>
                </div>
        @endif
    </div>
    </div>

    <div class="container-fluid pt-4 px-4">
        @if ($pending_subscriptions->isNotEmpty())
            <div class="bg-secondary rounded p-5 shadow-lg">
                <div class="text-center">
                    <i class="fa fa-clock fa-4x text-warning mb-4"></i>
                    <h3 class="text-warning">Your Pending Subscriptions</h3>

                    <div class="row mt-4">
                        @foreach ($pending_subscriptions as $subscription)
                            <div class="col-md-4 mb-4">
                                <div class="card bg-dark text-white p-3 shadow-sm">
                                    <h5 class="text-warning">Package: {{ $subscription->package->name }}</h5>
                                    <p>Price: <strong>${{ number_format($subscription->price, 2) }}</strong></p>
                                    <p>Tokens: <strong>{{ $subscription->tokens }}</strong></p>
                                    <p>Status: <span class="badge bg-warning">Pending</span></p>
                                    <p>Submitted Date:
                                        <strong>{{ $subscription->created_at->format('Y-m-d') }}</strong>
                                    </p>
                                    <a href="{{ route('frontend.contact') }}" class="btn btn-warning mt-2">
                                        <i class="fa fa-question-circle me-2"></i>Inquire About Package
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif


        @if (isset($status_counts['approved']) && $status_counts['approved'] > 0)
            <div class="bg-secondary rounded p-5 shadow-lg">
                <div class="text-center">
                    <i class="fa fa-thumbs-up fa-4x text-success mb-4"></i>
                    <h3 class="text-success">Your Approved Subscriptions</h3>

                    <div class="row mt-4">
                        @foreach ($approved_subscriptions as $subscription)
                            <div class="col-md-4 mb-4">
                                <div class="card bg-dark text-white p-3 shadow-sm">
                                    <h5 class="text-success">Package: {{ $subscription->package->name }}</h5>
                                    <p>Price: <strong>${{ number_format($subscription->price, 2) }}</strong></p>
                                    <p>Tokens: <strong>{{ $subscription->tokens }}</strong></p>
                                    <p>Status: <span class="badge bg-success">Approved</span></p>
                                    <p>Approval Date: <strong>{{ $subscription->updated_at->format('Y-m-d') }}</strong>
                                    </p>
                                    <a href="{{ route('frontend.contact') }}" class="btn btn-primary mt-2">
                                        <i class="fa fa-question-circle me-2"></i>Inquire About Package
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- On-Hold Subscriptions Section -->

        @if (isset($status_counts['on-hold']) && $status_counts['on-hold'] > 0)
            <div class="bg-secondary rounded p-5 shadow-lg">
                <div class="text-center">
                    <i class="fa fa-pause-circle fa-4x text-info mb-4"></i>
                    <h3 class="text-info">Your On-Hold Subscriptions</h3>

                    <div class="row mt-4">
                        @foreach ($onhold_subscriptions as $subscription)
                            <div class="col-md-4 mb-4">
                                <div class="card bg-dark text-white p-3 shadow-sm">
                                    <h5 class="text-info">Package: {{ $subscription->package->name }}</h5>
                                    <p>Price: <strong>${{ number_format($subscription->price, 2) }}</strong></p>
                                    <p>Tokens: <strong>{{ $subscription->tokens }}</strong></p>
                                    <p>Status: <span class="badge bg-info">On Hold</span></p>
                                    <p>Hold Date: <strong>{{ $subscription->updated_at->format('Y-m-d') }}</strong>
                                    </p>
                                    <a href="{{ route('frontend.contact') }}" class="btn btn-info mt-2">Inqure
                                        About Package</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif


        <!-- Cancelled Subscriptions Section -->

        @if (isset($status_counts['cancelled']) && $status_counts['cancelled'] > 0)
            <div class="bg-secondary rounded p-5 shadow-lg">
                <div class="text-center">
                    <i class="fa fa-times-circle fa-4x text-light mb-4"></i>
                    <h3 class="text-light">Your Cancelled Subscriptions</h3>

                    <div class="row mt-4">
                        @foreach ($cancelled_subscriptions as $subscription)
                            <div class="col-md-4 mb-4">
                                <div class="card bg-dark text-white p-3 shadow-sm">
                                    <h5 class="text-light">Package: {{ $subscription->package->name }}</h5>
                                    <p>Price: <strong>${{ number_format($subscription->price, 2) }}</strong>
                                    </p>
                                    <p>Tokens: <strong>{{ $subscription->tokens }}</strong></p>
                                    <p>Status: <span class="badge bg-dark">Cancelled</span></p>
                                    <p>Cancellation Date:
                                        <strong>{{ $subscription->updated_at->format('Y-m-d') }}</strong>
                                    </p>
                                    <a href="{{ route('frontend.contact') }}" class="btn btn-light mt-2">Inqure
                                        About Package</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if (isset($status_counts['cancelled']) && $status_counts['cancelled'] > 0)
            <div class="bg-secondary rounded p-5 shadow-lg">
                <div class="text-center">
                    <i class="fa fa-times-circle fa-4x text-danger mb-4"></i>
                    <h3 class="text-danger">Your Rejected Subscriptions</h3>

                    <div class="row mt-4">
                        @foreach ($rejected_subscriptions as $subscription)
                            <div class="col-md-4 mb-4">
                                <div class="card bg-dark text-white p-3 shadow-sm">
                                    <h5 class="text-danger">Package: {{ $subscription->package->name }}
                                    </h5>
                                    <p>Price:
                                        <strong>${{ number_format($subscription->price, 2) }}</strong>
                                    </p>
                                    <p>Tokens: <strong>{{ $subscription->tokens }}</strong></p>
                                    <p>Status: <span class="badge bg-dark">Cancelled</span></p>
                                    <p>Cancellation Date:
                                        <strong>{{ $subscription->updated_at->format('Y-m-d') }}</strong>
                                    </p>
                                    <a href="{{ route('frontend.contact') }}" class="btn btn-danger mt-2">
                                        <i class="fa fa-question-circle me-2"></i>Contact Support
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>

</x-c-layout>
