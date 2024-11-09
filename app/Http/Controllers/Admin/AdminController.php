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
        $orders = Order::latest()->take(5)->get();
        return view('dashboard.admin.home', compact('orders', 'todays_orders', 'todays_revenue', 'total_revenue', 'total_order', 'orders'));
    }
}
