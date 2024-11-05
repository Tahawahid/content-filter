<x-d-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded h-100 p-4 w-50">
            <h6 class="mb-4">Edit Package</h6>
            <form action="{{ route('packages.update', $package->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Package Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $package->name }}">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" id="price"
                        value="{{ $package->price }}">
                </div>
                <div class="mb-3">
                    <label for="token" class="form-label">Tokens</label>
                    <input type="number" name="token" class="form-control" id="token"
                        value="{{ $package->token }}">
                </div>
                <div class="mb-3">
                    <label for="token" class="form-label">Features</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="tabInput" placeholder="Enter list item">
                        <div class="input-group-append">
                            <a class="btn btn-primary" id="addTabBtn">Add</a>
                        </div>
                    </div>
                </div>
                <div id="tabsContainer" class="d-flex flex-wrap fw-bold"></div>
                <input type="hidden" name="features" id="featuresInput" value="{{ json_encode($package->features) }}">
                <button type="submit" class="btn btn-primary">Update Package</button>
            </form>

            <script>
                // Initialize features array from existing package
                let features = @json($package->features ?? []);

                // Display existing features
                function displayExistingFeatures() {
                    features.forEach(feature => {
                        addFeatureTab(feature);
                    });
                    updateFeaturesInput();
                }

                function addFeatureTab(text) {
                    const tab = document.createElement('div');
                    tab.className = 'alert alert-primary bg-primary text-white fw-bold alert-dismissible p-2 fade show me-2';
                    tab.role = 'alert';
                    tab.setAttribute('data-feature', text);
                    tab.innerHTML = `
                      ${text}
                      <a class="close text-danger cursor-pointer ms-3 font-18" style="cursor: pointer;" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </a>
                  `;

                    tab.querySelector('.close').addEventListener('click', function() {
                        const featureText = tab.getAttribute('data-feature');
                        features = features.filter(f => f !== featureText);
                        tab.remove();
                        updateFeaturesInput();
                    });

                    document.getElementById('tabsContainer').appendChild(tab);
                }

                document.getElementById('addTabBtn').addEventListener('click', function() {
                    const input = document.getElementById('tabInput');
                    const tabText = input.value.trim();

                    if (tabText) {
                        features.push(tabText);
                        addFeatureTab(tabText);
                        input.value = '';
                        updateFeaturesInput();
                    }
                });

                function updateFeaturesInput() {
                    document.getElementById('featuresInput').value = JSON.stringify(features);
                }

                // Display existing features when page loads
                displayExistingFeatures();
            </script>
        </div>
    </div>
</x-d-layout>
