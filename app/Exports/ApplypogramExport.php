<?php

namespace App\Exports;

use App\Models\Student\ApplyProgram;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ApplypogramExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ApplyProgram::all();
    }

    public function headings(): array
    {
        return [
            'Program Name',
            'Application Number',
            'ESL Start Date',
            'Fees',
            'University Name',
            'Student Name',
            'Agent Name',
            'Commission',
            'Status',
            'Created At'
        ];
    }

    public function map($applyProgram): array
    {
        return [
            $applyProgram->program_title,
            $applyProgram->application_number,
            date('M d, Y', strtotime($applyProgram->esl_start_date)),
            $applyProgram->fees == 0 ? 'Free' : '$' . $applyProgram->fees,
            $applyProgram->getProgram->university->university_name,
            $applyProgram->getStudent->full_name ?? '',
            $applyProgram->getStudent->agentDetail->name ?? '',
            isset($applyProgram->getStudent->agentDetail->name) ? '$' . ($applyProgram->getProgram->agent_commission / 100) * $applyProgram->fees . '(' . $applyProgram->getProgram->agent_commission . '%)' : '--',
            $applyProgram->status == 1 ? 'Due' : 'Paid',
            date('M d, Y', strtotime($applyProgram->created_at))
        ];
    }
}
