@extends('layouts.master')
@section('content')
@section('title', 'dashboard')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Income/days</p>
                                <h5 class="font-weight-bolder">
                                    Rp. {{ number_format($income, 2, ',', '.') }}
                                </h5>
                                <p class="mb-0">
                                    <a href="/sale" class="text-primary text-sm font-weight-bolder">See
                                        Detail</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow-primary text-center rounded-circle">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Product</p>
                                <h5 class="font-weight-bolder">
                                    {{ number_format($total_product) }}
                                </h5>
                                <p class="mb-0">
                                    <a href="/product" class="text-primary text-sm font-weight-bolder">See Detail</a>

                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow-danger text-center rounded-circle">
                                <i class="ni ni-app text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Purchase</p>
                                <h5 class="font-weight-bolder">
                                    {{ number_format($total_purchase) }}
                                </h5>
                                <p class="mb-0">
                                    <a href="/purchase" class="text-primary text-sm font-weight-bolder">See
                                        Detail</a>

                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-success text-center rounded-circle">
                                <i class="ni ni-delivery-fast text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Sale</p>
                                <h5 class="font-weight-bolder">
                                    {{ number_format($total_sale) }}
                                </h5>
                                <p class="mb-0">
                                    <a href="/sale" class="text-primary text-sm font-weight-bolder">See
                                        Detail</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow-info text-center rounded-circle">
                                <i class="ni ni-credit-card text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">

    </div>
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h5>Total Purchases/Days</h5>
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
                        @foreach ($tabel_purchase as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $data->user->name }}</td>
                                <td class="text-center">{{ $data->supplier->name }}</td>
                                <td class="text-center">{{ $data->date }}</td>
                                <td class="text-center">Rp. {{ number_format($data->total_amounts, 2, ',', '.') }}
                                </td>
                                <td class="text-center">{{ $data->notes }}</td>
                                <td class="text-center">
                                    @if ($data->total_amounts > 0)
                                        <a href="/purchase/{{ $data->id }}/print-receipt"
                                            class="btn btn-sm btn-success me-1" target="_blank" onclick="redirectdashboard()">
                                            <i class="fas fa-edit"></i> Print Struk
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
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h5>Total Sales/Days</h5>
        </div>
        <div class="card-body px-3 py-2">
            <div class="table-responsive">
                <table class="table" id="data-table-dashboard">
                    <thead class="bg-light">
                        <tr class="text-center text-secondary text-uppercase text-xs font-weight-bold">
                            <th>No.</th>
                            <th>Username</th>
                            <th>Customer Name</th>
                            <th>Date</th>
                            <th>Total Amounts</th>
                            <th>Notes</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tabel_sale as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $data->user->name }}</td>
                                <td class="text-center">{{ $data->customer_name }}</td>
                                <td class="text-center">{{ $data->date }}</td>
                                <td class="text-center">Rp. {{ number_format($data->total_amounts, 2, ',', '.') }}
                                </td>
                                <td class="text-center">{{ $data->notes }}</td>
                                <td class="text-center">
                                    @if ($data->total_amounts > 0)
                                        <a href="/sale/{{ $data->id }}/print-receipt"
                                            class="btn btn-sm btn-success me-1" target="_blank" onclick="redirectdashboard()">
                                            <i class="fas fa-edit"></i> Print Struk
                                        </a>
                                    @else
                                        <a href="/sale-items/{{ $data->id }}/"
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

    <footer class="footer pt-3  ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection
