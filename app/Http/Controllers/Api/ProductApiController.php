<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index()
{
    $products = Product::with('images')->get();

    return response()->json([
        'status' => 'success',
        'data' => $products
    ]);
}

}
