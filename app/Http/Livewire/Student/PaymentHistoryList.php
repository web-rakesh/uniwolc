<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PaymentHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use PDF;

class PaymentHistoryList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $isOpen = 0, $searchItem, $startDate, $endDate;
    public $transactionId, $programId, $paymentMethod, $amount, $currency,  $paymentDate, $status;

    public function render()
    {
        $transactions = PaymentHistory::query()

            ->whereBetween('created_at', [
                !empty($this->startDate) ? Carbon::parse($this->startDate)->startOfDay() : Carbon::now()->subMonth(), // Default to one month ago if not provided
                !empty($this->endDate) ?  Carbon::parse($this->endDate)->endOfDay() : Carbon::now(),
            ])
            ->whereStudentId(Auth::user()->id)
            ->with('student', 'program:program_title,id')
            ->when($this->searchItem, function ($query, $search) {
                $query->where('transaction_id', 'LIKE', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('livewire.student.payment-history-list', ['transactions' => $transactions]);
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function view($id)
    {
        $this->openModal();
        $transaction = PaymentHistory::with('student', 'program:program_title,id')->whereId($id)->first();
        $this->transactionId = $transaction->transaction_id;
        $this->programId = get_program_university_name($transaction->program_id);
        $this->paymentMethod = $transaction->payment_method;
        $this->amount = $transaction->amount;
        $this->currency = $transaction->currency;
        $this->transactionId = $transaction->transaction_id;
        $this->paymentDate = date('M d, Y', strtotime($transaction->payment_date));
        $this->status = $transaction->status;
    }

    public function invoice($id)
    {
       
    }
}
