<?php

namespace App\Http\Controllers;

use App\Models\contentFilter as ModelsContentFilter;
use App\Models\Order;
use App\Models\UserToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentFilter extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $activeOrders = Order::with('package')
            ->where('user_id', $user->id)
            ->where('status', 'active')
            ->get();

        $userTokens = UserToken::where('user_id', $user->id)
            ->where('remaining_tokens', '>', 0)
            ->get();

        return view('dashboard.client.filter_request.index', compact('activeOrders', 'userTokens'));
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
        $request->validate([
            'youtube_link' => 'required|url',
            'token_id' => 'required|exists:user_tokens,id'
        ]);

        $user = Auth::user();
        $userToken = UserToken::findOrFail($request->token_id);

        if ($userToken->remaining_tokens < 1) {
            return back()->with('error', 'Insufficient tokens');
        }

        // Create filter request
        ModelsContentFilter::create([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email,
            'youtube_link' => $request->youtube_link,
            'token_cost' => 1,
            'status' => 'pending'
        ]);

        // Deduct token
        $userToken->decrement('remaining_tokens', 1);

        return back()->with('success', 'Request submitted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $filterRequests = ModelsContentFilter::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('dashboard.client.filter_request.show', compact('filterRequests'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
