<?php

namespace App\Exports;

use App\Models\Staff;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class StaffsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Staff::latest()->get();
    }

    public function headings(): array
    {
        // Define the column headers for the exported data
        return [
            'Full Name',
            'Email',
            'Country Code',
            'Mobile Number',
            'Address',
            'City',
            'State',
            'Country',
            'location',
            'Created At'
            // Add more columns if needed for additional comments
        ];
    }

    public function map($staff): array
    {
        return [
            $staff->name,
            $staff->email,
            $staff->country_code,
            $staff->phone_number,
            $staff->address,
            $staff->city,
            $staff->stateGet->name ?? '',
            $staff->countryGet->name ?? '',
            $staff->location,
            date('M d, Y', strtotime($staff->created_at)),
        ];
    }
}
