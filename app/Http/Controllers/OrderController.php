<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Item;


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
    
        // Creo los items de la orden
        $items = $request->input('items');
        foreach ($items as $itemData) {
            $item = new Item();
            $item->order_id = $order->id;
            $item->product_id = $itemData['product_id'];
            $item->quantity = $itemData['quantity'];
            $item->individual_price = $itemData['individual_price'];
            $item->save();
        }
    
        return response()->json(['message' => 'Order created successfully'], 201);
    }

}
