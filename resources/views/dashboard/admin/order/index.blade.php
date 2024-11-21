<x-d-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">All Orders</h6>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Date</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Phone</th>
                            {{-- <th scope="col">Email</th> --}}
                            <th scope="col">Package</th>
                            <th scope="col">Tokens</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Payment Receipt</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->created_at->format('d M Y') }}</td>
                                <td>ORD-{{ $order->id }}</td>
                                <td>{{ $order->userDetail->name ?? 'N/A' }}</td>
                                <td>{{ $order->userDetail->phone_number }}</td>
                                {{-- <td>{{ $order->userDetail->email }}</td> --}}
                                <td>{{ $order->package->name }}</td>
                                <td>{{ $order->tokens }}</td>
                                <td>${{ $order->total }}</td>
                                <td>
                                    @if ($order['payment_receipt'])
                                        <a href="{{ asset($order['payment_receipt']) }}" target="_blank"
                                            class="btn btn-sm btn-info">
                                            View Receipt
                                        </a>
                                    @else
                                        No Receipt
                                    @endif
                                </td>
                                <td>
                                    <select class="form-select bg-dark text-white status-select"
                                        data-order-id="{{ $order->id }}" onchange="updateStatus(this)">
                                        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="approved" {{ $order->status === 'approved' ? 'selected' : '' }}>
                                            Approved</option>
                                        <option value="rejected" {{ $order->status === 'rejected' ? 'selected' : '' }}>
                                            Rejected</option>
                                        <option value="approved" {{ $order->status === 'on-hold' ? 'selected' : '' }}>
                                            On Hold</option>
                                        <option value="approved" {{ $order->status === 'active' ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="pending" {{ $order->status === 'cancelled' ? 'selected' : '' }}>
                                            Cancelled</option>
                                    </select>
                                </td>
                                <td>
                                    <a href="{{ route('orders.show', $order->id) }}"
                                        class="btn btn-sm btn-info">View</a>
                                    <button onclick="deleteOrder({{ $order->id }})"
                                        class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $orders->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function updateStatus(select) {
                const orderId = select.dataset.orderId;
                const status = select.value;

                fetch(`/admin/orders/${orderId}/status`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            status
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            toastr.success('Order status updated successfully');
                        }
                    })
                    .catch(error => {
                        toastr.error('Failed to update order status');
                    });
            }

            function deleteOrder(orderId) {
                if (confirm('Are you sure you want to delete this order?')) {
                    fetch(`/admin/orders/${orderId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                toastr.success('Order deleted successfully');
                                location.reload();
                            }
                        })
                        .catch(error => {
                            toastr.error('Failed to delete order');
                        });
                }
            }
        </script>
    @endpush
</x-d-layout>


<script>
    function updateStatus(selectElement) {
        const orderId = selectElement.getAttribute('data-order-id');
        const selectedStatus = selectElement.value;

        fetch(`/account/admin/orders/${orderId}/status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    status: selectedStatus
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Status updated successfully');
                } else {
                    alert('Failed to update status');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating status');
            });
    }
</script>
