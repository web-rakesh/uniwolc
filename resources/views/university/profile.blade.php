@extends('university.layouts.layout')
@push('css')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush
@section('content')
    <section class="dashboardPgaesSec bg-white">
        <div class="container rounded">
            <div class="dashboardPgaesSecinner">
                <div class="row rowBox">

                    <div class="col-md-9 columnBox border-right dasboardrightPart">
                        <div class="dasboardrightPartWrapper">
                            <div class="p-3 py-5 dasboardrightPartWrapperinner">
                                <h4 class="card-title text-center1 mb-0">{{ @$profileDetail ? 'Edit' : 'Create' }} Profile
                                </h4>
                                <hr>
                                @include('flash-messages')
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
                                            <div id="about-university">

                                            </div>
                                            {{-- <textarea class="form-control" name="about_university" rows="3">{{ $profileDetail->about_university ?? old('about_university') }}</textarea> --}}
                                        </div>

                                        <div class="col-md-12 mb-3 mt-5 columnBox2">
                                            <label class="labels">Features</label>
                                            <div id="feature-university">

                                            </div>
                                            {{-- <textarea class="form-control" name="feature" rows="3">{{ $profileDetail->feature ?? old('feature') }}</textarea> --}}
                                        </div>

                                        <div class="col-md-12 mb-3 mt-5 columnBox2">
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
                                        {{--
                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Blocked Countries</label>
                                            <select class="form-control" name="blocked_country[]" multiple>

                                                <option value="">Select Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ isset($profileDetail) ? (in_array($country->id, explode(',', $profileDetail->blocked_country)) == true ? 'selected' : '') : '' }}>
                                                        {{ $country->name }}

                                                    </option>
                                                @endforeach

                                            </select>
                                        </div> --}}

                                        <div class="col-md-12 mb-3 mt-5 columnBox2">
                                            <label class="labels">Average Time to Receive Letter of Acceptance</label>
                                            <div id="letter-of-acceptance-university">

                                            </div>
                                            {{-- <textarea class="form-control" name="letter_of_acceptance" rows="3">{{ $profileDetail->letter_of_acceptance ?? old('letter_of_acceptance') }}</textarea> --}}
                                        </div>

                                        <div class="col-md-12 mb-3 mt-5 columnBox2">
                                            <label class="labels">Top Disciplines</label>
                                            <div id="discipline-university">

                                            </div>
                                            {{-- <textarea class="form-control" name="disciplines" rows="3">{{ $profileDetail->disciplines ?? old('disciplines') }}</textarea> --}}
                                        </div>

                                        <div class="col-md-12 mb-3 mt-5 columnBox2">
                                            <label class="labels">University Pictures</label>
                                            <input type="file" name="university_picture[]" class="form-control"
                                                multiple="" accept="image/png, image/jpeg">

                                        </div>
                                        @if ($profileDetail)
                                            @foreach ($profileDetail->getMedia('university-picture') ?? [] as $image)
                                                <div class="col-md-3 mb-3 columnBox2">
                                                    <img src="{{ $image->getUrl() }}" alt="{{ $image->getUrl() }}"
                                                        class="w-20 h-20 shadow">
                                                </div>
                                            @endforeach
                                        @endif
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
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <!-- Initialize Quill editor -->
    <script>
        // Initialize Quill editor
        // var addressUniversity = new Quill('#university-address', {
        //     theme: 'snow'
        // });
        var aboutUniversity = new Quill('#about-university', {
            theme: 'snow'
        });

        var featureUniversity = new Quill('#feature-university', {
            theme: 'snow'
        });

        // var locationUniversity = new Quill('#location-university', {
        //     theme: 'snow'
        // });

        var letterAcceptanceUniversity = new Quill('#letter-of-acceptance-university', {
            theme: 'snow'
        });

        var disciplineUniversity = new Quill('#discipline-university', {
            theme: 'snow'
        });


        // addressUniversity.root.innerHTML = '{!! $profileDetail->address ?? '' !!}';
        aboutUniversity.root.innerHTML = `{!! $profileDetail->about_university ?? '' !!}`;
        featureUniversity.root.innerHTML = `{!! $profileDetail->feature ?? '' !!}`;
        // locationUniversity.root.innerHTML = '{!! $profileDetail->location ?? '' !!}';
        letterAcceptanceUniversity.root.innerHTML = `{!! $profileDetail->letter_of_acceptance ?? '' !!}`;
        disciplineUniversity.root.innerHTML = `{!! $profileDetail->disciplines ?? '' !!}`;


        document.getElementById('add-university').addEventListener('submit', function(e) {
            // alert('hello');
            // Get the HTML content from the editor
            // var editorAddressUniversity = addressUniversity.root.innerHTML;
            var editorAboutUniversity = aboutUniversity.root.innerHTML;
            var editorFeatureUniversity = featureUniversity.root.innerHTML;
            // var editorLocationUniversity = locationUniversity.root.innerHTML;
            var editorLetterAcceptanceUniversity = letterAcceptanceUniversity.root.innerHTML;
            var editorDisciplineUniversity = disciplineUniversity.root.innerHTML;

            // Set the content as the value of a hidden input field in the form
            // var hiddenAddressUniversity = document.createElement('input');
            // hiddenAddressUniversity.setAttribute('type', 'hidden');
            // hiddenAddressUniversity.setAttribute('name', 'address');
            // hiddenAddressUniversity.setAttribute('value', editorAddressUniversity);
            // this.appendChild(hiddenAddressUniversity);

            // Set the content as the value of a hidden input field in the form
            var hiddenAboutUniversity = document.createElement('input');
            hiddenAboutUniversity.setAttribute('type', 'hidden');
            hiddenAboutUniversity.setAttribute('name', 'about_university');
            hiddenAboutUniversity.setAttribute('value', editorAboutUniversity);
            this.appendChild(hiddenAboutUniversity);

            // Set the content as the value of a hidden input field in the form
            var hiddenFeatureUniversity = document.createElement('input');
            hiddenFeatureUniversity.setAttribute('type', 'hidden');
            hiddenFeatureUniversity.setAttribute('name', 'feature');
            hiddenFeatureUniversity.setAttribute('value', editorFeatureUniversity);
            this.appendChild(hiddenFeatureUniversity);

            // Set the content as the value of a hidden input field in the form
            // var hiddenLocationUniversity = document.createElement('input');
            // hiddenLocationUniversity.setAttribute('type', 'hidden');
            // hiddenLocationUniversity.setAttribute('name', 'location');
            // hiddenLocationUniversity.setAttribute('value', editorLocationUniversity);
            // this.appendChild(hiddenLocationUniversity);

            // Set the content as the value of a hidden input field in the form
            var hiddenLetterAcceptanceUniversity = document.createElement('input');
            hiddenLetterAcceptanceUniversity.setAttribute('type', 'hidden');
            hiddenLetterAcceptanceUniversity.setAttribute('name', 'letter_of_acceptance');
            hiddenLetterAcceptanceUniversity.setAttribute('value', editorLetterAcceptanceUniversity);
            this.appendChild(hiddenLetterAcceptanceUniversity);

            // Set the content as the value of a hidden input field in the form
            var hiddenEditorDisciplineUniversity = document.createElement('input');
            hiddenEditorDisciplineUniversity.setAttribute('type', 'hidden');
            hiddenEditorDisciplineUniversity.setAttribute('name', 'disciplines');
            hiddenEditorDisciplineUniversity.setAttribute('value', editorDisciplineUniversity);
            this.appendChild(hiddenEditorDisciplineUniversity);
        });
    </script>
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
