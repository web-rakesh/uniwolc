@extends('agent.layouts.layout')
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
                                    <p class="userName font-weight-bold mb-0">Test Student</p>
                                    <p class="text text-black-50 mb-0">teststd@gmail.com</p>
                                </div>
                            </div>
                            <div class="dasboardLeftSideBarMenuArea">
                                <ul class="nav">
                                    <li class="nav-item active">
                                        <a class="nav-link"
                                            href="{{ route('agent.student.general.detail', $studentDetail ? $studentDetail->user_id : '') }}"><span
                                                class="icon"><i class="fa-regular fa-address-card"></i></span> <span
                                                class="txt">General Info</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ $studentDetail ? route('agent.student.education.history', $studentDetail ? $studentDetail->user_id : '') : 'javascript:;' }}"><span
                                                class="icon"><i class="fa-regular fa-graduation-cap"></i></span> <span
                                                class="txt">Education History</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ $studentDetail ? route('agent.student.test.score', $studentDetail ? $studentDetail->user_id : '') : 'javascript:;' }}"><span
                                                class="icon"><i class="fa-regular fa-rectangle-list"></i></span> <span
                                                class="txt">Test Score</span> </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ $studentDetail ? route('agent.student.visa.permit', $studentDetail ? $studentDetail->user_id : '') : 'javascript:;' }}"><span
                                                class="icon"><i class="fa-regular fa-id-card-clip"></i></span> <span
                                                class="txt">Visa
                                                &amp; Study Permit</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 columnBox border-right dasboardrightPart">
                        <div class="dasboardrightPartWrapper">
                            <div class="p-3 py-5 dasboardrightPartWrapperinner">
                                <!--
                                                                                                                                                                                                                                                                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                                                                                                                                                                                                                                                                    <h4 class="text-right">Update Profile</h4>
                                                                                                                                                                                                                                                                                                </div>-->
                                <h4 class="card-title text-center1 mb-0"> Update Profiles</h4>
                                <hr>
                                <form method="post" action="{{ route('agent.student-general-detail.store') }}">
                                    @csrf
                                    <input type="hidden" name="user_id"
                                        value="{{ $studentDetail ? $studentDetail->user_id : '' }}">
                                    <div class="row rowBox2 mt-3">

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">First Name</label>
                                            <input type="text" class="form-control" placeholder="first name"
                                                name="first_name"
                                                value="{{ $studentDetail->first_name ?? old('first_name') }}"
                                                required="">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Middle Name</label>
                                            <input type="text" class="form-control" placeholder="Middle Name"
                                                name="middle_name"
                                                value="{{ $studentDetail->middle_name ?? old('middle_name') }}">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Last Name</label><input type="text"
                                                class="form-control" name="last_name" placeholder="surname"
                                                value="{{ $studentDetail->last_name ?? old('last_name') }}" required="">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Email ID</label>
                                            <input type="email" class="form-control" placeholder="Enter email id"
                                                name="email"
                                                value="{{ auth()->user()->type == 'student' ? auth()->user()->email : (auth()->user()->type !== 'student' ? ($studentDetail ? $studentDetail->email : '') : '') }}"
                                                {{ auth()->user()->type == 'agent' ? '' : (auth()->user()->type == 'staff' ? '' : 'readonly') }}>
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Country Code</label>

                                            <select class="form-control" name="country_code" required="">
                                                <option value=""> Select phone code </option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->phonecode }}"
                                                        {{ $studentDetail ? ($studentDetail->country_code == $country->phonecode ? 'selected' : '') : '' }}>
                                                        {{ $country->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Mobile Number</label>
                                            <input type="number" class="form-control" placeholder="enter mobile number"
                                                name="mobile_number"
                                                value="{{ $studentDetail->mobile_number ?? old('mobile_number') }}"
                                                required="">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Alternative Country Code</label>
                                            <select class="form-control" name="alt_country_code" required="">
                                                <option value=""> Select Alternative phone code </option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->phonecode }}"
                                                        {{ $studentDetail ? ($studentDetail->alt_country_code == $country->phonecode ? 'selected' : '') : '' }}>
                                                        {{ $country->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Alternate Mobile Number</label>
                                            <input type="number" class="form-control"
                                                placeholder="enter alternative mobile number" name="alt_mobile_number"
                                                value="{{ $studentDetail->alt_mobile_number ?? old('alt_mobile_number') }}"
                                                required="">
                                        </div>
                                        <div class="col-md-6 columnBox2">
                                            <label class="labels">Address</label>
                                            <input type="text" class="form-control" placeholder="Enter address"
                                                name="address" value="{{ $studentDetail->address ?? old('address') }}"
                                                required="">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Student Source Country</label>
                                            <select class="form-control" name="country" id="getCurrency" required="">
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ $studentDetail ? ($studentDetail->country == $country->id ? 'selected' : '') : '' }}>
                                                        {{ $country->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Student State</label>
                                            <select class="form-control" name="state" id="state-dropdown"
                                                required="">
                                                @if ($studentDetail)
                                                    <option value="{{ $studentDetail->state }}">
                                                        {{ get_state($studentDetail->state) }}</option>
                                                @endif
                                            </select>
                                        </div>

                                        <div class="col-md-6 columnBox2">
                                            <label class="labels">City</label>
                                            <select class="form-control" id="city-dropdown" name="city"
                                                required="">
                                                @if ($studentDetail)
                                                    <option value="{{ $studentDetail->city }}">
                                                        {{ get_state($studentDetail->city) }}</option>
                                                @endif
                                            </select>
                                            {{-- <input type="text" class="form-control" placeholder="Enter city"
                                                name="city" value="{{ $studentDetail->city ?? old('city') }}"
                                                required=""> --}}
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Postcode / Zipcode</label>
                                            <input type="number" class="form-control"
                                                placeholder="Enter your Postcode / Zipcode" name="pincode"
                                                value="{{ $studentDetail->pincode ?? old('pincode') }}" required="">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Passport Number</label>
                                            <input type="text" class="form-control"
                                                placeholder="Enter your passport number" name="passport_number"
                                                value="{{ $studentDetail->passport_number ?? old('passport_number') }}"
                                                required="">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Passport Expiry Date</label>
                                            <input type="date" class="form-control"
                                                placeholder="Enter your passport expiry date" name="passport_expiry_date"
                                                value="{{ date('Y-m-d', strtotime($studentDetail->passport_expiry_date ?? now())) ?? old('passport_expiry_date') }}"
                                                required="">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Marital Status</label>
                                            <select class="form-control" name="marital_status" required="">
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Gender</label>
                                            <select class="form-control" name="gender" required="">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Date of Birth</label>
                                            <input type="date" class="form-control"
                                                placeholder="Enter your date of birth" name="dob"
                                                value="{{ date('Y-m-d', strtotime($studentDetail->dob ?? now())) ?? old('dob') }}"
                                                required="">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Fast Language</label>
                                            <input type="text" class="form-control"
                                                placeholder="Enter your fast language" name="fast_language"
                                                value="{{ $studentDetail->fast_language ?? old('fast_language') }}"
                                                required="">
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Website</label>
                                            <input type="text" class="form-control" placeholder="Enter your website"
                                                name="website" value="{{ $studentDetail->website ?? old('website') }}">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Twitter</label>
                                            <input type="text" class="form-control" placeholder="Enter your twitter"
                                                name="twitter" value="{{ $studentDetail->twitter ?? old('twitter') }}">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Instagram</label>
                                            <input type="text" class="form-control" placeholder="Enter your instagram"
                                                name="instagram"
                                                value="{{ $studentDetail->instagram ?? old('instagram') }}">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Facebook</label>
                                            <input type="text" class="form-control" placeholder="Enter your facebook"
                                                name="facebook"
                                                value="{{ $studentDetail->facebook ?? old('facebook') }}">
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
