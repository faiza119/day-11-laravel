<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function showAll()
    {
        $products = Product::all();

        return view('products.index', ['products' => $products]);
    }

    // Retrieve a product by ID
    public function showSingle($id)
    {
        $product = Product::find($id);

        if ($product) {
            return view('products.single', ['product' => $product]);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
    public function insertDemoProducts()
{
    $products = [
        ['name' => 'Wireless Earbuds', 'price' => 1499, 'description' => 'Bluetooth 5.0, 24hr battery backup'],
        ['name' => 'Smartphone Stand', 'price' => 299, 'description' => 'Adjustable, foldable and lightweight'],
        ['name' => 'USB-C Cable', 'price' => 199, 'description' => 'Fast charging 1.5m cable with nylon braid']
    ];

    foreach ($products as $item) {
        \App\Models\Product::create($item);
    }

    return redirect('/products')->with('success', '🎉 Sample products added!');
}
public function create()
{
    return view('products.create');  // Blade file for form
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|min:3',
        'price' => 'required|numeric',
        'description' => 'required|min:5',
    ]);

    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
    ]);

    return redirect('/products')->with('success', '✅ Product added successfully!');
}

}
