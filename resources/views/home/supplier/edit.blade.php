@extends('layouts.master')
@section('content')
@section('title', 'supplier')
<div class="container-fluid py-4">
    <section class="section">
        <div class="card">
            <div class="card-header bg-gradient-secondary text-white">
                <h4 class="text-white">Edit Supplier Data</h4>
                <a href="/supplier" class="btn btn-white text-primary">Return</a>
            </div>
            <div class="card-body">
                <form action="/supplier/{{$supplier->id}}/update" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Supplier Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $supplier->name) }}" />
                        @error('name')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Phone</label>
                        <input name="phone" id="" class="form-control" value="{{ old('phone', $supplier->phone) }}"></input>
                        @error('phone')
                            <div class="alert alert-warning">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input name="email" id="" class="form-control" value="{{ old('email', $supplier->email) }}"></input>
                        @error('email')
                        <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Address</label>
                        <textarea name="address" id="" class="form-control">{{ old('address', $supplier->address) }}</textarea>
                        @error('address')
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
