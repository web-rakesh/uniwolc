<?php

namespace App\Http\Livewire\Admin\Setting;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Livewire\Component;
use App\Models\GeneralSetting;

class General extends Component
{

    public $name, $email, $phone_one, $phone_two, $whatsapp, $address_one, $address_two, $country_id, $state_id, $city, $pincode;
    public $processing_fees;
    public $setting;
    public function render()
    {
        $countries = Country::all();
        $states = [];
        if ($this->country_id) {
            $states = State::where('country_id', $this->country_id)->get();
        }
        // $generalSetting = GeneralSetting::first();
        return view('livewire.admin.setting.general', compact('countries', 'states'));
    }

    public function updatedCountryId($value)
    {
        $this->state_id = null;

        if ($this->country_id) {
            $this->state_id = null;
        }
    }

    public function mount()
    {
        $this->setting = GeneralSetting::first();
        if ($this->setting !== null) {

            $this->name =  $this->setting->name;
            $this->email =  $this->setting->email;
            $this->phone_one =  $this->setting->phone_one;
            $this->phone_two =  $this->setting->phone_two;
            $this->whatsapp =  $this->setting->whatsapp;
            $this->address_one =  $this->setting->address_one;
            $this->address_two =  $this->setting->address_two;
            $this->country_id =  $this->setting->country_id;
            $this->state_id =  $this->setting->state_id;
            $this->city =  $this->setting->city;
            $this->pincode =  $this->setting->pincode;
            $this->processing_fees =  $this->setting->processing_fees;
        }
    }


    public function submitForm()
    {
        // You can perform any validation or processing here.
        // For simplicity, we'll just display the submitted data.
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_one' => 'required',
            // 'phone_two' => 'required',
            'whatsapp' => 'required',
            'address_one' => 'required',
            // 'address_two' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            // 'city' => 'required',
            'pincode' => 'required'
        ]);
        if ($this->setting) {

            $this->setting->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone_one' => $this->phone_one,
                'phone_two' => $this->phone_two,
                'whatsapp' => $this->whatsapp,
                'address_one' => $this->address_one,
                'address_two' => $this->address_two,
                'country_id' => $this->country_id,
                'state_id' => $this->state_id,
                'city' => $this->city,
                'pincode' => $this->pincode,
                'processing_fees' => $this->processing_fees,
            ]);
            session()->flash('success', 'Form updated successfully!');
        } else {
            GeneralSetting::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone_one' => $this->phone_one,
                'phone_two' => $this->phone_two,
                'whatsapp' => $this->whatsapp,
                'address_one' => $this->address_one,
                'address_two' => $this->address_two,
                'country_id' => $this->country_id,
                'state_id' => $this->state_id,
                'city' => $this->city,
                'pincode' => $this->pincode,
                'processing_fees' => $this->processing_fees,
            ]);
            session()->flash('success', 'Form submitted successfully!');
        }
    }
}
