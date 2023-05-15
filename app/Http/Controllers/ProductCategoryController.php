<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Routing\Controller as BaseController;

class ProductCategoryController extends Controller
{

    /**
     * @OA\Get(
     *     path="/categories",
     *     summary="Obtener todas las categorías de productos",
     *     tags={"Product Categories"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de categorías de productos",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/ProductCategory")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $product_category = ProductCategory::all();
        return response()->json($product_category);
    }

    public function mostrar()
    {
        $categories = ProductCategory::all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:product_category|max:255',
        ]);

        ProductCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index');
    }

    public function edit(ProductCategory $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|integer|min:0',
            'name' => 'required',
        ]);

        $id = $validatedData['category_id'];
        $category = ProductCategory::findOrFail($id);
        $category->update($validatedData);
        
        return redirect()->route('categories.index');
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'product_category_id' => 'required|numeric|min:0',
        ]);
        $id = $validatedData['product_category_id'];
        $category = ProductCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index');
    }


    /**
     * @OA\Get(
     *     path="/categories/{id}",
     *     summary="Obtener una categoría de producto por ID",
     *     tags={"Product Categories"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la categoría de producto",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Categoría de producto encontrada",
     *         @OA\JsonContent(ref="#/components/schemas/ProductCategory")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Categoría de producto no encontrada"
     *     )
     * )
     */
    public function show($id)
    {
        $product_category = ProductCategory::findOrFail($id);
        return response()->json($product_category);
    }
}
