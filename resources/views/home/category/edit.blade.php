@extends('layouts.master')
@section('content')
@section('title', 'category')
<div class="container-fluid py-4">
    <section class="section">
        <div class="card">
            <div class="card-header bg-gradient-secondary text-white">
                <h4 class="text-white">Edit Categorie Data</h4>
                <a href="/category" class="btn btn-white text-primary">Return</a>
            </div>
            <div class="card-body">
                <form action="/category/{{$category->id}}/update" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name', $category->name)}}"/>
                        @error('name')
                        <div class="alert alert-warning">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea name="description" id="" class="form-control">{{old('description', $category->description)}}</textarea>
                        @error('description')
                        <div class="alert alert-warning">{{$message}}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
