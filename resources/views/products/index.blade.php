@extends('adminlte::page')

@section('title', 'Product List')

@section('content_header')
    <h1>Products</h1>
@stop

@section('content')
<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Product</a>




@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th><th>Price</th><th>Images</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>₹{{ $product->price }}</td>
            <td>
                @foreach($product->images as $img)
                    <img src="{{ asset('storage/'.$img->image_path) }}" width="50" height="50">
                @endforeach
            </td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
            <td>
            <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit" class="QqFHMw vslbG+ In9uk2" style="background: #28a745; border: none; padding: 6px 10px; border-radius: 4px; display: flex; align-items: center; color: white;">
        <svg class="NwyjNT" width="16" height="16" viewBox="0 0 16 15" xmlns="http://www.w3.org/2000/svg" style="margin-right: 5px;">
            <path d="M15.32 2.405H4.887C3 2.405 2.46.805 2.46.805L2.257.21C2.208.085 2.083 0 1.946 0H.336C.1 0-.064.24.024.46l.644 1.945L3.11 9.767c.047.137.175.23.32.23h8.418l-.493 1.958H3.768l.002.003c-.017 0-.033-.003-.05-.003-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92c.99 0 1.805-.75 1.91-1.712l5.55.076c.12.922.91 1.636 1.867 1.636 1.04 0 1.885-.844 1.885-1.885 0-.866-.584-1.593-1.38-1.814l2.423-8.832c.12-.433-.206-.86-.655-.86" fill="#fff"/>
        </svg>
        Add to Cart
    </button>
</form>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $products->links() }}
@stop
