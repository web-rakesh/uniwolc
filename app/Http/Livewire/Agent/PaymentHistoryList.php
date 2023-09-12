<?php

namespace App\Http\Livewire\Agent;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use App\Models\AgentCommission;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AgentProgramTransaction;

class PaymentHistoryList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $isOpen = 0, $searchItem, $startDate, $endDate;
    public $program_title, $studentName, $country, $currency, $program_fees, $commission,  $amount, $payment_status, $payment_date, $created_at;


    public function render()
    {

        $transactions = AgentCommission::query()
            ->where('agent_id', Auth::user()->id)
            ->whereBetween('created_at', [
                !empty($this->startDate) ? Carbon::parse($this->startDate)->startOfDay() : Carbon::now()->subMonth(), // Default to one month ago if not provided
                !empty($this->endDate) ?  Carbon::parse($this->endDate)->endOfDay() : Carbon::now(),
            ])

            ->with('student', 'program:program_title,id')
            ->when($this->searchItem, function ($query, $search) {
                $query->whereHas('Program', function ($query) use ($search) {
                    $query->where('program_title', 'LIKE', "%{$search}%");
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('livewire.agent.payment-history-list', ['transactions' => $transactions]);
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
        $transaction = AgentCommission::with('student', 'program:program_title,id')->whereId($id)->first();
        $this->program_title = $transaction->Program->program_title_limit;
        $this->studentName = $transaction->student->full_name;
        $this->country = $transaction->country_id;
        $this->currency = get_currency($transaction->country_id);
        $this->program_fees = $transaction->program_fees;
        $this->commission = $transaction->commission;
        $this->amount = $transaction->amount;
        $this->payment_status = $transaction->payment_status = 1 ? 'Paid' : 'Unpaid';
        $this->created_at = date('M d, Y', strtotime($transaction->created_at))
            ?? '';
        $this->payment_date = date('M d, Y', strtotime($transaction->payment_date));
    }

    public function exportAgentPaymentHistory()
    {
        return  Excel::download(new AgentProgramTransaction($this->startDate, $this->endDate), 'agent-payment-history-' . time() . '.csv');
    }
}
