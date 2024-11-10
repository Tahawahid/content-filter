<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\UserToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $orders = Order::with(['userDetail', 'package'])
            ->latest()
            ->paginate(10);

        return view('dashboard.admin.order.index', compact('orders'));
    }

    // public function approve(Order $order)
    // {
    //     $order->update(['status' => 'approved']);

    //     $items = json_decode($order->items, true);
    //     $totalTokens = collect($items)->sum('tokens');

    //     UserToken::create([
    //         'user_id' => $order->user_id,
    //         'order_id' => $order->id,
    //         'tokens' => $totalTokens,
    //         'remaining_tokens' => $totalTokens
    //     ]);

    //     return back()->with('success', 'Order approved and tokens allocated successfully');
    // }

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
    public function show(Order $order)
    {
        $order->load(['user', 'package', 'userDetail']); // Load related models only if needed
        return view('dashboard.admin.order.show', compact('order'));
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
    public function update(Request $request, Order $order)
    {
        $status = $request->status;
        $order->update(['status' => $status]);

        if ($status === 'active') {

            UserToken::create([
                'user_id' => $order->user_id,
                'order_id' => $order->id,
                'token' => $order->tokens,
                'remaining_tokens' => $order->tokens,
            ]);
        }

        return back()->with('success', 'Order status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully');
    }
}
