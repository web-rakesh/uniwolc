@extends('admin.layouts.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div id="pdf_content">

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Applied Program Details</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Application Number: </strong>
                                        {{ $data['program']->application_number }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>University Name : </strong>
                                        {{ $data['program']->getProgram->university->university_name }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>University Email : </strong>
                                        {{ $data['program']->getProgram->university->email }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>University Country : </strong>
                                        {{ $data['program']->getProgram->university->getCountry->name }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>University Institution Type : </strong>
                                        {{ $data['program']->getProgram->university->institution_type }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Program Name : </strong>
                                        {{ $data['program']->program_title }}</p>
                                </div>

                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Fees : </strong>
                                        {{ $data['program']->fees == 0 ? 'Free' : number_format($data['program']->fees, 2) }}
                                    </p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Pay Status : </strong>
                                        {{ $data['program']->status == 1 ? 'Due' : ($data['program']->status == 2 ? 'Paid' : 'N/A') }}
                                    </p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Personal Details</h5>
                            <hr>
                            <div class="row">


                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Name : </strong>
                                        {{ $data['student']->full_name }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Email : </strong> {{ $data['student']->email }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Phone Number : </strong>
                                        {{ $data['student']->mobile_number ? '+' . $data['student']->country_code . $data['student']->mobile_number : '' }}
                                    </p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Alter Phone Number : </strong>
                                        {{ $data['student']->alt_country_code ? '+' . $data['student']->alt_country_code . $data['student']->alt_mobile_number : '' }}
                                    </p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Address : </strong>
                                        {{ $data['student']->address }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Country : </strong>
                                        {{ $data['student']->userCountry->name }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>City : </strong>
                                        {{ $data['student']->city }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Zipcode : </strong>
                                        {{ $data['student']->pincode }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Passport Number : </strong>
                                        {{ $data['student']->passport_number }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Passport Expiry : </strong>
                                        {{ date('M d, Y', strtotime($data['student']->passport_expiry_date)) }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Marital Status : </strong>
                                        {{ $data['student']->marital_status }}</p>
                                </div>

                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Gender : </strong>
                                        {{ $data['student']->gender }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Date of birth : </strong>
                                        {{ date('M d, Y', strtotime($data['student']->dob)) }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Fast Language : </strong>
                                        {{ $data['student']->fast_language }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Website : </strong>
                                        {{ $data['student']->website }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Twitter : </strong>
                                        {{ $data['student']->twitter }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Instagram : </strong>
                                        {{ $data['student']->instagram }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Facebook : </strong>
                                        {{ $data['student']->facebook }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Residence and Nationality</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Country of Birth:</strong>
                                        {{ $data['student']->userCountry->name }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Country of Nationality:</strong>
                                        {{ $data['student']->userCountry->name }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Dual Nationality:</strong>
                                        {{ $data['student']->userCountry->name }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Country of Residence:</strong>
                                        {{ $data['student']->userCountry->name }}
                                    </p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Education Summary</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Country of Education : </strong>
                                        {{ $data['education_summary']->education_country ?? '' }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Highest Level Of Education : </strong>
                                        {{ $data['education_summary']->education_level ?? '' }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Grading Scheme : </strong>
                                        {{ $data['education_summary']->education_scheme_grade ?? '' }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Grade Average : </strong>
                                        {{ $data['education_summary']->education_average_grade ?? '' }}
                                    </p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Englsih Test Scores</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Total Score : </strong>
                                        {{ $data['test_score']->total_score ?? '' }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Reading Score : </strong>
                                        {{ $data['test_score']->reading_score ?? '' }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Listening Score : </strong>
                                        {{ $data['test_score']->listening_score ?? '' }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Writing Score : </strong>
                                        {{ $data['test_score']->writing_score ?? '' }}
                                    </p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Speaking Score : </strong>
                                        {{ $data['test_score']->speaking_score ?? '' }}
                                    </p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Exam Date : </strong>
                                        {{ isset($data['test_score']->exam_date) ? date('M d, Y', strtotime($data['test_score']->exam_date)) : '' }}
                                    </p>
                                </div>

                            </div>
                            <h4 class="card-title mt-5">GRE or GMAT Scores</h4>
                            <hr>
                            <div class="row">
                                @if (isset($data['test_score']->exam_date) && $data['test_score']->is_gmat == 'gmat_exam')
                                    <div class="card-text">I have GMAT exam scores</div>
                                @elseif (isset($data['test_score']->exam_date) && $data['test_score']->is_gre == 'gre_exam')
                                    <div class="card-text">I have GRE exam scores</div>
                                @endif

                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Visa And Permit</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Have you been refused a visa from Canada, the USA, the
                                            United Kingdom, New Zealand, Australia or Ireland? : </strong>
                                        {{ $data['visa_permit']->refused_a_visa ?? '' }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Which valid study permits or visas do you have? :
                                        </strong>
                                        {{ $data['visa_permit']->study_permit_or_visa ?? '' }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Please provide more information about your current
                                            study permit/visa and any past refusals, if any : </strong>
                                        {{ $data['visa_permit']->about_visa_permit ?? '' }}</p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text"><strong>Country of Residence:</strong>
                                        {{ $data['student']->userCountry->name ?? '' }}
                                    </p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Selected Courses</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 pt-3">
                                <p class="card-text"><strong>Country Specific GPA India : </strong>
                                    @forelse ($data['upload_document'] as $document)
                                        @if ($document->document_name == 'program-student-attachment')
                                            @foreach ($document->getMedia('program-student-attachment') ?? [] as $image)
                                                <div class="links-attachments">
                                                    <a class="additional-attachment" href=" {{ $image->getUrl() }}"
                                                        target="_blank">
                                                        <span aria-hidden="true" class="fa fa-file-pdf-o"></span>
                                                        {{ substr(strrchr($image->getPath(), '/'), 1) }}
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    @empty
                                        <span> No Document Found.</span>
                                    @endforelse
                                <p>
                            </div>
                            <div class="col-md-6 pt-3">
                                <p class="card-text"><strong>Copy of Passport : </strong>
                                    @forelse ($data['upload_document'] as $document)
                                        @if ($document->document_name == 'program-passport-attachment')
                                            @foreach ($document->getMedia('program-passport-attachment') ?? [] as $image)
                                                <div class="links-attachments">
                                                    <a class="additional-attachment" href=" {{ $image->getUrl() }}"
                                                        target="_blank">
                                                        <span aria-hidden="true" class="fa fa-file-pdf-o"></span>
                                                        {{ substr(strrchr($image->getPath(), '/'), 1) }}
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    @empty
                                        <span> No Document Found.</span>
                                    @endforelse
                                </p>
                            </div>
                            <div class="col-md-6 pt-3">
                                <p class="card-text"><strong>Proof of Immunization : </strong>
                                    @forelse ($data['upload_document'] as $document)
                                        @if ($document->document_name == 'program-proof-immunization-attachment')
                                            @foreach ($document->getMedia('program-proof-immunization-attachment') ?? [] as $image)
                                                <div class="links-attachments">
                                                    <a class="additional-attachment" href=" {{ $image->getUrl() }}"
                                                        target="_blank">
                                                        <span aria-hidden="true" class="fa fa-file-pdf-o"></span>
                                                        {{ substr(strrchr($image->getPath(), '/'), 1) }}
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    @empty
                                        <span> No Document Found.</span>
                                    @endforelse
                                </p>
                            </div>
                            <div class="col-md-6 pt-3">
                                <p class="card-text"><strong>Student Participation Agreement (without homestay) : </strong>
                                    @forelse ($data['upload_document'] as $document)
                                        @if ($document->document_name == 'program-participation-agreement-attachment')
                                            @foreach ($document->getMedia('program-participation-agreement-attachment') ?? [] as $image)
                                                <div class="links-attachments">
                                                    <a class="additional-attachment" href=" {{ $image->getUrl() }}"
                                                        target="_blank">
                                                        <span aria-hidden="true" class="fa fa-file-pdf-o"></span>
                                                        {{ substr(strrchr($image->getPath(), '/'), 1) }}
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    @empty
                                        <span> No Document Found.</span>
                                    @endforelse
                                </p>
                            </div>
                            <div class="col-md-6 pt-3">
                                <p class="card-text"><strong>Student Self-Introduction Form : </strong>
                                    @forelse ($data['upload_document'] as $document)
                                        @if ($document->document_name == 'program-self-introduction-attachment')
                                            @foreach ($document->getMedia('program-self-introduction-attachment') ?? [] as $image)
                                                <div class="links-attachments">
                                                    <a class="additional-attachment" href=" {{ $image->getUrl() }}"
                                                        target="_blank">
                                                        <span aria-hidden="true" class="fa fa-file-pdf-o"></span>
                                                        {{ substr(strrchr($image->getPath(), '/'), 1) }}
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    @empty
                                        <span> No Document Found.</span>
                                    @endforelse
                                </p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-4">
                    <button onclick="createPDF()" class="btn btn-success">generate PDF</button>
                </div>
            </div>

        </div>
    @endsection
    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>
        <script src="https://cdn.bootcss.com/html2pdf.js/0.9.1/html2pdf.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.1/html2pdf.bundle.min.js"></script>

        <script>
            var application_num = "{{ $data['program']->application_number }}"

            function createPDF() {
                var element = document.getElementById('pdf_content');
                html2pdf(element, {
                    margin: 1,
                    padding: 0,
                    filename: application_num + 'unwolc.pdf',
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
