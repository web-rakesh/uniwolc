@extends('admin.layouts.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h5>General Information</h5>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-6">Name:</label>
                                    <div class="col-sm-6">{{ $profile->first_name }} {{ $profile->last_name }}</div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-6">Email:</label>
                                    <div class="col-sm-6">{{ $profile->email }}</div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-6">Phone:</label>
                                    <div class="col-sm-6">{{ $profile->mobile_number }}</div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-6">gender:</label>
                                    <div class="col-sm-6">{{ $profile->gender }}</div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-6">dob:</label>
                                    <div class="col-sm-6">{{ $profile->dob }}</div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-6">fast_language:</label>
                                    <div class="col-sm-6">{{ $profile->fast_language }}</div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-6">gender:</label>
                                    <div class="col-sm-6">{{ $profile->gender }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-6">passport_number:</label>
                                    <div class="col-sm-6">{{ $profile->passport_number }} </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-6">marital_status:</label>
                                    <div class="col-sm-6">{{ $profile->marital_status }}</div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-6">address:</label>
                                    <div class="col-sm-6">{{ $profile->address }}</div>
                                </div>
                                <div class="col-md-6 mb-3 columnBox2">
                                    <label class="labels">Student Source Country</label>
                                    <select class="form-control" name="country" id="getCurrency" required="">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ $profile ? ($profile->country == $country->id ? 'selected' : '') : '' }}>
                                                {{ $country->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-6 mb-3 columnBox2">
                                    <label class="labels">Student State</label>
                                    <select class="form-control" name="state" id="state-dropdown" required="">

                                    </select>
                                </div>

                                <div class="col-md-6 columnBox2">
                                    <label class="labels">City</label>
                                    <select class="form-control" id="city-dropdown" name="city" required="">

                                    </select>
                                    {{-- <input type="text" class="form-control" placeholder="Enter city"
                                                name="city" value="{{ $studentDetail->city ?? old('city') }}"
                                                required=""> --}}
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-6">pincode:</label>
                                    <div class="col-sm-6">{{ $profile->pincode }}</div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-6">website:</label>
                                    <div class="col-sm-6">{{ $profile->website }}</div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                    aria-selected="true">All Apply Programs</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">Block Programs</button>

                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">

                                <div class="table-responsive mt-4">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>program_title</th>
                                                <th>application_number</th>
                                                <th>start_date</th>
                                                <th>application_status</th>
                                                <th>fees</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($allApplyProgram as $value)
                                                <tr>
                                                    <td>{{ $value->program_title }}</td>
                                                    <td>{{ $value->application_number }}</td>
                                                    <td>{{ $value->start_date }}</td>
                                                    <td>{{ $value->application_status == 1 ? 'Paid' : 'Pending' }}</td>
                                                    <td>{{ $value->fees }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">

                                <div class="table-responsive  mt-4">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>program_title</th>
                                                <th>application_number</th>
                                                <th>start_date</th>
                                                <th>application_status</th>
                                                <th>fees</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($blockProgram as $value)
                                                <tr>
                                                    <td>{{ $value->program_title }}</td>
                                                    <td>{{ $value->application_number }}</td>
                                                    <td>{{ $value->start_date }}</td>
                                                    <td>{{ $value->application_status == 1 ? 'Paid' : 'Pending' }}</td>
                                                    <td>{{ $value->fees }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
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
