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
        // return view('dashboard.client.home');
        $subscriptions = [];
        $user = Auth::user();
        // dd($user);
        $pending_request = Order::where('user_id', $user->id)
            ->where('status', 'pending')
            ->first();

        $active_subscriptions = Order::where('user_id', $user->id)
            ->where('status', 'active')
            ->get();

        $user_tokens = UserToken::where('user_id', $user->id);
        // dd($active_subscriptions);


        // foreach ($active_subscriptions as $subscription) {
        //     $items = json_decode($subscription->items, true);
        //     // dd($items);
        //     // Check if the decoded items array has the required keys
        //     if (isset($items[0]) && isset($items[0]['name'])) {
        //         $subscriptions[] = [
        //             'package_name' => $items[0]['name'],
        //             'tokens_left' => $subscription->tokens_remaining,
        //             'purchase_date' => $subscription->created_at
        //         ];
        //     }
        // }


        return view('dashboard.client.home', compact(
            'pending_request',
            'active_subscriptions',
            'user_tokens'
        ));
    }
}
