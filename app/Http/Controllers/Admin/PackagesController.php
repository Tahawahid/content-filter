<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::latest()->get();
        return view('dashboard.admin.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.package.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'token' => 'required|integer',
            'features' => 'nullable'
        ]);

        // Decode the JSON string to array
        $features = json_decode($request->features, true) ?? [];

        Package::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'token' => $validated['token'],
            'features' => $features
        ]);

        return redirect()->route('packages.index')
            ->with('success', 'Package created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        return view('dashboard.admin.package.show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        return view('dashboard.admin.package.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'token' => 'required|integer',
            'features' => 'nullable'
        ]);

        // Decode the JSON string to array
        $features = json_decode($request->features, true) ?? [];

        $package->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'token' => $validated['token'],
            'features' => $features
        ]);

        return redirect()->route('packages.index')
            ->with('success', 'Package updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        $package->delete();

        return redirect()->route('packages.index')
            ->with('success', 'Package deleted successfully');
    }
}
