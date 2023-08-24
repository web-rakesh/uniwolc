@extends('university.layouts.layout')
@section('content')
    <section class="dashboardPgaesSec bg-white">
        <div class="container rounded">
            <div class="dashboardPgaesSecinner">
                <div class="row rowBox">

                    <div class="col-md-9 columnBox border-right dasboardrightPart">
                        <div class="dasboardrightPartWrapper">
                            <div class="p-3 py-5 dasboardrightPartWrapperinner">
                                <h4 class="card-title text-center1 mb-0">Edit Profile</h4>
                                <hr>
                                <form method="post" action="{{ route('university.profile.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row rowBox2 mt-3">
                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">University Name</label>
                                            <input type="text" class="form-control" placeholder="" name="university_name"
                                                value="{{ $profileDetail->university_name ?? old('university_name') }}"
                                                required="">
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Phone No.</label><input type="text"
                                                class="form-control" name="phone_number"
                                                value="{{ $profileDetail->phone_number ?? old('phone_number') }}"
                                                required="">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $profileDetail->email ?? old('email') }}">
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label>Study Permit / Visa </label>
                                            <select class="form-control" name="permit_visa">
                                                <option value="">I don't have this</option>
                                                <option value="usa_f1"
                                                    {{ isset($profileDetail->permit_visa) ? ($profileDetail->permit_visa == 'usa_f1' ? 'selected' : '') : '' }}>
                                                    USA F1 Visa
                                                </option>
                                                <option value="canada"
                                                    {{ isset($profileDetail->permit_visa) ? ($profileDetail->permit_visa == 'canada' ? 'selected' : '') : '' }}>
                                                    Canadian Study
                                                    Permit or Visitor Visa</option>
                                                <option value="uk"
                                                    {{ isset($profileDetail->permit_visa) ? ($profileDetail->permit_visa == 'uk' ? 'selected' : '') : '' }}>
                                                    UK Student Visa (Tier 4) or short Term Study Visa
                                                </option>
                                                <option value="australian"
                                                    {{ isset($profileDetail->permit_visa) ? ($profileDetail->permit_visa == 'australian' ? 'selected' : '') : '' }}>
                                                    Australian
                                                    Student Visa</option>
                                                <option value="irish"
                                                    {{ isset($profileDetail->permit_visa) ? ($profileDetail->permit_visa == 'irish' ? 'selected' : '') : '' }}>
                                                    Irish Stamp 2
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label>Nationality </label>
                                            <select class="form-control" name="country" id="getCurrency">

                                                <option value="">Select Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        data-currency="{{ $country->name }}"
                                                        {{ isset($profileDetail) ? ($profileDetail->country == $country->id ? 'selected' : '') : '' }}>
                                                        {{ $country->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label>State </label>
                                            <select class="form-control" id="state-dropdown" name="state">
                                                @if (@$profileDetail)
                                                    <option value="{{ $profileDetail->city }}">
                                                        {{ get_city($profileDetail->city) }}</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label>City </label>
                                            <select class="form-control" id="city-dropdown" name="city">
                                                @if (@$profileDetail)
                                                    <option value="{{ $profileDetail->city }}">
                                                        {{ get_city($profileDetail->city) }}</option>
                                                @endif
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">University Address</label>
                                            <textarea class="form-control" name="address" rows="3">{{ $profileDetail->address ?? old('address') }}</textarea>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">About University</label>
                                            <textarea class="form-control" name="about_university" rows="3">{{ $profileDetail->about_university ?? old('about_university') }}</textarea>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Features</label>
                                            <textarea class="form-control" name="feature" rows="3">{{ $profileDetail->feature ?? old('feature') }}</textarea>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Location</label>
                                            <textarea class="form-control" name="location" rows="3">{{ $profileDetail->location ?? old('location') }}</textarea>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels"><b>Institution Details</b></label>
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Founded</label>
                                            <input type="text" class="form-control" name="founded"
                                                value="{{ $profileDetail->founded ?? old('founded') }}">
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">School ID</label>
                                            <input type="text" class="form-control" name="school_id"
                                                value="{{ $profileDetail->school_id ?? old('school_id') }}">
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Provider ID number</label>
                                            <input type="text" class="form-control" name="provider_id_number"
                                                value="{{ $profileDetail->provider_id_number ?? old('provider_id_number') }}">
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Institution type</label>
                                            <input type="text" class="form-control" name="institution_type"
                                                value="{{ $profileDetail->institution_type ?? old('institution_type') }}">
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Blocked Countries</label>
                                            <select class="form-control" name="blocked_country[]" multiple>

                                                <option value="">Select Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ isset($universityDetail) ? (in_array($country->id, explode(',', $universityDetail->blocked_country)) == true ? 'selected' : '') : '' }}>
                                                        {{ $country->name }}

                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Average Time to Receive Letter of Acceptance</label>
                                            <textarea class="form-control" name="letter_of_acceptance" rows="3">{{ $profileDetail->letter_of_acceptance ?? old('letter_of_acceptance') }}</textarea>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Top Disciplines</label>
                                            <textarea class="form-control" name="disciplines" rows="3">{{ $profileDetail->disciplines ?? old('disciplines') }}</textarea>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">University Pictures</label>
                                            <input type="file" name="university_picture[]" class="form-control"
                                                multiple="" accept="image/png, image/jpeg">

                                        </div>

                                        @foreach ($profileDetail->getMedia('university-picture') ?? [] as $image)
                                            <div class="col-md-3 mb-3 columnBox2">
                                                <img src="{{ $image->getUrl() }}" alt="{{ $image->getUrl() }}"
                                                    class="w-20 h-20 shadow">
                                            </div>
                                        @endforeach

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
            // alert();
            var upd_country = $("#getCurrency").val();
            var upd_state = $("#state-dropdown").val();
            var upd_city = $("#city-dropdown").val();
            getState(upd_country)

            $("#getCurrency").change(function() {
                // $(this).find(':selected').attr('data-id')
                var id_country = $(this).val();
                getState(id_country)

            });

            function getState(id_country) {
                $.ajax({
                    url: "{{ route('currency') }}",
                    method: 'GET',
                    data: {
                        id_country: id_country,

                    },
                    success: function(data) {

                        $(".currency-icon").html(data.currency);

                        $('#state-dropdown').html('<option value="">Select State</option>');
                        $.each(data.states, function(key, value) {
                            var selectState = upd_state == value.id ? 'selected' : '';
                            $("#state-dropdown").append('<option value="' + value.id +
                                '" ' + selectState + '>' + value.name + '</option>');
                        });
                        $('#city-dropdown').html(
                            '<option value="">Select State First</option>');
                        upd_state ? getCity(upd_state) : ''

                    }
                });
            }

            $('#state-dropdown').on('change', function() {
                var idState = this.value;
                getCity(idState)

            });

            function getCity(city) {
                // alert(city)
                $("#city-dropdown").html('');
                $.ajax({
                    url: "{{ route('cities') }}",
                    type: "POST",
                    data: {
                        state_id: city,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function(key, value) {
                            var selectCity = upd_city == value.id ? 'selected' : '';
                            $("#city-dropdown").append('<option value="' + value
                                .id + '" ' + selectCity + '>' + value.name + '</option>');
                        });
                    }
                });
            }

        });
    </script>
@endpush
