<?php

namespace App\Exports;

use App\Models\PaymentHistory;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AllTransactionList implements FromCollection, WithMapping, WithHeadings
{
    public $startDate, $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        // dd($this->endDate);
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //
        return PaymentHistory::query()
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
            'Transaction Id',
            'Student Name',
            'Program',
            'Payment Method',
            'Amount',
            'currency',
            'payment Status',
            'Payment Date',
        ];
    }

    public function map($transaction): array
    {
        return [
            $transaction->transaction_id,
            $transaction->student->full_name,
            get_program_university_name($transaction->program_id),
            $transaction->payment_method,
            $transaction->amount,
            $transaction->currency,
            $transaction->transaction_id,
            $transaction->status,
            date('M d, Y', strtotime($transaction->payment_date)),
        ];
    }
}
