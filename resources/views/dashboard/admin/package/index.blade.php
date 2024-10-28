<x-d-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">All Packages</h6>
                <div>
                    <a href="{{ route('packages.create') }}" class="btn btn-sm btn-primary">Add Package</a>
                </div>

            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">
                                <input class="form-check-input" type="checkbox" />
                            </th>
                            <th scope="col">Date</th>
                            <th scope="col">Package Name</th>
                            <th scope="col">Token</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="form-check-input" type="checkbox" /></td>
                            <td>01 Jan 2045</td>
                            <td>Diamond</td>
                            <td>25</td>
                            <td>$123</td>
                            <td>Draft</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="">Edit</a>
                                <a class="btn btn-sm btn-danger" href="">Remove</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-d-layout>
