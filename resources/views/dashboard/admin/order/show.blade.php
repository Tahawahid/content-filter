{{-- <x-d-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">Order Details</h3>
                <a href="{{ route('orders.index') }}" class="btn btn-primary">Back to Orders</a>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card bg-dark mb-4">
                        <div class="card-header">
                            <h5>Customer Information</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Name:</strong> {{ $order->userDetail->name ?? 'N/A' }}</p>
                            <p><strong>Email:</strong> {{ $order->userDetail->email ?? 'N/A' }}</p>
                            <p><strong>Phone:</strong> {{ $order->userDetail->phone_number ?? 'N/A' }}</p>
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
                                <tr>
                                    <td>{{ $order->package->name ?? 'N/A' }}</td>
                                    <td>{{ $order->package->token ?? 0 }}</td>
                                    <td>${{ $order->package->price ?? 0 }}</td>
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
</x-d-layout> --}}

<x-d-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">Order Details</h3>
                <a href="{{ route('orders.index') }}" class="btn btn-primary">Back to Orders</a>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card bg-dark mb-4">
                        <div class="card-header">
                            <h5>Customer Information</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Name:</strong> {{ $order->userDetail->name ?? 'N/A' }}</p>
                            <p><strong>Email:</strong> {{ $order->userDetail->email ?? 'N/A' }}</p>
                            <p><strong>Phone:</strong> {{ $order->userDetail->phone_number ?? 'N/A' }}</p>
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
                            <!-- Status Dropdown and Tokens/Price Inputs in the same form -->
                            <form action="{{ route('orders.update', $order->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <strong>Status:</strong>
                                    <select name="status" class="form-select form-select-sm">
                                        {{-- onchange="this.form.submit()" --}}
                                        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="approved" {{ $order->status === 'approved' ? 'selected' : '' }}>
                                            Approved</option>
                                        <option value="active" {{ $order->status === 'active' ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="rejected" {{ $order->status === 'rejected' ? 'selected' : '' }}>
                                            Rejected</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <strong>Tokens:</strong>
                                    <input type="number" name="tokens"
                                        class="form-control form-control-sm border border-white"
                                        value="{{ $order->tokens }}" min="1" required>
                                </div>

                                <div class="mb-3">
                                    <strong>Price:</strong>
                                    <input type="number" name="price"
                                        class="form-control form-control-sm border border-white"
                                        value="{{ $order->total }}" min="0" step="0.01" required>
                                </div>

                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                            </form>
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
                                <tr>
                                    <td>{{ $order->package->name ?? 'N/A' }}</td>
                                    <td>{{ $order->package->token ?? 0 }}</td>
                                    <td>${{ $order->package->price ?? 0 }}</td>
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
