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

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return response()->json($order);
    }

    public function mostrar()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function storeAPI(Request $request)
    {
        $order = new Order();
        $order->customer_email = $request->input('customer_email');
        $order->total_amount = $request->input('total_amount');
        $order->save();

        // Create order items
        $items = $request->input('items');
        foreach ($items as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];
            $orderItem->save();
        }

        return response()->json(['message' => 'Order created successfully'], 201);
    }

}
