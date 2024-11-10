{{-- <div class="cart-sidebar" id="cartSidebar">
    <div class="cart-header">
        <h4>Shopping Cart</h4>
        <button class="close-cart" onclick="toggleCart()">×</button>
    </div>
    <div class="cart-items">
        @if (session('cart') && count(session('cart')) > 0)
            @foreach (session('cart') as $id => $details)
                <div class="cart-item">
                    <div class="item-details">
                        <h5>{{ $details['name'] }}</h5>
                        <p>${{ $details['price'] }}</p>
                        <span>Quantity: {{ $details['quantity'] }}</span>
                    </div>
                </div>
            @endforeach
            <div class="cart-total">
                <h5>Total: ${{ session('cart_total') ?? 0 }}</h5>
                <a href="{{ route('cart.index') }}" class="theme-btn w-100">View Cart</a>
            </div>
        @else
            <p>Your cart is empty</p>
        @endif
    </div>
</div> --}}

{{-- <div class="cart-sidebar" id="cartSidebar">
    <div class="cart-header">
        <h4>Shopping Cart</h4>
        <button class="close-cart" onclick="toggleCart()">×</button>
    </div>
    <div class="cart-items">
        @if (session('cart') && count(session('cart')) > 0)
            @foreach (session('cart') as $id => $details)
                <div class="cart-item">
                    <div class="item-details">
                        <h5>{{ $details['name'] }}</h5>
                        <p>${{ $details['price'] }}</p>
                        <div class="quantity-controls">
                            <button class="quantity-btn" onclick="updateQuantity('{{ $id }}', -1)">-</button>
                            <span>{{ $details['quantity'] }}</span>
                            <button class="quantity-btn" onclick="updateQuantity('{{ $id }}', 1)">+</button>
                            <button class="remove-btn" onclick="removeItem('{{ $id }}')">Remove</button>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="cart-total">
                <h5>Total: ${{ session('cart_total') ?? 0 }}</h5>
                <a href="{{ route('cart.index') }}" class="theme-btn w-100">View Cart</a>
            </div>
        @else
            <p>Your cart is empty</p>
        @endif
    </div>
</div> --}}

<div class="cart-sidebar" id="cartSidebar">
    <div class="cart-header">
        <h4>Shopping Cart</h4>
        <button class="close-cart" onclick="toggleCart()">×</button>
    </div>
    <div class="cart-items">
        @if (session('cart') && count(session('cart')) > 0)
            @foreach (session('cart') as $id => $details)
                <div class="cart-item" data-id="{{ $id }}">
                    <div class="item-details">
                        <h5>{{ $details['name'] }}</h5>
                        <p>${{ $details['price'] }}</p>
                        <button class="remove-btn" onclick="removeItem('{{ $id }}')">Remove</button>
                    </div>
                </div>
            @endforeach
            <div class="cart-total">
                <h5>Total: ${{ session('cart_total') ?? 0 }}</h5>
                <a href="{{ route('cart.index') }}" class="theme-btn w-100">View Cart</a>
            </div>
        @else
            <p>Your cart is empty</p>
        @endif
    </div>
</div>
