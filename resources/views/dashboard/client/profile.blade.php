<x-c-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h3 class="text-white mb-4">Profile Settings</h3>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4 text-center">
                    <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('assets/img/default_profile.jpg') }}"
                        class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;"
                        alt="Profile Picture">

                    <div class="mb-3">
                        <label for="profile_picture" class="form-label text-white">Profile Picture</label>
                        <input type="file" class="form-control" id="profile_picture" name="profile_picture"
                            accept="image/*">
                        @error('profile_picture')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label text-white">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $user->name) }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label text-white">Email</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="current_password" class="form-label text-white">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                            @error('current_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label text-white">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password">
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label text-white">Confirm New
                                Password</label>
                            <input type="password" class="form-control" id="new_password_confirmation"
                                name="new_password_confirmation">
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </form>

        </div>
    </div>
</x-c-layout>
