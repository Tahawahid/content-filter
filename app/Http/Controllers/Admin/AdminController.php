<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\UserDetail;
use Illuminate\Http\Request;

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
}
