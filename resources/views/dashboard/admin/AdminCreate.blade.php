<x-d-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h3 class="mb-4">Add New Admin</h3>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Admin Name</label>
                    <input type="text" name="name" class="form-control bg-dark text-white" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control bg-dark text-white" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control bg-dark text-white" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control bg-dark text-white"
                        required>
                </div>

                <button type="submit" class="btn btn-primary">Create Admin</button>
            </form>
        </div>
    </div>
</x-d-layout>
