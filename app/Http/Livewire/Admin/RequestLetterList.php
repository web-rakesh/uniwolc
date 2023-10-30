<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\RequestLetter;
use Illuminate\Support\Facades\DB;

class RequestLetterList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchItem, $country_id, $confirming;
    public $countries;

    public function render()
    {
        $this->countries = DB::table('countries')->get();
        $requestLetters = RequestLetter::query()
            ->when($this->searchItem, function ($query, $search) {
                $query->where('student_name', 'LIKE', "%{$search}%");
                $query->orWhere('email', 'LIKE', "%{$search}%");
            })
            ->when($this->country_id, function ($query, $country_id) {
                $query->whereHas('university', function ($query) use ($country_id) {
                    $query->where('country', $country_id);
                });

            })

            ->paginate(10);
        return view('livewire.admin.request-letter-list', ['requestLetters' => $requestLetters]);
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
            RequestLetter::destroy($id);
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
