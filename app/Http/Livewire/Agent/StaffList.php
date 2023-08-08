<?php

namespace App\Http\Livewire\Agent;

use App\Models\User;
use App\Models\Staff;
use App\Models\State;
use App\Models\Country;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class StaffList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $isOpen = 0;
    public  $staff_id, $name, $email,  $country_code, $phone_number, $address, $city, $state_id, $country_id, $location;
    public $searchItem, $paginationCount = 10;

    public function render()
    {

        $countries = Country::all();
        $states = [];
        if ($this->country_id) {
            $states = State::where('country_id', $this->country_id)->get();
        }
        $agents = Staff::latest()
            ->where('agent_id', Auth::user()->id)
            ->when($this->searchItem, function ($query, $search) {
                $query->where('name', 'LIKE', "%{$search}%");
                $query->orWhere('email', 'LIKE', "%{$search}%");
                $query->orWhere('country', 'LIKE', "%{$search}%");
                $query->orWhere('address', 'LIKE', "%{$search}%");
            })


            ->paginate($this->paginationCount);

        return view('livewire.agent.staff-list', ['agents' => $agents], compact('countries', 'states'));
    }

    public function updatedCountryId($value)
    {
        $this->state_id = null;

        if ($this->country_id) {
            $this->state_id = null;
        }
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
        $this->name = '';
        $this->email = '';
        $this->country_code = '';
        $this->phone_number = '';
        $this->address = '';
        $this->city = '';
        $this->state_id = '';
        $this->country_id = '';
        $this->location = '';
        $this->staff_id = '';
    }

    public function store()
    {
        $this->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state_id' => ['required'],
            'country_id' => ['required'],
            'location' => ['required', 'string', 'max:255'],

        ]);
        DB::beginTransaction();
        try {
            //code...

            $staff = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make('password'),
            ]);
            $staff->type = 3;
            $staff->save();

            Staff::create([
                'agent_id' => Auth::user()->id,
                'user_id' => $staff->id,
                'name' => $this->name,
                'email' => $staff->email,
                'country_code' => $this->country_code,
                'phone_number' => $this->phone_number,
                'address' => $this->address,
                'city' => $this->city,
                'state' => $this->state_id,
                'country' => $this->country_id,
                'location' => $this->location,
            ]);


            session()->flash(
                'message',
                'Agent Created Successfully.'
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
        $agent = Staff::findOrFail($id);
        $this->staff_id = $id;
        $this->name  = $agent->name;
        $this->email  = $agent->email;
        $this->country_code = $agent->country_code;
        $this->phone_number = $agent->phone_number;
        $this->address = $agent->address;
        $this->city = $agent->city;
        $this->state_id = $agent->state;
        $this->country_id = $agent->country;
        $this->location = $agent->location;

        $this->openModal();
    }

    public function update()
    {
        $agent = Staff::findOrFail($this->staff_id);

        $this->validate([
            'name' => ['required',  'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $agent->user_id],
            'phone_number' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'country_id' => ['required'],
            'state_id' => ['required'],
            'city' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],

        ]);
        DB::beginTransaction();
        try {
            //code...

            $agent->update([
                'name' => $this->name,
                'email' => $this->email,
                'country_code' => $this->country_code,
                'phone_number' => $this->phone_number,
                'address' => $this->address,
                'city' => $this->city,
                'state' => $this->state_id,
                'country' => $this->country_id,
                'location' => $this->location,
            ]);
            session()->flash(
                'message',
                'Agent Updated Successfully.'
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

    public function delete($id)
    {
        $agent = Staff::findOrFail($id);
        // dd($agent->user_id);
        User::find($agent->user_id)->delete();
        session()->flash('message', 'Agent Deleted Successfully.');
    }
}
