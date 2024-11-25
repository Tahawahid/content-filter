<x-d-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h3 class="mb-4">Edit Profile</h3>

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

            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Profile Picture</label>
                    <div class="d-flex align-items-center gap-3">
                        <img src="{{ auth('admin')->user()->profile_picture ? asset('storage/' . auth('admin')->user()->profile_picture) : asset('assets/img/default_profile.jpg') }}"
                            class="rounded-circle" width="100" height="100" alt="Profile Picture">
                        <input type="file" name="profile_picture" class="form-control bg-dark text-white">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control bg-dark text-white"
                        value="{{ auth('admin')->user()->name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control bg-dark text-white"
                        value="{{ auth('admin')->user()->email }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password" name="password" class="form-control bg-dark text-white">
                    <small class="text-muted">Leave blank to keep current password</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control bg-dark text-white">
                </div>

                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
    </div>
</x-d-layout>
