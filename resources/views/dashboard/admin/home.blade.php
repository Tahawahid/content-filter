<x-d-layout>
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Todays Order</p>
                        <h6 class="mb-0">{{ $todays_orders }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">All Orders</p>
                        <h6 class="mb-0">{{ $total_order }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Today Revenue</p>
                        <h6 class="mb-0">${{ $todays_revenue }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Revenue</p>
                        <h6 class="mb-0">${{ $total_revenue }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->

    <!-- Recent Order Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Recent Order</h6>
                <a href="{{ route('orders.index') }}">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Date</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Package</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Payment Receipt</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order['date'] }}</td>
                                <td>{{ $order['order'] }}</td>
                                <td>{{ $order['customer_name'] }}</td>
                                <td>{{ $order['phone'] }}</td>
                                <td>{{ $order['package'] }}</td>
                                <td>${{ $order['total'] }}</td>
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
                                    <span
                                        class="badge bg-{{ $order['status'] === 'approved' ? 'success' : ($order['status'] === 'pending' ? 'warning' : 'danger') }}">
                                        {{ ucfirst($order['status']) }}
                                    </span>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('orders.show', $order['id']) }}">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- Recent Sales End -->

    <!-- Recent Sales End -->
</x-d-layout>
