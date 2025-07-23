@extends('layouts.master')
@section('content')
@section('title', 'sale')
<div class="container-fluid py-4">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4>Add Sale Data</h4>
                <a href="/sale" class="btn btn-primary">Return</a>
            </div>
            <div class="card-body">
                <form action="/sale/store" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Customer Name</label>
                        <input name="customer_name" id="" class="form-control" value="{{old('customer_name')}}"></input>
                        @error('customer_name')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Notes</label>
                        <textarea name="notes" id="" class="form-control">{{old('notes')}}</textarea>
                        @error('notes')
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
