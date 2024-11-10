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
        <div class="bg-secondary rounded p-4">
            @if ($pending_request)
                <div class="text-center">
                    <i class="fa fa-clock fa-4x text-warning mb-3"></i>
                    <h4>Your Request is Under Review</h4>
                    <p>Please wait for the confirmation email and call. We'll process your request shortly.</p>
                </div>
            @elseif($active_subscriptions->isNotEmpty())
                <div class="text-center">
                    <i class="fa fa-check-circle fa-4x text-success mb-3"></i>
                    <h4>Active Subscriptions</h4>

                    @foreach ($active_subscriptions as $subscription)
                        <div class="mb-3">
                            <p>Package Name: {{ $subscription->package->name }}</p>
                            <p>Price: ${{ $subscription->price }}</p>
                            <p>Tokens: {{ $subscription->tokens }}</p>
                            <p>Remaining Tokens: {{ $user_tokens->remaining_tokens ?? 'N/A' }}</p>
                            <p>Purchase Date: {{ $subscription->created_at->format('Y-m-d') }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center">
                    <i class="fa fa-info-circle fa-4x text-primary mb-3"></i>
                    <h4>No Active Subscription</h4>
                    <p>To access our services, please choose one of our packages or contact us for assistance.</p>
                    <div class="mt-4">
                        <a href="{{ route('frontend.home') }}#pricing" class="btn btn-primary me-2">View Packages</a>
                        <a href="{{ route('frontend.contact') }}" class="btn btn-outline-primary">Contact Us</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-c-layout>
