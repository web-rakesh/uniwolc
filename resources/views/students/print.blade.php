@extends('students.layouts.layout')
@section('content')
    <div>
        <div class="dashboardDtlsArea">
            <div class="dashboardDtlsAreainner">
                <div class="dashboardInnerWrapper">
                    <div class="dashboardInnerWrapperinner py-2" id="pdf_content">
                        <div class="dashboardHeaderSec">
                            <h4 class="title mb-0">Application Info</h4>
                        </div>

                        <div class="dashboardPanel">
                            <div class="dashboardPanelHeader">
                                <h4 class="title mb-0">Selected Courses</h4>
                            </div>
                            <div class="dashboardPanelBody">
                                <div class="applicationInfoArea">
                                    <div class="row rowBox">

                                        {{-- <div class="col-lg-12 col-md-12 col-sm-12 col-12 columnBox applicationInfoBox">
                                            <div class="applicationInfoBoxinner">
                                                <div class="txt">{{ $data['student']->educationDetail->education_level }}
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Application Number <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">
                                                    {{ $data['program']->getProgram->university->university_name }}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">University Name <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">{{ $data['program']->application_number }}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">University Email <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">{{ $data['program']->getProgram->university->email }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">University Country <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">
                                                    {{ $data['program']->getProgram->university->getCountry->name }}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">University Institution Type <sup
                                                        class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">
                                                    {{ $data['program']->getProgram->university->institution_type }}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Program Name <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">
                                                    {{ $data['program']->program_title }}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Fees<sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">
                                                    {{ $data['program']->fees == 0 ? 'Free' : number_format($data['program']->fees, 2) }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Pay Status<sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">
                                                    {{ $data['program']->status == 1 ? 'Due' : ($data['program']->status == 2 ? 'Paid' : 'N/A') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="dashboardPanel">
                            <div class="dashboardPanelHeader">
                                <h4 class="title mb-0">Personal Details</h4>
                            </div>
                            <div class="dashboardPanelBody">
                                <div class="applicationInfoArea mt-3">
                                    <div class="row rowBox">

                                        {{-- <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Title <sup class="text-danger">*</sup></div>
                                                @if ($data['student']->gender == 'Male')
                                                    <div class="txt">Mr.</div>
                                                @elseif ($student->gender == 'Female')
                                                    <div class="txt">Ms.</div>
                                                @endif
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Name <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">{{ $data['student']->full_name }}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Email <sup class="text-danger">*</sup></div>
                                                <div class="txt">{{ $data['student']->email }}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Phone Number <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">
                                                    {{ $data['student']->mobile_number ? '+' . $data['student']->country_code . $data['student']->mobile_number : '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Alter Phone Number <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">
                                                    {{ $data['student']->alt_country_code ? '+' . $data['student']->alt_country_code . $data['student']->alt_mobile_number : '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Address <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt"> {{ $data['student']->address }}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Country <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt"> {{ $data['student']->userCountry->name }}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">City <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt"> {{ $data['student']->city }}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Zipcode <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt"> {{ $data['student']->pincode }}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Passport Number <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt"> {{ $data['student']->passport_number }}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Passport Expiry <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">
                                                    {{ date('M d, Y', strtotime($data['student']->passport_expiry_date)) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Marital Status <sup class="text-danger">*</sup></div>
                                                <div class="txt"> {{ $data['student']->marital_status }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Gender <sup class="text-danger">*</sup></div>
                                                <div class="txt">{{ $data['student']->gender }}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Date of birth <sup class="text-danger">*</sup></div>
                                                <div class="txt">{{ date('M d, Y', strtotime($data['student']->dob)) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Fast Language <sup class="text-danger">*</sup></div>
                                                <div class="txt"> {{ $data['student']->fast_language }}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Website <sup class="text-danger">*</sup></div>
                                                <div class="txt"> {{ $data['student']->website }}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Twitter <sup class="text-danger">*</sup></div>
                                                <div class="txt"> {{ $data['student']->twitter }}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Instagram <sup class="text-danger">*</sup></div>
                                                <div class="txt"> {{ $data['student']->instagram }}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Facebook <sup class="text-danger">*</sup></div>
                                                <div class="txt"> {{ $data['student']->facebook }}</div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dashboardPanel">
                            <div class="dashboardPanelHeader">
                                <h4 class="title mb-0">Residence and Nationality</h4>
                            </div>
                            <div class="dashboardPanelBody">
                                <div class="applicationInfoArea mt-3">
                                    <div class="row rowBox">

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Country of Birth <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt"> {{ $data['student']->userCountry->name }}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Country of Nationality <sup
                                                        class="text-danger">*</sup>
                                                </div>
                                                <div class="txt"> {{ $data['student']->userCountry->name }}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Dual Nationality <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt"> {{ $data['student']->userCountry->name }}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Country of Residence <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt"> {{ $data['student']->userCountry->name }}</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="dashboardPanel">
                            <div class="dashboardPanelHeader">
                                <h4 class="title mb-0">Education Summary</h4>
                            </div>
                            <div class="dashboardPanelBody">
                                <div class="applicationInfoArea mt-3">
                                    <div class="row rowBox">

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Country of Education <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">
                                                    {{ @$data['education_summary']->education_country ? get_country($data['education_summary']->education_country) : '' }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Highest Level Of Education <sup
                                                        class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">
                                                    {{ @$data['education_summary']->education_level ? get_education_level($data['education_summary']->education_level) : '' }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Grading Scheme <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">
                                                    {{ @$data['education_summary']->education_scheme_grade ? get_education_scheme_grade($data['education_summary']->education_scheme_grade) : '' }}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Grade Average <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">
                                                    {{ $data['education_summary']->education_average_grade ?? '' }}</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="dashboardPanel">
                            <div class="dashboardPanelHeader">
                                <h4 class="title mb-0">Englsih Test Scores</h4>
                            </div>
                            <div class="dashboardPanelBody">
                                <div class="applicationInfoArea mt-3">
                                    <div class="row rowBox">

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Total Score <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">{{ $data['test_score']->total_score ?? '' }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Reading Score <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">{{ $data['test_score']->reading_score ?? '' }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Listening Score <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">{{ $data['test_score']->listening_score ?? '' }}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Writing Score <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">
                                                    {{ $data['test_score']->writing_score ?? '' }}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Speaking Score <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">
                                                    {{ $data['test_score']->speaking_score ?? '' }}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Exam Date <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">
                                                    {{ isset($data['test_score']->exam_date) ? date('M d, Y', strtotime($data['test_score']->exam_date)) : '' }}
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row rowBox">
                                        <div class="col-lg-3 col-md-9 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">GRE or GMAT Scores <sup class="text-danger">*</sup>
                                                </div>
                                                @if (isset($data['test_score']) && $data['test_score']->is_gmat == 'gmat_exam')
                                                    <div class="txt">I have GMAT exam scores</div>
                                                @elseif (isset($data['test_score']) && $data['test_score']->is_gre == 'gre_exam')
                                                    <div class="txt">I have GRE exam scores</div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="dashboardPanel">
                            <div class="dashboardPanelHeader">
                                <h4 class="title mb-0">Visa And Permit</h4>
                            </div>
                            <div class="dashboardPanelBody">
                                <div class="applicationInfoArea mt-3">
                                    <div class="row rowBox">

                                        <div class="col-lg-4 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Have you been refused a visa from Canada, the USA, the
                                                    United Kingdom, New Zealand, Australia or Ireland?  <sup
                                                        class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">{{ $data['visa_permit']->refused_a_visa ?? '' }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Which valid study permits or visas do you have? <sup
                                                        class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">{{ $data['visa_permit']->study_permit_or_visa ?? '' }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Please provide more information about your current
                                                    study permit/visa and any past refusals, if any  <sup
                                                        class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">
                                                    {{ $data['visa_permit']->about_visa_permit ?? '' }}</div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="dashboardInnerWrapperinner py-2">
                        {{-- <div class="dashboardHeaderSec">
                            <h4 class="title mb-0">Application Info</h4>
                        </div> --}}

                        <div class="dashboardPanel">
                            <div class="dashboardPanelHeader">
                                <h4 class="title mb-0">Selected Courses</h4>
                            </div>
                            <div class="dashboardPanelBody">
                                <div class="applicationInfoArea">
                                    <div class="row rowBox">

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Country Specific GPA India <sup
                                                        class="text-danger">*</sup></div>
                                                <div class="txt">

                                                    @forelse ($uploadedDocument as $document)
                                                        @if ($document->document_name == 'program-student-attachment')
                                                            @foreach ($document->getMedia('program-student-attachment') ?? [] as $image)
                                                                <div class="links-attachments">
                                                                    <a class="additional-attachment"
                                                                        href=" {{ $image->getUrl() }}" target="_blank">
                                                                        <span aria-hidden="true"
                                                                            class="fa fa-file-pdf-o"></span>
                                                                        {{ substr(strrchr($image->getPath(), '/'), 1) }}
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    @empty
                                                        <span> No Document Found.</span>
                                                    @endforelse

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Copy of Passport <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">
                                                    @forelse ($uploadedDocument as $document)
                                                        @if ($document->document_name == 'program-passport-attachment')
                                                            @foreach ($document->getMedia('program-passport-attachment') ?? [] as $image)
                                                                <div class="links-attachments">
                                                                    <a class="additional-attachment"
                                                                        href=" {{ $image->getUrl() }}" target="_blank">
                                                                        <span aria-hidden="true"
                                                                            class="fa fa-file-pdf-o"></span>
                                                                        {{ substr(strrchr($image->getPath(), '/'), 1) }}
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    @empty
                                                        <span> No Document Found.</span>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Custodianship Declaration <sup
                                                        class="text-danger">*</sup></div>
                                                <div class="txt">
                                                    @forelse ($uploadedDocument as $document)
                                                        @if ($document->document_name == 'program-custodianship-declaration-attachment')
                                                            @foreach ($document->getMedia('program-custodianship-declaration-attachment') ?? [] as $image)
                                                                <div class="links-attachments">
                                                                    <a class="additional-attachment"
                                                                        href=" {{ $image->getUrl() }}" target="_blank">
                                                                        <span aria-hidden="true"
                                                                            class="fa fa-file-pdf-o"></span>
                                                                        {{ substr(strrchr($image->getPath(), '/'), 1) }}
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    @empty
                                                        <span> No Document Found.</span>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Proof of Immunization <sup class="text-danger">*</sup>
                                                </div>
                                                <div class="txt">
                                                    @forelse ($uploadedDocument as $document)
                                                        @if ($document->document_name == 'program-proof-immunization-attachment')
                                                            @foreach ($document->getMedia('program-proof-immunization-attachment') ?? [] as $image)
                                                                <div class="links-attachments">
                                                                    <a class="additional-attachment"
                                                                        href=" {{ $image->getUrl() }}" target="_blank">
                                                                        <span aria-hidden="true"
                                                                            class="fa fa-file-pdf-o"></span>
                                                                        {{ substr(strrchr($image->getPath(), '/'), 1) }}
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    @empty
                                                        <span> No Document Found.</span>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Student Participation Agreement (without homestay) <sup
                                                        class="text-danger">*</sup></div>

                                                <div class="txt">

                                                    @forelse ($uploadedDocument as $document)
                                                        @if ($document->document_name == 'program-participation-agreement-attachment')
                                                            @foreach ($document->getMedia('program-participation-agreement-attachment') ?? [] as $image)
                                                                <div class="links-attachments">
                                                                    <a class="additional-attachment"
                                                                        href=" {{ $image->getUrl() }}" target="_blank">
                                                                        <span aria-hidden="true"
                                                                            class="fa fa-file-pdf-o"></span>
                                                                        {{ substr(strrchr($image->getPath(), '/'), 1) }}
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    @empty
                                                        <span> No Document Found.</span>
                                                    @endforelse

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox applicationInfoBox mb-3">
                                            <div class="applicationInfoBoxinner">
                                                <div class="ttl">Student Self-Introduction Form <sup
                                                        class="text-danger">*</sup></div>
                                                <div class="txt">
                                                    @forelse ($uploadedDocument as $document)
                                                        @if ($document->document_name == 'program-self-introduction-attachment')
                                                            @foreach ($document->getMedia('program-self-introduction-attachment') ?? [] as $image)
                                                                <div class="links-attachments">
                                                                    <a class="additional-attachment"
                                                                        href=" {{ $image->getUrl() }}" target="_blank">
                                                                        <span aria-hidden="true"
                                                                            class="fa fa-file-pdf-o"></span>
                                                                        {{ substr(strrchr($image->getPath(), '/'), 1) }}
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    @empty
                                                        <span> No Document Found.</span>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <button class="btn btn-success" onclick="createPDF()">generate PDF</button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>
    <script src="https://cdn.bootcss.com/html2pdf.js/0.9.1/html2pdf.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.1/html2pdf.bundle.min.js"></script>

    <script>
        function createPDF() {
            var element = document.getElementById('pdf_content');
            var time = "{{ time() }}"
            var number = "{{ $data['program']->application_number }}"
            html2pdf(element, {
                margin: 1,
                padding: 0,
                filename: time + '-' + number + '.pdf',
                image: {
                    type: 'jpeg',
                    quality: 1
                },
                html2canvas: {
                    scale: 2,
                    logging: true
                },
                jsPDF: {
                    unit: 'in',
                    format: 'A2',
                    orientation: 'P'
                },
                class: createPDF
            });
        };
    </script>
@endpush
