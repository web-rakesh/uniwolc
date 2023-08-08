<?php

namespace App\Http\Livewire\Admin\Setting;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Country as ModelsCountry;

class Country extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchItem, $blockStatus;
    public function render()
    {

        $countries = ModelsCountry::query()

            ->when($this->searchItem, function ($query, $search) {
                $query->where('name', 'LIKE', "%{$search}%");
            })
            ->when($this->blockStatus, function ($query, $block) {
                $query->where('block', $block == '2' ? 0 : 1);
            })

            ->paginate(10);
        return view('livewire.admin.setting.country', [
            'countries' => $countries
        ]);
    }

    #Update the City status Priority
    public function changeStatus(ModelsCountry $country, $priority_check)
    {
        if ($priority_check == 1) {
            $priority_check = 0;
        } else {
            $priority_check = 1;
        }
        $country->update(['block' => $priority_check]);
        $this->dispatchBrowserEvent('hide-directory-form');
    }
}
