<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Item;


class OrderController extends Controller
{

    /**
     * @OA\Get(
     *     path="/orders",
     *     summary="Obtener todas las órdenes",
     *     tags={"Orders"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de órdenes",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Order")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    /**
     * @OA\Get(
     *     path="/orders/{id}",
     *     summary="Obtener una orden por ID",
     *     tags={"Orders"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la orden",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Orden encontrada",
     *         @OA\JsonContent(ref="#/components/schemas/Order")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Orden no encontrada"
     *     )
     * )
     */
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

    /**
     * @OA\Post(
     *     path="/orders",
     *     summary="Crear una nueva orden",
     *     tags={"Orders"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Datos de la orden",
     *         @OA\JsonContent(ref="#/components/schemas/Order")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Orden creada exitosamente"
     *     )
     * )
     */
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
