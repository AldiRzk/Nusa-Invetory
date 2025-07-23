@extends('layouts.master')
@section('content')
@section('title', 'product')
<div class="container-fluid py-4">
    <section class="section">
        <div class="card">
            <div class="card-header bg-gradient-secondary text-white">
                <h4 class="text-white">Add Product Data</h4>
                <a href="/product" class="btn btn-white text-primary">Return</a>
            </div>
            <div class="card-body">
                <form action="/product/{{ $product->id }}/update" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="name"
                            value="{{ old('name', $product->name) }}" />
                        @error('name')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category Name</label>
                        <select name="category_id" id="" class="form-control">
                            @foreach ($category as $data_category)
                                <option value="{{$data_category->id}}" {{ $data_category->id == $product->category_id ? 'selected' : '' }}>
                                    {{ $data_category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Code</label>
                        <input name="code" id="" class="form-control"
                            value="{{ old('code', $product->code) }}"></input>
                        @error('code')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Unit</label>
                        <input name="unit" id="" class="form-control"
                            value="{{ old('unit', $product->unit) }}"></input>
                        @error('unit')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Stock</label>
                        <input name="stock" id="" class="form-control" type="number"
                            value="{{ old('stock', $product->stock) }}"></input>
                        @error('stock')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input name="price" id="" class="form-control" type="number"
                                value="{{ old('price', $product->price) }}"></input>
                        </div>
                        @error('price')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea name="description" id="" class="form-control">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
