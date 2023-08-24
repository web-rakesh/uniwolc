@extends('staff.layouts.layout')
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
                                @include('flash-messages')
                                <form method="post" action="{{ route('staff.profile.update') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row rowBox2 mt-3">
                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels"> Name</label>
                                            <input type="text" class="form-control" placeholder="" name="name"
                                                value="{{ $profileDetail->name ?? old('name') }}" required="">
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $profileDetail->email ?? old('email') }}">
                                        </div>



                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label>Conutry </label>
                                            <select class="form-control" name="country" id="getCurrency">
                                                <option value="">Select Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ @$profileDetail && $profileDetail->country == $country->id ? 'selected' : '' }}>
                                                        {{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label>State </label>
                                            <select class="form-control" name="state" id="state-dropdown">
                                                @if (@$profileDetail)
                                                    <option value="{{ $profileDetail->state }}">
                                                        {{ get_state($profileDetail->state) }}</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label>City</label>
                                            <select class="form-control" name="city" id="city-dropdown">
                                                @if (@$profileDetail)
                                                    <option value="{{ $profileDetail->city }}">
                                                        {{ get_state($profileDetail->city) }}</option>
                                                @endif
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels"> Address</label>
                                            <textarea class="form-control" name="address" rows="3">{{ $profileDetail->address ?? old('address') }}</textarea>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">location</label>
                                            <textarea class="form-control" name="location" rows="3">{{ $profileDetail->location ?? old('location') }}</textarea>
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
