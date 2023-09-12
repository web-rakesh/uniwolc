<?php

namespace App\Http\Livewire\Admin;

use App\Models\Agent\BankDetail;
use Livewire\Component;
use App\Models\AgentProfile;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use App\Models\AgentWalletHistory;
use Illuminate\Support\Facades\DB;

class AgentPaymentRequestList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $confirming, $rejectNote, $adminRejectNote, $walletId, $bankDetails = [], $agentPaymentDetails = [];
    public $isOpen = 0, $isAcceptModalOpen = 0, $rejectModalOpen = 0, $searchItem, $startDate, $endDate;
    public $acceptPaymentId, $transactionId, $transactionDate, $transactionNote;
    public $agentSearch, $paymentStatus;

    public function render()
    {
        $agents = AgentProfile::latest()->get();

        $agentWallets = AgentWalletHistory::query()

            ->whereBetween('created_at', [
                !empty($this->startDate) ? Carbon::parse($this->startDate)->startOfDay() : Carbon::now()->subMonth(), // Default to one month ago if not provided
                !empty($this->endDate) ?  Carbon::parse($this->endDate)->endOfDay() : Carbon::now(),
            ])
            ->when($this->agentSearch, function ($query, $search) {
                return $query->where('agent_id', $search);
            })
            ->when($this->paymentStatus, function ($query, $status) {
                $status = $status == '10' ? 0 : $status;
                return $query->where('transaction_status', $status);
            })
            ->latest()
            ->paginate(10);
        return view('livewire.admin.agent-payment-request-list', ['agentWallets' => $agentWallets, 'agents' => $agents]);
    }

    public function clearDate()
    {
        $this->startDate = '';
        $this->endDate = '';
    }



    public function openModal($id)
    {
        $this->walletId = $id;
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->walletId = '';
        $this->isOpen = false;
        $this->isAcceptModalOpen = false;
        $this->rejectModalOpen = false;
    }

    public function confirmRelease($id)
    {
        $this->confirming = $id;
    }
    public function release($id)
    {
        $this->acceptPaymentId = $id;
        $this->isAcceptModalOpen = true;
        $agentWallet = AgentWalletHistory::find($id);
        $this->agentPaymentDetails['remark'] =  $agentWallet->transaction_remark;
        $this->agentPaymentDetails['amount'] =  $agentWallet->transaction_amount;
        $this->agentPaymentDetails['transaction_id'] = "UNI-TRN-$agentWallet->id-AGT-$agentWallet->agent_id";
        $this->bankDetails = BankDetail::where('agent_id', $agentWallet->agent_id)->first();

        // dd($this->agentPaymentDetails);

    }

    public function acceptPayment()
    {
        // dd($this->acceptPaymentId);
        $validated = $this->validate([
            'transactionId' => 'required',
            'transactionDate' => 'required|date',
            'transactionNote' => 'required|min:3',
        ]);
        // dd($validated);
        try {
            //code...
            $agentWallet = AgentWalletHistory::find($this->acceptPaymentId);
            $agentWallet->transaction_status = 1;
            $agentWallet->transaction_id = $this->transactionId;
            $agentWallet->transaction_date = $this->transactionDate;
            $agentWallet->transaction_note = $this->transactionNote;
            $agentWallet->save();

            session()->flash('success', 'Request released.');
            $this->isAcceptModalOpen = false;
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th->getMessage());
            $this->isAcceptModalOpen = false;
        }
    }

    public function rejectRequest()
    {

        DB::beginTransaction();
        try {
            //code...
            $agentWallet = AgentWalletHistory::find($this->walletId);
            $agentWallet->transaction_status = 2;
            $agentWallet->transaction_reject_reason = $this->rejectNote;
            $agentWallet->rejected_at = Carbon::now();
            $agentWallet->save();

            AgentProfile::where('user_id', $agentWallet->agent_id)->increment('wallet', $agentWallet->transaction_amount);
            DB::commit();
            session()->flash('success', 'Request rejected.');
            $this->isOpen = false;
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            session()->flash('error', $th->getMessage());
            $this->isOpen = false;
            dd($th->getMessage());
        }
    }

    public function rejectModal($id)
    {
        // dd($id);
        $this->rejectModalOpen = true;
        $this->adminRejectNote = AgentWalletHistory::find($id);
    }
}
