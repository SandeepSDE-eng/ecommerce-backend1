@extends('adminlte::page')

@section('title', 'Cart')

@section('content_header')
    <h1>Your Cart</h1>
@stop



@section('content')
@if(count($products) == 0)
    <p>Your cart is empty.</p>
@else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th><th>Name</th><th>Price</th><th>Qty</th><th>Subtotal</th><th>Action</th>
            </tr>
        </thead>
        <tbody>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="d-flex justify-content-end mb-3">
    @php $cartCount = count(session('cart', [])); @endphp
    <a href="{{ route('cart.view') }}" class="btn btn-outline-dark">
        🛒 Cart ({{ $cartCount }})
    </a>
</div>
        @foreach($products as $product)
            <tr>
                <td>
                    @if($product->images->first())
                        <img src="{{ asset('storage/'.$product->images->first()->image_path) }}" width="50">
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>₹{{ $product->price }}</td>
                <td>
                    <form action="{{ route('cart.update') }}" method="POST" class="d-flex">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="number" name="quantity" value="{{ $cart[$product->id]['quantity'] }}" min="1" class="form-control w-50">
                        <button type="submit" class="btn btn-sm btn-primary ml-1">Update</button>
                    </form>
                </td>
                <td>₹{{ $product->price * $cart[$product->id]['quantity'] }}</td>
                <td>
                    <form action="{{ route('cart.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h4>Total: ₹{{ $total }}</h4>
@endif

<!-- Buttons below the cart content -->
<div class="d-flex justify-content-between">
    <!-- Back to Products button -->
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>

    <!-- Continue Shopping button -->
    <a href="{{ route('products.index') }}" class="btn btn-primary">Continue Shopping</a>
</div>

@stop
