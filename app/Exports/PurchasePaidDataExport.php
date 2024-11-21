<?php

namespace App\Exports;

use App\Models\Purchase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PurchasePaidDataExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Purchase::where('status', 'paid')->get();
    }

    public function headings(): array
    {
        // Define the headers for the Excel sheet
        return [
            'Purchase ID',
            'User Name',
            'User Email',
            'Invoice ID',
            'Purchase Date',
            'Amount',
        ];
    }

    public function map($purchase): array
    {
        // Map the data to match the headers
        return [
            $purchase->id,
            $purchase->user->complete_name,
            $purchase->user->email,
            $purchase->user->identity_id,
            $purchase->invoice_id, // Replace with actual product column name
            $purchase->created_at->format('Y-m-d'),
            $purchase->amount,
        ];
    }
}
