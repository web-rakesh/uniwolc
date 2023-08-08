<?php

namespace App\Http\Livewire\Admin\Setting;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\GradingScheme;
use Illuminate\Support\Facades\DB;

class GradingSchema extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchItem;
    public $isOpen = false, $confirming;
    public $scheme, $scheme_id;

    public function render()
    {
        $gradingScheme = GradingScheme::query()

            ->when($this->searchItem, function ($query, $search) {
                $query->where('scheme', 'LIKE', "%{$search}%");
            })

            ->paginate(10);
        return view('livewire.admin.setting.grading-schema', [
            'gradingScheme' => $gradingScheme
        ]);
    }


    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->scheme = '';
        $this->scheme_id = '';
    }

    public function store()
    {
        $this->validate([
            'scheme' => ['required', 'string', 'max:255'],
        ]);
        DB::beginTransaction();
        try {
            //code...
            GradingScheme::create([
                'scheme' => $this->scheme,
            ]);
            session()->flash(
                'message',
                'Education Level Created Successfully.'
            );
            $this->closeModal();
            $this->resetInputFields();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash(
                'message',
                $th->getMessage()
            );
            DB::rollback();
        }
    }
    public function edit($id)
    {
        $education = GradingScheme::findOrFail($id);
        $this->scheme_id = $id;
        $this->scheme  = $education->scheme;

        $this->openModal();
    }

    public function update()
    {
        // dd($this->category_id);
        $education = GradingScheme::findOrFail($this->scheme_id);

        $this->validate([
            'scheme' => ['required', 'string', 'max:255']
        ]);
        DB::beginTransaction();
        try {
            //code...

            $education->update([
                'scheme' => $this->scheme,

            ]);
            session()->flash(
                'message',
                ' Grading Scheme Updated Successfully.'
            );
            $this->closeModal();
            $this->resetInputFields();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash(
                'message',
                $th->getMessage()
            );
            DB::rollback();
        }
    }
    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        try {
            //code...
            DB::beginTransaction();
            GradingScheme::destroy($id);
            session()->flash('message', 'Education Level Deleted Successfully.');
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            session()->flash(
                'message',
                $th->getMessage()
            );
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
