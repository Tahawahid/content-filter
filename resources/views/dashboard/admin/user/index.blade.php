<x-d-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Users List</h6>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col" class="text-white">User Name</th>
                            <th scope="col" class="text-white">Email</th>
                            <th scope="col" class="text-white">Phone</th>
                            <th scope="col" class="text-white">Active Package</th>
                            <th scope="col" class="text-white">Remaining Tokens</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->userDetail->name ?? $user->name }}</td>
                                <td>{{ $user->userDetail->email ?? $user->email }}</td>
                                <td>{{ $user->userDetail->phone_number ?? 'N/A' }}</td>

                                {{-- Display the name of the active package if it exists --}}
                                <td>
                                    @if ($user->orders->isNotEmpty())
                                        {{ $user->orders->first()->package->name }}
                                    @else
                                        No Active Package
                                    @endif
                                </td>

                                {{-- Display the total remaining tokens --}}
                                <td>{{ $user->total_tokens ?? '0' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="mt-4">
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</x-d-layout>
