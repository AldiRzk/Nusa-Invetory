@extends('layouts.master')
@section('content')
@section('title', 'purchase')
<div class="container-fluid py-4">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4>Add Purchase Data</h4>
                <a href="/purchase" class="btn btn-primary">Return</a>
            </div>
            <div class="card-body">
                <form action="/purchase/store" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Supplier Name</label>
                        <select name="supplier_id" id="" class="form-control">
                            <option value="" hidden>-- Select Supplier --</option>
                            @foreach ($supplier as $data_supplier)
                            <option value="{{$data_supplier->id}}">{{$data_supplier->name}}</option>
                            @endforeach
                        </select>
                        @error('supplier_id')
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
