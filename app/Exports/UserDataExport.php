<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\User;

class UserDataExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        // Define the headers for the Excel sheet
        return [
            'User Name',
            'User Type',
            'User Email',
            'Identity ID',
            'Institution',
            'Mobile Phone',
        ];
    }

    public function map($user): array
    {
        // Map the data to match the headers
        return [
            $user->complete_name,
            $user->userType->type_name,
            $user->email,
            $user->identity_id,
            $user->institution,
            $user->mobile_phone
        ];
    }
}
