<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Struk Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0 auto;
            width: 80mm;
            padding: 10px;
        }
        h2, h4 {
            text-align: center;
            margin: 0;
        }
        .info, .total, .footer {
            margin-top: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th, td {
            text-align: left;
            padding: 4px 0;
        }
        .right {
            text-align: right;
        }
        .dotted {
            border-top: 1px dashed #000;
            margin-top: 8px;
        }
    </style>
</head>
<body onload="printAndclose()">
    <h2>INVENTORY STORE</h2>
    <h4>Struk Pembelian</h4>

    <div class="info">
        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($sale->date)->format('d/m/Y H:i') }}</p>
        <p><strong>Customer:</strong> {{ $sale->name ?? '-' }}</p>
        <p><strong>User:</strong> {{ $sale->user->name ?? '-' }}</p>
        <p><strong>Catatan:</strong> {{ $sale->notes ?? '-' }}</p>
    </div>

    <div class="dotted"></div>

    <table>
        <thead>
            <tr>
                <th>Barang</th>
                <th class="right">Qty</th>
                <th class="right">Harga</th>
                <th class="right">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sale->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td class="right">{{ $item->quantity }}</td>
                <td class="right">Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                <td class="right">Rp{{ number_format($item->total, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="dotted"></div>

    <div class="total">
        <p><strong>Total:</strong> <span class="right">Rp{{ number_format($sale->total_amounts, 0, ',', '.') }}</span></p>
    </div>

    <div class="footer">
        <p style="text-align:center;">Terima kasih telah berbelanja!</p>
    </div>
    <script>
        function printAndclose() {
            // Trigger print
            window.print();

            // Tunggu proses print selesai (khusus Chrome & sebagian browser)
            window.onafterprint = () => {
                window.close();
            };

            // Fallback untuk browser yang tidak support onafterprint
            setTimeout(() => {
                window.close();
            }, 1000); // 1 detik cukup aman
        }
    </script>
</body>
</html>
