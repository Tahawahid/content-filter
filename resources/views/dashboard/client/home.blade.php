<x-c-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Remaning Tokens</p>
                        <h6 class="mb-0">{{ $user_tokens->remaining_tokens ?? 'N/A' }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Subscriptions</p>
                        <h6 class="mb-0">{{ $total_subscriptions }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Active Subscriptions</p>
                        <h6 class="mb-0">{{ $total_active_subscriptions }}</h6>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-clock fa-3x text-warning"></i>
                    <div class="ms-3">
                        <p class="mb-2">Pending Subscriptions</p>
                        <h6 class="mb-0">{{ $total_pending_subscriptions }}</h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-5 shadow-lg">
            @if ($pending_request)
                <!-- Pending Request Notification -->
                <div class="text-center">
                    <i class="fa fa-clock fa-4x text-warning mb-4"></i>
                    <h3 class="text-warning">Request Under Review</h3>
                    <p class="text-white-50">We are processing your request. Please keep an eye on your email and phone for confirmation.</p>
                </div>
    
            @elseif($active_subscriptions->isNotEmpty())
                <!-- Active Subscriptions List -->
                <div class="text-center">
                    <i class="fa fa-check-circle fa-4x text-success mb-4"></i>
                    <h3 class="text-success">Your Active Subscriptions</h3>
                    
                    <!-- Display each subscription in a card format for better readability -->
                    <div class="row mt-4">
                        @foreach ($active_subscriptions as $subscription)
                            <div class="col-md-6 mb-4">
                                <div class="card bg-dark text-white p-3 shadow-sm">
                                    <h5 class="text-primary">Package: {{ $subscription->package->name }}</h5>
                                    <p>Price: <strong>${{ number_format($subscription->price, 2) }}</strong></p>
                                    <p>Tokens: <strong>{{ $subscription->tokens }}</strong></p>
                                    <p>Remaining Tokens: <strong>{{ $user_tokens->remaining_tokens ?? 'N/A' }}</strong></p>
                                    <p>Purchase Date: <strong>{{ $subscription->created_at->format('Y-m-d') }}</strong></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
    
            @else
                <!-- No Subscription Message -->
                <div class="text-center">
                    <i class="fa fa-info-circle fa-4x text-primary mb-4"></i>
                    <h3 class="text-primary">No Active Subscription</h3>
                    <p class="text-white-50">Explore our packages to access exclusive features. Contact us if you need assistance!</p>
                    
                    <!-- Call-to-action buttons -->
                    <div class="mt-4">
                        <a href="{{ route('frontend.home') }}#pricing" class="btn btn-primary btn-lg me-2">View Packages</a>
                        <a href="{{ route('frontend.contact') }}" class="btn btn-outline-primary btn-lg">Contact Us</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    
</x-c-layout>
