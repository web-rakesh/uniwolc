@extends('admin.layouts.layout')
@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush
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
                        <h4 class="card-title mb-4">Add Programs </h4>
                        {{-- <p class="card-description"> Basic form elements </p> --}}
                        <form class="forms-sample" method="post" action="{{ route('admin.university.course.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <select class="form-select" name="university_id" required>
                                    <option value="">Select University</option>
                                    @foreach ($universities as $university)
                                        <option value="{{ $university->user_id }}"> {{ $university->university_name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label class="labels">Program Title</label>
                                <input type="text" class="form-control" placeholder="" name="program_title"
                                    value="" required="">
                            </div>
                            <div class="form-group">
                                <label class="labels">Program Summary</label>
                                <textarea class="form-control" name="program_summary" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="labels"><b>Admission Requirements</b></label>
                            </div>
                            <div class="form-group">
                                <label class="labels">Minimum Level of Education Completed</label>
                                <select class="form-control" name="minimum_level_education">

                                    @foreach ($educationLevels as $educationLevel)
                                        <option value="{{ $educationLevel->id }}"> {{ $educationLevel->level_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="labels">Minimum GPA</label>
                                <input type="text" class="form-control" name="minimum_gpa" value="">
                            </div>

                            <div class="form-group">
                                <label class="labels"><b>Minimum Language Test Scores</b></label>
                            </div>

                            <div class="form-group">
                                <label class="labels">IELTS</label>
                                <input type="text" class="form-control" name="ielt" value="" required="">
                            </div>

                            <div class="form-group">
                                <label class="labels">Program Level</label>
                                <input type="text" class="form-control" name="program_level" value=""
                                    required="">
                            </div>

                            <div class="form-group">
                                <label class="labels">Program Length</label>
                                <input type="text" class="form-control" name="program_length" value=""
                                    required="">
                            </div>

                            <div class="form-group">
                                <label class="labels">Cost of Living</label>
                                <input type="text" class="form-control" name="cost_of_living" value=""
                                    required="">
                            </div>

                            <div class="form-group">
                                <label class="labels">Gross Tuition</label>
                                <input type="text" class="form-control" name="gross_tuition" value=""
                                    required="">
                            </div>

                            <div class="form-group">
                                <label class="labels">Application Fee</label>
                                <input type="text" class="form-control" name="application_fee" value=""
                                    required="">
                            </div>
                            <div class="form-group">
                                <label class="labels">Agent Comission</label>
                                <input type="text" class="form-control" name="agent_commission" value=""
                                    required="">
                            </div>
                            <div class="form-group">
                                <label class="labels">Deadline</label>
                                <input type="date" class="form-control" id="deadline" name="deadline" value="">
                            </div>
                            <div class="form-group">
                                <label class="labels">Program Intakes</label>
                                <select class="form-control" id="select-option" name="program_intake">
                                    <option value="1">Open</option>
                                    <option value="2">Closed</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label class="labels">Open Till</label>
                                <input type="date" class="form-control" id="date-field" name="program_till_date"
                                    value="">

                            </div>
                            <div class="form-group">
                                <label class="labels"><b>Commissions</b></label>

                            </div>

                            <div class="form-group">
                                <label class="labels">Commission Breakdown</label>
                                <textarea class="form-control" name="commission_breakdown" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="labels">Disclaimer</label>
                                <textarea class="form-control" name="disclaimer" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="labels"><b>Application Form</b></label>
                            </div>

                            <div class="form-group">
                                <label class="labels">Student Instruction</label>
                                <textarea class="form-control" name="student_instruction" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="labels">Attachment</label>
                                <input type="file" class="form-control" name="student_attachment[]" multiple>
                            </div>

                            <div class="form-group">
                                <label class="labels"><b>Copy of Passport</b></label>
                            </div>

                            <div class="form-group">
                                <label class="labels">Student Instruction</label>
                                <textarea class="form-control" name="copy_passport" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="labels">Attachment</label>
                                <input type="file" class="form-control" name="copy_passport_attachment[]" multiple>
                            </div>

                            <div class="form-group">
                                <label class="labels"><b>Custodianship Declaration</b></label>
                            </div>

                            <div class="form-group">
                                <label class="labels">Student Instruction</label>
                                <textarea class="form-control" name="custodianship_declaration" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="labels">Attachment</label>
                                <input type="file" class="form-control" name="custodianship_declaration_attachment[]"
                                    multiple>
                            </div>

                            <div class="form-group">
                                <label class="labels"><b>Proof of Immunization</b></label>
                            </div>

                            <div class="form-group">
                                <label class="labels">Student Instruction</label>
                                <textarea class="form-control" name="proof_immunization" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="labels">Attachment</label>
                                <input type="file" class="form-control" name="proof_immunization_attachment[]"
                                    multiple>
                            </div>

                            <div class="form-group">
                                <label class="labels"><b>Student Participation Agreement (without
                                        homestay)</b></label>
                            </div>

                            <div class="form-group">
                                <label class="labels">Student Instruction</label>
                                <textarea class="form-control" name="participation_agreement" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="labels">Attachment</label>
                                <input type="file" class="form-control" name="participation_agreement_attachment[]"
                                    multiple>
                            </div>

                            <div class="form-group">
                                <label class="labels"><b>Student Self-Introduction Form</b></label>
                            </div>

                            <div class="form-group">
                                <label class="labels">Student Instruction</label>
                                <textarea class="form-control" name="self_introduction" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="labels">Attachment</label>
                                <input type="file" class="form-control" name="self_introduction_attachment[]"
                                    multiple>
                            </div>


                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(document).ready(function() {
            var selectedDates = [];

            flatpickr("#date-field", {
                mode: "multiple",
                dateFormat: "Y-m-d"
            });

            flatpickr("#deadline", {

                dateFormat: "Y-m-d",
                minDate: "today"
            })
            // Get the select option and the date field
            var selectOption = $("#select-option");
            var dateField = $("#date-field");

            // When the select option changes, disable the date field if the value is 2
            selectOption.change(function() {
                var value = $(this).val();
                if (value === "2") {
                    dateField.attr("disabled", true);
                } else {
                    dateField.removeAttr("disabled");
                }
            });

        });
    </script>
@endpush
