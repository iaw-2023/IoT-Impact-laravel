<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Routing\Controller as BaseController;

class ProductCategoryController extends Controller
{
    public function index()
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

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(ProductCategory $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, ProductCategory $category)
    {
        $request->validate([
            'name' => 'required|unique:product_category,name,'.$category->id.'|max:255',
        ]);

        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(ProductCategory $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
