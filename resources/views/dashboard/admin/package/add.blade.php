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
                    <label for="descriotion" class="form-label">Description</label>
                    <textarea type="text" name="description" class="form-control" id="description"
                        placeholder="Add multiple list item seprated by ,(comma) e.g. 100+ Ads Integration,Blog style editor, ...., "></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</x-d-layout>
