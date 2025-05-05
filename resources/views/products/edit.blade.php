@extends('adminlte::page')

@section('title', 'Edit Product')

@section('content_header')
    <h1>Edit Product</h1>
@stop

@section('content')
<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')

    <div class="form-group">
        <label>Product Name:</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
    </div>

    <div class="form-group">
        <label>Price:</label>
        <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}" required>
    </div>

    <div class="form-group">
        <label>Existing Images:</label><br>
        @foreach($product->images as $img)
            <img src="{{ asset('storage/'.$img->image_path) }}" width="50" height="50">
        @endforeach
    </div>

    <div class="form-group">
        <label>Add More Images:</label>
        <input type="file" name="images[]" class="form-control" multiple>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@stop
