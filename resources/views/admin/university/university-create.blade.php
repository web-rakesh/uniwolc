@extends('admin.layouts.layout')
@push('css')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> University Form elements </h3>
            <nav aria-label="breadcrumb">
                {{-- <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Forms</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                    </ol> --}}
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        @if (session('error'))
                            <div class="col-sm-12">
                                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}

                                </div>
                            </div>
                        @endif
                        <h4 class="card-title">University Form elements </h4>
                        {{-- <p class="card-description"> Basic form elements </p> --}}
                        <form class="forms-sample" method="post" id="add-university"
                            action="{{ route('admin.university.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="university_id" value="{{ $universityDetail->id ?? '' }}">
                            <div class="row">

                                <div class="form-group col-6">
                                    <label class="labels">University Name</label>
                                    <input type="text" class="form-control" name="university_name"
                                        value="{{ $universityDetail->university_name ?? old('university_name') }}"
                                        required="" placeholder="University Name">
                                </div>
                                <div class="form-group col-6">
                                    <label class="labels">Phone No.</label>
                                    <input type="number" class="form-control" name="phone_number"
                                        value="{{ $universityDetail->phone_number ?? old('phone_number') }}">
                                </div>

                                <div class="form-group col-6">
                                    <label class="labels">Email address</label>
                                    <input type="email" class="form-control" name="email"
                                        value="{{ $universityDetail->email ?? old('email') }}">
                                </div>
                                <div class="form-group col-6">
                                    <label>Study Permit / Visa </label>
                                    <select class="form-select" name="permit_visa">
                                        <option value="">I don't have this</option>
                                        <option value="usa_f1"
                                            {{ isset($universityDetail->permit_visa) ? ($universityDetail->permit_visa == 'usa_f1' ? 'selected' : '') : '' }}>
                                            USA F1 Visa
                                        </option>
                                        <option value="canada"
                                            {{ isset($universityDetail->permit_visa) ? ($universityDetail->permit_visa == 'canada' ? 'selected' : '') : '' }}>
                                            Canadian Study
                                            Permit or Visitor Visa</option>
                                        <option value="uk"
                                            {{ isset($universityDetail->permit_visa) ? ($universityDetail->permit_visa == 'uk' ? 'selected' : '') : '' }}>
                                            UK Student Visa (Tier 4) or short Term Study Visa
                                        </option>
                                        <option value="australian"
                                            {{ isset($universityDetail->permit_visa) ? ($universityDetail->permit_visa == 'australian' ? 'selected' : '') : '' }}>
                                            Australian
                                            Student Visa</option>
                                        <option value="irish"
                                            {{ isset($universityDetail->permit_visa) ? ($universityDetail->permit_visa == 'irish' ? 'selected' : '') : '' }}>
                                            Irish Stamp 2
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col-6">
                                    <label>Country</label>
                                    <select class="form-select" name="country" id="getCurrency">

                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" data-currency="{{ $country->name }}"
                                                {{ isset($universityDetail) ? ($universityDetail->country == $country->id ? 'selected' : '') : '' }}>
                                                {{ $country->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="labels">University Address</label>

                                <textarea class="form-control" name="address" rows="3">{{ $universityDetail->address ?? old('location') }}</textarea>

                            </div>

                            <div class="form-group">
                                <label class="labels">About University</label>
                                <div id="about-university">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="labels">Features</label>
                                <div id="feature-university">

                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <label class="labels">Location</label>
                                <div id="location-university">

                                </div>
                            </div> --}}

                            <div class="form-group">
                                <label class="labels">Location </label>
                                <textarea class="form-control" name="location" rows="3">{{ $universityDetail->location ?? old('location') }}</textarea>
                            </div>

                            {{-- <div class="form-group">
                                <label class="labels">Features</label>
                                <textarea class="form-control" name="home_stay" rows="3">{{ $universityDetail->home_stay ?? old('home_stay') }}</textarea>
                            </div> --}}

                            <div class="form-group">
                                <label class="labels"><b>Institution Details</b></label>
                            </div>
                            <div class="row">

                                <div class="form-group col-6">
                                    <label class="labels">Founded</label>
                                    <input type="text" class="form-control" name="founded"
                                        value="{{ $universityDetail->founded ?? old('founded') }}">
                                </div>
                                <div class="form-group col-6">
                                    <label class="labels">School ID</label>
                                    <input type="text" class="form-control" name="school_id"
                                        value="{{ $universityDetail->school_id ?? old('school_id') }}">
                                </div>
                                <div class="form-group col-6">
                                    <label class="labels">CRICOS number</label>
                                    <input type="text" class="form-control" name="provider_id_number"
                                        value="{{ $universityDetail->provider_id_number ?? old('provider_id_number') }}">
                                </div>

                                <div class="form-group col-6">
                                    <label>Blocked Countries</label>
                                    <select class="form-select" name="blocked_country[]" multiple>

                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ isset($universityDetail) ? (in_array($country->id, explode(',', $universityDetail->blocked_country)) == true ? 'selected' : '') : '' }}>
                                                {{ $country->name }}

                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group col-6">
                                    <label class="labels">Institution type</label>
                                    <input type="text" class="form-control" name="institution_type"
                                        value="{{ $universityDetail->institution_type ?? old('institution_type') }}">
                                </div>

                                {{-- <div class="form-group col-6">
                                    <label class="labels">Cost and Duration</label>
                                    <input type="number" class="form-control" name="cost_duration"
                                        value="{{ $universityDetail->cost_duration ?? old('cost_duration') }}">
                                </div> --}}

                                <div class="form-group col-6">
                                    <label class="labels">Application fee</label>

                                    <input type="number" class="form-control" name="application_fee"
                                        value="{{ $universityDetail->application_fee ?? old('application_fee') }}">
                                    <span class="currency-icon">
                                        {{ get_currency($universityDetail->country ?? 101) }}</span>
                                </div>

                                <div class="form-group col-6">
                                    <label class="labels">Average graduate program</label>
                                    <input type="text" class="form-control" name="average_graduate_program"
                                        value="{{ $universityDetail->average_graduate_program ?? old('average_graduate_program') }}">
                                </div>

                                <div class="form-group col-6">
                                    <label class="labels">Average undergraduate program</label>
                                    <input type="text" class="form-control" name="average_undergraduate_program"
                                        value="{{ $universityDetail->average_undergraduate_program ?? old('average_undergraduate_program') }}">
                                </div>

                                <div class="form-group col-6">
                                    <label class="labels">Cost of living</label>
                                    <input type="number" class="form-control" name="cost_of_living"
                                        value="{{ $universityDetail->cost_of_living ?? old('cost_of_living') }}">
                                    <span
                                        class="currency-icon">{{ get_currency($universityDetail->country ?? 101) }}</span>
                                </div>

                                <div class="form-group col-6">
                                    <label class="labels">Gross tuition</label>
                                    <input type="number" class="form-control" name="gross_tuition"
                                        value="{{ $universityDetail->gross_tuition ?? old('gross_tuition') }}">
                                    <span
                                        class="currency-icon">{{ get_currency($universityDetail->country ?? 101) }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="labels">Average Time to Receive Letter of Acceptance</label>
                                <div id="letter-of-acceptance-university">

                                </div>
                                {{-- <textarea class="form-control" id="letter-of-acceptance-university" name="letter_of_acceptance" rows="3">{{ $universityDetail->letter_of_acceptance ?? old('letter_of_acceptance') }}</textarea> --}}

                            </div>

                            <div class="form-group ">
                                <label class="labels">Top Disciplines</label>
                                <div id="discipline-university">

                                </div>
                                {{-- <textarea class="form-control" id="discipline-university" name="disciplines" rows="3">{{ $universityDetail->disciplines ?? old('disciplines') }}</textarea> --}}

                            </div>

                            <div class="form-group ">
                                <label class="labels">Program Levels</label>
                                <select class="form-select" name="program_level[]" multiple>

                                    <option value="">Select Program Level</option>
                                    @foreach ($programLevels as $programLevel)
                                        <option value="{{ $programLevel->id }}"
                                            {{ isset($universityDetail) ? (in_array($programLevel->id, explode(',', $universityDetail->id)) == true ? 'selected' : '') : '' }}>
                                            {{ $programLevel->level_name }}

                                        </option>
                                    @endforeach

                            </div>


                            <div class="form-group mt-3">
                                <label class="labels">University Pictures</label>
                                <input type="file" name="university_picture[]" class="form-control" multiple=""
                                    accept="image/png, image/jpeg">
                            </div>
                            @foreach (isset($universityDetail) ? $universityDetail->getMedia('university-picture') : [] as $image)
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ $image->getUrl() }}" alt="{{ $image->getUrl() }}" height="100"
                                            width="100" class="w-20 h-20 shadow">
                                    </div>
                                </div>
                            @endforeach

                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <a href="{{ route('admin.university') }}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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


        // addressUniversity.root.innerHTML = '{!! $universityDetail->address ?? '' !!}';
        aboutUniversity.root.innerHTML = '{!! $universityDetail->about_university ?? '' !!}';
        featureUniversity.root.innerHTML = '{!! $universityDetail->feature ?? '' !!}';
        // locationUniversity.root.innerHTML = '{!! $universityDetail->location ?? '' !!}';
        letterAcceptanceUniversity.root.innerHTML = '{!! $universityDetail->letter_of_acceptance ?? '' !!}';
        disciplineUniversity.root.innerHTML = '{!! $universityDetail->disciplines ?? '' !!}';


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

            $("#getCurrency").change(function() {
                // $(this).find(':selected').attr('data-id')
                var id_country = $(this).val();
                // alert(id_country)
                // return
                // var token = $("input[name='_token']").val();
                $.ajax({
                    url: "{{ route('admin.currency') }}",
                    method: 'GET',
                    data: {
                        id_country: id_country,

                    },
                    success: function(data) {

                        $(".currency-icon").html(data);

                    }
                });
            });
        });
    </script>
@endpush
