<?php

namespace App\Exports;

use App\Models\University\ProfileDetail;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UniversityExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ProfileDetail::all();
    }

    public function headings(): array
    {
        // Define the column headers for the exported data
        return [
            'University Name',
            'Phone Number',
            'Email',
            'Country',
            'Permit and Visa',
            'Address',
            'About University',
            'Feature',
            'Location',
            'Founded',
            'School Id',
            'Provider Id Number',
            'Institution Type',
            'Blocked Country',
            'Letter Of Acceptance',
            'Disciplines',
            'Created At'
            // Add more columns if needed for additional comments
        ];
    }

    public function map($university): array
    {
        return [
            $university->university_name,
            $university->phone_number,
            $university->email,
            $university->getCountry->name,
            $university->permit_visa,
            $university->address,
            $university->about_university,
            $university->feature,
            $university->location,
            $university->founded,
            $university->school_id,
            $university->provider_id_number,
            $university->institution_type,
            implode(',', get_blocked_country($university->blocked_country)) ?? '',
            $university->letter_of_acceptance,
            $university->disciplines,
            date('M d, Y', strtotime($university->created_at)),
        ];
    }
}
