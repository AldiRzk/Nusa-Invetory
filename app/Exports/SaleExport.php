<?php

namespace App\Exports;

use App\Models\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SaleExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sale::with('user')->get();
    }

    public function headings(): array{
        return [
            'ID',
            'Username',
            'Customer Name',
            'Date',
            'Total Amounts',
            'Notes',
        ];
    }

    public function map($sale): array{
        return [
            $sale->id,
            $sale->customer_name ?: 'No Name',
            $sale->user->name,
            $sale->date,
            $sale->total_amounts,
            $sale->notes ?: 'No Notes',
        ];
    }
}
