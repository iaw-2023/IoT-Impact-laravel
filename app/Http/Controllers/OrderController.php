<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    public function show()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

}