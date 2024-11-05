<x-d-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded h-100 p-4 w-50">
            <h6 class="mb-4">Add New Package</h6>
            <form action="{{ route('packages.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Package Name</label>
                    <input type="text" name="name" class="form-control" id="Gold Package"
                        aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" id="price" placeholder="$99">
                </div>
                <div class="mb-3">
                    <label for="token" class="form-label">Tokens</label>
                    <input type="number" name="token" class="form-control" id="price" placeholder="20">
                </div>
                <div class="mb-3">
                    <label for="token" class="form-label">Featues</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="tabInput" placeholder="Enter list item">
                        <div class="input-group-append">
                            <a class="btn btn-primary" id="addTabBtn">Add</a>
                        </div>
                    </div>
                </div>
                <div id="tabsContainer" class="d-flex flex-wrap fw-bold"></div>
                <input type="hidden" name="features" id="featuresInput">
                <button type="submit" class="btn btn-primary">Create Package</button>
            </form>
            <script>
                // Initialize features array
                let features = [];

                document.getElementById('addTabBtn').addEventListener('click', function() {
                    const input = document.getElementById('tabInput');
                    const tabText = input.value.trim();

                    if (tabText) {
                        // Add to features array
                        features.push(tabText);

                        const tab = document.createElement('div');
                        tab.className =
                            'alert alert-primary bg-primary text-white fw-bold alert-dismissible p-2 fade show me-2';
                        tab.role = 'alert';
                        tab.setAttribute('data-feature', tabText); // Add data attribute to identify feature
                        tab.innerHTML = `
                            ${tabText}
                            <a class="close text-danger cursor-pointer ms-3 font-18" style="cursor: pointer;" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        `;

                        // Add click event to remove the tab
                        tab.querySelector('.close').addEventListener('click', function() {
                            // Remove from features array
                            const featureText = tab.getAttribute('data-feature');
                            features = features.filter(f => f !== featureText);
                            tab.remove();
                            updateFeaturesInput();
                        });

                        document.getElementById('tabsContainer').appendChild(tab);
                        input.value = ''; // Clear the input

                        // Update hidden input
                        updateFeaturesInput();
                    }
                });

                function updateFeaturesInput() {
                    document.getElementById('featuresInput').value = JSON.stringify(features);
                }
            </script>
        </div>
    </div>
</x-d-layout>
