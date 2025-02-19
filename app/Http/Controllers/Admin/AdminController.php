<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Order;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function home()
    {
        $total_order = Order::count();
        $todays_orders = Order::whereDate('created_at', now())->count();
        $todays_revenue = Order::where('status', 'approved')->whereDate('created_at', now())->sum('total');
        $total_revenue = Order::where('status', 'approved')->sum('total');

        $orders = Order::with(['userDetail', 'package'])
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($order) {
                return [
                    'id' => $order->id,
                    'date' => $order->created_at->format('d M Y'),
                    'order' => 'ORD-' . $order->id,
                    'customer_name' => $order->userDetail->name ?? 'N/A',
                    'phone' => $order->userDetail->phone_number,
                    'package' => $order->package->name,
                    'total' => $order->total,
                    'status' => $order->status,
                    'payment_receipt' => $order->payment_receipt,
                ];
            });

        return view('dashboard.admin.home', compact('orders', 'todays_orders', 'todays_revenue', 'total_revenue', 'total_order'));
    }
    public function editProfile()
    {
        return view('dashboard.admin.profile');
    }

    public function updateProfile(Request $request)
    {
        $admin = auth('admin')->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        DB::beginTransaction();

        try {
            $updateData = ['name' => $validated['name']];

            if ($request->hasFile('profile_picture')) {
                $path = $request->file('profile_picture')->store('admin_profile', 'public');
                $updateData['profile_picture'] = $path;
            }

            if ($request->filled('password')) {
                $updateData['password'] = Hash::make($validated['password']);
            }

            $admin->update($updateData);

            DB::commit();
            return back()->with('success', 'Profile updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Profile update failed: ' . $e->getMessage()]);
        }
    }

    public function createAdmin()
    {
        if (auth('admin')->id() !== 1) {
            return back()->withErrors(['error' => 'Only primary admin can add new admins']);
        }
        return view('dashboard.admin.AdminCreate');
    }

    public function listAdmins()
    {
        $admins = Admin::where('id', '!=', 1)->get();
        return view('dashboard.admin.AdminList', compact('admins'));
    }

    public function destroyAdmin(Admin $admin)
    {
        if ($admin->id === 1) {
            return back()->withErrors(['error' => 'Primary admin cannot be deleted']);
        }

        DB::beginTransaction();
        try {
            if ($admin->profile_picture) {
                Storage::disk('public')->delete($admin->profile_picture);
            }
            $admin->delete();
            DB::commit();
            return back()->with('success', 'Admin deleted successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Failed to delete admin']);
        }
    }

    public function storeAdmin(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8|confirmed'
        ]);

        DB::beginTransaction();

        try {
            Admin::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password'])
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'New admin created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Failed to create admin: ' . $e->getMessage()]);
        }
    }
}
