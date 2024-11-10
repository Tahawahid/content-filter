<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\UserToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        $user = Auth::user();

        // Retrieve the pending request
        $pending_request = Order::where('user_id', $user->id)
            ->where('status', 'pending')
            ->first();

        // Retrieve active subscriptions for the user with package details
        $active_subscriptions = Order::where('user_id', $user->id)
            ->where('status', 'active')
            ->with('package') // Load related package data
            ->get();

        // Count total subscriptions for the user
        $total_subscriptions = Order::where('user_id', $user->id)
            ->where('status', 'active')
            ->count();

        // Count active and pending subscriptions
        $total_active_subscriptions = $this->getTotalActiveSubscriptions($user->id);
        $total_pending_subscriptions = $this->getTotalPendingSubscriptions($user->id);

        // Retrieve tokens for the user
        $user_tokens = UserToken::where('user_id', $user->id)->first();

        return view('dashboard.client.home', compact(
            'pending_request',
            'active_subscriptions',
            'user_tokens',
            'total_subscriptions',
            'total_active_subscriptions',
            'total_pending_subscriptions'
        ));
    }
    public function getTotalActiveSubscriptions($userId)
    {
        return Order::where('user_id', $userId)
            ->where('status', 'active')
            ->count();
    }

    public function getTotalPendingSubscriptions($userId)
    {
        return Order::where('user_id', $userId)
            ->where('status', 'pending')
            ->count();
    }
}
