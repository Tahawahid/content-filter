<x-d-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">Order Details</h3>
                <a href=" {{ route('orders.index') }} " class="btn btn-primary">Back to Orders</a>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card bg-dark mb-4">
                        <div class="card-header">
                            <h5>Customer Information</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Name:</strong> {{ $order->name }}</p>
                            <p><strong>Email:</strong> {{ $order->email }}</p>
                            <p><strong>Phone:</strong> {{ $order->phone }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card bg-dark mb-4">
                        <div class="card-header">
                            <h5>Order Information</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Order ID:</strong> #{{ $order->id }}</p>
                            <p><strong>Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
                            <p><strong>Status:</strong> {{ $order->status }}</p>
                            <p><strong>Total Amount:</strong> ${{ $order->total }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card bg-dark">
                <div class="card-header">
                    <h5>Package Details</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Package Name</th>
                                    <th>Tokens</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $items = json_decode($order->items, true) ?? [];
                                    $firstItem = !empty($items)
                                        ? current($items)
                                        : ['name' => 'N/A', 'tokens' => 0, 'price' => 0];
                                @endphp
                                <tr>
                                    <td>{{ $firstItem['name'] }}</td>
                                    <td>{{ $firstItem['tokens'] }}</td>
                                    <td>${{ $firstItem['price'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @if ($order->status === 'pending')
                <div class="mt-4">
                    <form action="{{ route('orders.update', $order->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="active">
                        <button type="submit" class="btn btn-success">Approve Order</button>
                    </form>

                    <form action="{{ route('orders.update', $order->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="rejected">
                        <button type="submit" class="btn btn-danger ms-2">Reject Order</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-d-layout>
