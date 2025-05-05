<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartApiController extends Controller
{
    public function addToCart(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'integer|min:1'
    ]);

    $cart = Cart::updateOrCreate(
        ['product_id' => $request->product_id, 'user_id' => 1],
        ['quantity' => DB::raw('quantity + '.$request->input('quantity', 1))]
    );

    return response()->json(['message' => 'Product added to cart']);
}

public function list()
{
    $items = Cart::with('product.images')->where('user_id', 1)->get();

    $total = $items->reduce(fn ($carry, $item) => $carry + $item->product->price * $item->quantity, 0);

    return response()->json(['items' => $items, 'total' => $total]);
}


}
