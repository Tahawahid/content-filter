<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\UserToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function home()
    // {
    //     $user = Auth::user();

    //     // Retrieve the pending request
    //     // $pending_request = Order::where('user_id', $user->id)
    //     //     ->where('status', 'pending')
    //     //     ->first();

    //     // Retrieve active subscriptions for the user with package details
    //     $active_subscriptions = Order::where('user_id', $user->id)
    //         ->where('status', 'active')
    //         ->with(['package', 'userToken']) // Load related package data
    //         ->get();

    //     $pending_subscriptions = Order::where('user_id', $user->id)
    //         ->where('status', 'pending')
    //         ->with(['package', 'userToken'])
    //         ->get();

    //     // Count total subscriptions for the user
    //     // $total_subscriptions = Order::where('user_id', $user->id)
    //     //     ->where('status', ['approved', 'on-hold', 'rejected', 'cancelled', 'pending', 'active'])
    //     //     ->count();

    //     // $total_subscriptions = Order::where('user_id', $user->id)
    //     //     ->whereIn('status', ['approved', 'on-hold', 'rejected', 'cancelled'])
    //     //     ->selectRaw('SUM(CASE WHEN status = "approved" THEN 1 ELSE 0 END) +
    //     //                 SUM(CASE WHEN status = "on-hold" THEN 1 ELSE 0 END) +
    //     //                 SUM(CASE WHEN status = "rejected" THEN 1 ELSE 0 END) +
    //     //                 SUM(CASE WHEN status = "active" THEN 1 ELSE 0 END) +
    //     //                 SUM(CASE WHEN status = "pending" THEN 1 ELSE 0 END) +
    //     //                 SUM(CASE WHEN status = "cancelled" THEN 1 ELSE 0 END) AS total_count')
    //     //     ->first()
    //     //     ->total_count;

    //     // Get counts for each status
    //     $status_counts = Order::where('user_id', $user->id)
    //         ->selectRaw('status, count(*) as count')
    //         ->groupBy('status')
    //         ->pluck('count', 'status')
    //         ->toArray();

    //     // Count active and pending subscriptions
    //     // $total_active_subscriptions = $this->getTotalActiveSubscriptions($user->id);
    //     // $total_pending_subscriptions = $this->getTotalPendingSubscriptions($user->id);

    //     // Retrieve tokens for the user
    //     $user_tokens = UserToken::where('user_id', $user->id)->sum('remaining_tokens');

    //     return view('dashboard.client.home', compact(
    //         // 'pending_request',
    //         'active_subscriptions',
    //         'user_tokens',
    //         // 'total_subscriptions',
    //         // 'pending_subscriptions'
    //         'status_counts',
    //     ));
    // }

    // public function home()
    // {
    //     $user = Auth::user();

    //     $active_subscriptions = Order::where('user_id', $user->id)
    //         ->whereIn('status', ['active', 'pending'])
    //         ->with(['package', 'userToken'])
    //         ->get();

    //     $status_counts = Order::where('user_id', $user->id)
    //         ->selectRaw('status, count(*) as count')
    //         ->groupBy('status')
    //         ->pluck('count', 'status')
    //         ->toArray();

    //     $user_tokens = UserToken::where('user_id', $user->id)
    //         ->sum('remaining_tokens');

    //     return view('dashboard.client.home', compact(
    //         'active_subscriptions',
    //         'user_tokens',
    //         'status_counts'
    //     ));
    // }

    public function home()
    {
        $user = Auth::user();

        $active_subscriptions = Order::where('user_id', $user->id)
            ->where('status', 'active')
            ->with(['package', 'userToken'])
            ->get();

        $pending_subscriptions = Order::where('user_id', $user->id)
            ->where('status', 'pending')
            ->with(['package', 'userToken'])
            ->get();

        $approved_subscriptions = Order::where('user_id', $user->id)
            ->where('status', 'approved')
            ->with(['package', 'userToken'])
            ->get();

        $onhold_subscriptions = Order::where('user_id', $user->id)
            ->where('status', 'on-hold')
            ->with(['package', 'userToken'])
            ->get();

        $cancelled_subscriptions = Order::where('user_id', $user->id)
            ->where('status', 'cancelled')
            ->with(['package', 'userToken'])
            ->get();

        $rejected_subscriptions = Order::where('user_id', $user->id)
            ->where('status', 'rejected')
            ->with(['package', 'userToken'])
            ->get();

        $status_counts = Order::where('user_id', $user->id)
            ->selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        $user_tokens = UserToken::where('user_id', $user->id)
            ->sum('remaining_tokens');

        return view('dashboard.client.home', compact(
            'active_subscriptions',
            'pending_subscriptions',
            'approved_subscriptions',
            'onhold_subscriptions',
            'cancelled_subscriptions',
            'rejected_subscriptions',
            'user_tokens',
            'status_counts'
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

    public function profile()
    {
        $user = Auth::user();
        return view('dashboard.client.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'current_password' => 'required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $updateData = ['name' => $validated['name']];

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('user_profile', 'public');
            $updateData['profile_picture'] = $path;
        }

        if ($request->filled('new_password')) {
            if (Hash::check($request->current_password, $user->password)) {
                $updateData['password'] = Hash::make($validated['new_password']);
            } else {
                return back()->withErrors(['current_password' => 'The current password is incorrect.']);
            }
        }

        $user->update($updateData);

        return back()->with('success', 'Profile updated successfully');
    }
}
