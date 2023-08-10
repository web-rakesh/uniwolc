<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\UniversityExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\University\ProfileDetail;

class UniversityList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search, $confirming;
    public function render()
    {
        $university = ProfileDetail::query()
            ->with('getCountry')
            ->when($this->search, function ($query, $search) {
                $query->where('university_name', 'LIKE', "%{$search}%");
                $query->orWhere('email', 'LIKE', "%{$search}%");
            })
            ->latest()
            ->paginate(10);
        return view('livewire.admin.university-list', ['university' => $university]);
    }

    public function universityExport()
    {
        return Excel::download(new UniversityExport, 'university.csv');
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
            ProfileDetail::destroy($id);
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
}
