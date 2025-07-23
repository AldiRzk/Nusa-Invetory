@extends('layouts.master')
@section('content')
@section('title', 'product')
<div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg border-0">
                    <div
                        class="card-header bg-gradient-secondary text-white ">
                        <h4 class="mb-0 text-white">Product Data</h4>
                        <a href="/product/create" class="btn btn-sm btn-white text-primary">+ Add Product</a>
                    </div>
                    <div class="card-body px-3 py-2">
                        <div class="table-responsive">
                            <table class="table" id="data-table">
                                <thead class="bg-light">
                                    <tr class="text-center text-secondary text-uppercase text-xs font-weight-bold">
                                        <th>No.</th>
                                        <th>Product Name</th>
                                        <th>Category Name</th>
                                        <th>Code</th>
                                        <th>Description</th>
                                        <th>Unit</th>
                                        <th>Stock</th>
                                        <th>Price</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $data->name }}</td>
                                            <td class="text-center">{{ $data->category->name }}</td>
                                            <td class="text-center">{{ $data->code }}</td>
                                            <td class="text-center">{{ $data->description ?? 'No Description'}}</td>
                                            <td class="text-center">{{ $data->unit }}</td>
                                            <td class="text-center">{{ $data->stock }}</td>
                                            <td class="text-center">Rp. {{ number_format($data->price,2,',','.') }}</td>
                                            <td class="text-center">
                                                <a href="/product/{{ $data->id }}/edit"
                                                    class="btn btn-sm btn-warning me-1">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="/product/{{ $data->id }}/destroy" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Yakin Akan Dihapus?')">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
