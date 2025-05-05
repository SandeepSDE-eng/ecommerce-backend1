@extends('adminlte::page')

@section('title', 'Add Product')

@section('content_header')
    <h1>Add New Product</h1>
@stop

@section('content')
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Product Name:</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Price:</label>
        <input type="number" step="0.01" name="price" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Product Images:</label>
 <input type="file" name="images[]" multiple>    </div>

    <button type="submit" class="btn btn-success">Create</button>
</form>
@stop
