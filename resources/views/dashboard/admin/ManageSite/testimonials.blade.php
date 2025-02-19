<x-d-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h6>Manage Testimonials</h6>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTestimonialModal">
                    Add New Testimonial
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Client Name</th>
                            <th>Designation</th>
                            <th>Testimonial</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonials as $testimonial)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $testimonial->image) }}" alt=""
                                        style="width: 50px; height: 50px; object-fit: cover;" class="rounded-circle">
                                </td>
                                <td>{{ $testimonial->client_name }}</td>
                                <td>{{ $testimonial->designation }}</td>
                                <td>{{ Str::limit($testimonial->testimonial, 50) }}</td>
                                <td>{{ $testimonial->order }}</td>
                                <td>
                                    <span class="badge bg-{{ $testimonial->is_active ? 'success' : 'danger' }}">
                                        {{ $testimonial->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary edit-testimonial"
                                        data-testimonial="{{ $testimonial->toJson() }}" data-bs-toggle="modal"
                                        data-bs-target="#editTestimonialModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('manage-site.testimonials.destroy', $testimonial) }}"
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

    <!-- Add Testimonial Modal -->
    <div class="modal fade" id="addTestimonialModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content bg-secondary">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('manage-site.testimonials.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Client Image</label>
                            <input type="file" name="image" class="form-control bg-white" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Client Name</label>
                            <input type="text" name="client_name" class="form-control bg-white text-dark" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Designation</label>
                            <input type="text" name="designation" class="form-control bg-white text-dark" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Testimonial</label>
                            <textarea name="testimonial" class="form-control bg-white text-dark" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" class="form-control bg-white text-dark" value="0">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="is_active" class="form-check-input" checked>
                                <label class="form-check-label">Active</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Testimonial</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Testimonial Modal -->
    <div class="modal fade" id="editTestimonialModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content bg-secondary">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('manage-site.testimonials.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="testimonial_id" id="edit_testimonial_id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Client Image</label>
                            <input type="file" name="image" class="form-control bg-white" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Client Name</label>
                            <input type="text" name="client_name" id="edit_client_name"
                                class="form-control bg-white text-dark" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Designation</label>
                            <input type="text" name="designation" id="edit_designation"
                                class="form-control bg-white text-dark" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Testimonial</label>
                            <textarea name="testimonial" id="edit_testimonial" class="form-control bg-white text-dark" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" id="edit_order"
                                class="form-control bg-white text-dark">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="is_active" id="edit_is_active"
                                    class="form-check-input">
                                <label class="form-check-label">Active</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Testimonial</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.edit-testimonial').forEach(button => {
            button.addEventListener('click', function() {
                const testimonial = JSON.parse(this.dataset.testimonial);
                document.getElementById('edit_testimonial_id').value = testimonial.id;
                document.getElementById('edit_client_name').value = testimonial.client_name;
                document.getElementById('edit_designation').value = testimonial.designation;
                document.getElementById('edit_testimonial').value = testimonial.testimonial;
                document.getElementById('edit_order').value = testimonial.order;
                document.getElementById('edit_is_active').checked = testimonial.is_active;
            });
        });
    </script>
</x-d-layout>
