<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\orders\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(25);
        return view('Admin.order.index', compact('orders'));

    }
    public function show(Order $order){
        $order_items=$order->order_items()->paginate(25);
        return view('Admin.orderItems.index', compact('order_items'));
    }
}
