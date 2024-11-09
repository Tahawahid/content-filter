<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Checkout Information</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('checkout.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', auth()->user()->name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', auth()->user()->email) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                            <div class="mb-3">
                                <label for="state" class="form-label">State</label>
                                <input type="text" class="form-control" id="state" name="state" required>
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" id="country" name="country" required>
                            </div>
                            <div class="mb-3">
                                <label for="zipcode" class="form-label">Zipcode</label>
                                <input type="text" class="form-control" id="zipcode" name="zipcode" required>
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
                                <span>{{ $item['name'] }}</span>
                                <span>${{ $item['price'] }}</span>
                            </div>
                        @endforeach
                        <hr>
                        <div class="d-flex justify-content-between">
                            <strong>Total:</strong>
                            <strong>${{ $total }}</strong>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
