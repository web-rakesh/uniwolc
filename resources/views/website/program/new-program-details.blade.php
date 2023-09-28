@extends("$layout.layouts.layout")
@section('content')
    <!-- Courses Details -->
    <section class="sub-new-awolc-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">

                    <div class="sub-course-deta">
                        <div class="sub-course-tt-box d-flex flex-wrap">
                            <div class="sub-course-unt">
                                {{-- <img src="assets/images/courses-details/Cambridge-Education.png" alt="" /> --}}
                                <img src="{{ $university->university_gallery_url }}" alt="" />

                            </div>
                            <div class="sub-course-details-title">
                                <h6>{{ $university->university_name }}</h6>
                                <div class="sub-course-country">
                                    {{-- <img src="assets/images/country-flag/australia.svg" alt="" />  --}}
                                    {{ $university->address }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sub-course-deta-title">
                        <h2>{{ $university->university_name }}</h2>
                    </div>

                    <div class="sub-course-deta-slider">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach ($universityImage as $key => $image)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                                        class="{{ $key == 0 ? 'active' : '' }}"></li>
                                    {{-- <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li> --}}
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($universityImage as $j => $image)
                                    <div class="carousel-item {{ $j == 0 ? 'active' : '' }}">
                                        <img class="d-block w-100" width="1370" height="577"
                                            src="{{ $image->getUrl() }}" alt="" />
                                    </div>
                                @endforeach
                                {{-- <div class="carousel-item active">
                                    <img class="d-block w-100"
                                        src="assets/images/courses-details/see-program-details-banner.jpg" alt="" />
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100"
                                        src="assets/images/courses-details/see-program-details-banner.jpg" alt="" />
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="sub-course-deta-two-tab">

                        <div class="sub-course-board-two-tab d-flex flex-wrap">
                            <div class="sub-course-dtn-two">
                                <a href="javascript:;">Overview</a>
                                <a href="#Similarprograms">Similar Programs</a>
                            </div>
                        </div>

                        <div class="row main-prog-mt">
                            @include('flash-messages')
                            <div class="col-lg-8">
                                <div class="sub-prog-dtl sub-see-program-pt-pb">
                                    <h5>Program Summary</h5>

                                    {{ $programDetail->program_summary ?? '' }}

                                </div>


                                <div id="Similarprograms">
                                    <div
                                        class="sub-similar-pr-title d-flex flex-wrap align-items-center sub-course-details-pb">
                                        <div class="col-lg-12 d-flex flex-wrap align-items-center">
                                            <h3>Similar Programs</h3>
                                            <span>{{ count($recentPrograms) }}</span>
                                        </div>
                                    </div>

                                    <div class="collapse" id="collapseExample">
                                        <div class="sub-course-filters-form">
                                            <form class="d-flex flex-wrap align-items-center justify-content-center">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <select class="form-control">
                                                            <option value="" selected="selected">Program Level
                                                            </option>
                                                            <option value="">None</option>
                                                            <option value="">Non-Credential</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <select class="form-control">
                                                            <option value="" selected="selected">Discipline</option>
                                                            <option value="">None</option>
                                                            <option value="">Business, Management & Economics</option>
                                                            <option value="">Management, Administration, General
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <select class="form-control">
                                                            <option value="" selected="selected">Intake</option>
                                                            <option value="">None</option>
                                                            <option value="">Nov 2023</option>
                                                            <option value="">Nov 2024</option>
                                                            <option value="">Jan 2025</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            placeholder="Search Programs">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    @forelse ($recentPrograms as $item)
                                        <div class="course-tab-content">
                                            <div class="d-flex flex-wrap justify-content-between">
                                                <div class="col-lg-9 p-0">
                                                    <div class="sub-course-tt-box">
                                                        <div class="sub-course-unt-title">
                                                            <h6>{{ $item->program_level }}</h6>
                                                            <h3>{{ $item->program_length }}</h3>
                                                            <p>{{ $item->program_title }}</p>
                                                        </div>
                                                        <div class="sub-course-country">
                                                            <i class="fa-sharp fa-solid fa-location-dot"></i>
                                                            {{ $item->university->location }}
                                                            {{-- <i class="fa-sharp fa-solid fa-location-dot"></i>
                                                                {{ $programDetail->university->university_name }} --}}
                                                        </div>
                                                        <div class="sub-course-appl-bg">
                                                            <div
                                                                class="d-flex flex-wrap align-items-center justify-content-between">
                                                                <div class="sub-tution-text">
                                                                    <h6>Tuition Fee</h6>
                                                                    <p>
                                                                        {{ get_currency($item->university->country) }}
                                                                        {{ $item->gross_tuition }}
                                                                        {{ get_payment_currency($item->university->country) }}
                                                                    </p>
                                                                </div>
                                                                <div class="sub-tution-text">
                                                                    <h6>Application Fee</h6>
                                                                    <p>
                                                                        {{ get_currency($item->university->country) }}
                                                                        {{ $item->gross_tuition }}
                                                                        {{ get_payment_currency($item->university->country) }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 p-0">
                                                    <div class="sub-course-btn-left">

                                                        <a class="sub-program-det-border-btn"
                                                            href="{{ route('program.detail', ['id' => $item->id, 'slug' => $item->slug]) }}">Program
                                                            Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <h5 class="txt-center">Sorry, we couldn't find any similar programs</h5>
                                    @endforelse
                                    {{-- <div class="course-tab-content">
                                        <div class="d-flex flex-wrap justify-content-between">
                                            <div class="col-lg-8 p-0">
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
                                                                <p>£14,250.00 GBP</p>
                                                            </div>
                                                            <div class="sub-tution-text">
                                                                <h6>Application Fee</h6>
                                                                <p>£0.00 GBP</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="course-tab-content">
                                        <div class="d-flex flex-wrap justify-content-between">
                                            <div class="col-lg-8 p-0">
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
                                                                <p>£14,250.00 GBP</p>
                                                            </div>
                                                            <div class="sub-tution-text">
                                                                <h6>Application Fee</h6>
                                                                <p>£0.00 GBP</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 p-0">
                                                <div class="sub-course-btn-left">
                                                    <a class="sub-start-btn-applica" href="javascript:;">Check Eligibility
                                                        Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                </div>

                            </div>

                            <div class="col-lg-4">
                                <div class="sub-prog-intake-bg">
                                    <div class="sidebarAgentDtlsAreainner">
                                        <div class="programsPrice">
                                            {{-- <h4 class="mb-0">$ 47</h4> --}}
                                        </div>
                                        <div class="applyNowBtnArea">

                                            @if (auth()->check())
                                                @if (auth()->user()->type == 'student')
                                                    <a href="{{ route('student.program.apply', $programDetail->id) }}"
                                                        class="sub-program-det-border-btn"><span class="txt">Apply
                                                            Now</span></a>
                                                @else
                                                    <a data-toggle="modal"
                                                        data-target="#agentStudentEligibilityProgramModal"
                                                        href="javascript:;"class="sub-program-det-border-btn created-application-btn">
                                                        <div class="css-kau3f">
                                                            <div class="css-y1wg39"><span class="css-1gbei53">Create
                                                                    application</span></div><span class="css-wdqn0a"><svg
                                                                    aria-hidden="true" color="" data-icon-color=""
                                                                    data-icon-contrast="mid" role="img"
                                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                                    class="css-7oehi2">
                                                                    <path
                                                                        d="M8.70711 12.7678L10.5251 14.5858L14.2929 10.818L15.7071 12.2323L10.5251 17.4143L7.29289 14.182L8.70711 12.7678Z">
                                                                    </path>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M6 2C4.34315 2 3 3.34315 3 5V19C3 20.6569 4.34315 22 6 22H18C19.6569 22 21 20.6569 21 19V8.82843C21 8.03278 20.6839 7.26972 20.1213 6.70711L16.2929 2.87868C15.7303 2.31607 14.9672 2 14.1716 2H6ZM5 5C5 4.44772 5.44772 4 6 4H14V7C14 8.10457 14.8954 9 16 9H19V19C19 19.5523 18.5523 20 18 20H6C5.44772 20 5 19.5523 5 19V5Z">
                                                                    </path>
                                                                </svg></span>
                                                        </div>
                                                    </a>
                                                    {{-- <a href="javascript:;" class="sub-program-det-border-btn"
                                                        data-toggle="modal" data-target="#exampleModal"><span
                                                            class="txt">Apply Now</span></a> --}}
                                                @endif
                                            @else
                                                <a href="{{ route('student.program.apply', $programDetail->id) }}"
                                                    class="sub-program-det-border-btn"><span class="txt">Apply
                                                        Now</span></a>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <div class="sub-prog-years-bg">

                                    <div class="sub-course-tt-box d-flex align-items-start justify-content-start">
                                        <div class="sub-course-unt">
                                            <img src="{{ asset('/') }}assets/images/courses-details/certificate-file.png"
                                                alt="" />
                                        </div>
                                        <div class="sub-course-unt-title">
                                            <h6> {{ $programDetail->program_level }} </h6>
                                            <div class="sub-course-country">
                                                Program Level
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sub-course-tt-box d-flex align-items-start justify-content-start">
                                        <div class="sub-course-unt">
                                            <img src="{{ asset('/') }}assets/images/courses-details/calender.png"
                                                alt="" />
                                        </div>
                                        <div class="sub-course-unt-title">
                                            <h6> {{ $programDetail->program_length }} </h6>
                                            <div class="sub-course-country">
                                                Program Length
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sub-course-tt-box d-flex align-items-start justify-content-start">
                                        <div class="sub-course-unt">
                                            <img src="{{ asset('/') }}assets/images/courses-details/money.png"
                                                alt="" />
                                        </div>
                                        <div class="sub-course-unt-title">
                                            <h6>{{ get_currency($programDetail->university->country) . ' ' . $programDetail->cost_of_living }}
                                                {{ get_payment_currency($programDetail->university->country) }} / Year</h6>
                                            <div class="sub-course-country">
                                                Cost of Living
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sub-course-tt-box d-flex align-items-start justify-content-start">
                                        <div class="sub-course-unt">
                                            <img src="{{ asset('/') }}assets/images/courses-details/money-tuition.png"
                                                alt="" />
                                        </div>
                                        <div class="sub-course-unt-title">
                                            <h6>{{ get_currency($programDetail->university->country) }}
                                                {{ $programDetail->gross_tuition }}
                                                {{ get_payment_currency($programDetail->university->country) }} / Year</h6>
                                            <div class="sub-course-country">
                                                Tuition
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sub-course-tt-box d-flex align-items-start justify-content-start">
                                        <div class="sub-course-unt">
                                            <img src="{{ asset('/') }}assets/images/courses-details/application-fee.png"
                                                alt="" />
                                        </div>
                                        <div class="sub-course-unt-title">
                                            <h6>
                                                {{ get_currency($programDetail->university->country) }}
                                                {{ number_format($programDetail->application_fee, 2) }}
                                                {{ get_payment_currency($programDetail->university->country) }} / Year
                                            </h6>
                                            <div class="sub-course-country">
                                                Application Fee
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="sub-prog-intake-bg">
                                    <h5>Institution Details</h5>

                                    <div
                                        class="sub-intake-open-main d-flex flex-wrap align-items-center justify-content-between">
                                        <div>
                                            <p>Founded</p>
                                        </div>
                                        <div>
                                            <span>{{ $programDetail->university->founded }}</span>
                                        </div>
                                    </div>
                                    <div
                                        class="sub-intake-open-main d-flex flex-wrap align-items-center justify-content-between">
                                        <div>
                                            <p>School ID</p>
                                        </div>
                                        <div>
                                            <span>{{ $programDetail->university->school_id }}</span>
                                        </div>
                                    </div>
                                    <div
                                        class="sub-intake-open-main d-flex flex-wrap align-items-center justify-content-between">
                                        <div>
                                            <p>DLI number</p>
                                        </div>
                                        <div>
                                            <span>{{ $programDetail->university->provider_id_number }}</span>
                                        </div>
                                    </div>
                                    <div
                                        class="sub-intake-open-main d-flex flex-wrap align-items-center justify-content-between">
                                        <div>
                                            <p>Institution type</p>
                                        </div>
                                        <div>
                                            <span>{{ $programDetail->university->institution_type }}</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="sub-prog-intake-bg">
                                    <h5>Institution Details</h5>
                                    <div
                                        class="sub-intake-open-main d-flex flex-wrap align-items-center justify-content-between">
                                        <div>
                                            <p>January - April</p>
                                        </div>
                                        <div>
                                            <span>N/A</span>
                                        </div>
                                    </div>
                                    <div
                                        class="sub-intake-open-main d-flex flex-wrap align-items-center justify-content-between">
                                        <div>
                                            <p>May - August</p>
                                        </div>
                                        <div>
                                            <span>Under 15 days</span>
                                        </div>
                                    </div>
                                    <div
                                        class="sub-intake-open-main d-flex flex-wrap align-items-center justify-content-between">
                                        <div>
                                            <p>September - December</p>
                                        </div>
                                        <div>
                                            <span>N/A</span>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="sub-prog-intake-bg">
                                    <h5>Program Intakes</h5>
                                    @foreach ($intakes as $key => $intake)
                                        <div
                                            class="sub-intake-open-main d-flex flex-wrap align-items-center justify-content-between">
                                            <div
                                                class="sub-intake-open-btn {{ $intake->intake_status != 1 ? 'sub-intake-open-btn-blue' : '' }} ">
                                                <span>
                                                    @if ($intake->intake_status == '1')
                                                        Open
                                                    @elseif ($intake->intake_status == '2')
                                                        Likely Open
                                                    @elseif ($intake->intake_status == '2')
                                                        Will Open
                                                    @else
                                                        Wait List
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="sub-intake-date d-flex flex-wrap">
                                                <a data-toggle="collapse" href="#multiCollapseExample{{ $key }}"
                                                    role="button" aria-expanded="false"
                                                    aria-controls="multiCollapseExample{{ $key }}">
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <p>
                                                    @if ($intake->intake_status == '1')
                                                        {{ date('M Y', strtotime($intake->intake_date)) }}
                                                    @elseif ($intake->intake_status == '2')
                                                        {{ date('M Y', strtotime($intake->intake_date)) }}
                                                    @elseif ($intake->intake_status == '2')
                                                        {{ date('M Y', strtotime($intake->intake_date)) }}
                                                    @else
                                                        {{ date('M Y', strtotime($intake->intake_date)) }}
                                                    @endif

                                                </p>
                                            </div>
                                            <div class="collapse multi-collapse"
                                                id="multiCollapseExample{{ $key }}">
                                                <div class="sub-opne-date-text">
                                                    <div>
                                                        <p>Open date <a href="javascript:;" data-toggle="modal"
                                                                data-target="#exampleModal"><i
                                                                    class="fa-solid fa-circle-info"></i></a></p>
                                                        <span>{{ $intake->open_date ?? 'No data available' }}</span>
                                                    </div>
                                                    <div>
                                                        <p>Submission deadline</p>
                                                        <span>{{ $intake->deadline ?? 'No data available' }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{-- <div
                                        class="sub-intake-open-main d-flex flex-wrap align-items-center justify-content-between">
                                        <div class="sub-intake-open-btn sub-intake-open-btn-blue">
                                            <span>Likely open</span>
                                        </div>
                                        <div class="sub-intake-date d-flex flex-wrap">
                                            <a data-toggle="collapse" href="#multiCollapseExample2" role="button"
                                                aria-expanded="false" aria-controls="multiCollapseExample2">
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <p>Sep 2022</p>
                                        </div>
                                        <div class="collapse multi-collapse" id="multiCollapseExample2">
                                            <div class="sub-opne-date-text">
                                                <div>
                                                    <p>Open date <a href="javascript:;" data-toggle="modal"
                                                            data-target="#exampleModal"><i
                                                                class="fa-solid fa-circle-info"></i></a></p>
                                                    <span>2021-12-17 12:00 AM GMT</span>
                                                </div>
                                                <div>
                                                    <p>Submission deadline</p>
                                                    <span>No data available</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="sub-intake-open-main d-flex flex-wrap align-items-center justify-content-between">
                                        <div class="sub-intake-open-btn sub-intake-open-btn-blue">
                                            <span>Likely open</span>
                                        </div>
                                        <div class="sub-intake-date d-flex flex-wrap">
                                            <a data-toggle="collapse" href="#multiCollapseExample3" role="button"
                                                aria-expanded="false" aria-controls="multiCollapseExample3">
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <p>Sep 2022</p>
                                        </div>
                                        <div class="collapse multi-collapse" id="multiCollapseExample3">
                                            <div class="sub-opne-date-text">
                                                <div>
                                                    <p>Open date <a href="javascript:;" data-toggle="modal"
                                                            data-target="#exampleModal"><i
                                                                class="fa-solid fa-circle-info"></i></a></p>
                                                    <span>2021-12-17 12:00 AM GMT</span>
                                                </div>
                                                <div>
                                                    <p>Submission deadline</p>
                                                    <span>No data available</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="sub-intake-open-main d-flex flex-wrap align-items-center justify-content-between">
                                        <div class="sub-intake-open-btn">
                                            <span>Open</span>
                                        </div>
                                        <div class="sub-intake-date d-flex flex-wrap">
                                            <a data-toggle="collapse" href="#multiCollapseExample4" role="button"
                                                aria-expanded="false" aria-controls="multiCollapseExample4">
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <p>Sep 2022</p>
                                        </div>
                                        <div class="collapse multi-collapse" id="multiCollapseExample4">
                                            <div class="sub-opne-date-text">
                                                <div>
                                                    <p>Open date <a href="javascript:;" data-toggle="modal"
                                                            data-target="#exampleModal"><i
                                                                class="fa-solid fa-circle-info"></i></a></p>
                                                    <span>2021-12-17 12:00 AM GMT</span>
                                                </div>
                                                <div>
                                                    <p>Submission deadline</p>
                                                    <span>No data available</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Model -->

    @include('modal')
    <!-- Courses Details End -->
@endsection
@push('js')
    <script>
        var url = "{{ route('student.program.check-eligibility') }}";
        var csrf_token = "{{ csrf_token() }}";
        let programId = "{{ $programDetail->id }}";
    </script>
    <script src="{{ asset('/') }}assets/js/program-eligibility.js"></script>
@endpush
