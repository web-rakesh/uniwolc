@extends("$layout.layouts.layout")
@section('content')
    <section class="">
        <div class="dashboardCard">
            <div class="dashboardCardHeader">
                <div class="headerTitle">
                    <h5 class="title mb-2">
                        <span class="txt">Show Application
                        </span>
                    </h5>
                </div>

            </div>
            <div class="dashboardCardBody">

                <div class="form-steps-area">
                    <div class="form-steps">
                        <!-- First Step -->
                        <div class="form-steps__step ">
                            <div class="form-steps__step-circle form-steps__step--incomplete">
                                <span class="form-steps__step-number">1</span>
                                <span class="form-steps__step-check">&#x2713;</span>
                            </div>
                            <span class="form-step__step-name">Pay Application Fee</span>
                        </div>
                        <!-- Second Step -->
                        <div class="form-steps__step form-steps__step--incomplete">
                            <div class="form-steps__step-circle">
                                <span class="form-steps__step-number">2</span>
                                <span class="form-steps__step-check">&#x2713;</span>
                            </div>
                            <span class="form-step__step-name">Prepare Application</span>
                        </div>
                        <!-- Thired Step -->
                        <div class="form-steps__step form-steps__step--incomplete form-steps__step--active">
                            <div class="form-steps__step-circle">
                                <span class="form-steps__step-number">3</span>
                                <span class="form-steps__step-check">&#x2713;</span>
                            </div>
                            <span class="form-step__step-name">Submission</span>
                            <span class="form-stepdaad-line">Deadline:
                                {{ @$intakeProgram->deadline ? date('M d, Y', strtotime($intakeProgram->deadline)) : '' }}</span>
                        </div>
                        <!-- Fourth Step -->
                        <div class="form-steps__step form-steps__step--incomplete">
                            <div class="form-steps__step-circle">
                                <span class="form-steps__step-number">4</span>
                                <span class="form-steps__step-check">&#x2713;</span>
                            </div>
                            <span class="form-step__step-name">Decision</span>
                        </div>
                        <!-- Fourth Step -->
                        <div class="form-steps__step form-steps__step--incomplete">
                            <div class="form-steps__step-circle">
                                <span class="form-steps__step-number">5</span>
                                <span class="form-steps__step-check">&#x2713;</span>
                            </div>
                            <span class="form-step__step-name">Post-Decision Requirements</span>
                        </div>
                        <!-- Fourth Step -->
                        <div class="form-steps__step form-steps__step--last">
                            <div class="form-steps__step-circle">
                                <span class="form-steps__step-number">6</span>
                                <span class="form-steps__step-check">&#x2713;</span>
                            </div>
                            <span class="form-step__step-name">Enrollment Confirmed</span>
                        </div>
                    </div>
                </div>


                <div class="appDtlsSec">
                    <div class="appDtlsLeftSideArea">
                        <div class="appSidebar">
                            <div class="appSidebarTopArea">
                                <button class="muiIconBtn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-menu align-self-center topbar-icon">
                                        <line x1="3" y1="12" x2="21" y2="12"></line>
                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                        <line x1="3" y1="18" x2="21" y2="18"></line>
                                    </svg>
                                </button>
                                <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                        Dropdown button
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="javascript:;">{{ $applyProgram->getProgram->getUniversity[0]->university_name }}</a>
                                        {{-- <a class="dropdown-item" href="#">Link 2</a>
                                        <a class="dropdown-item" href="#">Link 3</a> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="appSidebarinner">
                                <div class="appSidebarWrapper">
                                    <div class="appUserDtlsArea">
                                        <div class="userThumanil">
                                            <img src="assets/images/user.svg" class="img-fluid" alt="">
                                        </div>
                                        <div class="userLogo">
                                            <img src="assets/images/University_of_Birmingham_Logo.png" class="img-fluid"
                                                alt="">
                                        </div>
                                        <div class="userInfo">
                                            <div class="titleSec">
                                                <div class="countryLogo">
                                                    <img src="assets/images/england.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="title">
                                                    <a href="javascript:;">
                                                        {{ $applyProgram->getProgram->getUniversity[0]->university_name }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="para">
                                                <a href="javascript:;"> {{ $applyProgram->getProgram->program_title }}</a>
                                            </div>
                                            <div class="des">
                                                <p><strong>Delivery Method:</strong> <span
                                                        class="classStatus">In-class</span></p>
                                                <p><strong>Level:</strong>
                                                    {{ @$applyProgram->getProgram->programLevel->level_name }}
                                                </p>
                                                <p><strong>Required Level:</strong>
                                                    {{ @$applyProgram->getProgram->minimumLevel->level_name }}</p>
                                                <p><strong>Application ID:</strong>
                                                    {{ @$applyProgram->application_number }}</p>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="exploreArea text-right">
                                        <span class="">Collapse All</span>
                                        <span class="">expand All</span>
                                    </div>

                                    <div class="intakeArea">
                                        <div class="row rowBox2 align-items-center intakeAreainner">
                                            <div class="col-lg-3 col-md-3 col-sm-12 col-12 columnBox2 labelTtl">
                                                <span>Intake(s):</span>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 columnBox2">
                                                <label class="labelName">ESL</label>
                                                <select class="form-control" id="els_intake"
                                                    data-program="{{ $applyProgram->program_id }}">
                                                    @foreach ($applyProgram->intake_date ? els_intake($applyProgram->intake_date->intake_date) : els_intake() ?? [] as $els_intake)
                                                        @foreach ($els_intake as $i => $value)
                                                            <option value="{{ $i }}"
                                                                {{ $i == date('Y-m-d', strtotime($applyProgram->esl_start_date)) ? 'selected' : '' }}>
                                                                {{ $value }}
                                                            </option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="col-lg-5 col-md-5 col-sm-12 col-12 columnBox2">
                                                <label class="labelName">Academic : <span class="status">Open
                                                        Now</span>

                                                    <div data-cy="sidebar-dates" class="css-srg8eq e1fgni7l10">
                                                        <button class="css-hzmlgd e184lxht1" id="intake_change_button">
                                                            <span aria-hidden="true" class="fa fa-check"></span>
                                                        </button>
                                                    </div>
                                                </label>

                                                <select class="form-control program_intake"
                                                    data-program="{{ $applyProgram->program_id }}">
                                                    @foreach ($applyProgram->getProgram->intake as $intake)
                                                        <option value="{{ $intake->id }}"
                                                            {{ $intake->id == $applyProgram->intake ? 'selected' : '' }}>
                                                            {{ date('Y-M', strtotime($intake->intake_date)) }}</option>
                                                    @endforeach
                                                    {{-- <option>2024-Sep</option> --}}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="studentSidebarAcademicSubmissionDeadline">
                                        <h4 class="title">Academic Submission Deadline:</h4>
                                        <div class="content">
                                            {{-- {{ $intakeProgram }} --}}
                                            <span class="txt">
                                                {{ date('M d, Y', strtotime(@$intakeProgram->deadline)) }}
                                            </span>
                                            <span class="info"><i class="fa-regular fa-circle-info"></i></span>
                                        </div>
                                        <div></div>
                                    </div>

                                    <div class="addBtnArea">
                                        <button type="button" class="addBtn" id="addBackupProgran">
                                            <span class="icon"><i class="fa-regular fa-plus"></i></span>
                                            <span class="txt">Add Backup Program</span>
                                        </button>

                                        <!-- The Modal -->
                                        <div class="modal addBackupProgramModal" id="addBackupProgramModal">
                                            <div class="modal-dialog addBackupProgramModalDiolog">
                                                <div class="modal-content addBackupProgramModalContent">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header addBackupProgramModalHeader">
                                                        <h4 class="modal-title">Add Backup</h4>
                                                        <button type="button" class="close" data-dismiss="modal"><i
                                                                class="fa-regular fa-xmark"></i></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body addBackupProgramModalBody">
                                                        <h6 class="mb-2" style="font-weight:600;">
                                                            Select up to 3 Backup Programs in order
                                                            of preferance.</h6>
                                                        <h6 class="mb-2" style="font-weight:400;">
                                                            These programs will either be submitted
                                                            under the same Application Fee for your
                                                            selected program OR
                                                            will be used in the event your primary
                                                            choice is not avaliable.</h6>
                                                        <p class="mb-4">Only programs that you are
                                                            eligble for from the same school can be
                                                            selected as Backup programs.</p>
                                                        <div class="chooseProgramArea">
                                                            <div class="chooseProgramAreainner">

                                                                <div class="chooseProgramItem">
                                                                    <div class="chooseProgramIteminner">

                                                                        <div class="programSelect">
                                                                            <select class="form-selected" multiple
                                                                                id="backupItemSelect">

                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="addNewProgramBtnArea mt-3">
                                                                <button type="button"
                                                                    class="btn btn-outline-primary addNewProgramBtn">
                                                                    <i class="fa-regular fa-plus"></i>
                                                                    <span class="txt">Add new
                                                                        program</span>
                                                                </button>
                                                            </div> --}}
                                                        </div>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer addBackupProgramModalFooter">
                                                        <button type="button" class="btn btn-dark"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="button" id="saveBackupProgram"
                                                            class="btn btn-primary">Save
                                                            Backup(s)</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="studentfullInfoArea">
                                        <div class="studentfullInfoAreainner">

                                            <div class="mainAccordian">

                                                <div class="accordianItem studentSidebarStatusArea">
                                                    <div class="accordianHeader">
                                                        <div class="title">Status:</div>
                                                        <div class="sintentInfo">
                                                            <div class="checkBoxFld">
                                                                <div class="mdCheckbox">
                                                                    <input id="i1" type="checkbox" disabled>
                                                                    <label for="i1">Ready to
                                                                        Submit</label>
                                                                </div>
                                                                <div class="mdCheckbox">
                                                                    <input id="i2" type="checkbox" disabled>
                                                                    <label for="i2">Submitted to
                                                                        School</label>
                                                                </div>
                                                                <div class="mdCheckbox">
                                                                    <input id="i3" type="checkbox" disabled>
                                                                    <label for="i3">Ready for
                                                                        Visa</label>
                                                                </div>
                                                                <div class="mdCheckbox">
                                                                    <input id="i4" type="checkbox" disabled>
                                                                    <label for="i4">Ready to
                                                                        Enroll</label>
                                                                </div>
                                                                <div class="mdCheckbox">
                                                                    <input id="i5" type="checkbox" disabled>
                                                                    <label for="i5">Enrollment
                                                                        Confirmed</label>
                                                                </div>
                                                                <div class="pendingLinkArea">
                                                                    <a href="javascript;:" class="pendingLink"><i
                                                                            class="fa-regular fa-cart-shopping"></i>
                                                                        Pending</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class=""></span>
                                                    </div>
                                                </div>

                                                <div class="accordianItem studentSidebarbgArea">
                                                    <div class="accordianHeader">
                                                        <div class="title">Background:</div>
                                                        <div class="sintentInfo">
                                                            <div class="contentBoxFld">
                                                                <div class="mb-2">
                                                                    <p class="mb-2"><span class="d-block">City</span>
                                                                        {{ @$studentDetail->userCity->name }}</p>
                                                                    <p class="mb-0"><span
                                                                            class="d-block">Nationality</span>
                                                                        {{ get_country($studentDetail->country) }}
                                                                    </p>
                                                                </div>
                                                                <div class="mb-0"></div>
                                                            </div>
                                                        </div>
                                                        <span class="toogleBtn"><i
                                                                class="fa-regular fa-chevron-down"></i></span>
                                                    </div>
                                                    <div class="accordianBody">
                                                        <div class="studentInfoArea">

                                                            <div class="studentInfoItem">
                                                                <div class="ttl">Login Email</div>
                                                                <div class="txt">
                                                                    {{ $studentDetail->email }}
                                                                </div>
                                                            </div>
                                                            <div class="studentInfoItem">
                                                                <div class="ttl">First Name</div>
                                                                <div class="txt">{{ $studentDetail->first_name }}</div>
                                                            </div>
                                                            <div class="studentInfoItem">
                                                                <div class="ttl">Last Name</div>
                                                                <div class="txt">{{ $studentDetail->last_name }}</div>
                                                            </div>
                                                            <div class="studentInfoItem">
                                                                <div class="ttl">Birthday</div>
                                                                <div class="txt">
                                                                    {{ date('M d, Y', strtotime($studentDetail->dob)) }}
                                                                </div>
                                                            </div>
                                                            <div class="studentInfoItem">
                                                                <div class="ttl">Phone Number</div>
                                                                <div class="txt">+91{{ $studentDetail->mobile_number }}
                                                                </div>
                                                            </div>
                                                            <div class="studentInfoItem">
                                                                <div class="ttl">First Language
                                                                </div>
                                                                <div class="txt">{{ $studentDetail->fast_language }}
                                                                </div>
                                                            </div>
                                                            <div class="studentInfoItem">
                                                                <div class="ttl">Gender</div>
                                                                <div class="txt">{{ $studentDetail->gender }}</div>
                                                            </div>
                                                            <div class="studentInfoItem">
                                                                <div class="ttl">Marital Status
                                                                </div>
                                                                <div class="txt">{{ $studentDetail->marital_status }}
                                                                </div>
                                                            </div>
                                                            <div class="studentInfoItem">
                                                                <div class="ttl">Passport Number
                                                                </div>
                                                                <div class="txt">{{ $studentDetail->passport_number }}
                                                                </div>
                                                            </div>
                                                            <div class="studentInfoItem">
                                                                <div class="ttl">Passport Expiry
                                                                    Date</div>
                                                                <div class="txt">
                                                                    {{ date('M d, Y', strtotime($studentDetail->passport_expiry_date)) }}
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="accordianItem studentSidebareducationArea">
                                                    <div class="accordianHeader">
                                                        <div class="title">Education:</div>
                                                        <div class="sintentInfo">
                                                            <div class="contentBoxFld">
                                                                <p class="mb-0">
                                                                    {{ get_education_level($studentDetail->educationDetail->education_level) }}:
                                                                    <a href="javascript:;"><i
                                                                            class="fa-solid fa-graduation-cap"></i></a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <span class="toogleBtn"><i
                                                                class="fa-regular fa-chevron-down"></i></span>
                                                    </div>
                                                    <div class="accordianBody">
                                                        <div class="studentInfoArea">

                                                            <div class="studentInfoItem">
                                                                <div class="ttl">Country of
                                                                    Education</div>
                                                                <div class="txt">
                                                                    {{ get_country($studentDetail->educationDetail->education_country) }}
                                                                </div>
                                                            </div>
                                                            <div class="studentInfoItem">
                                                                <div class="ttl">Grade</div>
                                                                <div class="txt">
                                                                    {{ get_education_scheme_grade($studentDetail->educationDetail->education_scheme_grade) }}
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordianItem studentSidebarTestArea">
                                                    <div class="accordianHeader">
                                                        <div class="title">English Test:</div>
                                                        <div class="sintentInfo">
                                                            <div class="contentBoxFld">
                                                                <p class="mb-0">
                                                                    {{ $studentDetail->englishTest->english_test_type }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <span class="toogleBtn"><i
                                                                class="fa-regular fa-chevron-down"></i></span>
                                                    </div>
                                                    <div class="accordianBody">
                                                        <div class="studentInfoArea">
                                                            <div class="studentInfoArea">
                                                                <div class="studentInfoItem">
                                                                    <div class="ttl">English Test Type</div>
                                                                    <div class="txt">
                                                                        {{ $studentDetail->englishTest->english_test_type }}
                                                                    </div>
                                                                </div>
                                                                <div class="studentInfoItem">
                                                                    <div class="ttl">Total Score</div>
                                                                    <div class="txt">
                                                                        {{ $studentDetail->englishTest->total_score }}
                                                                    </div>
                                                                </div>
                                                                <div class="studentInfoItem">
                                                                    <div class="ttl">Reading Score</div>
                                                                    <div class="txt">
                                                                        {{ $studentDetail->englishTest->reading_score }}
                                                                    </div>
                                                                </div>
                                                                <div class="studentInfoItem">
                                                                    <div class="ttl">Writing Score</div>
                                                                    <div class="txt">
                                                                        {{ $studentDetail->englishTest->writing_score }}
                                                                    </div>
                                                                </div>
                                                                <div class="studentInfoItem">
                                                                    <div class="ttl">Listening Score</div>
                                                                    <div class="txt">
                                                                        {{ $studentDetail->englishTest->listening_score }}
                                                                    </div>
                                                                </div>
                                                                <div class="studentInfoItem">
                                                                    <div class="ttl">Speaking Score</div>
                                                                    <div class="txt">
                                                                        {{ $studentDetail->englishTest->speaking_score }}
                                                                    </div>
                                                                </div>
                                                                <div class="studentInfoItem">
                                                                    <div class="ttl">Exam Date</div>
                                                                    <div class="txt">
                                                                        {{ $studentDetail->englishTest->exam_date ? date('M d, Y', strtotime($studentDetail->englishTest->exam_date)) : '' }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordianItem studentSidebarTestArea">
                                                    <div class="accordianHeader">
                                                        <div class="title">Recruitment Partner:
                                                        </div>
                                                        <div class="sintentInfo">
                                                            <div class="contentBoxFld">
                                                                <p class="mb-0">None</p>
                                                            </div>
                                                        </div>
                                                        <span class="toogleBtn"><i
                                                                class="fa-regular fa-chevron-down"></i></span>
                                                    </div>
                                                    <div class="accordianBody">
                                                        <div class="studentInfoArea">

                                                        </div>
                                                    </div>
                                                </div>

                                                @if (Auth::user()->type !== 'student')
                                                    <div class="accordianItem studentSidebarTestArea">
                                                        <div class="accordianHeader">
                                                            <div class="title">Student Representative:
                                                            </div>
                                                            <div class="sintentInfo">
                                                                <div class="contentBoxFld">
                                                                    <p class="mb-0">
                                                                        <strong>{{ $studentDetail->email }}</strong>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <span class="toogleBtn"><i
                                                                    class="fa-regular fa-chevron-down"></i></span>
                                                        </div>
                                                        <div class="accordianBody">
                                                            <div class="studentInfoArea">

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="accordianItem studentSidebarTestArea">
                                                    <div class="accordianHeader">
                                                        <div class="title">Payment:</div>
                                                        <div class="sintentInfo">
                                                            <div class="contentBoxFld">
                                                                <p class="mb-1"><strong>Payment
                                                                        pending</strong></p>
                                                                <p class="mb-0">Application Fee
                                                                    @if ($applyProgram->getProgram->application_fee > 0)
                                                                        {{ get_currency($applyProgram->getUniversity->country) . $applyProgram->getProgram->application_fee }}
                                                                    @else
                                                                        <a href="javascript;:"
                                                                            style="color: rgb(255,0,0);">Free</a>
                                                                    @endif

                                                                </p>
                                                            </div>
                                                        </div>
                                                        <span class="toogleBtn"><i
                                                                class="fa-regular fa-chevron-down"></i></span>
                                                    </div>
                                                    <div class="accordianBody">
                                                        <div class="studentInfoArea">

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- {{ $uploadedDocument }} --}}


                    <div class="apptDlsRightSideArea">
                        <div class="appDtlsArea">
                            <div class="alert alert-danger appinfoArea mb-4">
                                <div class="d-flex">
                                    <div class="icon mr-3"><i class="fa-regular fa-circle-info"></i>
                                    </div>
                                    <div class="cont" style="font-size:.8125rem;">Application will not
                                        be processed until payment received.
                                        <a href="{{ route('student.payment.confirm', ['ids' => $applyProgram->id]) }}">Submit
                                            payment now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="appbtnListArea">
                                <ul class="appbtnList">
                                    <li><a href=""><span class="icon"><i
                                                    class="fa-regular fa-file-lines"></i></span>
                                            <span class="txt">Applicant Requirements</span></a></li>
                                    <li><a href="javascript:;" id="student-record"><span class="icon"><i
                                                    class="fa-regular fa-clipboard"></i></span>
                                            <span class="txt">Student Records</span></a></li>
                                    <li><a href="javascript:;" id="note"><span class="icon"><i
                                                    class="fa-regular fa-notebook"></i></span> <span
                                                class="txt">Notes</span></a></li>
                                </ul>

                            </div>
                            <div class="appDtlsAccordianArea">
                                <div class="appDtlsAccordian">

                                    <div class="appDtlsAccordianItem">
                                        <div class="appDtlsAccordianHeader">
                                            <div class="leftSide">
                                                <h4 class="title">Pre-Payment</h4>
                                                <p class="mb-0">Last requirement completed on
                                                    {{ date('M d, Y', strtotime($applyProgram->created_at)) }}
                                                </p>
                                            </div>
                                            <div class="rightSide">
                                                <ul class="rightSideList">
                                                    <li>
                                                        <a href="#" class="missingBtn">
                                                            <span class="icon"><i
                                                                    class="fa-sharp fa-solid fa-triangle"></i></span>
                                                            <span class="txt">0</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="reviewingBtn">
                                                            <span class="icon"><i
                                                                    class="fa-solid fa-hourglass"></i></span>
                                                            <span class="txt" id="total-document">8</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="approveBtn">
                                                            <span class="icon"><i
                                                                    class="fa-regular fa-xmark"></i></span>
                                                            <span class="txt">0</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="completedBtn">
                                                            <span class="icon"><i
                                                                    class="fa-regular fa-check"></i></span>
                                                            <span class="txt" id="upload-document">4</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <span class="toggleBtn"><i class="fa-solid fa-minus"></i></span>
                                            </div>
                                        </div>
                                        <div class="appDtlsAccordianBody">
                                            <div class="appListItemArea">

                                                <div class="appListItem">
                                                    <div class="reqiredBox">
                                                        <div class="reqiredBoxinner">
                                                            <span class="txt">Required</span>
                                                        </div>
                                                    </div>
                                                    <div class="appInfiDtlsArea">
                                                        <div class="appInfiDtlsAreainner">
                                                            <div class="appInfiDtls">
                                                                <div class="logoThumnail">
                                                                    <div class="missingBox text-center">
                                                                        <i class="fa-regular fa-triangle-exclamation"></i>
                                                                        <p class="mb-0">Mossing</p>
                                                                    </div>
                                                                </div>
                                                                <div class="appInfiDtlsContent">
                                                                    <div class="wrapped-content">
                                                                        <h4 class="title mb-2">
                                                                            Country Specific GPA
                                                                            India <a href="copyLink"><i
                                                                                    class="fa-regular fa-link-simple"></i></a>
                                                                        </h4>
                                                                        <div class="wrappedContentinner">
                                                                            <div class="req-desc">
                                                                                <div class="moretext">
                                                                                    <p>Please be
                                                                                        advised that
                                                                                        the
                                                                                        applicant is
                                                                                        required to
                                                                                        supply the
                                                                                        contact
                                                                                        details of
                                                                                        two academic
                                                                                        referees (or
                                                                                        one academic
                                                                                        reference
                                                                                        if
                                                                                        applicable
                                                                                        to the
                                                                                        course/program
                                                                                        applied
                                                                                        for).
                                                                                        Employment
                                                                                        references
                                                                                        may be
                                                                                        acceptable
                                                                                        for specific
                                                                                        courses
                                                                                        which
                                                                                        require
                                                                                        them.
                                                                                        Please note
                                                                                        that the
                                                                                        contact
                                                                                        email
                                                                                        address of
                                                                                        the referee
                                                                                        must be an
                                                                                        official
                                                                                        email
                                                                                        address and
                                                                                        not a
                                                                                        personal one
                                                                                        (for
                                                                                        example,
                                                                                        gmail).</p>
                                                                                    <p><br></p>
                                                                                    <p>Please make
                                                                                        sure the
                                                                                        referee(s)
                                                                                        is informed
                                                                                        to expect an
                                                                                        email from
                                                                                        the
                                                                                        University
                                                                                        of
                                                                                        Birmingham,
                                                                                        requesting
                                                                                        them to
                                                                                        write a
                                                                                        reference.
                                                                                        We recommend
                                                                                        that the
                                                                                        referee
                                                                                        sends back
                                                                                        the
                                                                                        reference in
                                                                                        a PDF format
                                                                                        as it is
                                                                                        preferred
                                                                                        that:</p>
                                                                                    <ul>
                                                                                        <li>The
                                                                                            reference
                                                                                            is on
                                                                                            official
                                                                                            headed
                                                                                            paper
                                                                                            with the
                                                                                            organization
                                                                                            or
                                                                                            institution’s
                                                                                            logo and
                                                                                            address
                                                                                        </li>
                                                                                        <li>It
                                                                                            includes
                                                                                            the
                                                                                            date,
                                                                                            the
                                                                                            applicant's
                                                                                            details
                                                                                            and the
                                                                                            details
                                                                                            of the
                                                                                            referee
                                                                                        </li>
                                                                                        <li>A
                                                                                            summary
                                                                                            of how
                                                                                            the
                                                                                            referee
                                                                                            knows
                                                                                            the
                                                                                            applicant
                                                                                            and
                                                                                            confirm
                                                                                            the
                                                                                            applicant's
                                                                                            suitability
                                                                                            for
                                                                                            studying
                                                                                            on the
                                                                                            course
                                                                                            applied
                                                                                            for</li>
                                                                                        <li>It
                                                                                            should
                                                                                            be
                                                                                            signed
                                                                                            by the
                                                                                            referee
                                                                                            with
                                                                                            their
                                                                                            official
                                                                                            contact
                                                                                            details.
                                                                                        </li>
                                                                                    </ul>
                                                                                    <p>If the
                                                                                        referee(s)
                                                                                        send back
                                                                                        references
                                                                                        that are not
                                                                                        on the
                                                                                        official
                                                                                        headed
                                                                                        paper, the
                                                                                        applicant
                                                                                        may be asked
                                                                                        to send in
                                                                                        additional
                                                                                        references.
                                                                                    </p>
                                                                                    <p>If the
                                                                                        applicant
                                                                                        already have
                                                                                        a written
                                                                                        reference(s)
                                                                                        and wants to
                                                                                        upload it on
                                                                                        behalf of
                                                                                        the
                                                                                        referee(s),
                                                                                        make sure
                                                                                        the
                                                                                        reference
                                                                                        is a scanned
                                                                                        copy of the
                                                                                        original and
                                                                                        that it is
                                                                                        on official
                                                                                        headed
                                                                                        paper.</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="readMoreLessArea">
                                                                                <span class="readmore-link"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="editBtnArea">
                                                                    <a href="#" class="editBtn" data-toggle="modal"
                                                                        data-target="#myModal"><i
                                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- The Modal -->
                                                    <div class="modal appModal" id="myModal">
                                                        <div class="modal-dialog appModalDiolog">
                                                            <div class="modal-content appModalContent">

                                                                <!-- Modal Header -->
                                                                <div class="modal-header appModalHeader">
                                                                    <h4 class="modal-title">
                                                                        Immigration History
                                                                        Questions</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal"><i
                                                                            class="fa-regular fa-xmark"></i></button>
                                                                </div>
                                                                <form>
                                                                    <!-- Modal body -->
                                                                    <div class="modal-body appModalBody">
                                                                        <div class="form-group">
                                                                            <label class="labelName">1.
                                                                                Has the applicant
                                                                                ever studied in the
                                                                                UK before? <sup
                                                                                    style="color:#ff0000;">*</sup></label>
                                                                            <select class="form-control">
                                                                                <option>Select...
                                                                                </option>
                                                                                <option>Yes</option>
                                                                                <option>No</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="labelName">2.
                                                                                Has the applicant
                                                                                ever lived in the UK
                                                                                before? <sup
                                                                                    style="color:#ff0000;">*</sup></label>
                                                                            <select class="form-control">
                                                                                <option>Select...
                                                                                </option>
                                                                                <option>Yes</option>
                                                                                <option>No</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="labelName">3.
                                                                                Please list ANY
                                                                                previous visa the
                                                                                applicant has been
                                                                                granted (be sure to
                                                                                include the relevant
                                                                                country and type of
                                                                                visa). <sup
                                                                                    style="color:#ff0000;">*</sup></label>
                                                                            <span class="mb-2"
                                                                                style="color: rgb(194, 194, 194);">Maximum
                                                                                4000
                                                                                characters</span>
                                                                            <textarea class="form-control" placeholder="" style="height:100px;"></textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="labelName">4.
                                                                                If the applicant has
                                                                                been refused a visa,
                                                                                please provide
                                                                                details of which
                                                                                country, date of
                                                                                refusal, and refusal
                                                                                reason. <sup
                                                                                    style="color:#ff0000;">*</sup></label>
                                                                            <span class="mb-2"
                                                                                style="color: rgb(194, 194, 194);">Maximum
                                                                                4000
                                                                                characters</span>
                                                                            <textarea class="form-control" placeholder="" style="height:100px;"></textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="labelName">5.
                                                                                Has the applicant
                                                                                ever been refused a
                                                                                visa from ANY
                                                                                country? <sup
                                                                                    style="color:#ff0000;">*</sup></label>
                                                                            <select class="form-control">
                                                                                <option>Select...
                                                                                </option>
                                                                                <option>Yes (Please
                                                                                    specify in the
                                                                                    next question)
                                                                                </option>
                                                                                <option>No (Write
                                                                                    N/A in the next
                                                                                    question)
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="labelName">6.
                                                                                Does the applicant
                                                                                have caring
                                                                                responsibilities?
                                                                                <sup style="color:#ff0000;">*</sup></label>
                                                                            <select class="form-control">
                                                                                <option>Select...
                                                                                </option>
                                                                                <option>Other young
                                                                                    people/children
                                                                                </option>
                                                                                <option>Other
                                                                                    relatives/friends/neighbour
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="labelName">7.
                                                                                Where does the
                                                                                applicant intend to
                                                                                apply for the visa
                                                                                to study in the UK?
                                                                                <sup style="color:#ff0000;">*</sup></label>
                                                                            <span class="mb-2"
                                                                                style="color: rgb(194, 194, 194);">Maximum
                                                                                500
                                                                                characters</span>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""></textarea>
                                                                        </div>


                                                                    </div>
                                                                    <div class="modal-footer appModalFooter">
                                                                        <button type="button"
                                                                            class="btn btn-primary disabled">Submit</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>

                                                <div class="appListItem">
                                                    <div class="reqiredBox">
                                                        <div class="reqiredBoxinner">
                                                            <span class="txt">Required</span>
                                                        </div>
                                                    </div>
                                                    <div class="appInfiDtlsArea">
                                                        <div class="appInfiDtlsAreainner">
                                                            <div class="appInfiDtls">
                                                                <div class="logoThumnail">
                                                                    <div class="missingBox text-center">
                                                                        <i class="fa-regular fa-triangle-exclamation"></i>
                                                                        <p class="mb-0">Mossing</p>
                                                                    </div>
                                                                </div>
                                                                <div class="appInfiDtlsContent">
                                                                    <div class="wrapped-content">
                                                                        <h4 class="title mb-2">
                                                                            Country Specific GPA
                                                                            India <a href="copyLink"><i
                                                                                    class="fa-regular fa-link-simple"></i></a>
                                                                        </h4>
                                                                        <div class="wrappedContentinner">
                                                                            <div class="req-desc">
                                                                                <div class="moretext">
                                                                                    <p>Please be
                                                                                        advised that
                                                                                        the
                                                                                        applicant is
                                                                                        required to
                                                                                        supply the
                                                                                        contact
                                                                                        details of
                                                                                        two academic
                                                                                        referees (or
                                                                                        one academic
                                                                                        reference
                                                                                        if
                                                                                        applicable
                                                                                        to the
                                                                                        course/program
                                                                                        applied
                                                                                        for).
                                                                                        Employment
                                                                                        references
                                                                                        may be
                                                                                        acceptable
                                                                                        for specific
                                                                                        courses
                                                                                        which
                                                                                        require
                                                                                        them.
                                                                                        Please note
                                                                                        that the
                                                                                        contact
                                                                                        email
                                                                                        address of
                                                                                        the referee
                                                                                        must be an
                                                                                        official
                                                                                        email
                                                                                        address and
                                                                                        not a
                                                                                        personal one
                                                                                        (for
                                                                                        example,
                                                                                        gmail).</p>
                                                                                    <p><br></p>
                                                                                    <p>Please make
                                                                                        sure the
                                                                                        referee(s)
                                                                                        is informed
                                                                                        to expect an
                                                                                        email from
                                                                                        the
                                                                                        University
                                                                                        of
                                                                                        Birmingham,
                                                                                        requesting
                                                                                        them to
                                                                                        write a
                                                                                        reference.
                                                                                        We recommend
                                                                                        that the
                                                                                        referee
                                                                                        sends back
                                                                                        the
                                                                                        reference in
                                                                                        a PDF format
                                                                                        as it is
                                                                                        preferred
                                                                                        that:</p>
                                                                                    <ul>
                                                                                        <li>The
                                                                                            reference
                                                                                            is on
                                                                                            official
                                                                                            headed
                                                                                            paper
                                                                                            with the
                                                                                            organization
                                                                                            or
                                                                                            institution’s
                                                                                            logo and
                                                                                            address
                                                                                        </li>
                                                                                        <li>It
                                                                                            includes
                                                                                            the
                                                                                            date,
                                                                                            the
                                                                                            applicant's
                                                                                            details
                                                                                            and the
                                                                                            details
                                                                                            of the
                                                                                            referee
                                                                                        </li>
                                                                                        <li>A
                                                                                            summary
                                                                                            of how
                                                                                            the
                                                                                            referee
                                                                                            knows
                                                                                            the
                                                                                            applicant
                                                                                            and
                                                                                            confirm
                                                                                            the
                                                                                            applicant's
                                                                                            suitability
                                                                                            for
                                                                                            studying
                                                                                            on the
                                                                                            course
                                                                                            applied
                                                                                            for</li>
                                                                                        <li>It
                                                                                            should
                                                                                            be
                                                                                            signed
                                                                                            by the
                                                                                            referee
                                                                                            with
                                                                                            their
                                                                                            official
                                                                                            contact
                                                                                            details.
                                                                                        </li>
                                                                                    </ul>
                                                                                    <p>If the
                                                                                        referee(s)
                                                                                        send back
                                                                                        references
                                                                                        that are not
                                                                                        on the
                                                                                        official
                                                                                        headed
                                                                                        paper, the
                                                                                        applicant
                                                                                        may be asked
                                                                                        to send in
                                                                                        additional
                                                                                        references.
                                                                                    </p>
                                                                                    <p>If the
                                                                                        applicant
                                                                                        already have
                                                                                        a written
                                                                                        reference(s)
                                                                                        and wants to
                                                                                        upload it on
                                                                                        behalf of
                                                                                        the
                                                                                        referee(s),
                                                                                        make sure
                                                                                        the
                                                                                        reference
                                                                                        is a scanned
                                                                                        copy of the
                                                                                        original and
                                                                                        that it is
                                                                                        on official
                                                                                        headed
                                                                                        paper.</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="readMoreLessArea">
                                                                                <span class="readmore-link"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="editBtnArea">
                                                                    <a href="#" class="editBtn" data-toggle="modal"
                                                                        data-target="#myModal2"><i
                                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- The Modal -->
                                                    <div class="modal appModal" id="myModal2">
                                                        <div class="modal-dialog appModalDiolog">
                                                            <div class="modal-content appModalContent">

                                                                <!-- Modal Header -->
                                                                <div class="modal-header appModalHeader">
                                                                    <h4 class="modal-title">List of
                                                                        References Questions</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal"><i
                                                                            class="fa-regular fa-xmark"></i></button>
                                                                </div>
                                                                <form>
                                                                    <!-- Modal body -->
                                                                    <div class="modal-body appModalBody">
                                                                        <div class="form-group">
                                                                            <label class="labelName">1.
                                                                                Referee 1's First
                                                                                Name <sup
                                                                                    style="color:#ff0000;">*</sup></label>
                                                                            <span class="mb-2"
                                                                                style="color: rgb(194, 194, 194);">Maximum
                                                                                500
                                                                                characters</span>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""></textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="labelName">2.
                                                                                Referee 1's Last
                                                                                Name <sup
                                                                                    style="color:#ff0000;">*</sup></label>
                                                                            <span class="mb-2"
                                                                                style="color: rgb(194, 194, 194);">Maximum
                                                                                500
                                                                                characters</span>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""></textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="labelName">3.
                                                                                Referee 1's
                                                                                Occupation <sup
                                                                                    style="color:#ff0000;">*</sup></label>
                                                                            <span class="mb-2"
                                                                                style="color: rgb(194, 194, 194);">Maximum
                                                                                500
                                                                                characters</span>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""></textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="labelName">4.
                                                                                Referee 1's Email
                                                                                Address <sup
                                                                                    style="color:#ff0000;">*</sup></label>
                                                                            <span class="mb-2"
                                                                                style="color: rgb(194, 194, 194);">Maximum
                                                                                500
                                                                                characters</span>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""></textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="labelName">5.
                                                                                Referee 1's Country
                                                                                <sup style="color:#ff0000;">*</sup></label>
                                                                            <span class="mb-2"
                                                                                style="color: rgb(194, 194, 194);">Maximum
                                                                                500
                                                                                characters</span>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""></textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="labelName">6.
                                                                                Referee 1`s
                                                                                Company/Institution
                                                                                Name: <sup
                                                                                    style="color:#ff0000;">*</sup></label>
                                                                            <span class="mb-2"
                                                                                style="color: rgb(194, 194, 194);">Maximum
                                                                                500
                                                                                characters</span>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""></textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="labelName">7.
                                                                                Referee 2's First
                                                                                Name <sup
                                                                                    style="color:#ff0000;">*</sup></label>
                                                                            <span class="mb-2"
                                                                                style="color: rgb(194, 194, 194);">Maximum
                                                                                500
                                                                                characters</span>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""></textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="labelName">8.
                                                                                Referee 2's Last
                                                                                Name <sup
                                                                                    style="color:#ff0000;">*</sup></label>
                                                                            <span class="mb-2"
                                                                                style="color: rgb(194, 194, 194);">Maximum
                                                                                500
                                                                                characters</span>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""></textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="labelName">9.
                                                                                Referee 2's
                                                                                Occupation <sup
                                                                                    style="color:#ff0000;">*</sup></label>
                                                                            <span class="mb-2"
                                                                                style="color: rgb(194, 194, 194);">Maximum
                                                                                500
                                                                                characters</span>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""></textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="labelName">10.
                                                                                Referee 2's Email
                                                                                Address <sup
                                                                                    style="color:#ff0000;">*</sup></label>
                                                                            <span class="mb-2"
                                                                                style="color: rgb(194, 194, 194);">Maximum
                                                                                500
                                                                                characters</span>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""></textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="labelName">11.
                                                                                Referee 2's Country
                                                                                <sup style="color:#ff0000;">*</sup></label>
                                                                            <span class="mb-2"
                                                                                style="color: rgb(194, 194, 194);">Maximum
                                                                                500
                                                                                characters</span>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""></textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="labelName">12.
                                                                                Referee 2`s
                                                                                Company/Institution
                                                                                Name: <sup
                                                                                    style="color:#ff0000;">*</sup></label>
                                                                            <span class="mb-2"
                                                                                style="color: rgb(194, 194, 194);">Maximum
                                                                                500
                                                                                characters</span>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""></textarea>
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer appModalFooter">
                                                                        <button type="button"
                                                                            class="btn btn-primary disabled">Submit</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>

                                                <div class="appListItem">
                                                    <div class="reqiredBox">
                                                        <div class="reqiredBoxinner">
                                                            <span class="txt">Required</span>
                                                        </div>
                                                    </div>
                                                    <div class="appInfiDtlsArea">
                                                        <div class="appInfiDtlsAreainner">
                                                            <div class="appInfiDtls">
                                                                <div class="logoThumnail">
                                                                    <div class="missingBox text-center">
                                                                        <i class="fa-regular fa-triangle-exclamation"></i>
                                                                        <p class="mb-0">Mossing</p>
                                                                    </div>
                                                                </div>
                                                                <div class="appInfiDtlsContent">
                                                                    <div class="wrapped-content">
                                                                        <h4 class="title mb-2">
                                                                            Country Specific GPA
                                                                            India <a href="copyLink"><i
                                                                                    class="fa-regular fa-link-simple"></i></a>
                                                                        </h4>
                                                                        <div class="wrappedContentinner">
                                                                            <div class="req-desc">
                                                                                <div class="moretext">
                                                                                    <p>Please be
                                                                                        advised that
                                                                                        the
                                                                                        applicant is
                                                                                        required to
                                                                                        supply the
                                                                                        contact
                                                                                        details of
                                                                                        two academic
                                                                                        referees (or
                                                                                        one academic
                                                                                        reference
                                                                                        if
                                                                                        applicable
                                                                                        to the
                                                                                        course/program
                                                                                        applied
                                                                                        for).
                                                                                        Employment
                                                                                        references
                                                                                        may be
                                                                                        acceptable
                                                                                        for specific
                                                                                        courses
                                                                                        which
                                                                                        require
                                                                                        them.
                                                                                        Please note
                                                                                        that the
                                                                                        contact
                                                                                        email
                                                                                        address of
                                                                                        the referee
                                                                                        must be an
                                                                                        official
                                                                                        email
                                                                                        address and
                                                                                        not a
                                                                                        personal one
                                                                                        (for
                                                                                        example,
                                                                                        gmail).</p>
                                                                                    <p><br></p>
                                                                                    <p>Please make
                                                                                        sure the
                                                                                        referee(s)
                                                                                        is informed
                                                                                        to expect an
                                                                                        email from
                                                                                        the
                                                                                        University
                                                                                        of
                                                                                        Birmingham,
                                                                                        requesting
                                                                                        them to
                                                                                        write a
                                                                                        reference.
                                                                                        We recommend
                                                                                        that the
                                                                                        referee
                                                                                        sends back
                                                                                        the
                                                                                        reference in
                                                                                        a PDF format
                                                                                        as it is
                                                                                        preferred
                                                                                        that:</p>
                                                                                    <ul>
                                                                                        <li>The
                                                                                            reference
                                                                                            is on
                                                                                            official
                                                                                            headed
                                                                                            paper
                                                                                            with the
                                                                                            organization
                                                                                            or
                                                                                            institution’s
                                                                                            logo and
                                                                                            address
                                                                                        </li>
                                                                                        <li>It
                                                                                            includes
                                                                                            the
                                                                                            date,
                                                                                            the
                                                                                            applicant's
                                                                                            details
                                                                                            and the
                                                                                            details
                                                                                            of the
                                                                                            referee
                                                                                        </li>
                                                                                        <li>A
                                                                                            summary
                                                                                            of how
                                                                                            the
                                                                                            referee
                                                                                            knows
                                                                                            the
                                                                                            applicant
                                                                                            and
                                                                                            confirm
                                                                                            the
                                                                                            applicant's
                                                                                            suitability
                                                                                            for
                                                                                            studying
                                                                                            on the
                                                                                            course
                                                                                            applied
                                                                                            for</li>
                                                                                        <li>It
                                                                                            should
                                                                                            be
                                                                                            signed
                                                                                            by the
                                                                                            referee
                                                                                            with
                                                                                            their
                                                                                            official
                                                                                            contact
                                                                                            details.
                                                                                        </li>
                                                                                    </ul>
                                                                                    <p>If the
                                                                                        referee(s)
                                                                                        send back
                                                                                        references
                                                                                        that are not
                                                                                        on the
                                                                                        official
                                                                                        headed
                                                                                        paper, the
                                                                                        applicant
                                                                                        may be asked
                                                                                        to send in
                                                                                        additional
                                                                                        references.
                                                                                    </p>
                                                                                    <p>If the
                                                                                        applicant
                                                                                        already have
                                                                                        a written
                                                                                        reference(s)
                                                                                        and wants to
                                                                                        upload it on
                                                                                        behalf of
                                                                                        the
                                                                                        referee(s),
                                                                                        make sure
                                                                                        the
                                                                                        reference
                                                                                        is a scanned
                                                                                        copy of the
                                                                                        original and
                                                                                        that it is
                                                                                        on official
                                                                                        headed
                                                                                        paper.</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="readMoreLessArea">
                                                                                <span class="readmore-link"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="editBtnArea">
                                                                    <a href="#" class="editBtn"><i
                                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="appListItem">
                                                    <div class="reqiredBox">
                                                        <div class="reqiredBoxinner">
                                                            <span class="txt">Required</span>
                                                        </div>
                                                    </div>
                                                    <div class="appInfiDtlsArea">
                                                        <div class="appInfiDtlsAreainner">
                                                            <div class="appInfiDtls">
                                                                <div class="logoThumnail">
                                                                    <div class="missingBox text-center">
                                                                        <i class="fa-regular fa-triangle-exclamation"></i>
                                                                        <p class="mb-0">Mossing</p>
                                                                    </div>
                                                                </div>
                                                                <div class="appInfiDtlsContent">
                                                                    <div class="wrapped-content">
                                                                        <h4 class="title mb-2">
                                                                            Country Specific GPA
                                                                            India <a href="copyLink"><i
                                                                                    class="fa-regular fa-link-simple"></i></a>
                                                                        </h4>
                                                                        <div class="wrappedContentinner">
                                                                            <div class="req-desc">
                                                                                <div class="moretext">
                                                                                    <p>Please be
                                                                                        advised that
                                                                                        the
                                                                                        applicant is
                                                                                        required to
                                                                                        supply the
                                                                                        contact
                                                                                        details of
                                                                                        two academic
                                                                                        referees (or
                                                                                        one academic
                                                                                        reference
                                                                                        if
                                                                                        applicable
                                                                                        to the
                                                                                        course/program
                                                                                        applied
                                                                                        for).
                                                                                        Employment
                                                                                        references
                                                                                        may be
                                                                                        acceptable
                                                                                        for specific
                                                                                        courses
                                                                                        which
                                                                                        require
                                                                                        them.
                                                                                        Please note
                                                                                        that the
                                                                                        contact
                                                                                        email
                                                                                        address of
                                                                                        the referee
                                                                                        must be an
                                                                                        official
                                                                                        email
                                                                                        address and
                                                                                        not a
                                                                                        personal one
                                                                                        (for
                                                                                        example,
                                                                                        gmail).</p>
                                                                                    <p><br></p>
                                                                                    <p>Please make
                                                                                        sure the
                                                                                        referee(s)
                                                                                        is informed
                                                                                        to expect an
                                                                                        email from
                                                                                        the
                                                                                        University
                                                                                        of
                                                                                        Birmingham,
                                                                                        requesting
                                                                                        them to
                                                                                        write a
                                                                                        reference.
                                                                                        We recommend
                                                                                        that the
                                                                                        referee
                                                                                        sends back
                                                                                        the
                                                                                        reference in
                                                                                        a PDF format
                                                                                        as it is
                                                                                        preferred
                                                                                        that:</p>
                                                                                    <ul>
                                                                                        <li>The
                                                                                            reference
                                                                                            is on
                                                                                            official
                                                                                            headed
                                                                                            paper
                                                                                            with the
                                                                                            organization
                                                                                            or
                                                                                            institution’s
                                                                                            logo and
                                                                                            address
                                                                                        </li>
                                                                                        <li>It
                                                                                            includes
                                                                                            the
                                                                                            date,
                                                                                            the
                                                                                            applicant's
                                                                                            details
                                                                                            and the
                                                                                            details
                                                                                            of the
                                                                                            referee
                                                                                        </li>
                                                                                        <li>A
                                                                                            summary
                                                                                            of how
                                                                                            the
                                                                                            referee
                                                                                            knows
                                                                                            the
                                                                                            applicant
                                                                                            and
                                                                                            confirm
                                                                                            the
                                                                                            applicant's
                                                                                            suitability
                                                                                            for
                                                                                            studying
                                                                                            on the
                                                                                            course
                                                                                            applied
                                                                                            for</li>
                                                                                        <li>It
                                                                                            should
                                                                                            be
                                                                                            signed
                                                                                            by the
                                                                                            referee
                                                                                            with
                                                                                            their
                                                                                            official
                                                                                            contact
                                                                                            details.
                                                                                        </li>
                                                                                    </ul>
                                                                                    <p>If the
                                                                                        referee(s)
                                                                                        send back
                                                                                        references
                                                                                        that are not
                                                                                        on the
                                                                                        official
                                                                                        headed
                                                                                        paper, the
                                                                                        applicant
                                                                                        may be asked
                                                                                        to send in
                                                                                        additional
                                                                                        references.
                                                                                    </p>
                                                                                    <p>If the
                                                                                        applicant
                                                                                        already have
                                                                                        a written
                                                                                        reference(s)
                                                                                        and wants to
                                                                                        upload it on
                                                                                        behalf of
                                                                                        the
                                                                                        referee(s),
                                                                                        make sure
                                                                                        the
                                                                                        reference
                                                                                        is a scanned
                                                                                        copy of the
                                                                                        original and
                                                                                        that it is
                                                                                        on official
                                                                                        headed
                                                                                        paper.</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="readMoreLessArea">
                                                                                <span class="readmore-link"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="editBtnArea">
                                                                    <a href="#" class="editBtn"><i
                                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>


                                    <div class="appDtlsAccordianItem">
                                        <div class="appDtlsAccordianHeader">
                                            <div class="leftSide">
                                                <h4 class="title">Pre-Submission</h4>
                                                <p class="mb-0">5 requirements to be completed</p>
                                            </div>
                                            <div class="rightSide">
                                                <ul class="rightSideList">
                                                    <li>
                                                        <a href="#" class="missingBtn">
                                                            <span class="icon"><i
                                                                    class="fa-sharp fa-solid fa-triangle"></i></span>
                                                            <span class="txt">0</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="reviewingBtn">
                                                            <span class="icon"><i
                                                                    class="fa-solid fa-hourglass"></i></span>
                                                            <span class="txt">8</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="approveBtn">
                                                            <span class="icon"><i
                                                                    class="fa-regular fa-xmark"></i></span>
                                                            <span class="txt">0</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="completedBtn">
                                                            <span class="icon"><i
                                                                    class="fa-regular fa-check"></i></span>
                                                            <span class="txt">4</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <span class="toggleBtn"><i class="fa-solid fa-minus"></i></span>
                                            </div>
                                        </div>
                                        <div class="appDtlsAccordianBody">
                                            <div class="appListItemArea">

                                                <div class="appListItem">
                                                    <div class="reqiredBox">
                                                        <div class="reqiredBoxinner">
                                                            <span class="txt">Required</span>
                                                        </div>
                                                    </div>
                                                    <div class="appInfiDtlsArea">
                                                        <div class="appInfiDtlsAreainner">
                                                            <div class="appInfiDtls">
                                                                <div class="logoThumnail">
                                                                    <div class="missingBox text-center">
                                                                        <i class="fa-regular fa-triangle-exclamation"></i>
                                                                        <p class="mb-0">Mossing</p>
                                                                    </div>
                                                                </div>
                                                                <div class="appInfiDtlsContent">
                                                                    <div class="wrapped-content">
                                                                        <h4 class="title mb-2">
                                                                            Country Specific GPA
                                                                            India <a href="copyLink"><i
                                                                                    class="fa-regular fa-link-simple"></i></a>
                                                                        </h4>
                                                                        <div class="wrappedContentinner">
                                                                            <div class="req-desc">
                                                                                <div class="moretext">
                                                                                    <p>Please be
                                                                                        advised that
                                                                                        the
                                                                                        applicant is
                                                                                        required to
                                                                                        supply the
                                                                                        contact
                                                                                        details of
                                                                                        two academic
                                                                                        referees (or
                                                                                        one academic
                                                                                        reference
                                                                                        if
                                                                                        applicable
                                                                                        to the
                                                                                        course/program
                                                                                        applied
                                                                                        for).
                                                                                        Employment
                                                                                        references
                                                                                        may be
                                                                                        acceptable
                                                                                        for specific
                                                                                        courses
                                                                                        which
                                                                                        require
                                                                                        them.
                                                                                        Please note
                                                                                        that the
                                                                                        contact
                                                                                        email
                                                                                        address of
                                                                                        the referee
                                                                                        must be an
                                                                                        official
                                                                                        email
                                                                                        address and
                                                                                        not a
                                                                                        personal one
                                                                                        (for
                                                                                        example,
                                                                                        gmail).</p>
                                                                                    <p><br></p>
                                                                                    <p>Please make
                                                                                        sure the
                                                                                        referee(s)
                                                                                        is informed
                                                                                        to expect an
                                                                                        email from
                                                                                        the
                                                                                        University
                                                                                        of
                                                                                        Birmingham,
                                                                                        requesting
                                                                                        them to
                                                                                        write a
                                                                                        reference.
                                                                                        We recommend
                                                                                        that the
                                                                                        referee
                                                                                        sends back
                                                                                        the
                                                                                        reference in
                                                                                        a PDF format
                                                                                        as it is
                                                                                        preferred
                                                                                        that:</p>
                                                                                    <ul>
                                                                                        <li>The
                                                                                            reference
                                                                                            is on
                                                                                            official
                                                                                            headed
                                                                                            paper
                                                                                            with the
                                                                                            organization
                                                                                            or
                                                                                            institution’s
                                                                                            logo and
                                                                                            address
                                                                                        </li>
                                                                                        <li>It
                                                                                            includes
                                                                                            the
                                                                                            date,
                                                                                            the
                                                                                            applicant's
                                                                                            details
                                                                                            and the
                                                                                            details
                                                                                            of the
                                                                                            referee
                                                                                        </li>
                                                                                        <li>A
                                                                                            summary
                                                                                            of how
                                                                                            the
                                                                                            referee
                                                                                            knows
                                                                                            the
                                                                                            applicant
                                                                                            and
                                                                                            confirm
                                                                                            the
                                                                                            applicant's
                                                                                            suitability
                                                                                            for
                                                                                            studying
                                                                                            on the
                                                                                            course
                                                                                            applied
                                                                                            for</li>
                                                                                        <li>It
                                                                                            should
                                                                                            be
                                                                                            signed
                                                                                            by the
                                                                                            referee
                                                                                            with
                                                                                            their
                                                                                            official
                                                                                            contact
                                                                                            details.
                                                                                        </li>
                                                                                    </ul>
                                                                                    <p>If the
                                                                                        referee(s)
                                                                                        send back
                                                                                        references
                                                                                        that are not
                                                                                        on the
                                                                                        official
                                                                                        headed
                                                                                        paper, the
                                                                                        applicant
                                                                                        may be asked
                                                                                        to send in
                                                                                        additional
                                                                                        references.
                                                                                    </p>
                                                                                    <p>If the
                                                                                        applicant
                                                                                        already have
                                                                                        a written
                                                                                        reference(s)
                                                                                        and wants to
                                                                                        upload it on
                                                                                        behalf of
                                                                                        the
                                                                                        referee(s),
                                                                                        make sure
                                                                                        the
                                                                                        reference
                                                                                        is a scanned
                                                                                        copy of the
                                                                                        original and
                                                                                        that it is
                                                                                        on official
                                                                                        headed
                                                                                        paper.</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="readMoreLessArea">
                                                                                <span class="readmore-link"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="uploadBtnArea">
                                                                    <a href="#" class="uploadBtn"><i
                                                                            class="fa-regular fa-upload"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="appListItem">
                                                    <div class="reqiredBox">
                                                        <div class="reqiredBoxinner">
                                                            <span class="txt">Required</span>
                                                        </div>
                                                    </div>
                                                    <div class="appInfiDtlsArea">
                                                        <div class="appInfiDtlsAreainner">
                                                            <div class="appInfiDtls">
                                                                <div class="logoThumnail">
                                                                    <div class="missingBox text-center">
                                                                        <i class="fa-regular fa-triangle-exclamation"></i>
                                                                        <p class="mb-0">Mossing</p>
                                                                    </div>
                                                                </div>
                                                                <div class="appInfiDtlsContent">
                                                                    <div class="wrapped-content">
                                                                        <h4 class="title mb-2">
                                                                            Country Specific GPA
                                                                            India <a href="copyLink"><i
                                                                                    class="fa-regular fa-link-simple"></i></a>
                                                                        </h4>
                                                                        <div class="wrappedContentinner">
                                                                            <div class="req-desc">
                                                                                <div class="moretext">
                                                                                    <p>Please be
                                                                                        advised that
                                                                                        the
                                                                                        applicant is
                                                                                        required to
                                                                                        supply the
                                                                                        contact
                                                                                        details of
                                                                                        two academic
                                                                                        referees (or
                                                                                        one academic
                                                                                        reference
                                                                                        if
                                                                                        applicable
                                                                                        to the
                                                                                        course/program
                                                                                        applied
                                                                                        for).
                                                                                        Employment
                                                                                        references
                                                                                        may be
                                                                                        acceptable
                                                                                        for specific
                                                                                        courses
                                                                                        which
                                                                                        require
                                                                                        them.
                                                                                        Please note
                                                                                        that the
                                                                                        contact
                                                                                        email
                                                                                        address of
                                                                                        the referee
                                                                                        must be an
                                                                                        official
                                                                                        email
                                                                                        address and
                                                                                        not a
                                                                                        personal one
                                                                                        (for
                                                                                        example,
                                                                                        gmail).</p>
                                                                                    <p><br></p>
                                                                                    <p>Please make
                                                                                        sure the
                                                                                        referee(s)
                                                                                        is informed
                                                                                        to expect an
                                                                                        email from
                                                                                        the
                                                                                        University
                                                                                        of
                                                                                        Birmingham,
                                                                                        requesting
                                                                                        them to
                                                                                        write a
                                                                                        reference.
                                                                                        We recommend
                                                                                        that the
                                                                                        referee
                                                                                        sends back
                                                                                        the
                                                                                        reference in
                                                                                        a PDF format
                                                                                        as it is
                                                                                        preferred
                                                                                        that:</p>
                                                                                    <ul>
                                                                                        <li>The
                                                                                            reference
                                                                                            is on
                                                                                            official
                                                                                            headed
                                                                                            paper
                                                                                            with the
                                                                                            organization
                                                                                            or
                                                                                            institution’s
                                                                                            logo and
                                                                                            address
                                                                                        </li>
                                                                                        <li>It
                                                                                            includes
                                                                                            the
                                                                                            date,
                                                                                            the
                                                                                            applicant's
                                                                                            details
                                                                                            and the
                                                                                            details
                                                                                            of the
                                                                                            referee
                                                                                        </li>
                                                                                        <li>A
                                                                                            summary
                                                                                            of how
                                                                                            the
                                                                                            referee
                                                                                            knows
                                                                                            the
                                                                                            applicant
                                                                                            and
                                                                                            confirm
                                                                                            the
                                                                                            applicant's
                                                                                            suitability
                                                                                            for
                                                                                            studying
                                                                                            on the
                                                                                            course
                                                                                            applied
                                                                                            for</li>
                                                                                        <li>It
                                                                                            should
                                                                                            be
                                                                                            signed
                                                                                            by the
                                                                                            referee
                                                                                            with
                                                                                            their
                                                                                            official
                                                                                            contact
                                                                                            details.
                                                                                        </li>
                                                                                    </ul>
                                                                                    <p>If the
                                                                                        referee(s)
                                                                                        send back
                                                                                        references
                                                                                        that are not
                                                                                        on the
                                                                                        official
                                                                                        headed
                                                                                        paper, the
                                                                                        applicant
                                                                                        may be asked
                                                                                        to send in
                                                                                        additional
                                                                                        references.
                                                                                    </p>
                                                                                    <p>If the
                                                                                        applicant
                                                                                        already have
                                                                                        a written
                                                                                        reference(s)
                                                                                        and wants to
                                                                                        upload it on
                                                                                        behalf of
                                                                                        the
                                                                                        referee(s),
                                                                                        make sure
                                                                                        the
                                                                                        reference
                                                                                        is a scanned
                                                                                        copy of the
                                                                                        original and
                                                                                        that it is
                                                                                        on official
                                                                                        headed
                                                                                        paper.</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="readMoreLessArea">
                                                                                <span class="readmore-link"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="uploadBtnArea">
                                                                    <a href="#" class="uploadBtn"><i
                                                                            class="fa-regular fa-upload"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="appListItem">
                                                    <div class="reqiredBox">
                                                        <div class="reqiredBoxinner">
                                                            <span class="txt">Required</span>
                                                        </div>
                                                    </div>
                                                    <div class="appInfiDtlsArea">
                                                        <div class="appInfiDtlsAreainner">
                                                            <div class="appInfiDtls">
                                                                <div class="logoThumnail">
                                                                    <div class="missingBox text-center">
                                                                        <i class="fa-regular fa-triangle-exclamation"></i>
                                                                        <p class="mb-0">Mossing</p>
                                                                    </div>
                                                                </div>
                                                                <div class="appInfiDtlsContent">
                                                                    <div class="wrapped-content">
                                                                        <h4 class="title mb-2">
                                                                            Country Specific GPA
                                                                            India <a href="copyLink"><i
                                                                                    class="fa-regular fa-link-simple"></i></a>
                                                                        </h4>
                                                                        <div class="wrappedContentinner">
                                                                            <div class="req-desc">
                                                                                <div class="moretext">
                                                                                    <p>Please be
                                                                                        advised that
                                                                                        the
                                                                                        applicant is
                                                                                        required to
                                                                                        supply the
                                                                                        contact
                                                                                        details of
                                                                                        two academic
                                                                                        referees (or
                                                                                        one academic
                                                                                        reference
                                                                                        if
                                                                                        applicable
                                                                                        to the
                                                                                        course/program
                                                                                        applied
                                                                                        for).
                                                                                        Employment
                                                                                        references
                                                                                        may be
                                                                                        acceptable
                                                                                        for specific
                                                                                        courses
                                                                                        which
                                                                                        require
                                                                                        them.
                                                                                        Please note
                                                                                        that the
                                                                                        contact
                                                                                        email
                                                                                        address of
                                                                                        the referee
                                                                                        must be an
                                                                                        official
                                                                                        email
                                                                                        address and
                                                                                        not a
                                                                                        personal one
                                                                                        (for
                                                                                        example,
                                                                                        gmail).</p>
                                                                                    <p><br></p>
                                                                                    <p>Please make
                                                                                        sure the
                                                                                        referee(s)
                                                                                        is informed
                                                                                        to expect an
                                                                                        email from
                                                                                        the
                                                                                        University
                                                                                        of
                                                                                        Birmingham,
                                                                                        requesting
                                                                                        them to
                                                                                        write a
                                                                                        reference.
                                                                                        We recommend
                                                                                        that the
                                                                                        referee
                                                                                        sends back
                                                                                        the
                                                                                        reference in
                                                                                        a PDF format
                                                                                        as it is
                                                                                        preferred
                                                                                        that:</p>
                                                                                    <ul>
                                                                                        <li>The
                                                                                            reference
                                                                                            is on
                                                                                            official
                                                                                            headed
                                                                                            paper
                                                                                            with the
                                                                                            organization
                                                                                            or
                                                                                            institution’s
                                                                                            logo and
                                                                                            address
                                                                                        </li>
                                                                                        <li>It
                                                                                            includes
                                                                                            the
                                                                                            date,
                                                                                            the
                                                                                            applicant's
                                                                                            details
                                                                                            and the
                                                                                            details
                                                                                            of the
                                                                                            referee
                                                                                        </li>
                                                                                        <li>A
                                                                                            summary
                                                                                            of how
                                                                                            the
                                                                                            referee
                                                                                            knows
                                                                                            the
                                                                                            applicant
                                                                                            and
                                                                                            confirm
                                                                                            the
                                                                                            applicant's
                                                                                            suitability
                                                                                            for
                                                                                            studying
                                                                                            on the
                                                                                            course
                                                                                            applied
                                                                                            for</li>
                                                                                        <li>It
                                                                                            should
                                                                                            be
                                                                                            signed
                                                                                            by the
                                                                                            referee
                                                                                            with
                                                                                            their
                                                                                            official
                                                                                            contact
                                                                                            details.
                                                                                        </li>
                                                                                    </ul>
                                                                                    <p>If the
                                                                                        referee(s)
                                                                                        send back
                                                                                        references
                                                                                        that are not
                                                                                        on the
                                                                                        official
                                                                                        headed
                                                                                        paper, the
                                                                                        applicant
                                                                                        may be asked
                                                                                        to send in
                                                                                        additional
                                                                                        references.
                                                                                    </p>
                                                                                    <p>If the
                                                                                        applicant
                                                                                        already have
                                                                                        a written
                                                                                        reference(s)
                                                                                        and wants to
                                                                                        upload it on
                                                                                        behalf of
                                                                                        the
                                                                                        referee(s),
                                                                                        make sure
                                                                                        the
                                                                                        reference
                                                                                        is a scanned
                                                                                        copy of the
                                                                                        original and
                                                                                        that it is
                                                                                        on official
                                                                                        headed
                                                                                        paper.</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="readMoreLessArea">
                                                                                <span class="readmore-link"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="uploadBtnArea">
                                                                    <a href="#" class="uploadBtn"><i
                                                                            class="fa-regular fa-upload"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="appListItem">
                                                    <div class="reqiredBox">
                                                        <div class="reqiredBoxinner">
                                                            <span class="txt">Required</span>
                                                        </div>
                                                    </div>
                                                    <div class="appInfiDtlsArea">
                                                        <div class="appInfiDtlsAreainner">
                                                            <div class="appInfiDtls">
                                                                <div class="logoThumnail">
                                                                    <div class="missingBox text-center">
                                                                        <i class="fa-regular fa-triangle-exclamation"></i>
                                                                        <p class="mb-0">Mossing</p>
                                                                    </div>
                                                                </div>
                                                                <div class="appInfiDtlsContent">
                                                                    <div class="wrapped-content">
                                                                        <h4 class="title mb-2">
                                                                            Privacy Statement <a href="copyLink"><i
                                                                                    class="fa-regular fa-link-simple"></i></a>
                                                                        </h4>
                                                                        <div class="wrappedContentinner">
                                                                            <div class="req-desc">
                                                                                <div class="moretext">
                                                                                    <p>Please complete and upload the
                                                                                        privacy statement form found here.
                                                                                    </p>
                                                                                    <p><br></p>
                                                                                    <div class="links-attachments"><a
                                                                                            class="additional-attachment"
                                                                                            href="{{ route('student.privacy.statement', ['id' => $applyProgram->getUniversity->id, 'slug' => $applyProgram->getUniversity->slug]) }}"
                                                                                            target="_blank"><span
                                                                                                aria-hidden="true"
                                                                                                class="fa fa-file-pdf-o"></span>Student_Applicant_Consent_for_Data_sharing_with_partner_organisations.pdf
                                                                                            (113KB)</a></div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="readMoreLessArea">
                                                                                <span class="readmore-link"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="uploadBtnArea">
                                                                    <a href="#" class="uploadBtn"><i
                                                                            class="fa-regular fa-upload"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
        </div>

        {{-- application upload modal --}}


        <!-- The Modal -->
        <div class="modal appModal" id="applicationFileUPload">
            <div class="modal-dialog appModalDiolog">
                <div class="modal-content appModalContent">

                    <!-- Modal Header -->
                    <div class="modal-header appModalHeader">
                        <h4 class="modal-title">List of
                            References Questions</h4>
                        <button type="button" class="close" data-dismiss="modal"><i
                                class="fa-regular fa-xmark"></i></button>
                    </div>
                    <form id="upload-form" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Modal body -->
                        <div class="modal-body appModalBody">
                            <div class="form-group">
                                <label class="labelName">file upload <sup style="color:#ff0000;">*</sup></label>
                                {{-- <span class="mb-2" style="color: rgb(194, 194, 194);">file upload</span> --}}

                                <input type="file" id="file" name="documentUpload" class="form-control"
                                    placeholder="">
                            </div>


                        </div>
                        <div class="modal-footer appModalFooter">
                            <button type="submit" class="btn btn-primary disabled">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- The Modal -->
        <div class="modal" id="application-note">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="model_heading"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div id="editor-container">
                            <textarea name="" class="form-control" id="application-content" cols="30" rows="10"></textarea>
                            <!-- Quill editor will be rendered here -->
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-mode="" id="saveBtn">Save</button>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let ttlduc = $(".university-document").length;
            let upldduc = $(".uploaded-document").length;
            $("#total-document").text(ttlduc - upldduc);
            // console.log('length', $("#uploaded-document").length);
            $("#upload-document").text(upldduc);

            // application status update

            if (ttlduc == upldduc) {
                // alert('all document uploaded');
                // return
                $.ajax({
                    type: 'POST',
                    url: "{{ route('student.applicant.status.update') }}",
                    data: {
                        status: 'completed',
                        apply_program_id: "{{ $applyProgram->id }}",
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr) {
                        var message = 'File upload failed';

                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            message = xhr.responseJSON.errors.file[0];
                        }

                        $('#response').text(message).removeClass('text-success').addClass(
                            'text-danger');
                    }
                });
            }

            var documentName = '';
            $('.application-file-upload').on('click', function() {
                // alert($(this).data('applicant'));
                documentName = $(this).data('applicant');
                $('#applicationFileUPload').modal('show');
            });

            $('#upload-form').submit(function(e) {
                e.preventDefault();

                var form = $(this);
                var url = "{{ route('student.applicant.document.upload') }}";
                // var url = form.attr('action');
                var formData = new FormData(form[0]);
                formData.append("document_name", documentName);
                formData.append("apply_program_id", "{{ $applyProgram->id }}");

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        documentName = '';
                        window.location.reload();

                    },
                    error: function(xhr) {
                        var message = 'File upload failed';

                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            message = xhr.responseJSON.errors.file[0];
                        }

                        $('#response').text(message).removeClass('text-success').addClass(
                            'text-danger');
                    }
                });
            });

            $(".remove-document").on('click', function() {
                documentID = $(this).data('id');
                // alert(documentID)

                var url = "{{ route('student.applicant.document.delete') }}";
                var formData = new FormData();
                formData.append("id", documentID);
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        window.location.reload();

                    },
                    error: function(xhr) {
                        var message = 'File upload failed';

                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            message = xhr.responseJSON.errors.file[0];
                        }

                        $('#response').text(message).removeClass('text-success').addClass(
                            'text-danger');
                    }
                });
            })

            $("#note").on('click', function() {
                saveData('note', 'open')
            })
            $("#student-record").on('click', function() {
                saveData('student-record', 'open')
            })
            $("#saveBtn").on('click', function() {
                saveData($(this).attr('data-mode'), 'store')
            })

            function saveData(mode, action) {
                var editorData = $("#application-content").val();
                // console.log(editorData);
                // alert(editorData);
                var url = "{{ route('application.record.note') }}";
                var formData = new FormData();
                formData.append("editor", editorData);
                formData.append("id", "{{ $applyProgram->id }}");
                formData.append("mode", mode);
                formData.append("action", action);
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $("#application-content").val(response.note);
                        if (response.mode == 'note' && response.action == 'open') {
                            $('#application-note').modal('show');
                            $("#saveBtn").attr('data-mode', 'note');
                            $("#model_heading").text('Note')
                        }
                        if (response.mode == 'student-record' && response.action == 'open') {
                            $('#application-note').modal('show');
                            $("#saveBtn").attr('data-mode', 'student-record');
                            $("#model_heading").text('Student Record')
                        }
                        if (response.modal == 'off') {
                            $('#application-note').modal('hide');

                        }

                    },
                    error: function(xhr) {

                    }
                });
            }

            $("#addBackupProgran").on('click', function() {

                var url = "{{ route('application.program.backup') }}";
                var formData = new FormData();
                formData.append("id", "{{ $applyProgram->id }}");
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        console.log(response);
                        var options = '';
                        var selected = '';
                        // Loop through the data and create options for the select dropdown
                        $.each(response.allProgram, function(index, item) {
                            //   console.log( response.backupProgram.indexOf(item.id) !== -1)
                            if (response.backupProgram != null) {
                                selected = response.backupProgram.indexOf(item.id) !== -
                                    1 ?
                                    'selected' : '';
                            }
                            options += '<option value="' + item.id + '" ' + selected +
                                '>' + item
                                .program_title + '</option>';
                        });

                        // Append the options to the select dropdown
                        $('#backupItemSelect').html(options);

                        console.log(response);
                        $('#addBackupProgramModal').modal('show');
                    },
                    error: function(xhr) {

                    }
                });

            })

            $("#saveBackupProgram").click(function() {
                let backupProgramId = $("#backupItemSelect").val();
                // alert(backupProgramId);

                var url = "{{ route('application.program.backup.store') }}";
                var formData = new FormData();
                formData.append("programId", "{{ $applyProgram->id }}");
                formData.append("backupProgramId", backupProgramId);
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#addBackupProgramModal').modal('hide');
                    },
                    error: function(xhr) {

                    }
                });
            })

            $("#academic-session").on('change', function() {
                var formData = new FormData();
                formData.append("date", $(this).val());
                formData.append("id", "{{ $applyProgram->id }}");
                $.ajax({
                    type: 'POST',
                    url: "{{ url('application/academic-session') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr) {

                    }
                });
            })





            $(".program_intake").on('change', function() {
                $("#intake_change_button").show();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('intake.program.update') }}",
                    data: {
                        mood: 'change_intake',
                        intake_id: $(this).val(),
                        program_id: $(this).data('program')
                    },
                    success: function(response) {
                        $("#els_intake").html(response.els_intake)
                        // Swal.fire({
                        //     icon: 'success',
                        //     title: 'Success',
                        //     text: response.success,
                        // });
                    },
                    error: function(xhr) {

                    }
                });


            })

            $("#els_intake").on('change', function() {
                $("#intake_change_button").show();
            })
            $("#intake_change_button").hide();

            $("#intake_change_button").click(function() {
                setTimeout(() => {
                    console.log('program_intake', $(".program_intake").val());
                    console.log('program', $(".program_intake").data('program'));
                    console.log('els_intake', $("#els_intake").val());
                    // alert('You can change intake only once');
                    $("#intake_change_button").hide();
                }, 5000);


                Swal.fire({

                    text: 'Are you sure you want to update the start date(s)?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#a7d5ea',
                    cancelButtonColor: '#c8c8c8',
                    confirmButtonText: 'Confirm'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User clicked "Yes, delete it!"
                        // Perform the AJAX call here
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('intake.program.update') }}",
                            data: {
                                intake_id: $(".program_intake").val(),
                                program_id: $(".program_intake").data('program'),
                                els_intake: $("#els_intake").val()
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.success,
                                });
                                // setTimeout(() => {
                                //     window.location.reload();
                                // }, 2000);
                            },
                            error: function(xhr) {

                            }
                        });
                    }
                });
            })

        });
    </script>
@endpush
