@extends('layouts.master')
@section('content')
@section('title', 'category')
<div class="container-fluid py-4">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4>Add Category Data</h4>
                <a href="/category" class="btn btn-primary">Return</a>
            </div>
            <div class="card-body">
                <form action="/category/store" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}"/>
                        @error('name')
                        <div class="alert alert-warning">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea name="description" id="" class="form-control">{{old('description')}}</textarea>
                        @error('description')
                        <div class="alert alert-warning">{{$message}}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
