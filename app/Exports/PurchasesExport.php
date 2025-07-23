<?php

namespace App\Exports;

use App\Models\Purchase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PurchasesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Purchase::with('supplier', 'user')->get();
    }

    public function headings(): array{
        return [
            'ID',
            'Username',
            'Supplier Name',
            'Date',
            'Total Amounts',
            'Notes',
        ];
    }

    public function map($purchase): array{
        return [
            $purchase->id,
            $purchase->supplier->name,
            $purchase->user->name,
            $purchase->date,
            $purchase->total_amounts,
            $purchase->notes ?: 'No Notes',
        ];
    }
}
