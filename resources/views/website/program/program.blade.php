@extends('website.layouts.layout')
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


                                    <select class="form-control" name="permit_visa">
                                        <option value="">I don't have this</option>
                                        <option value="usa_f1">
                                            USA F1 Visa
                                        </option>
                                        <option value="canada">
                                            Canadian Study
                                            Permit or Visitor Visa</option>
                                        <option value="uk">
                                            UK Student Visa (Tier 4) or short Term Study Visa
                                        </option>
                                        <option value="australian">
                                            Australian
                                            Student Visa</option>
                                        <option value="irish">
                                            Irish Stamp 2
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nationality</label>
                                    <select class="form-control" name="nationality">
                                        <option selected="selected" value="">Select...</option>
                                        @foreach ($countries as $county)
                                            <option value="{{ $county->id }}">{{ $county->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Education Country</label>
                                    <select class="form-control" name="education_country">
                                        <option selected="selected" value="">Select...</option>
                                        @foreach ($countries as $county)
                                            <option value="{{ $county->id }}">{{ $county->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Education Level</label>
                                    <select class="form-control" name="education_level">
                                        <option selected="selected" value="">Select...</option>
                                        @foreach ($educationLevels as $item)
                                            <option disabled>{{ $item->name }}</option>
                                            @foreach ($item->educationLevels as $level)
                                                <option value="{{ $level->level_name }}">{{ $level->level_name }}</option>
                                            @endforeach
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Grading Scheme</label>
                                    <select class="form-control" name="grading_scheme" disabled>
                                        <option>Secondary Level - Scale:0-100</option>
                                        <option>Other</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>English Exam Type</label>
                                    <select class="form-control" name="english_exam_type">
                                        <option selected="selected" value="">I don't have this</option>
                                        <option>I will provide this later</option>
                                        <option>TOEFL</option>
                                        <option>IETLS</option>
                                        <option>Duolingo English Test</option>
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
                                <button type="submit" class="btn btn-primary">Apply Filters</button>
                            </form>
                        </div>
                        <form id="school_program_filter">
                            <h3 class="pt-5">School Filters</h3>

                            <div class="sub-courses-form-left-box">

                                <div class="form-group">
                                    <label>Countries</label>
                                    <select class="form-control" name="school_country" id="school_country">
                                        <option selected="selected">Select...</option>
                                        @foreach ($countries as $county)
                                            <option value="{{ $county->id }}">{{ $county->name }}</option>
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
                                    <select class="form-control" name="provinces_state" id="provinces_state">
                                        <option value="">Select...</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Campus City</label>
                                    <select class="form-control" name="campus_city" id="city-dropdown">
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
                                    <select class="form-control">
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
                                    <select class="form-control" name="program_education_level">
                                        <option selected="selected" value="">Select...</option>
                                        @foreach ($educationLevels as $item)
                                            <option disabled>{{ $item->name }}</option>
                                            @foreach ($item->educationLevels as $level)
                                                <option value="{{ $level->level_name }}">{{ $level->level_name }}
                                                </option>
                                            @endforeach
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Intakes</label>
                                    <select class="form-control">
                                        <option selected="selected">Select...</option>
                                        <option>Dec 2022 - Mar 2023</option>
                                        <option>February 2023</option>
                                        <option>March 2023</option>
                                        <option>Apr - Jul 2023</option>
                                        <option>April 2023</option>
                                        <option>May 2023</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Intakes Status</label>
                                    <select class="form-control" disabled>
                                        <option selected="selected">Select...</option>
                                        <option>Open</option>
                                        <option>Likely Open</option>
                                        <option>Will Open</option>
                                        <option>Waitlist</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Post-Secondary Discipline</label>
                                    <select class="form-control">
                                        <option selected="selected">Select...</option>
                                        <option>Aero space, Aviation and Pilot Technology</option>
                                        <option>Agriculture</option>
                                        <option>Architure</option>
                                        <option>Biomedical Engineering</option>
                                    </select>
                                </div>
                                <div class="form-group sub-border-none">
                                    <label>Post-Secondary Sub-Categories</label>
                                    <select class="form-control">
                                        <option selected="selected">Select...</option>
                                        <option>Aero space, Aviation and Pilot Technology</option>
                                        <option>Agriculture</option>
                                        <option>Architure</option>
                                        <option>Biomedical Engineering</option>
                                    </select>
                                    <p>All amounts are listed in the currency charged by the school. For best results,
                                        please
                                        specify a country of the school.</p>
                                </div>
                                <div class="form-group sub-border-none">
                                    <div class="d-flex flex-wrap justify-content-between">
                                        <div><label>Tuition Fee</label></div>
                                        <div>
                                            <div class="sub-school-border-none">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck8">
                                                    <label class="form-check-label" for="exampleCheck8">Include living
                                                        costs</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group sub-border-none">
                                    <div class="range-slider">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div id="slider-range"></div>
                                            </div>
                                        </div>
                                        <div class="slider-labels">
                                            <div class="caption"><span id="slider-range-value1"></span></div>
                                            <div class="text-right caption"><span id="slider-range-value2"></span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <input type="hidden" name="min-value" value="">
                                                <input type="hidden" name="max-value" value="">

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
                                            <button type="submit" class="sub-program-det-border-btn mt-0">APPLY
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
                                <select class="form-control">
                                    <option value="" selected="selected">Relevance</option>
                                    <option value="School Rank">School Rank</option>
                                    <option value="Tuition (Low to High)">Tuition (Low to High)</option>
                                    <option value="Tuition (High to Low)">Tuition (High to Low)</option>
                                    <option value="Application Fee (Low to High)">Application Fee (Low to High)</option>
                                    <option value="Application Fee (High to Low)">Application Fee (High to Low)</option>
                                </select>
                            </div>
                        </div>
                        <div class="tab-content jump">
                            <!-- course-details-1 -->
                            <div class="tab-pane active" id="course-details-1">
                                <div id="program-list">

                                    @include('website.program.program-list')
                                </div>
                                {{-- <div class="course-tab-content">
                                    <div class="d-flex flex-wrap justify-content-between">
                                        <div class="col-lg-9 p-0">
                                            <div class="sub-course-tt-box">
                                                <div class="sub-course-unt-title">
                                                    <h6>1-Year Post-Secondary Certificate</h6>
                                                    <h3>T-Level - Design, Surveying and Planning for Construction</h3>
                                                    <p>Cheshire College South and West - Ellesmere Port</p>
                                                </div>
                                                <div class="sub-course-country">
                                                    <i class="fa-sharp fa-solid fa-location-dot"></i> Ellesmere Port,
                                                    North West, United Kingdom
                                                </div>
                                                <div class="sub-course-appl-bg">
                                                    <div
                                                        class="d-flex flex-wrap align-items-center justify-content-between">
                                                        <div class="sub-tution-text">
                                                            <h6>Tuition Fee</h6>
                                                            <p>&#163;14,250.00 GBP</p>
                                                        </div>
                                                        <div class="sub-tution-text">
                                                            <h6>Application Fee</h6>
                                                            <p>&#163;0.00 GBP</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 p-0">
                                            <div class="sub-course-btn-left">
                                                <a class="sub-start-btn-applica" href="javascript:;">Start
                                                    Application</a>
                                                <a class="sub-program-det-border-btn" href="javascript:;">Program
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="course-tab-content">
                                    <div class="d-flex flex-wrap justify-content-between">
                                        <div class="col-lg-9 p-0">
                                            <div class="sub-course-tt-box">
                                                <div class="sub-course-unt-title">
                                                    <h6>1-Year Post-Secondary Certificate</h6>
                                                    <h3>T-Level - Design, Surveying and Planning for Construction</h3>
                                                    <p>Cheshire College South and West - Ellesmere Port</p>
                                                </div>
                                                <div class="sub-course-country">
                                                    <i class="fa-sharp fa-solid fa-location-dot"></i> Ellesmere Port,
                                                    North West, United Kingdom
                                                </div>
                                                <div class="sub-course-appl-bg">
                                                    <div
                                                        class="d-flex flex-wrap align-items-center justify-content-between">
                                                        <div class="sub-tution-text">
                                                            <h6>Tuition Fee</h6>
                                                            <p>&#163;14,250.00 GBP</p>
                                                        </div>
                                                        <div class="sub-tution-text">
                                                            <h6>Application Fee</h6>
                                                            <p>&#163;0.00 GBP</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 p-0">
                                            <div class="sub-course-btn-left">
                                                <a class="sub-start-btn-applica" href="javascript:;">Start
                                                    Application</a>
                                                <a class="sub-program-det-border-btn" href="javascript:;">Program
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}


                            </div>
                            <!-- course-details-1 End -->

                            <!-- course-details-2 -->
                            <div class="tab-pane" id="course-details-2">
                                <div class="d-flex flex-wrap align-items-center justify-content-center">

                                    <div class="col-lg-6">
                                        <div class="sub-agent-content">
                                            <div>
                                                <div class="sub-agent-icon">
                                                    <img src="assets/images/courses/Cambridge_ Education.png"
                                                        alt="" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="sub-agent-text">
                                                    <a href="javascript:;">University of Greenwich (Medway Campus) Chattam
                                                        , South East</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="sub-agent-content">
                                            <div>
                                                <div class="sub-agent-icon">
                                                    <img src="assets/images/courses/Cambridge_ Education.png"
                                                        alt="" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="sub-agent-text">
                                                    <a href="javascript:;">University of Greenwich (Medway Campus) Chattam
                                                        , South East</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="sub-agent-content">
                                            <div>
                                                <div class="sub-agent-icon">
                                                    <img src="assets/images/courses/Cambridge_ Education.png"
                                                        alt="" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="sub-agent-text">
                                                    <a href="javascript:;">University of Greenwich (Medway Campus) Chattam
                                                        , South East</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="sub-agent-content">
                                            <div>
                                                <div class="sub-agent-icon">
                                                    <img src="assets/images/courses/Cambridge_ Education.png"
                                                        alt="" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="sub-agent-text">
                                                    <a href="javascript:;">University of Greenwich (Medway Campus) Chattam
                                                        , South East</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="sub-agent-content">
                                            <div>
                                                <div class="sub-agent-icon">
                                                    <img src="assets/images/courses/Cambridge_ Education.png"
                                                        alt="" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="sub-agent-text">
                                                    <a href="javascript:;">University of Greenwich (Medway Campus) Chattam
                                                        , South East</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="sub-agent-content">
                                            <div>
                                                <div class="sub-agent-icon">
                                                    <img src="assets/images/courses/Cambridge_ Education.png"
                                                        alt="" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="sub-agent-text">
                                                    <a href="javascript:;">University of Greenwich (Medway Campus) Chattam
                                                        , South East</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="sub-agent-content">
                                            <div>
                                                <div class="sub-agent-icon">
                                                    <img src="assets/images/courses/Cambridge_ Education.png"
                                                        alt="" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="sub-agent-text">
                                                    <a href="javascript:;">University of Greenwich (Medway Campus) Chattam
                                                        , South East</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="sub-agent-content">
                                            <div>
                                                <div class="sub-agent-icon">
                                                    <img src="assets/images/courses/Cambridge_ Education.png"
                                                        alt="" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="sub-agent-text">
                                                    <a href="javascript:;">University of Greenwich (Medway Campus) Chattam
                                                        , South East</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="sub-agent-content">
                                            <div>
                                                <div class="sub-agent-icon">
                                                    <img src="assets/images/courses/Cambridge_ Education.png"
                                                        alt="" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="sub-agent-text">
                                                    <a href="javascript:;">University of Greenwich (Medway Campus) Chattam
                                                        , South East</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="sub-agent-content">
                                            <div>
                                                <div class="sub-agent-icon">
                                                    <img src="assets/images/courses/Cambridge_ Education.png"
                                                        alt="" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="sub-agent-text">
                                                    <a href="javascript:;">University of Greenwich (Medway Campus) Chattam
                                                        , South East</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="sub-agent-content">
                                            <div>
                                                <div class="sub-agent-icon">
                                                    <img src="assets/images/courses/Cambridge_ Education.png"
                                                        alt="" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="sub-agent-text">
                                                    <a href="javascript:;">University of Greenwich (Medway Campus) Chattam
                                                        , South East</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="sub-agent-content">
                                            <div>
                                                <div class="sub-agent-icon">
                                                    <img src="assets/images/courses/Cambridge_ Education.png"
                                                        alt="" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="sub-agent-text">
                                                    <a href="javascript:;">University of Greenwich (Medway Campus) Chattam
                                                        , South East</a>
                                                </div>
                                            </div>
                                        </div>
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
        $(document).ready(function() {
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
                    success: function(response) {
                        $('#program-list').html(
                            response); // Display the response from the server
                    },
                    error: function() {
                        $('#program-list').html('There was an error'); // Handle errors
                    }
                });
            });

            $('#school_program_filter').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting via the browser

                var formData = $(this).serialize(); // Serialize the form data

                $.ajax({
                    url: "{{ route('programs.school.program.search') }}", // The URL to send the data to
                    type: 'GET', // The HTTP method to use
                    data: formData, // The data to send
                    success: function(response) {
                        $('#program-list').html(
                            response); // Display the response from the server
                    },
                    error: function() {
                        $('#program-list').html('There was an error'); // Handle errors
                    }
                });
            });
        });

        $(document).on('click', '#reset_btn', function() {
            console.log('reset');
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
                success: function(data) {
                    console.log('data', data);
                    $('#program-list').html(data);
                }
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

        function getCountry(id_country) {

            $.ajax({
                url: "{{ route('country') }}",
                method: 'GET',
                data: {
                    id_country: id_country,

                },
                success: function(data) {

                    $('#provinces_state').html('<option value="">Select State</option>');
                    $.each(data.states, function(key, value) {

                        $("#provinces_state").append('<option value="' + value.id +
                            '" >' + value.name + '</option>');
                    });
                    $('#city-dropdown').html(
                        '<option value="">Select State First</option>');

                    // getState(stateIdUpd)
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
    </script>
@endpush
