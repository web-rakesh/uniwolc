@extends('admin.layouts.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="page-header">
                {{-- <h3 class="page-title"> Blogs </h3> --}}
                <nav aria-label="breadcrumb">
                    {{-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol> --}}
                </nav>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if (session('error'))
                            <div class="col-sm-12">
                                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}

                                </div>
                            </div>
                        @endif
                        <p class="card-description"> Agent form elements </p>
                        <form class="forms-sample" method="post" action="{{ route('admin.agent.store') }}">
                            @csrf
                            <input type="hidden" name="agent_update_id" value="{{ $agentDetail->user_id ?? '' }}">
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputName1"
                                    value="{{ $agentDetail ? $agentDetail->name : '' }}" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail3"
                                    value="{{ $agentDetail ? $agentDetail->email : '' }}" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhone">Phone</label>
                                <input type="number" name="phone" class="form-control" id="exampleInputPhone"
                                    value="{{ $agentDetail ? $agentDetail->phone : '' }}" placeholder="Phone number">
                            </div>

                            <div class="form-group">
                                <label for="exampleAddress">Address</label>
                                <textarea class="form-control" name="address" id="exampleAddress" rows="4">{{ $agentDetail ? $agentDetail->name : '' }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleCountry">Country</label>
                                <select class="form-select" name="country" id="getCurrency">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $item)
                                        <option value="{{ $item->id }}"
                                            {{ isset($agentDetail) ? ($agentDetail->country == $item->id ? 'selected' : '') : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>State</label>
                                <select class="form-select" id="state-dropdown" name="state">
                                    @if ($agentDetail)
                                        <option value="{{ $agentDetail->state }}">
                                            {{ get_state($agentDetail->state) }}</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <select class="form-select" id="city-dropdown" name="city">
                                    @if ($agentDetail)
                                        <option value="{{ $agentDetail->city }}">
                                            {{ get_state($agentDetail->city) }}</option>
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="examplePostalCode">Postal Code</label>
                                <input type="text" name="postal_code" class="form-control" id="examplePostalCode"
                                    value="{{ $agentDetail ? $agentDetail->postal_code : '' }}" placeholder="Postal Code">
                            </div>
                            <button type="submit"
                                class="btn btn-gradient-primary me-2">{{ @$agentDetail ? 'Update' : 'Submit' }}</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {

            var countryIdUpd = $("#getCurrency").val();
            var stateIdUpd = $("#state-dropdown").val();
            var cityIdUpd = $("#city-dropdown").val();
            getCountry(countryIdUpd)
            $("#getCurrency").change(function() {
                var id_country = $(this).val();
                getCountry(id_country)
            });

            function getCountry(id_country) {

                $.ajax({
                    url: "{{ route('admin.currency') }}",
                    method: 'GET',
                    data: {
                        id_country: id_country,

                    },
                    success: function(data) {

                        $(".currency-icon").html(data.currency);

                        $('#state-dropdown').html('<option value="">Select State</option>');
                        $.each(data.states, function(key, value) {
                            var selectState = stateIdUpd == value.id ? 'selected' : '';
                            $("#state-dropdown").append('<option value="' + value.id +
                                '" ' + selectState + '>' + value.name + '</option>');
                        });
                        $('#city-dropdown').html(
                            '<option value="">Select State First</option>');

                        getState(stateIdUpd)
                    }
                });
            }


            $('#state-dropdown').on('change', function() {
                var idState = this.value;
                $("#city-dropdown").html('');
                getState(idState);
            });

            function getState(idState) {
                $.ajax({
                    url: "{{ url('admin/fetch-cities') }}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function(key, value) {
                            var selectCity = cityIdUpd == value.id ? 'selected' : '';
                            $("#city-dropdown").append('<option value="' + value
                                .id + '"' + selectCity + '>' + value.name + '</option>');
                        });
                    }
                });
            }

        });
    </script>
@endpush
