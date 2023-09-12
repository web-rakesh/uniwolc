<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\AgentProfile;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use App\Models\AgentCommission;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AgentProgramTransaction;
use App\Exports\AgentCommissionTransaction;

class AgentTransactionList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $isOpen = 0, $searchItem, $startDate, $endDate;
    public $payout, $confirming;

    public function render()
    {
        // dd($this->payout);
        $agentCommissions = AgentCommission::query()
            ->when($this->payout, function ($query, $payout) {
                if ($payout == 4) {
                    $query->where('payment_status', 0);
                } else {
                    $query->where('payment_status', $payout);
                }
            })
            ->with('agent', 'student', 'program')
            ->whereBetween('created_at', [
                !empty($this->startDate) ? Carbon::parse($this->startDate)->startOfDay() : Carbon::now()->subMonth(), // Default to one month ago if not provided
                !empty($this->endDate) ?  Carbon::parse($this->endDate)->endOfDay() : Carbon::now(),
            ])

            ->when($this->searchItem, function ($query, $searchItem) {
                $query->whereHas('agent', function ($query) use ($searchItem) {
                    $query->where('name', 'LIKE', '%' . $searchItem . '%');
                });
            })
            ->latest()
            ->paginate(10);
        // dd($agentCommissions);
        return view('livewire.admin.agent-transaction-list', ['agentCommissions' => $agentCommissions]);
    }


    public function confirmRelease($id)
    {
        $this->confirming = $id;
    }

    public function release($id)
    {
        $agent = AgentCommission::find($id);
        $currency = get_payment_currency($agent->country_id);
        $amount = $agent->amount;
        if ($currency != 'USD') {
            $amount = $agent->amount * 82.5;
        }
        // dd($agent->agent_id);

        DB::beginTransaction();
        try {
            //code...
            AgentCommission::find($id)->update([
                'payment_status' => 1
            ]);
            AgentProfile::whereUserId($agent->agent_id)->increment('wallet', $amount);
            DB::commit();
            session()->flash('message', 'Agent Commission Released Successfully.');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            // dd($th->getMessage());
            session()->flash(
                'message',
                $th->getMessage()
            );
        }
    }

    public function exportAgentCommissionPaymentHistory()
    {
        return Excel::download(new AgentCommissionTransaction($this->startDate, $this->endDate), 'agent-commission-payment-history-' . time() . '.csv');
    }
}
