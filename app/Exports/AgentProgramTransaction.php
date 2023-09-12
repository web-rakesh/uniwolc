<?php

namespace App\Exports;

use Illuminate\Support\Carbon;
use App\Models\AgentCommission;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AgentProgramTransaction implements FromCollection, WithMapping, WithHeadings
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
        return AgentCommission::query()
            ->where('agent_id', Auth::user()->id)
            ->whereBetween('created_at', [
                !empty($this->startDate) ? Carbon::parse($this->startDate)->startOfDay() : Carbon::now()->subMonth(), // Default to one month ago if not provided
                !empty($this->endDate) ?  Carbon::parse($this->endDate)->endOfDay() : Carbon::now(),
            ])
            ->with('student', 'program:program_title,id')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Program Title',
            'Student Name',
            'Country',
            'Currency',
            'Commission',
            'Amount',
            'payment Status',
            'Payment Date',
        ];
    }

    public function map($transaction): array
    {
        return [
            $transaction->Program->program_title_limit,
            $transaction->student->full_name,
            $transaction->country_id,
            get_payment_currency($transaction->country_id),
            $transaction->program_fees,
            $transaction->commission,
            $transaction->amount,
            $transaction->payment_status = 1 ? 'Paid' : 'Unpaid',
            date('M d, Y', strtotime($transaction->created_at)),
            date('M d, Y', strtotime($transaction->payment_date))

        ];
    }
}
