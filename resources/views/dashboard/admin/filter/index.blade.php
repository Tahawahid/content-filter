<x-d-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Filter Requests</h6>
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
