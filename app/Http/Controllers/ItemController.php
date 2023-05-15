<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;


class ItemController extends Controller
{

    /**
     * @OA\Get(
     *     path="rest/items",
     *     summary="Obtener todos los items",
     *     tags={"Items"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de items",
     *         @OA\Schema(ref="#/definitions/Item")
     *     )
     * )
     */
    public function index()
    {
        $items = Item::all();
        return response()->json($items);
    }

    /**
     * @OA\Get(
     *     path="/rest/items/{id}",
     *     summary="Obtener un item por ID",
     *     tags={"Items"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID del item",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Item encontrado",
     *         @OA\Schema(ref="#/definitions/Item")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Item no encontrado"
     *     )
     * )
     */
    public function show($id)
    {
        $item = Item::findOrFail($id);
        return response()->json($item);
    }

    public function mostrar()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }
    
}
