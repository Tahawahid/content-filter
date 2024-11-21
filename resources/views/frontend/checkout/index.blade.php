<x-layout>
    <div class="container my-5">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Checkout Information</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('checkout.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', auth()->user()->name) }}" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', auth()->user()->email) }}" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                                @error('city')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="state" class="form-label">State</label>
                                <input type="text" class="form-control" id="state" name="state" required>
                                @error('state')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" id="country" name="country" required>
                                @error('country')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="zipcode" class="form-label">Zipcode</label>
                                <input type="text" class="form-control" id="zipcode" name="zipcode" required>
                                @error('zipcode')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="payment_receipt" class="form-label">Payment Receipt URL</label>
                                <input type="url" class="form-control" id="payment_receipt" name="payment_receipt">
                                <div class="form-text text-info">
                                    Please upload your payment receipt to Google Drive or any cloud storage and share
                                    the view-only link. This helps us verify your payment quickly.
                                </div>
                                @error('payment_receipt')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="total" value="{{ $total }}">
                            <button type="submit" class="theme-btn">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Order Summary</h3>
                    </div>
                    <div class="card-body">
                        @foreach ($cartItems as $item)
                            <div class="d-flex justify-content-between mb-2">
                                <span>{{ $item['name'] }} </span>
                                <span>${{ $item['price'] }}</span>
                            </div>
                        @endforeach
                        <hr>
                        <div class="d-flex justify-content-between">
                            <strong>Total: </strong>
                            <strong>${{ $total }}</strong>
                        </div>

                        <div class="mt-4">
                            <h4>Payment Details</h4>
                            <div class="payment-info">
                                <p class="text-secondary"><strong>Bank Name:</strong> Meezan Bank</p>
                                <p class="text-secondary"><strong>Account Holder:</strong> MUHAMMAD OWAIS QURNI</p>
                                <p class="text-secondary"><strong>Account Number for Locals:</strong> 99780108468821</p>
                                <p class="text-secondary"><strong>Account Number for International:</strong>
                                    PK57MEZN0099780108468821</p>
                                {{-- <p class="text-secondary"><strong>SWIFT/BIC:</strong> XXXXXXXX</p> --}}
                                {{-- <div class="alert alert-info">
                                    Please include your Order ID in payment reference for faster verification.
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
