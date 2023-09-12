<?php

namespace App\Exports;

use Illuminate\Support\Carbon;
use App\Models\AgentCommission;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AgentCommissionTransaction

implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public $startDate, $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        // dd($this->endDate);
    }
    public function collection()
    {
        //
        // dd($this->endDate);
        return  $agentCommissions = AgentCommission::query()

            ->with('agent', 'student', 'program')
            ->whereBetween('created_at', [
                !empty($this->startDate) ? Carbon::parse($this->startDate)->startOfDay() : Carbon::now()->subMonth(), // Default to one month ago if not provided
                !empty($this->endDate) ?  Carbon::parse($this->endDate)->endOfDay() : Carbon::now(),
            ])

            // ->when($this->searchItem, function ($query, $searchItem) {
            //     $query->whereHas('agent', function ($query) use ($searchItem) {
            //         $query->where('name', 'LIKE', '%' . $searchItem . '%');
            //     });
            // })
            ->latest()
            ->get();
        // ->paginate(10);
    }

    public function headings(): array
    {
        return [
            'Agent Name',
            'Student Name',
            'Program Name',
            'University Name',
            'University Country',
            'Commission Rate',
            'Commission Amount',
            'Status',
            'Payment Status',
            'Payment Date'
        ];
    }

    public function map($agentCommission): array
    {
        return [
            $agentCommission->agent->name ?? '',
            $agentCommission->student->FullName ?? '',
            $agentCommission->program->program_title ?? '',
            $agentCommission->program->university->university_name,
            get_country($agentCommission->program->university->country) ?? '',
            $agentCommission->commission,
            get_payment_currency($agentCommission->country_id) . number_format($agentCommission->amount, 2) ?? '',
            $agentCommission->status == 1 ? 'Ready' : 'No',
            $agentCommission->payment_status == 1 ? 'Paid' : 'Unpaid',
            $agentCommission->payment_date ? date('M d, Y', strtotime($agentCommission->payment_date)) : '',
        ];
    }
}
