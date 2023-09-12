<?php

namespace App\Http\Livewire\Agent;

use Livewire\Component;
use App\Models\AgentProfile;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use App\Models\AgentWalletHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WalletList extends Component
{
    public $isOpen = 0, $rejectModalOpen = 0, $searchItem, $startDate, $endDate;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $amount, $note, $totalAmount = 0, $adminRejectNote, $paymentStatus;

    public function render()
    {
        $this->totalAmount = AgentProfile::where('user_id', Auth::user()->id)->first()->wallet ?? 0;
        // dd($this->totalAmount);
        $transactions = AgentWalletHistory::query()
            ->where('agent_id', Auth::user()->id)
            ->whereBetween('created_at', [
                !empty($this->startDate) ? Carbon::parse($this->startDate)->startOfDay() : Carbon::now()->subMonth(), // Default to one month ago if not provided
                !empty($this->endDate) ?  Carbon::parse($this->endDate)->endOfDay() : Carbon::now(),
            ])
            ->when($this->paymentStatus, function ($query, $status) {
                $status = $status == '10' ? 0 : $status;
                return $query->where('transaction_status', $status);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.agent.wallet-list', ['transactions' => $transactions]);
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->rejectModalOpen = false;
    }


    public function submit()
    {
        $limitAmount = $this->totalAmount;
        // $dueAmount = AgentWalletHistory::where('agent_id', Auth::user()->id)->where('transaction_status', 0)->sum('transaction_amount');
        // // dd($limitAmount >= $dueAmount + $this->amount);

        // if ($dueAmount != 0) {
        //     $tltamount =  $dueAmount + $this->amount;
        //     if ($limitAmount >= $tltamount == false) {
        //         $this->isOpen = false;
        //         session()->flash('error', 'Do not have enough balance to request.');
        //         return;
        //     }
        // }

        $this->validate([
            'amount' => 'required|numeric|between:10,' . $this->totalAmount,
            // 'note' => 'regex:/^[a-zA-Z]+$/u',
        ]);
        try {
            //code...
            DB::beginTransaction();

            AgentWalletHistory::create([

                'agent_id' => Auth::user()->id,
                'transaction_amount' => $this->amount,
                'transaction_currency' => 'USD',
                'transaction_remark' => $this->note,

            ]);

            AgentProfile::where('user_id', Auth::user()->id)->update([
                'wallet' => $this->totalAmount - $this->amount,
            ]);

            DB::commit();

            $this->isOpen = false;
            $this->amount = '';
            $this->note = '';
            session()->flash('message', 'Wallet Request Has Successfully Done.');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            session()->flash('error', $th->getMessage());
        }
        // Contact::create($validatedData);

        // return redirect()->to('/form');
    }

    public function rejectModal($id)
    {
        // dd($id);
        $this->rejectModalOpen = true;
        $this->adminRejectNote = AgentWalletHistory::find($id);
    }
}
