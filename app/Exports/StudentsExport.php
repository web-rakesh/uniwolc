<?php

namespace App\Exports;

use App\Models\Student\StudentDetail;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return StudentDetail::latest()->get();
    }

    public function headings(): array
    {
        // Define the column headers for the exported data
        return [
             'Full Name',
            'Email',
            'Country Code',
            'Mobile Number',
            'Alt Country Code',
            'Alt Mobile Number',
            'Country',
            'Address',
            'City',
            'Pincode',
            'Passport Number',
            'Passport Expiry Date',
            'Marital Status',
            'Gender',
            'Date of birth',
            'Fast Language',
            'Website',
            'Twitter',
            'Instagram',
            'Facebook',
            'Created At'
            // Add more columns if needed for additional comments
        ];
    }

    public function map($student): array
    {
        return [
            $student->FullName,
            $student->email,
            $student->country_code,
            $student->mobile_number,
            $student->alt_country_code,
            $student->alt_mobile_number,
            $student->userCountry->name,
            $student->address,
            $student->city,
            $student->pincode,
            $student->passport_number,
            date('M d, Y', strtotime($student->passport_expiry_date)),
            $student->marital_status,
            $student->gender,
            date('M d, Y', strtotime($student->dob)),
            $student->fast_language,
            $student->website,
            $student->twitter,
            $student->instagram,
            $student->facebook,
            date('M d, Y', strtotime($student->created_at)),
        ];
    }
}
