@extends('layouts.master')
@section('content')
@section('title', 'purchase')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient-secondary text-white ">
                    <h4 class="mb-0 text-white">Purchase Data</h4>
                    <button type="button" class="btn btn-sm btn-white text-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        + Add Data
                    </button>
                    <a href="/purchase/report" class="btn btn-success btn-sm">Report Monthly</a>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-gradient-secondary">
                                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add Category Data
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/purchase/store" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">Supplier Name</label>
                                            <select name="supplier_id" class="form-control select2"
                                                style="width: 100%;">
                                                <option value="" hidden>-- Select Supplier --</option>
                                                @foreach ($supplier as $data_supplier)
                                                    <option value="{{ $data_supplier->id }}">{{ $data_supplier->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('supplier_id')
                                                <div class="alert alert-warning">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Notes</label>
                                            <textarea name="notes" id="" class="form-control">{{ old('notes') }}</textarea>
                                            @error('notes')
                                                <div class="alert alert-warning">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-3 py-2">
                    <div class="table-responsive">
                        <table class="table" id="data-table">
                            <thead class="bg-light">
                                <tr class="text-center text-secondary text-uppercase text-xs font-weight-bold">
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>Supplier Name</th>
                                    <th>Date</th>
                                    <th>Total Amounts</th>
                                    <th>Notes</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchase as $data)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $data->user->name }}</td>
                                        <td class="text-center">{{ $data->supplier->name }}</td>
                                        <td class="text-center">{{ $data->date }}</td>
                                        <td class="text-center">Rp.
                                            {{ number_format($data->total_amounts, 2, ',', '.') }}
                                        </td>
                                        <td class="text-center">{{ $data->notes }}</td>
                                        <td class="text-center">
                                            @if ($data->total_amounts > 0)
                                                <a href="/purchase/{{ $data->id }}/print-receipt"
                                                    class="btn btn-sm btn-success me-1" target="_blank">
                                                    <i class="fas fa-edit"></i> Print Receipt
                                                </a>
                                            @else
                                                <a href="/purchase-items/{{ $data->id }}/"
                                                    class="btn btn-sm btn-primary me-1">
                                                    <i class="fas fa-edit"></i> Add items
                                                </a>
                                            @endif
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
