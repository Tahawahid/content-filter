<x-c-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">Your Filter Requests</h3>
            </div>

            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col" class="text-white">Date</th>
                            <th scope="col" class="text-white">YouTube Link</th>
                            <th scope="col" class="text-white">Status</th>
                            <th scope="col" class="text-white">Token Cost</th>
                            <th scope="col" class="text-white">Reason</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($filterRequests as $request)
                            <tr>
                                <td>{{ $request->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ $request->youtube_link }}" target="_blank" class="text-primary">
                                        {{ Str::limit($request->youtube_link, 30) }}
                                    </a>
                                </td>
                                <td>
                                    <span
                                        class="badge bg-{{ $request->status === 'approved'
                                            ? 'success'
                                            : ($request->status === 'pending'
                                                ? 'warning'
                                                : ($request->status === 'processing'
                                                    ? 'info'
                                                    : 'danger')) }}">
                                        {{ ucfirst($request->status) }}
                                    </span>
                                </td>
                                <td>{{ $request->token_cost }} tokens</td>
                                <td>
                                    <div class="progress bg-dark position-relative" style="height: 25px;">
                                        <div class="progress-bar bg-{{ $request->status === 'approved'
                                            ? 'success'
                                            : ($request->status === 'pending'
                                                ? 'warning'
                                                : ($request->status === 'processing'
                                                    ? 'info'
                                                    : 'danger')) }}"
                                            role="progressbar" style="width: {{ $request->progress }}%"
                                            aria-valuenow="{{ $request->progress }}" aria-valuemin="0"
                                            aria-valuemax="100">
                                        </div>
                                        <span
                                            class="position-absolute d-flex align-items-center justify-content-center text-white w-100 h-100">
                                            {{ $request->progress }}%
                                        </span>
                                    </div>
                                </td>



                                <td>{{ $request->reason ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4 d-flex justify-content-center">
                    {{ $filterRequests->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</x-c-layout>
