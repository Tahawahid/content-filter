<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\UserToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {

    //     $orders = Order::with(['userDetail', 'package'])
    //         ->latest()
    //         ->paginate(10);

    //     return view('dashboard.admin.order.index', compact('orders'));
    // }

    public function index(Request $request)
    {
        $query = Order::with(['userDetail', 'package']);

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('userDetail', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('phone_number', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

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

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $orders = $query->latest()->paginate(10);
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
    // public function update(Request $request, Order $order)
    // {
    //     $status = $request->status;
    //     $order->update(['status' => $status]);

    //     if ($status === 'active') {

    //         UserToken::create([
    //             'user_id' => $order->user_id,
    //             'order_id' => $order->id,
    //             'token' => $order->tokens,
    //             'remaining_tokens' => $order->tokens,
    //         ]);
    //     }

    //     return back()->with('success', 'Order status updated successfully');
    // }

    // public function update(Request $request, Order $order)
    // {
    //     // Validate input
    //     $request->validate([
    //         'status' => 'required|string|in:pending,approved,active,rejected,on-hold,cancelled',
    //         'tokens' => 'nullable|integer|min:0',
    //         'price' => 'nullable|numeric|min:0',
    //     ]);

    //     // Update the status if it's provided
    //     if ($request->has('status')) {
    //         $order->update(['status' => $request->status]);
    //     }

    //     // Update tokens and price if provided
    //     if ($request->has('tokens')) {
    //         $order->update(['tokens' => $request->tokens]);
    //     }

    //     if ($request->has('price')) {
    //         $order->update(['total' => $request->price]);
    //     }

    //     // Check if the status is 'active' and handle the UserToken
    //     if ($request->status === 'active') {
    //         // Check if a UserToken already exists for this user and order
    //         $userToken = UserToken::where('user_id', $order->user_id)
    //             ->where('order_id', $order->id)
    //             ->first();

    //         if (!$userToken) {
    //             // If the UserToken doesn't exist, create a new one
    //             UserToken::create([
    //                 'user_id' => $order->user_id,
    //                 'order_id' => $order->id,
    //                 'token' => $order->tokens,
    //                 'remaining_tokens' => $order->tokens,
    //             ]);
    //         } else {
    //             // If the UserToken exists, update it with the new token count
    //             $userToken->update([
    //                 'token' => $order->tokens,
    //                 'remaining_tokens' => $order->tokens,
    //             ]);
    //         }
    //     }
    // }

    public function update(Request $request, Order $order)
    {
        // Validate input
        $request->validate([
            'status' => 'required|string|in:pending,approved,active,rejected,on-hold,cancelled',
            'tokens' => 'nullable|integer|min:0',
            'price' => 'nullable|numeric|min:0',
        ]);

        // Begin transaction to prevent partial updates
        DB::beginTransaction();

        try {
            // Update the status if it's provided
            if ($request->has('status')) {
                $order->update(['status' => $request->status]);
            }

            // Update tokens and price if provided
            if ($request->has('tokens')) {
                $order->update(['tokens' => $request->tokens]);
            }

            if ($request->has('price')) {
                $order->update(['total' => $request->price]);
            }

            // Check if the status is 'active' and handle the UserToken
            if ($request->status === 'active') {
                // Check if a UserToken already exists for this user and order
                $userToken = UserToken::where('user_id', $order->user_id)
                    ->where('order_id', $order->id)
                    ->first();

                if (!$userToken) {
                    // If the UserToken doesn't exist, create a new one
                    UserToken::create([
                        'user_id' => $order->user_id,
                        'order_id' => $order->id,
                        'token' => $order->tokens,
                        'remaining_tokens' => $order->tokens,
                    ]);
                } else {
                    // If the UserToken exists, update it with the new token count
                    $userToken->update([
                        'token' => $order->tokens,
                        'remaining_tokens' => $order->tokens,
                    ]);
                }
            }

            // Commit the transaction if everything is fine
            DB::commit();

            return back()->with('success', 'Order updated successfully');
        } catch (\Exception $e) {
            // Rollback the transaction if there's an error
            DB::rollBack();

            // Log the error message
            Log::error('Order update failed: ' . $e->getMessage());

            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully');
    }


    public function updateStatus(Request $request, $id)
    {
        $updated = DB::table('orders')
            ->where('id', $id)
            ->update(['status' => $request->status]);

        info("Status update for order {$id} to {$request->status}: " . ($updated ? "Success" : "Failure"));

        return response()->json([
            'success' => (bool) $updated,
            'message' => $updated ? 'Status updated successfully' : 'Failed to update status'
        ]);
    }

    // public function todaysOrder()
    // {
    //     $orders = Order::with(['userDetail', 'package'])
    //         ->where('created_at', '>=', now()->subHours(36))
    //         ->latest()
    //         ->paginate(10);

    //     return view('dashboard.admin.order.todaysOrder', compact('orders'));
    // }

    public function todaysOrder(Request $request)
    {
        $query = Order::with(['userDetail', 'package'])
            ->where('created_at', '>=', now()->subHours(36));

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('userDetail', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('phone_number', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $orders = $query->latest()->paginate(10);
        return view('dashboard.admin.order.todaysOrder', compact('orders'));
    }
}
