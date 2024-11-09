<x-d-layout>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Orders</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Total</th>
                                <th>Tokens</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>${{ $order->total }}</td>
                                    <td>{{ collect(json_decode($order->items, true))->sum('tokens') }}</td>
                                    <td>{{ ucfirst($order->status) }}</td>
                                    <td>
                                        @if ($order->status === 'pending')
                                            <form action="{{ route('orders.update', $order->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="active">
                                                <button type="submit" class="btn btn-success">Approve Order</button>
                                            </form>
                                            <form action="{{ route('orders.update', $order->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit" class="btn btn-danger ms-2">Reject Order</button>
                                            </form>
                                            <a href="{{ route('orders.show', $order->id) }}"
                                                class="btn btn-primary ms-2">View</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</x-d-layout>
