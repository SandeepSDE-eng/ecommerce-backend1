<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{


    
    
    // ✅ Add to Cart (avoid duplicates)
    public function addToCart(Request $request)
{
    $productId = $request->input('product_id');
    $cart = session()->get('cart', []);

    if (isset($cart[$productId])) {
        return redirect()->route('cart.view')->with('error', 'Product already in cart');
    }

    $cart[$productId] = [
        'quantity' => 1,
    ];

    session()->put('cart', $cart);

    return redirect()->route('cart.view')->with('success', 'Product added to cart');
}


    // ✅ View Cart with Product Info
    public function viewCart()
    {
        $cart = session()->get('cart', []);
        $products = Product::with('images')->whereIn('id', array_keys($cart))->get();

        $total = 0;
        foreach ($products as $product) {
            $total += $product->price * $cart[$product->id]['quantity'];
        }

        return view('cart.index', compact('products', 'cart', 'total'));
    }

    // ✅ Update Cart Item Quantity
    public function updateCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $cart);
            return response()->json(['message' => 'Cart updated']);
        }

        return response()->json(['message' => 'Product not found in cart']);
    }

    // ✅ Remove from Cart
    public function removeFromCart(Request $request)
{
    $productId = $request->input('product_id');
    $cart = session()->get('cart', []);

    if (isset($cart[$productId])) {
        unset($cart[$productId]);
        session()->put('cart', $cart);
        return redirect()->route('cart.view')->with('success', 'Product removed from cart');
    }

    return redirect()->route('cart.view')->with('error', 'Product not found in cart');
}

}
