@extends('layouts.master')
@section('content')
@section('title', 'supplier')
<div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg border-0">
                    <div
                        class="card-header bg-gradient-secondary text-white ">
                        <h4 class="mb-0 text-white">Supplier Data</h4>
                        <a href="/supplier/create" class="btn btn-sm btn-white text-primary">+ Add Supplier</a>
                    </div>
                    <div class="card-body px-3 py-2">
                        <div class="table-responsive">
                            <table class="table" id="data-table">
                                <thead class="bg-light">
                                    <tr class="text-center text-secondary text-uppercase text-xs font-weight-bold">
                                        <th>No.</th>
                                        <th>Supplier Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($supplier as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $data->name }}</td>
                                            <td class="text-center">{{ $data->phone }}</td>
                                            <td class="text-center">{{ $data->email }}</td>
                                            <td class="text-center">{{ $data->address }}</td>
                                            <td class="text-center">
                                                <a href="/supplier/{{ $data->id }}/edit"
                                                    class="btn btn-sm btn-warning me-1">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="/supplier/{{ $data->id }}/destroy" class="btn btn-sm btn-danger"
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
