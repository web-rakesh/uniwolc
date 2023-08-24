@extends('agent.layouts.layout')
@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Category</a></li>
            <li class="breadcrumb-item active" aria-current="page">Current Page</li>
        </ol>
    </nav>
@endsection
@section('content')
    <section class="dashboardPgaesSec bg-white">
        <div class="container rounded">
            <div class="dashboardPgaesSecinner">
                <div class="row rowBox">
                    <div class="col-md-3 columnBox border-right dasboardLeftSideBar">
                        <div class="dasboardLeftSideBarinner">
                            <div class="d-flex flex-column align-items-center text-center userProfileArea">
                                <div class="userProfileThumnail">
                                    <img class="rounded-circle" width=""
                                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                </div>
                                <div class="userProfileInfo">
                                    <p class="userName font-weight-bold mb-0">{{ auth()->user()->name }}</p>
                                    <p class="text text-black-50 mb-0">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                            <div class="dasboardLeftSideBarMenuArea">
                                <ul class="nav">
                                    <li class="nav-item active">
                                        <a class="nav-link"
                                            href="{{ route('agent.general.details', $agentDetail ? $agentDetail->user_id : '') }}"><span
                                                class="icon"><i class="fa-regular fa-address-card"></i></span> <span
                                                class="txt">General Info</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ $agentDetail ? route('agent.bank.details', $agentDetail ? $agentDetail->user_id : '') : 'javascript:;' }}"><span
                                                class="icon"><i class="fa-regular fa-graduation-cap"></i></span> <span
                                                class="txt">Banking</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ $agentDetail ? route('agent.bank.details', $agentDetail ? $agentDetail->user_id : '') : 'javascript:;' }}"><span
                                                class="icon"><i class="fa-regular fa-rectangle-list"></i></span> <span
                                                class="txt">School Commissions</span> </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ $agentDetail ? route('agent.commission.policy', $agentDetail ? $agentDetail->user_id : '') : 'javascript:;' }}"><span
                                                class="icon"><i class="fa-regular fa-id-card-clip"></i></span> <span
                                                class="txt">Commission Policy</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ $agentDetail ? route('agent.manage.staff', $agentDetail ? $agentDetail->user_id : '') : 'javascript:;' }}"><span
                                                class="icon"><i class="fa-regular fa-id-card-clip"></i></span> <span
                                                class="txt">Manage Staff</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 columnBox border-right dasboardrightPart">
                        <div class="dasboardrightPartWrapper">

                            <h4 class="card-title text-center1 mb-0"> Update Profiles</h4>
                            <hr>
                            @include('flash-messages')
                            <form method="post" enctype="multipart/form-data"
                                action="{{ route('agent.general.details.store') }}">
                                @csrf
                                <input type="hidden" name="user_id"
                                    value="{{ $agentDetail ? $agentDetail->user_id : '' }}">
                                <div class="row rowBox2 mt-3">

                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels">Company Logo</label>
                                        <input type="file" class="form-control" placeholder="Company Logo"
                                            name="company_logo">
                                        @if ($errors->has('company_logo'))
                                            <span class="text-danger">{{ $errors->first('company_logo') }}</span>
                                        @endif

                                        <img src="{{ $agentDetail->getFirstMediaUrl('agent-company-logo', 'thumb') }}"
                                            width="120px">
                                    </div>
                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels">Certification of Incorporation/Trade Licence</label>
                                        <input type="file" class="form-control" name="trade_license">
                                        @if ($errors->has('trade_license'))
                                            <span class="text-danger">{{ $errors->first('trade_license') }}</span>
                                        @endif
                                        <img src="{{ $agentDetail->getFirstMediaUrl('agent-company-logo', 'thumb') }}"
                                            width="120px">
                                    </div>
                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels">Address Proof</label>
                                        <input type="file" class="form-control" name="address_proof">
                                        @if ($errors->has('address_proof'))
                                            <span class="text-danger">{{ $errors->first('address_proof') }}</span>
                                        @endif
                                        <img src="{{ $agentDetail->getFirstMediaUrl('agent-company-logo', 'thumb') }}"
                                            width="120px">
                                    </div>
                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels">Tax Registration number <small>(optional)</small></label>
                                        <input type="file" class="form-control" name="tax_register_proof">
                                        <img src="{{ $agentDetail->getFirstMediaUrl('agent-company-logo', 'thumb') }}"
                                            width="120px">
                                    </div>

                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels">Company Name</label>
                                        <input type="text" class="form-control" placeholder="Company Name"
                                            name="company_name"
                                            value="{{ $agentDetail->company_name ?? old('company_name') }}"
                                            required="">
                                        @if ($errors->has('company_name'))
                                            <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels">Company Email</label>
                                        <input type="email" class="form-control" placeholder="Company Email"
                                            name="company_email"
                                            value="{{ $agentDetail->company_email ?? old('company_email') }}">
                                        @if ($errors->has('company_email'))
                                            <span class="text-danger">{{ $errors->first('company_email') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels">Company Website</label>
                                        <input type="text" class="form-control" placeholder="Company Website"
                                            name="company_website"
                                            value="{{ $agentDetail->company_website ?? old('company_website') }}"
                                            required="">
                                        @if ($errors->has('company_website'))
                                            <span class="text-danger">{{ $errors->first('company_website') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels">Skype Id</label>
                                        <input type="text" class="form-control" placeholder="Skype Id" name="skype"
                                            value="{{ $agentDetail->skype ?? old('skype') }}" required="">
                                        @if ($errors->has('skype'))
                                            <span class="text-danger">{{ $errors->first('skype') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels">Whatsapp Number</label>
                                        <input type="text" class="form-control" placeholder="Whatsapp Number"
                                            name="company_whatsapp"
                                            value="{{ $agentDetail->company_whatsapp ?? old('whatsapp_number') }}"
                                            required="">
                                        @if ($errors->has('company_whatsapp'))
                                            <span class="text-danger">{{ $errors->first('company_whatsapp') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels">Company Phone One</label>
                                        <input type="number" class="form-control" placeholder="Company Phone One"
                                            name="company_phone_one"
                                            value="{{ $agentDetail->company_phone_one ?? old('company_phone_one') }}"
                                            required="">
                                        @if ($errors->has('company_phone_one'))
                                            <span class="text-danger">{{ $errors->first('company_phone_one') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels">Company Phone Two</label>
                                        <input type="number" class="form-control" placeholder="Company Phone Two"
                                            name="company_phone_two"
                                            value="{{ $agentDetail->company_phone_two ?? old('company_phone_two') }}"
                                            required="">
                                        @if ($errors->has('company_phone_two'))
                                            <span class="text-danger">{{ $errors->first('company_phone_two') }}</span>
                                        @endif
                                    </div>


                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels"> Company Country </label>

                                        <select class="form-control" id="country-dropdown" name="company_country"
                                            required="">
                                            <option value=""> Select country </option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}"
                                                    {{ $agentDetail ? ($agentDetail->company_country == $country->id ? 'selected' : '') : '' }}>
                                                    {{ $country->name }}</option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('company_country'))
                                            <span class="text-danger">{{ $errors->first('company_country') }}</span>
                                        @endif
                                    </div>



                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels">Company Address</label>
                                        <input type="text" class="form-control" placeholder="Company Address"
                                            name="company_address"
                                            value="{{ $agentDetail->company_address ?? old('company_address') }}"
                                            required="">
                                        @if ($errors->has('company_address'))
                                            <span class="text-danger">{{ $errors->first('company_address') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels">Company State</label>
                                        <select class="form-control" id="state-dropdown" name="company_state">
                                            @if ($agentDetail)
                                                <option value="{{ $agentDetail->company_state }}">
                                                    {{ get_state($agentDetail->company_state) }}</option>
                                            @else
                                                <option value=""> Select State </option>
                                            @endif

                                            @foreach ($states ?? [] as $state)
                                                <option value="{{ $state->id }}"
                                                    {{ $agentDetail ? ($agentDetail->company_state == $state->id ? 'selected' : '') : '' }}>
                                                    {{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('company_state'))
                                            <span class="text-danger">{{ $errors->first('company_state') }}</span>
                                        @endif

                                    </div>
                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels">Company City</label>
                                        <input type="text" class="form-control" placeholder="Company City"
                                            name="company_city"
                                            value="{{ $agentDetail->company_city ?? old('company_city') }}"
                                            required="">
                                        @if ($errors->has('company_city'))
                                            <span class="text-danger">{{ $errors->first('company_city') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels">Company Postcode</label>
                                        <input type="text" class="form-control" placeholder="Company Postcode"
                                            name="company_postcode"
                                            value="{{ $agentDetail->company_postcode ?? old('company_postcode') }}"
                                            required="">
                                        @if ($errors->has('company_postcode'))
                                            <span class="text-danger">{{ $errors->first('company_postcode') }}</span>
                                        @endif
                                    </div>


                                </div>
                                <div class="mt-3 text-end">
                                    <button class="btn btn-primary profile-button" type="submit">
                                        Save & Update Profile
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#country-dropdown').on('change', function() {
                var country_id = this.value;

                $("#state-dropdown").html('');
                $.ajax({
                    url: "{{ url('agent/get-states-by-country') }}",
                    type: "POST",
                    data: {
                        country_id: country_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state-dropdown').html('<option value="">Select State</option>');
                        $.each(result.states, function(key, value) {
                            $("#state-dropdown").append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                        $('#city-dropdown').html(
                            '<option value="">Select State First</option>');
                    }
                });
            });
        })
    </script>
@endpush
