<x-d-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h6 class="mb-0">Request Details</h6>
                <a href="{{ route('filter.index') }}" class="btn btn-primary">Back to List</a>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="bg-dark rounded p-4">
                        <form action="{{ route('filter.update', $request->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">User Name</label>
                                <input type="text" class="form-control" value="{{ $request->user_name }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{ $request->user_email }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">YouTube Link</label>
                                <input type="url" class="form-control" value="{{ $request->youtube_link }}"
                                    readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="pending" {{ $request->status === 'pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="processing"
                                        {{ $request->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="approved" {{ $request->status === 'approved' ? 'selected' : '' }}>
                                        Approved</option>
                                    <option value="rejected" {{ $request->status === 'rejected' ? 'selected' : '' }}>
                                        Rejected</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Progress</label>
                                <input type="number" name="progress" class="form-control" min="0" max="100"
                                    value="{{ $request->progress }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Reason</label>
                                <textarea name="reason" class="form-control" rows="3">{{ $request->reason }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Request</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-d-layout>
