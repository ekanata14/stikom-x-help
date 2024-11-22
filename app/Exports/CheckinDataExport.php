<?php

namespace App\Exports;

use App\Models\CheckIn;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CheckinDataExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CheckIn::with('user')->get();
    }

    public function headings(): array
    {
        // Define the headers for the Excel sheet
        return [
            'User Name',
            'User Email',
            'Identity ID',
            'Purchase Date',
        ];
    }

    public function map($checkin): array
    {
        // Map the data to match the headers
        return [
            $checkin->user->complete_name,
            $checkin->user->email,
            $checkin->user->identity_id,
            $checkin->created_at->format('Y-m-d'), 
        ];
    }
}

