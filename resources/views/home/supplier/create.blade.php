@extends('layouts.master')
@section('content')
@section('title', 'supplier')
<div class="container-fluid py-4">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4>Add Supplier Data</h4>
                <a href="/supplier" class="btn btn-primary">Return</a>
            </div>
            <div class="card-body">
                <form action="/supplier/store" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Supplier Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
                        @error('name')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Phone</label>
                        <input name="phone" id="" class="form-control" value="{{ old('phone') }}"></input>
                        @error('phone')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input name="email" id="" class="form-control" value="{{ old('email') }}"></input>
                        @error('email')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Address</label>
                        <textarea name="address" id="" class="form-control">{{old('address')}}</textarea>
                        @error('address')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
