<x-layout>
    <x-preloader></x-preloader>
    <x-nav></x-nav>
    <div class="hero-area-top-part container my-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card bg-secondary">
                    <div class="card-header">
                        <h4 class="text-white">Shopping Cart</h4>
                    </div>
                    <div class="card-body">
                        @if (session('cart') && count(session('cart')) > 0)
                            <table class="table table-dark table-hover">
                                <thead>
                                    <tr>
                                        <th>Package Name</th>
                                        <th>Price</th>
                                        <th>Tokens</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $id => $details)
                                        <tr>
                                            <td>{{ $details['name'] }}</td>
                                            <td>${{ number_format($details['price'], 2) }}</td>
                                            <td>{{ number_format($details['tokens']) }}</td>
                                            <td>
                                                <form action="{{ route('cart.destroy', $id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="table-info">
                                        <td><strong>Total</strong></td>
                                        <td><strong>${{ number_format($total, 2) }}</strong></td>
                                        <td><strong>{{ number_format($totalTokens) }} tokens</strong></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <p class="text-white">Your cart is empty</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-secondary">
                    <div class="card-header">
                        <h4 class="text-white">Cart Summary</h4>
                    </div>
                    <div class="cart-summary p-3">
                        <h4 class="text-white">Cart Summary</h4>
                        <p class="text-white">Total Price: ${{ number_format($total, 2) }}</p>
                        <p class="text-white">Total Tokens: {{ $totalTokens }}</p>
                        @if (session('cart') && count(session('cart')) > 0)
                            <a href="{{ route('checkout.index') }}" class="theme-btn w-100">Proceed to Checkout</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-footer></x-footer>

</x-layout>
