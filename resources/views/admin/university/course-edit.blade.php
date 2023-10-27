@extends('admin.layouts.layout')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            {{-- <h3 class="page-title"> University Form elements </h3> --}}
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
                        <h4 class="card-title mb-4">University Course Edit Form elements </h4>
                        {{-- <p class="card-description"> Basic form elements </p> --}}
                        @include('flash-messages')
                        <form method="POST" action="{{ route('admin.university.course.update', $program->id) }}"
                            enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <select class="form-control" name="university_id" required>
                                    <option value="">Select University</option>
                                    @foreach ($universities as $university)
                                        <option value="{{ $university->user_id }}"
                                            {{ $program->user_id == $university->user_id ? 'selected' : '' }}>
                                            {{ $university->university_name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label class="labels">Program Title</label>
                                <input type="text" class="form-control" placeholder="" name="program_title"
                                    value="{{ $program->program_title ?? '' }}" required="">
                            </div>
                            <div class="form-group">
                                <label class="labels">Program Summary</label>
                                <textarea class="form-control" name="program_summary" rows="3">{{ $program->program_summary ?? '' }}</textarea>
                            </div>


                            <div class="form-group">
                                <label class="labels"><b>Intakes</b></label>
                            </div>
                            <div class="form-group">
                                <div id="intakeAddMoreField">
                                    @forelse ($program->intake as $keyi => $intake)
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="labels"><b>Program Intakes</b> </label>
                                                <select class="form-select program-intake" required=""
                                                    name="intake_date[]">
                                                    <option value="">Select Month </option>
                                                    @foreach ($months as $key => $item)
                                                        <option value="{{ $key }}"
                                                            {{ date('Y-m-d', strtotime($intake->intake_date)) == $key ? 'selected' : '' }}>
                                                            {{ $item }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="labels"><b>Program Intakes Status</b> </label>
                                                <select class="form-select program-intake-statuss" required=""
                                                    name="intake_status[]">
                                                    <option value="1"
                                                        {{ $intake->intake_status == '1' ? 'selected' : '' }}>Open</option>
                                                    <option value="2"
                                                        {{ $intake->intake_status == '2' ? 'selected' : '' }}>Likely Open
                                                    </option>
                                                    <option value="3"
                                                        {{ $intake->intake_status == '3' ? 'selected' : '' }}>Will Open
                                                    </option>
                                                    <option value="4"
                                                        {{ $intake->intake_status == '4' ? 'selected' : '' }}>Wait List
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="col-md-2">
                                                <label class="labels"><b>Deadline</b> </label>
                                                <input type="date" class="form-control deadline"
                                                    value="{{ date('Y-m-d', strtotime($intake->deadline)) }}"
                                                    name="intake_deadline[]">
                                            </div>

                                            <div class="col-md-2">
                                                <label class="labels"><b>Open Date</b> </label>
                                                <input type="date" class="form-control" id="date-field"
                                                    value="{{ $intake->open_date ? date('Y-m-d', strtotime($intake->open_date)) : '' }}"
                                                    name="open_date[]" required="">
                                            </div>

                                            <div class="col-md-2">
                                                <label class="labels"><b></b> </label>
                                                @if ($keyi == 0)
                                                    <button type="button" id="intakeMoreAdd"
                                                        class="btn btn-gradient-primary me-2">Add</button>
                                                @else
                                                    <button type="button"
                                                        class="btn btn-gradient-danger reomveIntakeMoreField me-2">Removw</button>
                                                @endif
                                            </div>
                                        </div>
                                    @empty
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="labels"><b>Program Intakes</b> </label>
                                                    <select class="form-select program-intakes" id="program-intakes"
                                                        required="" name="intake_date[]">
                                                        <option value="">Select Month</option>
                                                        @foreach ($months as $key => $item)
                                                            <option value="{{ $key }}"> {{ $item }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="labels"><b>Program Intakes Status</b> </label>
                                                    <select class="form-select program-intake-status" id="select-option"
                                                        required="" name="intake_status[]">
                                                        <option value="1">Open</option>
                                                        <option value="2">Likely Open</option>
                                                        <option value="2">Will Open</option>
                                                        <option value="2">Wait List</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="labels"><b>Deadline</b> </label>
                                                    <input type="date" class="form-control deadline"
                                                        name="intake_deadline[]">
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="labels"><b>Open Date</b> </label>
                                                    <input type="date" class="form-control" id="date-field"
                                                        name="open_date[]" required="">
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="labels"><b></b> </label>
                                                    <button type="button" id="intakeMoreAdd"
                                                        class="btn btn-gradient-primary me-2">Add</button>
                                                </div>
                                            </div>
                                            <div id="intakeAddMoreField">

                                            </div>
                                        </div>
                                    @endforelse



                                </div>
                            </div>


                            <div class="form-group">
                                <label class="">Post-Secondary Discipline Category</label>
                                <select class="form-control" name="post_secondary_category" id="post-secondary-category">
                                    <option value="">Select...</option>
                                    @forelse ($postCategories ?? [] as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $program->post_secondary_category == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @empty
                                    @endforelse
                                </select>

                            </div>
                            <div class="form-group">
                                <label class="">Post-Secondary Discipline Sub Category</label>
                                <select class="form-control" name="post_secondary_sub_category"
                                    id="post-secondary-sub-category">
                                    <option value="">Select...</option>
                                </select>

                            </div>

                            <div class="form-group">
                                <label class="labels"><b>Admission Requirements</b></label>
                            </div>
                            <div class="form-group">
                                <label class="labels">Minimum Level of Education Completed</label>
                                <select class="form-control" name="minimum_level_education">

                                    @foreach ($educationLevels as $educationLevel)
                                        <option value="{{ $educationLevel->id }}"
                                            {{ $program->minimum_level_education == $educationLevel->id ? 'selected' : '' }}>
                                            {{ $educationLevel->level_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="labels">Minimum GPA</label>
                                <input type="text" class="form-control" name="minimum_gpa"
                                    value="{{ $program->minimum_gpa ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label class="labels"><b>Minimum Language Test Scores</b></label>
                            </div>

                            <div class="form-group">
                                <div id="englishTestAddMoreField">
                                    @php
                                        $c = 0;
                                    @endphp
                                    @forelse (json_decode($program->english_test) ?? [] as $item)
                                        {{-- {{ $key }} --}}
                                        @forelse ($item as $key => $value)
                                            @php
                                                $c++;
                                            @endphp

                                            <div class="row">
                                                <div class="col-md-7">
                                                    <label class="labels"><b>English Test Score</b> </label>
                                                    <select class="form-select program-intakes" name="english_test[]">
                                                        <option value="">Select...</option>
                                                        <option value="toefl" {{ $key == 'toefl' ? 'selected' : '' }}>
                                                            TOEFL</option>
                                                        <option value="ielt" {{ $key == 'ielt' ? 'selected' : '' }}>
                                                            IELTS</option>
                                                        <option value="pte" {{ $key == 'pte' ? 'selected' : '' }}>PTE
                                                        </option>
                                                        <option value="duolingo"
                                                            {{ $key == 'duolingo' ? 'selected' : '' }}>Duolingo</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="labels"><b>Total Score</b> </label>
                                                    <input type="input" class="form-control"
                                                        value="{{ $value }}" name="total_score[]">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="labels"><b></b> </label>
                                                    @if ($c == 1)
                                                        <button type="button" id="englishTestMoreAdd"
                                                            class="btn btn-gradient-primary me-2">Add</button>
                                                    @else
                                                        <button type="button" id="reomveEnglishTestMoreField"
                                                            class="btn btn-gradient-danger me-2 reomveEnglishTestMoreField">Remove</button>
                                                    @endif

                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    @empty
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label class="labels"><b>English Test Score</b> </label>
                                                <select class="form-select program-intakes" name="english_test[]">
                                                    <option value="">Select...</option>
                                                    <option value="toefl">TOEFL</option>
                                                    <option value="ielt">IELTS</option>
                                                    <option value="pte">PTE</option>
                                                    <option value="toefl">TOEFL</option>
                                                    <option value="duolingo">Duolingo</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="labels"><b>Total Score</b> </label>
                                                <input type="input" class="form-control" name="total_score[]">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="labels"><b></b> </label>
                                                <button type="button" id="englishTestMoreAdd"
                                                    class="btn btn-gradient-primary me-2">Add</button>
                                            </div>
                                        </div>
                                    @endforelse

                                </div>
                            </div>


                            <div class="form-group">
                                <label class="labels">Program Level</label>
                                {{-- <input type="text" class="form-control" name="program_level"
                                    value="{{ $program->program_level ?? '' }}" required=""> --}}
                                <select class="form-select program-intakes" name="program_level">
                                    @foreach ($educationLevels as $educationLevel)
                                        <option value="{{ $educationLevel->level_name }}"
                                            {{ $program->program_level == $educationLevel->level_name ? 'selected' : '' }}>
                                            {{ $educationLevel->level_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="labels">Program Length</label>
                                <input type="text" class="form-control" name="program_length"
                                    value="{{ $program->program_length ?? '' }}" required="">
                            </div>

                            <div class="form-group">
                                <label class="labels">Cost of Living</label>
                                <input type="number" class="form-control decimal" name="cost_of_living"
                                    value="{{ $program->cost_of_living ?? '' }}" required="">
                            </div>

                            <div class="form-group">
                                <label class="labels">Gross Tuition</label>
                                <input type="number" class="form-control decimal" name="gross_tuition"
                                    value="{{ $program->gross_tuition ?? '' }}" required="">
                            </div>

                            <div class="form-group">
                                <label class="labels">Application Fee</label>
                                <input type="number" class="form-control decimal" name="application_fee"
                                    value="{{ $program->application_fee ?? '' }}" required="">
                            </div>
                            <div class="form-group">
                                <label class="labels">Agent Comission</label>
                                <input type="text" class="form-control decimal" name="agent_commission"
                                    value="{{ $program->agent_commission ?? '' }}">
                            </div>
                            {{-- <div class="form-group">
                                <label class="labels">Deadline</label>
                                <input type="date" class="form-control" id="deadline" name="deadline"
                                    value="{{ date('Y-m-d', strtotime($program->deadline ?? now())) }}">
                            </div>
                            <div class="form-group">
                                <label class="labels">Program Intakes</label>
                                <select class="form-control" id="select-option" name="program_intake">
                                    <option value="1" {{ $program->program_intake == '1' ? 'seleced' : '' }}>Open
                                    </option>
                                    <option value="2" {{ $program->program_intake == '2' ? 'seleced' : '' }}>Closed
                                    </option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label class="labels">Open Till </label>
                                <input type="date" class="form-control" id="date-field" name="program_till_date"
                                    value="{{ $program->program_till_date ?? '' }}">

                            </div> --}}
                            <div class="form-group">
                                <label class="labels"><b>Commissions</b></label>

                            </div>

                            <div class="form-group">
                                <label class="labels">Commission Breakdown</label>
                                <textarea class="form-control" name="commission_breakdown" rows="3">{{ $program->commission_breakdown ?? '' }}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="labels">Disclaimer</label>
                                <textarea class="form-control" name="disclaimer" rows="3">{{ $program->disclaimer }}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="labels"><b>Pre-Payment</b></label>
                            </div>

                            <div class="form-group">

                                @forelse ($program->pre_payment as $pre_payment)
                                    <div class="row">
                                        @if ($loop->first)
                                        @else
                                            <hr>
                                        @endif

                                        <div class="col-md-8">
                                            <label class="labels">Label</label>
                                            <input type="text" class="form-control" name="payment_label[]"
                                                value="{{ $pre_payment->label }}" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="labels">File</label>
                                            <input type="checkbox" class="payment_file"
                                                {{ $pre_payment->file == 'file' ? 'checked' : '' }}
                                                value="{{ $pre_payment->file }}" name="payment_file_check[]">
                                            <input type="hidden" class="payment_file_check"
                                                value="{{ $pre_payment->file }}" name="payment_file[]">
                                        </div>
                                        <div class="col-md-10">
                                            <label class="labels">Descriptions</label>
                                            <input type="input" class="form-control"
                                                value="{{ $pre_payment->description }}" name="payment_description[]"
                                                required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="labels"></label>
                                            @if ($loop->first)
                                                <button type="button"
                                                    class="btn btn-gradient-primary me-2 pre-payment">Add</button>
                                            @else
                                                <button type="button"
                                                    class="btn btn-gradient-danger me-2 reomvePrePaymentMoreField">Remove</button>
                                            @endif
                                        </div>
                                    </div>
                                @empty
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label class="labels">Label</label>
                                            <input type="text" class="form-control" name="payment_label[]" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="labels">File</label>
                                            <input type="checkbox" class="payment_file" name="payment_file_check[]">
                                            <input type="hidden" class="payment_file_check" value="No"
                                                name="payment_file[]">
                                        </div>
                                        <div class="col-md-10">
                                            <label class="labels">Descriptions</label>
                                            <input type="input" class="form-control" name="payment_description[]"
                                                required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="labels"></label>
                                            <button type="button"
                                                class="btn btn-gradient-primary me-2 pre-payment">Add</button>
                                        </div>
                                    </div>
                                @endforelse
                                <div id="prePaymentAddMoreField">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="labels"><b>Pre-Submission</b></label>
                            </div>

                            <div class="form-group">

                                @forelse ($program->pre_submission as $pre_submission)
                                    <div class="row">
                                        @if ($loop->first)
                                        @else
                                            <hr>
                                        @endif
                                        <div class="col-md-6">
                                            <label class="labels">Label </label>
                                            <input type="text" class="form-control" name="submission_label[]"
                                                value="{{ $pre_submission->label }}" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="labels">Model Form </label>
                                            <select name="submission_model[]" class="form-control">
                                                <option value="">Select...</option>
                                                 @foreach ($preSubmissionModels as $preModel)
                                                    <option value="{{ $preModel->id }}"
                                                        {{ $pre_submission->program_submission_model_id == $preModel->id ? 'selected' : '' }}>
                                                        {{ $preModel->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-2">
                                            <label class="labels">File </label>
                                            <input type="checkbox" class="submission_file" value="file"
                                                {{ $pre_submission->file == 'file' ? 'checked' : '' }}
                                                name="submission_file_check[]">
                                            <input type="hidden" class="submission_file_check" name="submission_file[]"
                                                value="{{ $pre_submission->file }}">
                                        </div>

                                        <div class="col-md-10">
                                            <label class="labels">Descriptions </label>
                                            <input type="input" class="form-control"
                                                value="{{ $pre_submission->description }}"
                                                name="submission_description[]" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="labels"> </label>
                                            @if ($loop->first)
                                                <button type="button"
                                                    class="btn btn-primary me-2 pre-submission">Add</button>
                                            @else
                                                <button type="button"
                                                    class="btn btn-gradient-danger me-2 reomvePreSubmissionMoreField">Remove</button>
                                            @endif

                                        </div>
                                    </div>
                                @empty
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="labels">Label </label>
                                            <input type="text" class="form-control" name="submission_label[]"
                                                required>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="labels">Model Form </label>
                                            <select name="submission_model[]" class="form-control">
                                                <option value="">Select...</option>
                                                @foreach ($preSubmissionModels as $preModel)
                                                    <option value="{{ $preModel->id }}">
                                                        {{ $preModel->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-2">
                                            <label class="labels">File </label>
                                            <input type="checkbox" class="submission_file" value="file"
                                                name="submission_file_check[]">
                                            <input type="hidden" class="submission_file_check" name="submission_file[]"
                                                value="No">
                                        </div>

                                        <div class="col-md-10">
                                            <label class="labels">Descriptions </label>
                                            <input type="input" class="form-control" name="submission_description[]"
                                                required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="labels"> </label>
                                            <button type="button"
                                                class="btn btn-primary me-2 pre-submission">Add</button>
                                        </div>
                                    </div>
                                @endforelse

                                <div id="preSubmissionAddMoreField">
                                </div>
                            </div>


                            <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
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

            $('#universityList, .minimum-level-education, .program-intake-statuss, .program-intake').select2({
                placeholder: 'Select an option',
                allowClear: true
            });

            flatpickr("#date-field, .deadline", {
                minDate: "today",
                dateFormat: "Y-m-d"
            });

            flatpickr("#deadline", {
                dateFormat: "Y-m-d",
                minDate: "today"
            })


            $("#intakeMoreAdd").on('click', function() {
                var html = `<div class="row">
                                    <div class="col-md-3">
                                    <label class="labels"><b>Program Intakes</b> </label>
                                        <select class="form-select program-intakes" required=""
                                            name="intake_date[]">
                                            <option value="">Select Month</option>
                                            @foreach ($months as $key => $item)
                                                <option value="{{ $key }}"> {{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="labels"><b>Program Intake Status</b> </label>
                                        <select class="form-select program-intake-status" required="" name="intake_status[]">
                                            <option value="1">Open</option>
                                            <option value="2">Likely Open</option>
                                            <option value="3">Will Open</option>
                                            <option value="4">Wait List</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="labels"><b>Deadline</b> </label>
                                        <input type="date" class="form-control deadline" name="intake_deadline[]">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="labels"><b>Open Date</b> </label>
                                        <input type="date" class="form-control intakeTillDate"
                                            name="open_date[]" required="">
                                    </div>

                                    <div class="col-md-2">
                                        <button type="button"
                                            class="btn btn-gradient-danger reomveIntakeMoreField me-2">Removw</button>
                                    </div>
                                </div>`;
                $("#intakeAddMoreField").append(html);
                flatpickr(".deadline, .intakeTillDate", {
                    dateFormat: "Y-m-d"
                });
                $(' .program-intake-status, .program-intakes ').select2({
                    placeholder: 'Select an option',
                    allowClear: true
                });

            });

            $(document).on('click', '.reomveIntakeMoreField', function() {
                $(this).closest('.row').remove();
            });


            $("#post-secondary-category").on('change', function() {
                // alert($(this).val())
                postSecondaryCategory($(this).val())

            })

            if ("{{ $program->post_secondary_category }}") {

                postSecondaryCategory("{{ $program->post_secondary_category }}")

            }

            function postSecondaryCategory(id) {
                $.ajax({
                        url: "{{ route('post.secondary.sub.category') }}",
                        type: "get",
                        data: {
                            category_id: id
                        }
                    })
                    .done(function(response) {
                        var subCategory = "{{ $program->post_secondary_sub_category }}"
                        $('#post-secondary-sub-category').html('<option value="">Select...</option>');
                        $.each(response.sub_category, function(key, value) {
                            var selectSub = subCategory == value.id ? 'selected' : '';
                            $("#post-secondary-sub-category").append('<option ' + selectSub +
                                ' value="' + value
                                .id + '">' + value.name + '</option>');
                        });

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log('Server error occured');
                    });
            }



            $("#englishTestMoreAdd").on('click', function() {
                var html = `
                            <div class="row">
                                <div class="col-md-7">
                                    <label class="labels"><b>English Test Score</b> </label>
                                    <select class="form-select program-intakes" required=""
                                        name="english_test[]">
                                        <option value="">Select...</option>
                                        <option value="toefl">TOEFL</option>
                                        <option value="ielt">IELTS</option>
                                        <option value="pte">PTE</option>
                                        <option value="toefl">TOEFL</option>
                                        <option value="duolingo">Duolingo</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="labels"><b>Total Score</b> </label>
                                    <input type="input" class="form-control" name="total_score[]">
                                </div>



                                <div class="col-md-2">
                                    <label class="labels"><b></b> </label>
                                    <button type="button" id="reomveEnglishTestMoreField"
                                        class="btn btn-gradient-danger me-2 reomveEnglishTestMoreField">Remove</button>
                                </div>
                            </div>
                            `;
                $("#englishTestAddMoreField").append(html);

                $('.program-intakes').select2({
                    placeholder: 'Select...',
                    allowClear: true
                });

            });

            $(document).on('click', '.reomveEnglishTestMoreField', function() {
                $(this).closest('.row').remove();
            });

            $("input.decimal").bind("change keyup input", function() {
                var position = this.selectionStart - 1;
                //remove all but number and .
                var fixed = this.value.replace(/[^0-9\.]/g, "");
                if (fixed.charAt(0) === ".")
                    //can't start with .
                    fixed = fixed.slice(1);

                var pos = fixed.indexOf(".") + 1;
                if (pos >= 0)
                    //avoid more than one .
                    fixed = fixed.substr(0, pos) + fixed.slice(pos).replace(".", "");

                if (this.value !== fixed) {
                    this.value = fixed;
                    this.selectionStart = position;
                    this.selectionEnd = position;
                }
            });


            $(".pre-payment").on('click', function() {
                var html = `
                                <div class="row">
                                        <hr>
                                     <div class="col-md-8">
                                        <label class="labels">Label </label>
                                        <input type="text" class="form-control" name="payment_label[]">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="labels">File </label>
                                        <input type="checkbox" class="payment_file" value="file" name="payment_file_check[]">
                                         <input type="hidden" class="payment_file_check" value="No"
                                                name="payment_file[]">
                                    </div>
                                    <div class="col-md-10">
                                        <label class="labels">Descriptions </label>
                                        <input type="input" class="form-control" name="payment_description[]">
                                    </div>
                                     <div class="col-md-2">
                                    <label class="labels"> </label>
                                    <button type="button" id="reomveEnglishTestMoreField"
                                        class="btn btn-gradient-danger me-2 reomvePrePaymentMoreField">Remove</button>
                                </div>
                            </div>
                            `;
                $("#prePaymentAddMoreField").append(html);

            });

            $(document).on('change', '.payment_file', function() {
                if ($(this).is(":checked")) {
                    $(this).closest('.row').find('.payment_file_check').val('file')
                } else {
                    $(this).closest('.row').find('.payment_file_check').val('No')
                }
            });

            $(document).on('click', '.reomvePrePaymentMoreField', function() {
                $(this).closest('.row').remove();
            });

            $(".pre-submission").on('click', function() {
                var html = `
                                <div class="row">
                                    <hr>
                                    <div class="col-md-6">
                                        <label class="labels">Label </label>
                                        <input type="text" class="form-control" name="submission_label[]">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="labels">Model Form </label>
                                        <select name="submission_model[]" class="form-control">
                                            <option value="">Select...</option>
                                            @foreach ($preSubmissionModels as $preModel)
                                                    <option value="{{ $preModel->id }}">
                                                        {{ $preModel->title }}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label class="labels">File </label>
                                        <input type="checkbox" class="submission_file" value="file"
                                          name="submission_file_check[]">
                                        <input type="hidden" class="submission_file_check" name="submission_file[]"
                                                value="No">
                                    </div>

                                    <div class="col-md-10">
                                        <label class="labels">Descriptions </label>
                                        <input type="input" class="form-control" name="submission_description[]">
                                    </div>
                                     <div class="col-md-2">
                                        <label class="labels"> </label>
                                        <button type="button" id="reomveEnglishTestMoreField"
                                            class="btn btn-gradient-danger me-2 reomvePreSubmissionMoreField">Remove</button>
                                    </div>
                            </div>
                            `;
                $("#preSubmissionAddMoreField").append(html);

            });

            $(document).on('change', '.submission_file', function() {
                if ($(this).is(":checked")) {
                    $(this).closest('.row').find('.submission_file_check').val('file')
                } else {
                    $(this).closest('.row').find('.submission_file_check').val('No')
                }
            });

            $(document).on('click', '.reomvePreSubmissionMoreField', function() {
                $(this).closest('.row').remove();
            });
        });
    </script>
@endpush
