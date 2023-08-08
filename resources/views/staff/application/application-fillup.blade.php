@extends('staff.layouts.layout')
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
                                {{ date('M d, Y', strtotime($applyProgram->getProgram->deadline)) }}</span>
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
                                            href="#">{{ $applyProgram->getProgram->getUniversity[0]->university_name }}</a>
                                        <a class="dropdown-item" href="#">Link 2</a>
                                        <a class="dropdown-item" href="#">Link 3</a>
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
                                                <p><strong>Level:</strong> {{ $applyProgram->getProgram->program_level }}
                                                </p>
                                                <p><strong>Required Level:</strong>
                                                    {{ $applyProgram->getProgram->minimum_level_education }}</p>
                                                <p><strong>Application ID:</strong>
                                                    {{ $applyProgram->application_number }}</p>
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
                                                <select class="form-control">
                                                    <option>Select...</option>
                                                    <option>2023 - Jun</option>
                                                    <option>2023 - Jul</option>
                                                </select>
                                            </div>
                                            {{-- {{ json_decode($applyProgram->getProgram->program_till_date, true) }} --}}
                                            @php
                                                $data = explode(',', json_decode($applyProgram->getProgram->program_till_date));
                                            @endphp

                                            <div class="col-lg-5 col-md-5 col-sm-12 col-12 columnBox2">
                                                <label class="labelName">Academic : <span class="status">Open
                                                        Now</span></label>
                                                <select class="form-control">
                                                    @foreach ($data as $item)
                                                        <option>{{ date('Y - M', strtotime($item)) }}</option>
                                                    @endforeach
                                                    {{-- <option>2023 - Sep.</option>
                                                    <option>2023 - Sep.</option> --}}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="studentSidebarAcademicSubmissionDeadline">
                                        <h4 class="title">Academic Submission Deadline:</h4>
                                        <div class="content">
                                            <span class="txt">
                                                {{ date('M d, Y', strtotime($applyProgram->getProgram->deadline)) }}</span>
                                            <span class="info"><i class="fa-regular fa-circle-info"></i></span>
                                        </div>
                                        <div></div>
                                    </div>

                                    <div class="addBtnArea">
                                        <button type="button" class="addBtn" data-toggle="modal"
                                            data-target="#addBackupProgramModal">
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
                                                                        <div class="countArea">
                                                                            <span class="count">1</span>
                                                                        </div>
                                                                        <div class="programSelect">
                                                                            <select class="form-control">
                                                                                <option>Master of
                                                                                    Philosophy -
                                                                                    Resurch in Civil
                                                                                    Engineering
                                                                                </option>
                                                                                <option>Integrated
                                                                                    Master - Master
                                                                                    of Science
                                                                                    (MSci) - Phisics
                                                                                    with
                                                                                    International
                                                                                    Study (2023)
                                                                                </option>
                                                                                <option>Master of
                                                                                    Philosophy -
                                                                                    Resurch in Civil
                                                                                    Engineering
                                                                                </option>
                                                                                <option>Integrated
                                                                                    Master - Master
                                                                                    of Science
                                                                                    (MSci) - Phisics
                                                                                    with
                                                                                    International
                                                                                    Study (2023)
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="deleteBtnArea">
                                                                            <button type="button" class="deleteBtn">
                                                                                <i class="fa-regular fa-trash-can"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="chooseProgramItem">
                                                                    <div class="chooseProgramIteminner">
                                                                        <div class="countArea">
                                                                            <span class="count">1</span>
                                                                        </div>
                                                                        <div class="programSelect">
                                                                            <select class="form-control">
                                                                                <option>Master of
                                                                                    Philosophy -
                                                                                    Resurch in Civil
                                                                                    Engineering
                                                                                </option>
                                                                                <option>Integrated
                                                                                    Master - Master
                                                                                    of Science
                                                                                    (MSci) - Phisics
                                                                                    with
                                                                                    International
                                                                                    Study (2023)
                                                                                </option>
                                                                                <option>Master of
                                                                                    Philosophy -
                                                                                    Resurch in Civil
                                                                                    Engineering
                                                                                </option>
                                                                                <option>Integrated
                                                                                    Master - Master
                                                                                    of Science
                                                                                    (MSci) - Phisics
                                                                                    with
                                                                                    International
                                                                                    Study (2023)
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="deleteBtnArea">
                                                                            <button type="button" class="deleteBtn">
                                                                                <i class="fa-regular fa-trash-can"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="addNewProgramBtnArea mt-3">
                                                                <button type="button"
                                                                    class="btn btn-outline-primary addNewProgramBtn">
                                                                    <i class="fa-regular fa-plus"></i>
                                                                    <span class="txt">Add new
                                                                        program</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer addBackupProgramModalFooter">
                                                        <button type="button" class="btn btn-dark">Cancel</button>
                                                        <button type="button" class="btn btn-primary">Save
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
                                                                        {{ $studentDetail->city }}</p>
                                                                    <p class="mb-0"><span
                                                                            class="d-block">Nationality</span>
                                                                        {{ $studentDetail->country }}</p>
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
                                                                    {{ $studentDetail->educationDetail->education_level }}:
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
                                                                    {{ $studentDetail->educationDetail->education_country }}
                                                                </div>
                                                            </div>
                                                            <div class="studentInfoItem">
                                                                <div class="ttl">Grade</div>
                                                                <div class="txt">
                                                                    {{ $studentDetail->educationDetail->education_scheme_grade }}
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
                                                                    {{ $studentDetail->educationDetail->education_scheme_grade }}
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

                                                <div class="accordianItem studentSidebarTestArea">
                                                    <div class="accordianHeader">
                                                        <div class="title">Recruitment Partner:
                                                        </div>
                                                        <div class="sintentInfo">
                                                            <div class="contentBoxFld">
                                                                <p class="mb-0">
                                                                    {{ $studentDetail->staffDetail->name ?? $studentDetail->agentDetail->name }}
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

                                                @if (Auth::user()->type !== 'student')
                                                    <div class="accordianItem studentSidebarTestArea">
                                                        <div class="accordianHeader">
                                                            <div class="title">Student Representative:
                                                            </div>
                                                            <div class="sintentInfo">
                                                                <div class="contentBoxFld">
                                                                    <p class="mb-0">
                                                                        <strong>juan.aguilera@applyboard.com</strong>
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
                                                                        £{{ $applyProgram->getProgram->application_fee }}
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
                    <div class="apptDlsRightSideArea">
                        <div class="appDtlsArea">
                            <div class="alert alert-danger appinfoArea mb-4">
                                <div class="d-flex">
                                    <div class="icon mr-3"><i class="fa-regular fa-circle-info"></i>
                                    </div>
                                    <div class="cont" style="font-size:.8125rem;">Application will not
                                        be processed until payment received. <a href="#">Submit
                                            payment now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="appbtnListArea">
                                <ul class="appbtnList">
                                    <li><a href=""><span class="icon"><i
                                                    class="fa-regular fa-file-lines"></i></span>
                                            <span class="txt">Applicant Requirements</span></a></li>
                                    <li><a href=""><span class="icon"><i
                                                    class="fa-regular fa-clipboard"></i></span>
                                            <span class="txt">Student Records</span></a></li>
                                    <li><a href=""><span class="icon"><i
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
                                                <p class="mb-0">Last requirement completed on May.
                                                    24, 2023</p>

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
                                                                    @if (get_upload_document($applyProgram->id, $applyProgram->user_id, 'program-student-attachment'))
                                                                        <div class="text-success text-center">
                                                                            <i class="fa-regular fa-check"></i>
                                                                            <p class="mb-0">
                                                                                Completed
                                                                            </p>
                                                                        </div>
                                                                    @else
                                                                        <div class="missingBox text-center">
                                                                            <i
                                                                                class="fa-regular fa-triangle-exclamation"></i>
                                                                            <p class="mb-0">
                                                                                Missing
                                                                            </p>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="appInfiDtlsContent">
                                                                    <div class="wrapped-content">
                                                                        <h4 class="title mb-2">
                                                                            Country Specific GPA
                                                                            India <a href="javascript:;"><i
                                                                                    class="fa-regular fa-link-simple"></i></a>
                                                                        </h4>
                                                                        <div class="wrappedContentinner">
                                                                            <div class="req-desc">
                                                                                <div class="moretext">
                                                                                    <p>{{ $applyProgram->getProgram->student_instruction }}
                                                                                    </p>
                                                                                    <p><br></p>

                                                                                    @foreach ($applyProgram->getProgram->getMedia('program-student-attachment') ?? [] as $image)
                                                                                        <div class="links-attachments"><a
                                                                                                class="additional-attachment university-document"
                                                                                                href=" {{ $image->getUrl() }}"
                                                                                                target="_blank"><span
                                                                                                    aria-hidden="true"
                                                                                                    class="fa fa-file-pdf-o"></span>
                                                                                                {{ substr(strrchr($image->getPath(), '/'), 1) }}

                                                                                            </a></div>
                                                                                    @endforeach

                                                                                </div>
                                                                            </div>
                                                                            <div class="readMoreLessArea">
                                                                                <span class="readmore-link"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">

                                                                            @forelse ($uploadedDocument as $document)
                                                                                @if ($document->document_name == 'program-student-attachment')
                                                                                    @foreach ($document->getMedia('program-student-attachment') ?? [] as $image)
                                                                                        <div class="links-attachments"><a
                                                                                                class="additional-attachment uploaded-document"
                                                                                                href=" {{ $image->getUrl() }}"
                                                                                                target="_blank"><span
                                                                                                    aria-hidden="true"
                                                                                                    class="fa fa-file-pdf-o"></span>
                                                                                                {{ substr(strrchr($image->getPath(), '/'), 1) }}


                                                                                            </a></div>
                                                                                    @endforeach
                                                                                    <a href="javascript:;"
                                                                                        data-id="{{ $document->id }}"
                                                                                        class="approveBtn  bg-danger remove-document">
                                                                                        <span class="icon"><i
                                                                                                class="fa-regular fa-xmark"></i></span>

                                                                                    </a>
                                                                                @endif
                                                                            @empty
                                                                            @endforelse

                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="uploadBtnArea">
                                                                    <a href="javascript:;"
                                                                        data-applicant="program-student-attachment"
                                                                        class="uploadBtn application-file-upload"><i
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

                                                                    @if (get_upload_document($applyProgram->id, $applyProgram->user_id, 'program-passport-attachment'))
                                                                        <div class="text-success text-center">
                                                                            <i class="fa-regular fa-check"></i>
                                                                            <p class="mb-0">
                                                                                Completed
                                                                            </p>
                                                                        </div>
                                                                    @else
                                                                        <div class="missingBox text-center">
                                                                            <i
                                                                                class="fa-regular fa-triangle-exclamation"></i>
                                                                            <p class="mb-0">
                                                                                Missing
                                                                            </p>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="appInfiDtlsContent">
                                                                    <div class="wrapped-content">
                                                                        <h4 class="title mb-2">
                                                                            Copy of Passport <a href="javascript:;"><i
                                                                                    class="fa-regular fa-link-simple"></i></a>
                                                                        </h4>
                                                                        <div class="wrappedContentinner">
                                                                            <div class="req-desc">
                                                                                <div class="moretext">
                                                                                    <p>{{ $applyProgram->getProgram->copy_passport }}
                                                                                    </p>
                                                                                    <p><br></p>

                                                                                    @foreach ($applyProgram->getProgram->getMedia('program-passport-attachment') ?? [] as $image)
                                                                                        <div class="links-attachments">
                                                                                            <a class="additional-attachment university-document"
                                                                                                href=" {{ $image->getUrl() }}"
                                                                                                target="_blank"><span
                                                                                                    aria-hidden="true"
                                                                                                    class="fa fa-file-pdf-o"></span>
                                                                                                {{ substr(strrchr($image->getPath(), '/'), 1) }}

                                                                                            </a>
                                                                                        </div>
                                                                                    @endforeach

                                                                                </div>
                                                                            </div>
                                                                            <div class="readMoreLessArea">
                                                                                <span class="readmore-link"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">

                                                                            @forelse ($uploadedDocument as $document)
                                                                                @if ($document->document_name == 'program-passport-attachment')
                                                                                    @foreach ($document->getMedia('program-passport-attachment') ?? [] as $image)
                                                                                        <div class="links-attachments"><a
                                                                                                class="additional-attachment uploaded-document"
                                                                                                href=" {{ $image->getUrl() }}"
                                                                                                target="_blank"><span
                                                                                                    aria-hidden="true"
                                                                                                    class="fa fa-file-pdf-o"></span>
                                                                                                {{ substr(strrchr($image->getPath(), '/'), 1) }}

                                                                                            </a></div>
                                                                                    @endforeach

                                                                                    <a href="javascript:;"
                                                                                        data-id="{{ $document->id }}"
                                                                                        class="approveBtn  bg-danger remove-document">
                                                                                        <span class="icon"><i
                                                                                                class="fa-regular fa-xmark"></i></span>

                                                                                    </a>
                                                                                @endif

                                                                            @empty
                                                                            @endforelse

                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="uploadBtnArea">
                                                                    <a href="javascript:;"
                                                                        data-applicant="program-passport-attachment"
                                                                        class="uploadBtn application-file-upload"><i
                                                                            class="fa-regular fa-upload"></i></a>
                                                                </div>
                                                                {{-- <div class="editBtnArea">
                                                                    <a href="#" class="editBtn" data-toggle="modal"
                                                                        data-target="#myModal2"><i
                                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                                </div> --}}
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
                                                                    @if (get_upload_document($applyProgram->id, $applyProgram->user_id, 'program-custodianship-declaration-attachment'))
                                                                        <div class="text-success text-center">
                                                                            <i class="fa-regular fa-check"></i>
                                                                            <p class="mb-0">
                                                                                Completed
                                                                            </p>
                                                                        </div>
                                                                    @else
                                                                        <div class="missingBox text-center">
                                                                            <i
                                                                                class="fa-regular fa-triangle-exclamation"></i>
                                                                            <p class="mb-0">
                                                                                Missing
                                                                            </p>
                                                                        </div>
                                                                    @endif

                                                                </div>
                                                                <div class="appInfiDtlsContent">
                                                                    <div class="wrapped-content">
                                                                        <h4 class="title mb-2">
                                                                            Custodianship Declaration
                                                                            <a href="javascript:;"><i
                                                                                    class="fa-regular fa-link-simple"></i></a>
                                                                        </h4>
                                                                        <div class="wrappedContentinner">
                                                                            <div class="req-desc">
                                                                                <div class="moretext">
                                                                                    <p>{{ $applyProgram->getProgram->custodianship_declaration }}
                                                                                    </p>
                                                                                    <p><br></p>

                                                                                    @foreach ($applyProgram->getProgram->getMedia('program-custodianship-declaration-attachment') ?? [] as $image)
                                                                                        <div class="links-attachments"><a
                                                                                                class="additional-attachment university-document"
                                                                                                href=" {{ $image->getUrl() }}"
                                                                                                target="_blank"><span
                                                                                                    aria-hidden="true"
                                                                                                    class="fa fa-file-pdf-o"></span>
                                                                                                {{ substr(strrchr($image->getPath(), '/'), 1) }}

                                                                                            </a></div>
                                                                                    @endforeach

                                                                                </div>
                                                                            </div>
                                                                            <div class="readMoreLessArea">
                                                                                <span class="readmore-link"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">

                                                                            @forelse ($uploadedDocument as $document)
                                                                                @if ($document->document_name == 'program-custodianship-declaration-attachment')
                                                                                    @foreach ($document->getMedia('program-custodianship-declaration-attachment') ?? [] as $image)
                                                                                        <div class="links-attachments"><a
                                                                                                class="additional-attachment uploaded-document"
                                                                                                href=" {{ $image->getUrl() }}"
                                                                                                target="_blank"><span
                                                                                                    aria-hidden="true"
                                                                                                    class="fa fa-file-pdf-o"></span>
                                                                                                {{ substr(strrchr($image->getPath(), '/'), 1) }}
                                                                                            </a></div>
                                                                                    @endforeach
                                                                                    <a href="javascript:;"
                                                                                        data-id="{{ $document->id }}"
                                                                                        class="approveBtn  bg-danger remove-document">
                                                                                        <span class="icon"><i
                                                                                                class="fa-regular fa-xmark"></i></span>

                                                                                    </a>
                                                                                @endif

                                                                            @empty
                                                                            @endforelse

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="uploadBtnArea">
                                                                    <a href="javascript:;"
                                                                        data-applicant="program-custodianship-declaration-attachment"
                                                                        class="uploadBtn application-file-upload"><i
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
                                                                    @if (get_upload_document($applyProgram->id, $applyProgram->user_id, 'program-proof-immunization-attachment'))
                                                                        <div class="text-success text-center">
                                                                            <i class="fa-regular fa-check"></i>
                                                                            <p class="mb-0">
                                                                                Completed
                                                                            </p>
                                                                        </div>
                                                                    @else
                                                                        <div class="missingBox text-center">
                                                                            <i
                                                                                class="fa-regular fa-triangle-exclamation"></i>
                                                                            <p class="mb-0">
                                                                                Missing
                                                                            </p>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="appInfiDtlsContent">
                                                                    <div class="wrapped-content">
                                                                        <h4 class="title mb-2">
                                                                            Proof of Immunization <a href="javascript:;"><i
                                                                                    class="fa-regular fa-link-simple"></i></a>
                                                                        </h4>
                                                                        <div class="wrappedContentinner">
                                                                            <div class="req-desc">
                                                                                <div class="moretext">
                                                                                    <p>{{ $applyProgram->getProgram->proof_immunization }}
                                                                                    </p>
                                                                                    <p><br></p>

                                                                                    @foreach ($applyProgram->getProgram->getMedia('program-proof-immunization-attachment') ?? [] as $image)
                                                                                        <div class="links-attachments"><a
                                                                                                class="additional-attachment university-document"
                                                                                                href=" {{ $image->getUrl() }}"
                                                                                                target="_blank"><span
                                                                                                    aria-hidden="true"
                                                                                                    class="fa fa-file-pdf-o"></span>
                                                                                                {{ substr(strrchr($image->getPath(), '/'), 1) }}

                                                                                            </a></div>
                                                                                    @endforeach

                                                                                </div>
                                                                            </div>
                                                                            <div class="readMoreLessArea">
                                                                                <span class="readmore-link"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">

                                                                            @forelse ($uploadedDocument as $document)
                                                                                @if ($document->document_name == 'program-proof-immunization-attachment')
                                                                                    @foreach ($document->getMedia('program-proof-immunization-attachment') ?? [] as $image)
                                                                                        <div class="links-attachments"><a
                                                                                                class="additional-attachment uploaded-document"
                                                                                                href=" {{ $image->getUrl() }}"
                                                                                                target="_blank"><span
                                                                                                    aria-hidden="true"
                                                                                                    class="fa fa-file-pdf-o"></span>
                                                                                                {{ substr(strrchr($image->getPath(), '/'), 1) }}

                                                                                            </a></div>
                                                                                    @endforeach
                                                                                    <a href="javascript:;"
                                                                                        data-id="{{ $document->id }}"
                                                                                        class="approveBtn  bg-danger remove-document">
                                                                                        <span class="icon"><i
                                                                                                class="fa-regular fa-xmark"></i></span>

                                                                                    </a>
                                                                                @endif

                                                                            @empty
                                                                            @endforelse

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="uploadBtnArea">
                                                                    <a href="javascript:;"
                                                                        data-applicant="program-proof-immunization-attachment"
                                                                        class="uploadBtn application-file-upload"><i
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
                                                                    @if (get_upload_document($applyProgram->id, $applyProgram->user_id, 'program-participation-agreement-attachment'))
                                                                        <div class="text-success text-center">
                                                                            <i class="fa-regular fa-check"></i>
                                                                            <p class="mb-0">
                                                                                Completed
                                                                            </p>
                                                                        </div>
                                                                    @else
                                                                        <div class="missingBox text-center">
                                                                            <i
                                                                                class="fa-regular fa-triangle-exclamation"></i>
                                                                            <p class="mb-0">
                                                                                Missing
                                                                            </p>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="appInfiDtlsContent">
                                                                    <div class="wrapped-content">
                                                                        <h4 class="title mb-2">
                                                                            Student Participation Agreement (without
                                                                            homestay)
                                                                            <a href="javascript:;"><i
                                                                                    class="fa-regular fa-link-simple"></i></a>
                                                                        </h4>
                                                                        <div class="wrappedContentinner">
                                                                            <div class="req-desc">
                                                                                <div class="moretext">
                                                                                    <p>{{ $applyProgram->getProgram->participation_agreement }}
                                                                                    </p>
                                                                                    <p><br></p>

                                                                                    @foreach ($applyProgram->getProgram->getMedia('program-participation-agreement-attachment') ?? [] as $image)
                                                                                        <div class="links-attachments"><a
                                                                                                class="additional-attachment university-document"
                                                                                                href=" {{ $image->getUrl() }}"
                                                                                                target="_blank"><span
                                                                                                    aria-hidden="true"
                                                                                                    class="fa fa-file-pdf-o"></span>
                                                                                                {{ substr(strrchr($image->getPath(), '/'), 1) }}

                                                                                            </a></div>
                                                                                    @endforeach

                                                                                </div>
                                                                            </div>
                                                                            <div class="readMoreLessArea">
                                                                                <span class="readmore-link"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">

                                                                            @forelse ($uploadedDocument as $document)
                                                                                @if ($document->document_name == 'program-participation-agreement-attachment')
                                                                                    @foreach ($document->getMedia('program-participation-agreement-attachment') ?? [] as $image)
                                                                                        <div class="links-attachments"><a
                                                                                                class="additional-attachment uploaded-document"
                                                                                                href=" {{ $image->getUrl() }}"
                                                                                                target="_blank"><span
                                                                                                    aria-hidden="true"
                                                                                                    class="fa fa-file-pdf-o"></span>
                                                                                                {{ substr(strrchr($image->getPath(), '/'), 1) }}
                                                                                            </a></div>
                                                                                    @endforeach
                                                                                    <a href="javascript:;"
                                                                                        data-id="{{ $document->id }}"
                                                                                        class="approveBtn  bg-danger remove-document">
                                                                                        <span class="icon"><i
                                                                                                class="fa-regular fa-xmark"></i></span>

                                                                                    </a>
                                                                                @endif
                                                                            @empty
                                                                            @endforelse

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="uploadBtnArea">
                                                                    <a href="javascript:;"
                                                                        data-applicant="program-participation-agreement-attachment"
                                                                        class="uploadBtn application-file-upload"><i
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
                                                                    @if (get_upload_document($applyProgram->id, $applyProgram->user_id, 'program-self-introduction-attachment'))
                                                                        <div class="text-success text-center">
                                                                            <i class="fa-regular fa-check"></i>
                                                                            <p class="mb-0">
                                                                                Completed
                                                                            </p>
                                                                        </div>
                                                                    @else
                                                                        <div class="missingBox text-center">
                                                                            <i
                                                                                class="fa-regular fa-triangle-exclamation"></i>
                                                                            <p class="mb-0">
                                                                                Missing
                                                                            </p>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="appInfiDtlsContent">
                                                                    <div class="wrapped-content">
                                                                        <h4 class="title mb-2">
                                                                            Student Self-Introduction Form
                                                                            <a href="javascript:;"><i
                                                                                    class="fa-regular fa-link-simple"></i></a>
                                                                        </h4>
                                                                        <div class="wrappedContentinner">
                                                                            <div class="req-desc">
                                                                                <div class="moretext">
                                                                                    <p>{{ $applyProgram->getProgram->self_introduction }}
                                                                                    </p>
                                                                                    <p><br></p>

                                                                                    @foreach ($applyProgram->getProgram->getMedia('program-self-introduction-attachment') ?? [] as $image)
                                                                                        <div class="links-attachments"><a
                                                                                                class="additional-attachment university-document"
                                                                                                href=" {{ $image->getUrl() }}"
                                                                                                target="_blank"><span
                                                                                                    aria-hidden="true"
                                                                                                    class="fa fa-file-pdf-o"></span>
                                                                                                {{ substr(strrchr($image->getPath(), '/'), 1) }}

                                                                                            </a></div>
                                                                                    @endforeach

                                                                                </div>
                                                                            </div>
                                                                            <div class="readMoreLessArea">
                                                                                <span class="readmore-link"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">

                                                                            @forelse ($uploadedDocument as $document)
                                                                                @if ($document->document_name == 'program-self-introduction-attachment')
                                                                                    @foreach ($document->getMedia('program-self-introduction-attachment') ?? [] as $image)
                                                                                        <div class="links-attachments"><a
                                                                                                class="additional-attachment uploaded-document"
                                                                                                href=" {{ $image->getUrl() }}"
                                                                                                target="_blank"><span
                                                                                                    aria-hidden="true"
                                                                                                    class="fa fa-file-pdf-o"></span>
                                                                                                {{ substr(strrchr($image->getPath(), '/'), 1) }}

                                                                                            </a></div>
                                                                                    @endforeach
                                                                                    <a href="javascript:;"
                                                                                        data-id="{{ $document->id }}"
                                                                                        class="approveBtn  bg-danger remove-document">
                                                                                        <span class="icon"><i
                                                                                                class="fa-regular fa-xmark"></i></span>

                                                                                    </a>
                                                                                @endif
                                                                            @empty
                                                                            @endforelse

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="uploadBtnArea">
                                                                    <a href="javascript:;"
                                                                        data-applicant="program-self-introduction-attachment"
                                                                        class="uploadBtn application-file-upload"><i
                                                                            class="fa-regular fa-upload"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="appDtlsAccordianBody">
                                        <div class="appListItemArea">



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
                                <input type="hidden" name="student_id" value="{{ $studentDetail->user_id }}">
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


    </section>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            let ttlduc = $(".university-document").length;
            let upldduc = $(".uploaded-document").length;
            $("#total-document").text(ttlduc - upldduc);
            // console.log('length', $("#uploaded-document").length);
            $("#upload-document").text(upldduc);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var documentName = '';
            $('.application-file-upload').on('click', function() {
                // alert($(this).data('applicant'));
                documentName = $(this).data('applicant');
                $('#applicationFileUPload').modal('show');
            });

            $('#upload-form').submit(function(e) {
                e.preventDefault();

                var form = $(this);
                var url = "{{ route('agent.applicant.document.upload') }}";
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
        });
    </script>
@endpush
