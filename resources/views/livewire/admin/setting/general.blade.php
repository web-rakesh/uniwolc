<div>
    {{-- In work, do what you enjoy. --}}
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                {{-- <h4 class="card-title">General Setting form elements</h4>
                <p class="card-description"> General Setting form elements </p> --}}
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form class="forms-sample" wire:submit.prevent="submitForm">
                    <div class="form-group">
                        <label for="name">Name <samp class="text-danger">*</samp></label>
                        <input type="text" class="form-control" wire:model="name" id="name" placeholder="Name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Support Email address <samp class="text-danger">*</samp></label>
                        <input type="email" class="form-control" wire:model="email" id="email"
                            placeholder="Email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone_one">Phone 1 <samp class="text-danger">*</samp></label>
                        <input type="number" class="form-control" wire:model="phone_one" id="phone_one"
                            placeholder="Phone 1">
                        @error('phone_one')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone_two">Phone 2</label>
                        <input type="number" class="form-control" wire:model="phone_two" id="phone_two"
                            placeholder="Phone 2">
                    </div>
                    <div class="form-group">
                        <label for="whatsapp">Whatsapp <samp class="text-danger">*</samp></label>
                        <input type="number" class="form-control" wire:model="whatsapp" id="whatsapp"
                            placeholder="Whatsapp">
                        @error('whatsapp')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address_one">Address 1 <samp class="text-danger">*</samp></label>
                        <input type="text" class="form-control" wire:model="address_one" id="address_one"
                            placeholder="Address 1">
                        @error('address_one')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address_two">Address 2</label>
                        <input type="text" class="form-control" wire:model="address_two" id="address_two"
                            placeholder="Address 2">
                    </div>
                    <div class="form-group">
                        <label for="country">Country <samp class="text-danger">*</samp></label>
                        <select class="form-select" wire:model="country_id" id="country">
                            <option> Select Country</option>
                            @foreach ($countries as $item)
                                <option value="{{ $item->id }}"> {{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="state">State <samp class="text-danger">*</samp></label>
                        <select class="form-select" wire:model="state_id" id="state">
                            <option value="">Select State</option>
                            @foreach ($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                        @error('state_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" wire:model="city" id="city" placeholder="city">
                    </div>
                    <div class="form-group">
                        <label for="zipcode">Zipcode <samp class="text-danger">*</samp></label>
                        <input type="number" class="form-control" wire:model="pincode" id="zipcode"
                            placeholder="Zipcode">
                        @error('pincode')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <hr>
                    <div class="form-group pt-3">
                        <label>Payment Setting</label>
                    </div>
                    <div class="form-group">
                        <label>Prossing Fees</label>
                        <input type="number" min="0" class="form-control" wire:model="processing_fees"
                            id="processing_fees" placeholder="Prossing Fees">
                    </div>
                    <button type="submit"
                        class="btn btn-gradient-primary me-2">{{ $email == '' ? 'Submit' : 'Update' }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
