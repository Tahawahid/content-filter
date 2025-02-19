<x-d-layout>
    <div class="container-fluid pt-4 px-4">
        {{-- Manage Banner Section --}}
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Banner Section</h6>
                    <form action="{{ route('manage-site.banner.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="main_text" class="form-label">Main Text</label>
                            <textarea class="form-control" id="main_text" name="main_text" rows="3">{{ $banner->main_text ?? '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="special_text" class="form-label">Special Text (Highlighted)</label>
                            <input type="text" class="form-control" id="special_text" name="special_text"
                                value="{{ $banner->special_text ?? '' }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Banner</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="bg-secondary rounded h-100 p-4 mt-4">
            <h6 class="mb-4">Brand Section</h6>
            <form action="{{ route('manage-site.brand.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="main_text" class="form-label">Main Text</label>
                    <input type="text" class="form-control" id="main_text" name="main_text"
                        value="{{ $brand->main_text ?? '' }}">
                </div>
                <div class="mb-3">
                    <label for="special_text" class="form-label">Special Text</label>
                    <input type="text" class="form-control" id="special_text" name="special_text"
                        value="{{ $brand->special_text ?? '' }}">
                </div>
                <div class="mb-3">
                    <label for="images" class="form-label">Brand Images</label>
                    <input type="file" class="form-control" id="images" name="images[]" multiple>
                </div>
                <button type="submit" class="btn btn-primary">Update Brand Section</button>
            </form>
        </div>
        {{-- Manage Banner Section Ends --}}
        {{-- Manage Brand Images --}}
        <div class="bg-secondary rounded p-4 mt-4">
            <h6 class="mb-4">Manage Brand Images</h6>
            <div class="table-responsive">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($brand && $brand->images)
                            @foreach ($brand->images as $index => $image)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $image) }}"
                                            style="width: 100px; height: 60px; object-fit: contain;">
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <label class="btn btn-sm btn-primary me-2" title="Replace Image">
                                                <i class="fas fa-upload"></i>
                                                <input type="file" class="d-none replace-image"
                                                    data-index="{{ $index }}"
                                                    data-url="{{ route('manage-site.brand.replace-image') }}">
                                            </label>
                                            <button type="button" class="btn btn-sm btn-danger remove-image"
                                                data-index="{{ $index }}"
                                                data-url="{{ route('manage-site.brand.remove-image') }}"
                                                title="Remove Image">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        {{-- End Replace and Delete Image Section --}}
        {{-- How it works Section --}}
        <div class="bg-secondary rounded h-100 p-4 mt-4">
            <h6 class="mb-4">How It Works Section</h6>
            <form action="{{ route('manage-site.how-it-works.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Main Title</label>
                    <input type="text" class="form-control bg-white text-dark border" name="main_title"
                        value="{{ $howItWorks->main_title ?? 'How It' }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Highlight Text</label>
                    <input type="text" class="form-control bg-white text-dark border" name="highlight_text"
                        value="{{ $howItWorks->highlight_text ?? 'Works' }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">YouTube Video URL</label>
                    <input type="url" class="form-control bg-white text-dark border" name="video_url"
                        value="{{ $howItWorks->video_url ?? '' }}" placeholder="https://www.youtube.com/watch?v=...">
                    <small class="text-light">Enter full YouTube video URL</small>
                </div>
                <button type="submit" class="btn btn-primary">Update Section</button>
            </form>
        </div>

        {{-- Ends How it  works Section --}}
        <script>
            document.querySelectorAll('.replace-image').forEach(input => {
                input.addEventListener('change', function() {
                    const formData = new FormData();
                    formData.append('new_image', this.files[0]);
                    formData.append('index', this.dataset.index);
                    formData.append('_token', '{{ csrf_token() }}');

                    fetch(this.dataset.url, {
                        method: 'POST',
                        body: formData
                    }).then(response => window.location.reload());
                });
            });

            document.querySelectorAll('.remove-image').forEach(button => {
                button.addEventListener('click', function() {
                    if (confirm('Are you sure you want to remove this image?')) {
                        const formData = new FormData();
                        formData.append('index', this.dataset.index);
                        formData.append('_token', '{{ csrf_token() }}');

                        fetch(this.dataset.url, {
                            method: 'POST',
                            body: formData
                        }).then(response => window.location.reload());
                    }
                });
            });
        </script>
    </div>
</x-d-layout>
