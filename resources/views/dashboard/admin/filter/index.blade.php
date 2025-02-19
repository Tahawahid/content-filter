<x-d-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                {{-- <h6 class="mb-0">Filter Requests</h6> --}}
                <h6 class="mb-0">Filter Requests</h6>
                <!-- Search Bar -->
                <div class="d-flex align-items-center">
                    <form action="{{ route('filter.index') }}" method="GET" class="d-flex me-3">
                        <input type="text" name="search" class="form-control bg-dark border-0 text-white"
                            placeholder="Search requests..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary ms-2">Search</button>
                    </form>
                </div>
            </div>

            <!-- Filters Row -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <form action="{{ route('filter.index') }}" method="GET" class="d-flex gap-2">
                    <!-- Date Filter -->
                    <select name="date" class="form-select bg-dark border-0 text-white">
                        <option value="">All Dates</option>
                        <option value="today" {{ request('date') == 'today' ? 'selected' : '' }}>Today</option>
                        <option value="week" {{ request('date') == 'week' ? 'selected' : '' }}>This Week</option>
                        <option value="month" {{ request('date') == 'month' ? 'selected' : '' }}>This Month</option>
                    </select>

                    <!-- Status Filter -->
                    <select name="status" class="form-select bg-dark border-0 text-white">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Processing
                        </option>
                        <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved
                        </option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected
                        </option>
                    </select>

                    <!-- Progress Filter -->
                    <select name="progress" class="form-select bg-dark border-0 text-white">
                        <option value="">All Progress</option>
                        <option value="0" {{ request('progress') == '0' ? 'selected' : '' }}>Not Started (0%)
                        </option>
                        <option value="1-50" {{ request('progress') == '1-50' ? 'selected' : '' }}>In Progress
                            (1-50%)</option>
                        <option value="51-99" {{ request('progress') == '51-99' ? 'selected' : '' }}>Almost Done
                            (51-99%)</option>
                        <option value="100" {{ request('progress') == '100' ? 'selected' : '' }}>Completed (100%)
                        </option>
                    </select>

                    <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
                    <a href="{{ route('filter.index') }}" class="btn btn-secondary">Reset</a>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Date</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">YouTube Link</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $request)
                            <tr>
                                <td>{{ $request->created_at->format('d M Y') }}</td>
                                <td>{{ $request->user_name }}</td>
                                <td>{{ $request->user_email }}</td>
                                <td><a href="{{ $request->youtube_link }}" target="_blank" class="text-primary">
                                        {{ Str::limit($request->youtube_link, 30) }}
                                    </a></td>
                                <td>
                                    <span
                                        class="badge bg-{{ $request->status === 'approved' ? 'success' : ($request->status === 'pending' ? 'warning' : 'danger') }}">
                                        {{ ucfirst($request->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('filter.show', $request->id) }}"
                                        class="btn btn-sm btn-info">Details</a>
                                    <button onclick="deleteRequest({{ $request->id }})"
                                        class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4 d-flex justify-content-center">
                {{ $requests->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
</x-d-layout>
