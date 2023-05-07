<?php

namespace app\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ProductController extends Controller
{
    public function index()
    {
        //aca dejo lugar para lo de la api
        //$products = Product::all();
        //$categories = ProductCategory::all();
        //return view('products.index', compact('products', 'categories'));
    }

    public function show()
    {
        $products = Product::all();
        $categories = ProductCategory::all();
        return view('products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = ProductCategory::all();
        return view('products.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'required',
            'product_category_id' => 'required|exists:product_category,id',
        ]);


        $product = Product::create($validatedData);
        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'required',
            'product_category_id' => 'required|exists:product_category,id',
        ]);

        $product->update($validatedData);
        
        return redirect()->route('products.show', $product);
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|numeric|min:0',
        ]);
        $id = $validatedData['product_id'];
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}