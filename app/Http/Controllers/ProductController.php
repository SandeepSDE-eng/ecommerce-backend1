<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   

public function index()
{
    $products = Product::with('images')->latest()->paginate(10);
    return view('products.index', compact('products'));
}

public function create()
{
    return view('products.create');
}

public function edit($id)
{
    $product = Product::with('images')->findOrFail($id);
    return view('products.edit', compact('product'));
}

public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'images.*' => 'image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $product->update($request->only('name', 'price'));

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('products', 'public');
            $product->images()->create(['image_path' => $path]);
        }
    }

    return redirect()->route('products.index')->with('success', 'Product updated successfully');
}

public function store(Request $request)
{
    // Validate form input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // ✅ Validate each image
    ]);

    // Create product
    $product = Product::create([
        'name' => $validated['name'],
        'price' => $validated['price'],
        'description' => $validated['description'] ?? null,
    ]);

    // Handle multiple image upload (if any)
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('product_images', 'public'); // saved in: storage/app/public/product_images
            $product->images()->create(['image_path' => $path]);
        }
    }

    return redirect()->route('products.index')->with('success', 'Product created successfully');
}



public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->images()->delete();
    $product->delete();

    return redirect()->route('products.index')->with('success', 'Product deleted successfully');
}

}
