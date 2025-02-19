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
    // public function index()
    // {
    //     $requests = ModelsContentFilter::with('user')
    //         ->latest()
    //         ->paginate(10);

    //     return view('dashboard.admin.filter.index', compact('requests'));
    // }

    public function index(Request $request)
    {
        $query = ModelsContentFilter::query();

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('user_name', 'like', "%{$search}%")
                    ->orWhere('user_email', 'like', "%{$search}%")
                    ->orWhere('youtube_link', 'like', "%{$search}%");
            });
        }

        // Date filter
        if ($request->has('date')) {
            switch ($request->date) {
                case 'today':
                    $query->whereDate('created_at', today());
                    break;
                case 'week':
                    $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                    break;
                case 'month':
                    $query->whereMonth('created_at', now()->month);
                    break;
            }
        }

        // Status filter
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        // Progress filter
        if ($request->has('progress')) {
            switch ($request->progress) {
                case '0':
                    $query->where('progress', 0);
                    break;
                case '1-50':
                    $query->whereBetween('progress', [1, 50]);
                    break;
                case '51-99':
                    $query->whereBetween('progress', [51, 99]);
                    break;
                case '100':
                    $query->where('progress', 100);
                    break;
            }
        }

        $requests = $query->latest()->paginate(10);
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
            'reason' => $request->reason,
            'progress' => $request->progress
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
