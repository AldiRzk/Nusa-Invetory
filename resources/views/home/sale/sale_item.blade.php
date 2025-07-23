@extends('layouts.master')
@section('title', 'Sale Items')
@section('content')

    <div class="container-fluid py-4">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h4>Sale Items: #{{ $sale->id }} </h4>
                    <a href="/sale" class="btn btn-warning mb-3">Return</a>
                    <h5>Add Sale Products</h5>
                    <form action="/sale-items/{{ $sale->id }}/store" method="post">
                        @csrf
                        <input type="hidden" name="sale_id" value="{{ $sale->id }}">
                        <div class="row">
                            <div class="col-md-5">
                                <label>Product</label>
                                <select name="product_id" class="form-control">
                                    <option value="">-- Select Product --</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }} - {{ $product->unit }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label>Qty</label>
                                <input type="number" name="quantity" class="form-control" min="1" required>
                            </div>
                            <div class="col-md-2">
                                <label>Price</label>
                                <input type="number" name="price" class="form-control" step="0.01" required>
                            </div>
                            <div class="col-md-2">
                                <label>&nbsp;</label><br>
                                <button type="submit" class="btn btn-info">Add</button>
                            </div>
                        </div>
                    </form>

                    <hr>

                    <h5>Item List</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $grandTotal = 0; @endphp
                            @foreach ($sale->items as $i => $item)
                                @php
                                    $total = $item->quantity * $item->price;
                                    $grandTotal += $total;
                                @endphp
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>Rp{{ number_format($item->price, 2, ',', '.') }}</td>
                                    <td>Rp{{ number_format($total, 2, ',', '.') }}</td>
                                    <td><a href="/sale-items/{{ $item->id }}/delete"
                                            onclick="return confirm('Delete item?')" class="btn btn-danger">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-start mt-4">
                        <h4>Grand Total: <span>Rp{{ number_format($grandTotal, 2, ',', '.') }}</span></h4>
                        <form action="/sale-items/{{ $sale->id }}/total-amounts" method="POST" target="_blank">
                            @csrf
                            <input type="number" value="{{$grandTotal}}" hidden name="total_amounts">
                            <button type="submit" class="btn btn-success" onclick="afterclick()">Payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
<script>
    function afterclick() {
        setTimeout(function() {
            window.location.href = '/sale';
        }, 500);
    }
</script>
@endsection
