<x-d-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">All Packages</h6>
                <div>
                    <a href="{{ route('packages.create') }}" class="btn btn-sm btn-primary">Add Package</a>
                </div>

            </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">
                                <input class="form-check-input" type="checkbox" />
                            </th>
                            <th scope="col">Date</th>
                            <th scope="col">Package Name</th>
                            <th scope="col">Token</th>
                            <th scope="col">Price</th>
                            <th scope="col">Features</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($packages as $package)
                            <tr>
                                <td><input class="form-check-input" type="checkbox" /></td>
                                <td>{{ $package->created_at->format('d M Y') }}</td>
                                <td>{{ $package->name }}</td>
                                <td>{{ $package->token }}</td>
                                <td>${{ number_format($package->price, 2) }}</td>
                                <td>
                                    @if (empty($package->features) || $package->features === 'null')
                                        No Features
                                    @else
                                        {{ is_array($package->features) ? implode(', ', $package->features) : $package->features }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('packages.edit', $package->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('packages.destroy', $package->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this package?')">
                                            Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No packages found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-d-layout>
