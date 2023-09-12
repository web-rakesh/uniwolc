<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class RegisterList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $type;
    public $label, $searchItem, $confirming;

    public function render()
    {
        $this->type == '0' ? $this->label = 'Student' : ($this->type == '1' ? $this->label = 'Agent' : $this->label = 'University');
        // dd($this->type);
        // $registers = User::where('type', (string)$this->type)->where('profile_is_updated', '0')->paginate(10);
        $registers = User::query()->where('type', (string)$this->type)
            ->where('profile_is_updated', '0')
            // ->where('email_verified_at', '!=', null)
            ->where('email', '!=', null)
            ->when($this->searchItem, function ($query, $search) {
                $query->where('email', 'LIKE', "%{$search}%");
            })
            ->latest()
            ->paginate(10);


        return view('livewire.admin.register-list', ['registers' => $registers]);
    }
}
