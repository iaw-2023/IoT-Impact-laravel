<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Routing\Controller as BaseController;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $product_category = ProductCategory::all();
        return response()->json($product_category);
    }

    public function show($id)
    {
        $product_category = ProductCategory::findOrFail($id);
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
}
