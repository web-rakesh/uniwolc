<?php

namespace App\Exports;

use App\Models\University\Program;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProgramExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Program::all();
    }

    public function headings(): array
    {
        // Define the column headers for the exported data
        return [
            'Program Title',
            'Program Summary',
            'Minimum Level of Education',
            'Minimum Gpa',
            'Program Level',
            'Program Length',
            'Cost of Living',
            'Gross Tuition',
            'Application Fees',
            'Agent Commission',
            'Deadline',
            'Program Intake',
            'Program Till Date',
            'Program Language Test',
            'Commission Breakdown',
            'Disclaimer',
            'Student Instruction',
            'Copy Passport',
            'Custodianship Declaration',
            'Proof Immunization',
            'Participation Agreement',
            'Self Introduction',
            'Created At'
            // Add more columns if needed for additional comments
        ];
    }

    public function map($staff): array
    {
        return [
            $staff->program_title,
            $staff->program_summary,
            $staff->minimum_level_education,
            $staff->minimum_gpa,
            $staff->program_level,
            $staff->program_length,
            $staff->cost_of_living,
            $staff->gross_tuition,
            $staff->application_fee,
            $staff->agent_commission,
            date('M d, Y', strtotime($staff->deadline)),
            $staff->program_intake,
            $staff->program_till_date,
            $staff->program_language_test,
            $staff->commission_breakdown,
            $staff->disclaimer,
            $staff->copy_passport,
            $staff->custodianship_declaration,
            $staff->proof_immunization,
            $staff->participation_agreement,
            $staff->self_introduction,
            date('M d, Y', strtotime($staff->created_at)),
        ];
    }
}
