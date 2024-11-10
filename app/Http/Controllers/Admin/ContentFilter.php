<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\contentFilter as ModelsContentFilter;
use Illuminate\Http\Request;

class ContentFilter extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = ModelsContentFilter::with('user')
            ->latest()
            ->paginate(10);

        return view('dashboard.admin.filter.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $request = ModelsContentFilter::findOrFail($id);
        return view('dashboard.admin.filter.show', compact('request'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $filterRequest = ModelsContentFilter::findOrFail($id);

        $filterRequest->update([
            'status' => $request->status,
            'reason' => $request->reason
        ]);

        return redirect()->back()->with('success', 'Request updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ModelsContentFilter::findOrFail($id)->delete();
        return redirect()->route('filters.index')->with('success', 'Request deleted successfully');
    }
}
