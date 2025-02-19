<x-d-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h6>Manage Features</h6>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFeatureModal">
                    Add New Feature Box
                </button>
            </div>

            <!-- Title Section -->
            <div class="mb-4">
                <form action="{{ route('manage-site.features.update-title') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label class="form-label">Main Title</label>
                                <input type="text" name="main_title" class="form-control"
                                    value="{{ $feature->main_title ?? '' }}" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label class="form-label">Highlight Text</label>
                                <input type="text" name="highlight_text" class="form-control"
                                    value="{{ $feature->highlight_text ?? '' }}" required>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary">Update Title</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Feature Boxes List -->
            <div class="table-responsive">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($boxes as $box)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $box['image']) }}" alt=""
                                        style="width: 48px; height: 48px; object-fit: contain;">
                                </td>
                                <td>{{ $box['title'] }}</td>
                                <td>{{ Str::limit($box['description'], 50) }}</td>
                                <td>{{ $box['order'] ?? 0 }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary edit-feature"
                                        data-feature="{{ json_encode($box) }}" data-bs-toggle="modal"
                                        data-bs-target="#editFeatureModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('manage-site.features.destroy', $box['id']) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Feature Modal -->
    <div class="modal fade" id="addFeatureModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content bg-secondary">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Feature Box</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('manage-site.features.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Icon (48x48px PNG)</label>
                            <input type="file" name="image" class="form-control" accept="image/png" required>
                            <small class="text-light">Recommended size: 48x48 pixels</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" class="form-control" value="0">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Feature</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Feature Modal -->
    <!-- Edit Feature Modal -->
    <div class="modal fade" id="editFeatureModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content bg-secondary">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Feature Box</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('manage-site.features.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="box_id" id="edit_box_id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Current Icon</label>
                            <div>
                                <img id="current_image" src="" alt=""
                                    style="width: 48px; height: 48px; object-fit: contain;">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">New Icon (48x48px PNG)</label>
                            <input type="file" name="image" class="form-control" accept="image/png">
                            <small class="text-light">Leave empty to keep current image</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" id="edit_title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="edit_description" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" id="edit_order" class="form-control"
                                value="0">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Feature</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.edit-feature').forEach(button => {
            button.addEventListener('click', function() {
                const feature = JSON.parse(this.dataset.feature);
                document.getElementById('edit_box_id').value = feature.id;
                document.getElementById('edit_title').value = feature.title;
                document.getElementById('edit_description').value = feature.description;
                document.getElementById('edit_order').value = feature.order || 0;
                document.getElementById('current_image').src = '/storage/' + feature.image;
            });
        });
    </script>

</x-d-layout>
