<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        // return view('dashboard.client.home');

        $user = Auth::user();

        $pending_request = Order::where('user_id', $user->id)
            ->where('status', 'pending')
            ->first();

        $active_subscription = Order::where('user_id', $user->id)
            ->where('status', 'active')
            ->first();

        $package_name = null;
        $tokens_left = null;

        if ($active_subscription) {
            $package_name = $active_subscription->package->name;
            $tokens_left = $active_subscription->tokens_remaining;
        }

        return view('dashboard.client.home', compact(
            'pending_request',
            'active_subscription',
            'package_name',
            'tokens_left'
        ));
    }
}
