@extends('students.layouts.layout')
@section('content')
    <section class="sub-new-awolc-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 offset-lg-4">
                    <form id="school_location_study">
                        <div class="row">
                            <div class="sub-courses-form">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" id="searchItemStudy" class="form-control" name="study"
                                            placeholder="What would you like to study?" />
                                    </div>
                                    <div id="studySearchResults" class="position-absolute w100"></div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <input type="text" id="searchSchoolLocation" class="form-control" name="location"
                                            placeholder="Where? e.g. school name or location">
                                    </div>
                                    <div id="schoolLocationSearchResults" class="position-absolute w100"></div>
                                </div>
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-4">
                    <div class="sub-courses-form-left">

                        <h3>Eligibility</h3>

                        <div class="sub-courses-form-left-box">
                            <form id="eligibility">
                                <div class="form-group">
                                    <label>Do you have a valid Study Permit / Visa?</label>

                                    <select class="form-control multiselectdropdown" name="permit_visa">
                                        <option value="">Select...</option>
                                        <option value=""
                                            {{ @$quick_data['visa'] == "don't have this" ? 'selected' : '' }}>I don't have
                                            this</option>
                                        <option value="usa_f1"
                                            {{ @$quick_data['visa'] == 'USA F1 Visa' ? 'selected' : '' }}>
                                            USA F1 Visa
                                        </option>
                                        <option value="canada"
                                            {{ @$quick_data['visa'] == 'Canadian Study Permit or Visitor Visa' ? 'selected' : '' }}>
                                            Canadian Study Permit or Visitor Visa</option>
                                        <option value="uk"
                                            {{ @$quick_data['visa'] == 'UK Student Visa (Tier 4) or short Term Study Visa' ? 'selected' : '' }}>
                                            UK Student Visa (Tier 4) or short Term Study Visa
                                        </option>
                                        <option value="australian"
                                            {{ @$quick_data['visa'] == 'Australian Student Visa' ? 'selected' : '' }}>
                                            Australian Student Visa</option>
                                        <option value="irish"
                                            {{ @$quick_data['visa'] == 'Irish Stamp 2' ? 'selected' : '' }}>
                                            Irish Stamp 2
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nationality</label>
                                    <select class="form-control multiselectdropdown" name="nationality">
                                        <option selected="selected" value="">Select...</option>
                                        @foreach ($countries as $county)
                                            <option value="{{ $county->id }}"
                                                {{ @$quick_data['residence'] == $county->id ? 'selected' : '' }}>
                                                {{ $county->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Education Country</label>
                                    <select class="form-control multiselectdropdown" name="education_country">
                                        <option selected="selected" value="">Select...</option>
                                        @foreach ($countries as $county)
                                            <option value="{{ $county->id }}"
                                                {{ @$quick_data['countryEducation'] == $county->id ? 'selected' : '' }}>
                                                {{ $county->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Education Level</label>
                                    <select class="form-control multiselectdropdown" name="education_level">
                                        <option value="">Select...</option>
                                        @foreach ($educationLevels as $item)
                                            <option disabled>{{ $item->name }}</option>
                                            @foreach ($item->educationLevels as $level)
                                                <option value="{{ $level->level_name }}"
                                                    {{ @$quick_data['levelOfEducations'] == $level->id ? 'selected' : '' }}>
                                                    {{ $level->level_name }}</option>
                                            @endforeach
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Grading Scheme</label>
                                    <select class="form-control multiselectdropdown" name="grading_scheme"
                                        disabled>
                                        <option value="">Select...</option>
                                        @foreach ($gradingSchemeAll ?? [] as $item)
                                            <option value="{{ $item->id }}"
                                                {{ @$quick_data['gradingSchemes'] == $item->id ? 'selected' : '' }}>
                                                {{ $item->scheme }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>English Exam Type</label>
                                    <select class="form-control multiselectdropdown" name="english_exam_type">
                                        <option value="">Select...</option>
                                        <option {{ @$quick_data['englishTest'] == "I don't have this" ? 'selected' : '' }}>
                                            I don't have this</option>
                                        <option
                                            {{ @$quick_data['englishTest'] == 'Not yet, but I will in the future' ? 'selected' : '' }}>
                                            I will provide this later</option>
                                        <option {{ @$quick_data['englishTest'] == 'PTE' ? 'selected' : '' }}>PTE</option>
                                        <option {{ @$quick_data['englishTest'] == 'TOEFL' ? 'selected' : '' }}>TOEFL
                                        </option>
                                        <option {{ @$quick_data['englishTest'] == 'IELTS' ? 'selected' : '' }}>IETLS
                                        </option>
                                        <option {{ @$quick_data['englishTest'] == 'Duolingo' ? 'selected' : '' }}>Duolingo
                                            English Test</option>
                                        <option>PTE</option>
                                    </select>
                                </div>
                                {{-- <div class="form-group sub-border-none">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Only Show Direct
                                            Admissions</label>
                                    </div>
                                </div> --}}
                                <button type="submit" id="eligibility_submit_button" class="btn btn-primary">Apply
                                    Filters</button>
                            </form>
                        </div>
                        <form id="school_program_filter">
                            <h3 class="pt-5">School Filters</h3>

                            <div class="sub-courses-form-left-box">

                                <div class="form-group">
                                    <label>Countries</label>
                                    <select class="form-control multiselectdropdown" multiple
                                        name="school_country[]" id="school_country">
                                        <option value="">Select...</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ in_array($country->name, $quick_data['quick_education_country'] ?? []) ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="sub-school-border-none">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck3">
                                            <label class="form-check-label" for="exampleCheck3">Post-Graduation Work
                                                Permit Available </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Provinces / States</label>
                                    <select class="form-control multiselectdropdown" name="provinces_state"
                                        id="provinces_state">
                                        <option value="">Select...</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Campus City</label>
                                    <select class="form-control multiselectdropdown" name="campus_city"
                                        id="city-dropdown">
                                        <option value="">Select...</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>School Types</label>
                                    <div class="sub-school-border-none">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="school_type[]"
                                                value="university" id="exampleCheck4">
                                            <label class="form-check-label" for="exampleCheck4">University</label>
                                        </div>
                                    </div>
                                    <div class="sub-school-border-none">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="school_type[]"
                                                value="college" id="exampleCheck5">
                                            <label class="form-check-label" for="exampleCheck5">College</label>
                                        </div>
                                    </div>
                                    <div class="sub-school-border-none">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="school_type[]"
                                                value="englist_institute" id="exampleCheck6">
                                            <label class="form-check-label" for="exampleCheck6">English Institute</label>
                                        </div>
                                    </div>
                                    <div class="sub-school-border-none">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="school_type[]"
                                                value="school" id="exampleCheck7">
                                            <label class="form-check-label" for="exampleCheck7">High School</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group sub-border-none">
                                    <label>Schools</label>
                                    <select class="form-control multiselectdropdown" id="country_by_school"
                                        name="country_school">
                                        <option value="">Select...</option>
                                        @foreach ($schools as $item)
                                            <option value="{{ $item->id }}">{{ $item->university_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <h3 class="pt-5">Program Filters</h3>

                            <div class="sub-courses-form-left-box">
                                <div class="form-group">
                                    <label>Program Levels</label>
                                    <select class="form-control multiselectdropdown"
                                        name="program_education_level">
                                        <option selected="selected" value="">Select...</option>
                                        @foreach ($educationLevels as $item)
                                            <option disabled>{{ $item->name }}</option>
                                            @foreach ($item->educationLevels as $level)
                                                <option value="{{ $level->level_name }}"
                                                    @foreach ($quick_data['apply_education_label'] ?? [] as $item)
                                                       @if (strpos($item, $level->level_name) !== false)
                                                       selected
                                                       @endif @endforeach>
                                                    {{ $level->level_name }}
                                                </option>
                                            @endforeach
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Intakes </label>
                                    <select class="form-control multiselectdropdown" id="intake" multiple
                                        name="intake ">
                                        <option value="">Select...</option>
                                        <optgroup label="Aug - Nov 2023">
                                            <option value="{{ date('2023-09-01') }}"
                                                {{ in_array(date('F Y', strtotime('2023-09-23')), $quick_data['apply_intake'] ?? []) ? 'selected' : '' }}>
                                                {{ date('F Y', strtotime('2023-09-23')) }}</option>
                                            <option value="{{ date('2023-10-10') }}"
                                                {{ in_array(date('F Y', strtotime('2023-10-10')), $quick_data['apply_intake'] ?? []) ? 'selected' : '' }}>
                                                {{ date('F Y', strtotime('2023-10-23')) }}</option>
                                            <option value="{{ date('2023-11-10') }}"
                                                {{ in_array(date('F Y', strtotime('2023-11-10')), $quick_data['apply_intake'] ?? []) ? 'selected' : '' }}>
                                                {{ date('F Y', strtotime('2023-11-23')) }}</option>

                                        </optgroup>
                                        <optgroup label="Dec 2023 - Mar 2024">
                                            <option value="{{ date('2023-12-01') }}"
                                                {{ in_array(date('F Y', strtotime('2023-12-01')), $quick_data['apply_intake'] ?? []) ? 'selected' : '' }}>
                                                {{ date('F Y', strtotime('2023-12-01')) }}</option>
                                            <option value="{{ date('2024-01-01') }}"
                                                {{ in_array(date('F Y', strtotime('2024-01-01')), $quick_data['apply_intake'] ?? []) ? 'selected' : '' }}>
                                                {{ date('F Y', strtotime('2024-01-01')) }}</option>
                                            <option value="{{ date('2024-02-01') }}"
                                                {{ in_array(date('F Y', strtotime('2024-02-01')), $quick_data['apply_intake'] ?? []) ? 'selected' : '' }}>
                                                {{ date('F Y', strtotime('2024-02-01')) }}</option>
                                            <option value="{{ date('2024-03-01') }}"
                                                {{ in_array(date('F Y', strtotime('2024-03-01')), $quick_data['apply_intake'] ?? []) ? 'selected' : '' }}>
                                                {{ date('F Y', strtotime('2024-03-01')) }}</option>
                                        </optgroup>
                                        <optgroup label="Apr - Jul 2024">
                                            <option value="{{ date('2024-04-01') }}">
                                                {{ date('F Y', strtotime('2024-04-01')) }}</option>
                                            <option value="{{ date('2024-05-01') }}">
                                                {{ date('F Y', strtotime('2024-05-01')) }}</option>
                                            <option value="{{ date('2024-06-01') }}">
                                                {{ date('F Y', strtotime('2024-06-01')) }}</option>
                                            <option value="{{ date('2024-07-01') }}">
                                                {{ date('F Y', strtotime('2024-07-01')) }}</option>
                                        </optgroup>
                                        <optgroup label="Aug - Nov 2024">
                                            <option value="{{ date('2024-08-01') }}">
                                                {{ date('F Y', strtotime('2024-08-01')) }}</option>
                                            <option value="{{ date('2024-09-01') }}">
                                                {{ date('F Y', strtotime('2024-09-01')) }}</option>
                                            <option value="{{ date('2024-10-01') }}">
                                                {{ date('F Y', strtotime('2024-10-01')) }}</option>
                                            <option value="{{ date('2024-11-01') }}">
                                                {{ date('F Y', strtotime('2024-11-01')) }}</option>
                                        </optgroup>
                                        <optgroup label="Dec 2024 - Apr 2025">
                                            <option value="{{ date('2024-12-01') }}">
                                                {{ date('F Y', strtotime('2024-12-01')) }}</option>
                                            <option value="{{ date('2025-01-01') }}">
                                                {{ date('F Y', strtotime('2025-01-01')) }}</option>
                                            <option value="{{ date('2025-02-01') }}">
                                                {{ date('F Y', strtotime('2025-02-01')) }}</option>
                                            <option value="{{ date('2025-03-01') }}">
                                                {{ date('F Y', strtotime('2025-03-01')) }}</option>
                                        </optgroup>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Intakes Status</label>
                                    <select class="form-control multiselectdropdown" name="intake_status"
                                        id="intake_status" disabled>
                                        <option value="">Select...</option>
                                        <option value="1">Open</option>
                                        <option value="2">Likely Open</option>
                                        <option value="3">Will Open</option>
                                        <option value="4">Waitlist</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Post-Secondary Discipline</label>
                                    <select class="form-control multiselectdropdown"
                                        name="post_secondary_category" id="post-secondary-category">
                                        <option value="">Select...</option>
                                        <option value="">Select...</option>
                                        @foreach ($secondaryCategories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group sub-border-none">
                                    <label>Post-Secondary Sub-Categories</label>
                                    <select class="form-control multiselectdropdown"
                                        name="post_secondary_sub_category" id="post-secondary-sub-category">

                                    </select>
                                    <p>All amounts are listed in the currency charged by the school. For best results,
                                        please
                                        specify a country of the school.</p>
                                </div>
                                <div class="form-group sub-border-none">
                                    <div class="d-flex flex-wrap justify-content-between">
                                        <div>
                                            <label>Tuition Fee</label>


                                        </div>



                                        <div>
                                            <div class="sub-school-border-none">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck8">
                                                    <label class="form-check-label" for="exampleCheck8">Include living
                                                        costs</label>


                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="range-slider">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div id="tuition-slider-range"></div>
                                                    </div>
                                                </div>
                                                <div class="slider-labels">
                                                    <div class="caption"><span id="tuition-slider-range-value1"></span>
                                                    </div>
                                                    <div class="text-right caption"><span
                                                            id="tuition-slider-range-value2"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="hidden" name="tuition_min_value"
                                                            id="tuition_min_value">
                                                        <input type="hidden" name="tuition_max_value"
                                                            id="tuition_max_value">

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group sub-border-none">

                                    <div class="range-slider">
                                        {{-- <div class="row">
                                            <div class="col-sm-12">
                                                <div id="slider-range"></div>
                                            </div>
                                        </div>
                                       <div class="slider-labels">
                                            <div class="caption"><span id="slider-range-value1"></span></div>
                                            <div class="text-right caption"><span id="slider-range-value2"></span></div>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label>Application Fee:</label><br>
                                                <div class="range-slider">
                                                    <div class="row">
                                                        <div class="col-sm-12 px-4">
                                                            <div id="slider-range"></div>
                                                        </div>
                                                    </div>
                                                    <div class="slider-labels">
                                                        <div class="caption"><span id="slider-range-value1"></span></div>
                                                        <div class="text-right caption"><span
                                                                id="slider-range-value2"></span></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <input type="hidden" id="min-value"
                                                                name="application_min_value" value="">
                                                            <input type="hidden" id="max-value"
                                                                name="application_max_value" value="">

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group sub-border-none">
                                    <label>Application Fee</label>
                                </div>

                                <div class="form-group sub-border-none">
                                    <div class="row sub-form-btn-appl-clear d-flex flex-wrap justify-content-between">
                                        <div class="col-lg-6">
                                            <button type="submit" id="school_program_search"
                                                class="sub-program-det-border-btn mt-0">APPLY
                                                FILTERS</button>
                                            {{-- <a class="sub-program-det-border-btn mt-0"
                                                href="javascript:;">APPLY FILTERS</a> --}}
                                        </div>
                                        <div class="col-lg-6"><a class="sub-start-btn-applica" id="reset_btn"
                                                href="javascript:;">CLEAR
                                                FILTERS</a>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="course-left-wrap">
                        <div class="course-tab-list nav pt-40 pb-25 mb-35">
                            <a class="active" href="#course-details-1" data-toggle="tab">
                                <h4>Programs <span>({{ $programCount }}+)</span></h4>
                            </a>
                            <a href="#course-details-2" data-toggle="tab" class="">
                                <h4>Schools <span>({{ $schoolCount }}+)</span></h4>
                            </a>
                        </div>
                        <div class="course-tab-relevance sub-cour-two-right">
                            <div class="form-group">
                                <select class="form-control" id="relevance_filter">
                                    <option value="" selected="selected">Relevance</option>
                                    <option value="school_rank">School Rank</option>
                                    <option value="tuition_l_h">
                                        Tuition (Low to High)
                                    </option>
                                    <option value="tuition_h_l">
                                        Tuition (High to Low)
                                    </option>
                                    <option value="application_fee_l_h">
                                        Application Fee (Low to High)
                                    </option>
                                    <option value="application_fee_h_l">
                                        Application Fee (High to Low)
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="tab-content jump">
                            <!-- course-details-1 -->
                            <div class="tab-pane active" id="course-details-1">
                                <div id="program-list">

                                    @include('website.program.program-list')
                                </div>


                                <div class="text-center">
                                    <button class="btn btn-info load-more-data"><i class="fa fa-refresh"></i> Load More
                                        Data...</button>
                                </div>

                                <!-- Data Loader -->
                                <div class="auto-load text-center" style="display: none;">
                                    <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0"
                                        xml:space="preserve">
                                        <path fill="#000"
                                            d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                            <animateTransform attributeName="transform" attributeType="XML"
                                                type="rotate" dur="1s" from="0 50 50" to="360 50 50"
                                                repeatCount="indefinite" />
                                        </path>
                                    </svg>
                                </div>


                            </div>
                            <!-- course-details-1 End -->

                            <!-- course-details-2 -->
                            <div class="tab-pane" id="course-details-2">
                                <div class="d-flex flex-wrap align-items-center justify-content-center">
                                    <div class="row" id="school_list">
                                        @include('website.program.school-list')
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-info school-list-load-more-data"><i
                                                class="fa fa-refresh"></i> Load More Data...</button>
                                    </div>

                                    <!-- Data Loader -->
                                    <div class="school-list text-center" style="display: none;">
                                        <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0"
                                            xml:space="preserve">
                                            <path fill="#000"
                                                d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                                <animateTransform attributeName="transform" attributeType="XML"
                                                    type="rotate" dur="1s" from="0 50 50" to="360 50 50"
                                                    repeatCount="indefinite" />
                                            </path>
                                        </svg>
                                    </div>


                                </div>

                            </div>
                            <!-- course-details-2 End -->
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        var PGLISTENDPOINT = "{{ route('programs.list') }}";
        var SCHLISTENDPOINT = "{{ route('school.list') }}";
        var pgpage = 1;
        var schlpage = 1;
        $(document).ready(function() {
            $(".multiselectdropdown").select2();
            $('body').click(function() {
                $('#studySearchResults').fadeOut();
                $('#schoolLocationSearchResults').fadeOut();
            });
            $('[data-toggle="tooltip"]').tooltip();

            $('#searchItemStudy').on('keyup', function() {
                var searchTerm = $(this).val();


                if (searchTerm != '') {
                    $.ajax({
                        url: "{{ route('programs.study.search') }}",
                        method: 'GET',
                        data: {
                            searchTerm: searchTerm
                        },
                        success: function success(result) {
                            $('#studySearchResults').fadeIn();
                            $('#studySearchResults').html(result);
                        }
                    });
                } else {
                    $('#studySearchResults').fadeOut();
                }
            });

            $('#searchSchoolLocation').on('keyup', function() {
                var searchTerm = $(this).val();
                if (searchTerm != '') {
                    $.ajax({
                        url: "{{ route('programs.school.location') }}",
                        method: 'GET',
                        data: {
                            searchTerm: searchTerm
                        },
                        success: function success(result) {
                            $('#schoolLocationSearchResults').fadeIn();
                            $('#schoolLocationSearchResults').html(result);
                        }
                    });
                } else {
                    $('#schoolLocationSearchResults').fadeOut();
                }
            });

            $('#school_location_study').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting via the browser

                var formData = $(this).serialize(); // Serialize the form data

                $.ajax({
                    url: "{{ route('programs.school.location.study.search') }}", // The URL to send the data to
                    type: 'GET', // The HTTP method to use
                    data: formData, // The data to send
                    beforeSend: function() {
                        $('#loader').removeClass('hidden')
                    },
                    success: function(response) {
                        // console.log('response', response);
                        $('#program-list').html(response
                            .programS); // Display the response from the server
                        $('#school_list').html(response.schoolLists);
                    },
                    complete: function() {
                        $('#loader').addClass('hidden')
                    },


                });
            });

            $('#school_program_filter').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting via the browser

                var formData = $(this).serialize(); // Serialize the form data

                $.ajax({
                    url: "{{ route('programs.school.program.search') }}", // The URL to send the data to
                    type: 'GET', // The HTTP method to use
                    data: formData, // The data to send
                    beforeSend: function() {
                        $('#loader').removeClass('hidden')
                    },
                    success: function(response) {
                        // console.log('response', response);
                        $('#program-list').html(response
                            .programLists); // Display the response from the server
                        $('#school_list').html(response.schoolLists);
                    },
                    complete: function() {
                        $('#loader').addClass('hidden')
                    },

                    error: function() {
                        $('#loader').addClass('hidden')
                        $('#program-list').html('There was an error'); // Handle errors
                    }
                });
            });
            if ("{{ @$quick_data['quick_search'] }}" == '') {
                $("#school_program_search").click()
            }
        });

        $(document).on('click', '#reset_btn', function() {
            location.reload(true);
            $("#school_location_study").trigger("reset");
            $("#eligibility").trigger("reset");
            $("#school_program_filter").trigger("reset");
        });

        $(document).on('click', '#studySearchResults ul li', function() {
            $('#searchItemStudy').val($(this).text());
            $('#studySearchResults').fadeOut();
        });
        $(document).on('click', '#schoolLocationSearchResults ul li', function() {
            $('#searchSchoolLocation').val($(this).text());
            $('#schoolLocationSearchResults').fadeOut();
        });

        $('#eligibility').submit(function(e) {
            e.preventDefault();
            var query = $(this).val();
            var formData = $(this).serialize();


            $.ajax({
                url: "{{ route('programs.eligibility') }}",
                type: 'GET',
                data: formData,
                beforeSend: function() {
                    $('#loader').removeClass('hidden')
                },
                success: function(response) {
                    console.log('data', response);
                    $('#program-list').html(response.programLists);
                    $('#school_list').html(response.schoolLists);
                },
                complete: function() {
                    $('#loader').addClass('hidden')
                },
            });
        });

        // $('#load_more_button').click(function() {
        //     var start = 5;
        //     $.ajax({
        //         url: "{{ route('programs.eligibility') }}",
        //         type: 'GET',
        //         data: formData,
        //         beforeSend: function() {
        //             $('#load_more_button').html('Loading...');
        //             $('#load_more_button').attr('disabled', true);
        //         },
        //         success: function(data) {
        //             console.log('data', data);
        //             $('#program-list').html(data);
        //             $('#load_more_button').html('Load More');
        //             $('#load_more_button').attr('disabled', false);
        //         }
        //     });
        // });

        $("#school_country").change(function() {
            var id_country = $(this).val();
            getCountry(id_country)
        });

        if ("{{ @$quick_data['quick_search'] }}" == '') {
            getCountry($("#school_country").val())
        }

        function getCountry(id_country) {

            $.ajax({
                url: "{{ route('country') }}",
                method: 'GET',
                data: {
                    id_country: id_country,
                },
                success: function(data) {
                    console.log('data', data);
                    $('#provinces_state').html('<option value="">Select State</option>');
                    $.each(data.states, function(key, value) {

                        $("#provinces_state").append('<option value="' + value.id +
                            '" >' + value.name + '</option>');
                    });
                    $('#city-dropdown').html(
                        '<option value="">Select State First</option>');

                    $('#country_by_school').html('<option value="">Select ...</option>');
                    if (data.school.length > 0) {

                        $.each(data.school, function(key, value) {

                            $("#country_by_school").append('<option value="' + value.id +
                                '" >' + value.university_name + '</option>');
                        });
                    }

                    // getState(stateIdUpd) school_list
                }
            });
        }


        $('#provinces_state').on('change', function() {
            var idState = this.value;
            $("#city-dropdown").html('');
            getState(idState);
        });

        function getState(idState) {
            $.ajax({
                url: "{{ route('city') }}",
                type: "GET",
                data: {
                    state_id: idState
                },
                dataType: 'json',
                success: function(res) {
                    $('#city-dropdown').html('<option value="">-- Select City --</option>');
                    $.each(res.cities, function(key, value) {

                        $("#city-dropdown").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        }


        $('#relevance_filter').on('change', function() {
            var relevance = this.value;
            var formData = $('#school_program_filter').serialize();
            $.ajax({
                url: "{{ route('programs.school.program.search') }}", // The URL to send the data to
                type: 'GET', // The HTTP method to use
                data: formData + '&relevance=' + relevance, // The data to send
                beforeSend: function() {
                    $('#loader').removeClass('hidden')
                },
                success: function(response) {
                    // console.log('response', response);
                    $('#program-list').html(response
                        .programLists); // Display the response from the server
                    $('#school_list').html(response.schoolLists);
                },
                complete: function() {
                    $('#loader').addClass('hidden')
                },

                error: function() {
                    $('#loader').addClass('hidden')
                    $('#program-list').html('There was an error'); // Handle errors
                }
            });
        })

        $(".load-more-data").click(function() {
            pgpage++;
            // alert(page)
            infinteLoadMore(pgpage);
        });


        function infinteLoadMore(pgpage) {
            var formData = $('#eligibility').serialize();
            var schoolFormData = $('#school_program_filter').serialize();

            $.ajax({
                    url: PGLISTENDPOINT + "?page=" + pgpage + '&' + formData + '&' + schoolFormData,
                    datatype: "html",
                    type: "get",
                    beforeSend: function() {
                        $('.auto-load').show();
                    }
                })
                .done(function(response) {
                    // console.log(response);
                    if (response == '') {
                        $('.auto-load').html("We don't have more data to display :(");
                        $('.load-more-data').hide();
                        return;
                    }
                    $('.auto-load').hide();
                    $('#program-list').append(response);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
                });
        }

        $(".school-list-load-more-data").click(function() {
            schlpage++;
            infinteSchoolListLoadMore(schlpage);
        });

        function infinteSchoolListLoadMore(schlpage) {
            var formData = '';
            if ($('#eligibility').serialize()) {
                formData = $('#eligibility').serialize();
            }
            if ($('#school_program_filter').serialize()) {
                formData = $('#school_program_filter').serialize();
            }
            $.ajax({
                    url: SCHLISTENDPOINT + "?page=" + schlpage + '&' + formData,
                    datatype: "html",
                    type: "get",
                    beforeSend: function() {
                        $('.school-list').show();
                    }
                })
                .done(function(response) {
                    // console.log(response);
                    if (response == '') {
                        $('.school-list').html("We don't have more data to display :(");
                        return;
                    }
                    $('.school-list').hide();
                    $('#school_list').append(response);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
                });
        }



        $("#post-secondary-category").on('change', function() {
            // alert($(this).val())
            $.ajax({
                    url: "{{ route('post.secondary.sub.category') }}",
                    type: "get",
                    data: {
                        category_id: $(this).val()
                    }
                })
                .done(function(response) {
                    console.log(response);
                    $('#post-secondary-sub-category').html('<option value="">Select...</option>');
                    $.each(response.sub_category, function(key, value) {

                        $("#post-secondary-sub-category").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
                });
        })
    </script>
@endpush
