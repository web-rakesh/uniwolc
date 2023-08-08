@extends('university.layouts.layout')
@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush
@section('content')
    <section class="dashboardPgaesSec bg-white">
        <div class="container rounded">
            <div class="dashboardPgaesSecinner">
                <div class="row rowBox">

                    <div class="col-md-9 columnBox border-right dasboardrightPart">
                        <div class="dasboardrightPartWrapper">
                            <div class="p-3 py-5 dasboardrightPartWrapperinner">
                                <h4 class="card-title text-center1 mb-0"> Add Programs</h4>
                                <hr>
                                <form method="POST" action="{{ route('university.program.update', $program->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row rowBox2 mt-3">
                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Program Title</label>
                                            <input type="text" class="form-control" placeholder="" name="program_title"
                                                value="{{ $program->program_title }}" required="">
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Program Summary</label>
                                            <textarea class="form-control" name="program_summary" rows="3">{{ $program->program_summary }}</textarea>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels"><b>Admission Requirements</b></label>
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Minimum Level of Education Completed
                                                ({{ $program->minimum_level_education }})</label>
                                            <select class="form-control" name="minimum_level_education">
                                                <option selected="selected">Grade 1</option>
                                                <option>Grade 1</option>
                                                <option>Grade 2</option>
                                                <option>Grade 3</option>
                                                <option>Grade 4</option>
                                                <option>Grade 5</option>
                                                <option>Grade 6</option>
                                                <option>Grade 7</option>
                                                <option>Grade 8</option>
                                                <option selected="selected">Secondary</option>
                                                <option>Grade 9</option>
                                                <option>Grade 10</option>
                                                <option>Grade 11</option>
                                                <option>Grade 12 / High School</option>
                                                <option selected="selected">Undergraduate</option>
                                                <option>1-Year Post-Secondary Certificate</option>
                                                <option>2-Year Undergraduate Diploma</option>
                                                <option>3-Year Undergraduate Advanced Diploma</option>
                                                <option>3-Year Bachelors Degree</option>
                                                <option>4-Year Bachelors Degree</option>
                                                <option selected="selected">Postgraduate</option>
                                                <option>Postgraduate Certificate/Diploma</option>
                                                <option>Master Degree</option>
                                                <option>Doctoral Degree(Phd, M.D., ...)</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Minimum GPA</label>
                                            <input type="text" class="form-control" name="minimum_gpa"
                                                value="{{ $program->minimum_gpa }}">
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels"><b>Minimum Language Test Scores</b></label>
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">IELTS</label>
                                            <input type="text" class="form-control" name="ielt"
                                                value="{{ $program->ielt }}" required="">
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            &nbsp;
                                            {{-- <label class="labels">IELTS</label>
                                            <input type="number" class="form-control" placeholder="IELTS" name="ielt"
                                                value="" required=""> --}}
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Program Level</label>
                                            <input type="text" class="form-control" name="program_level"
                                                value="{{ $program->program_level }}" required="">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Program Length</label>
                                            <input type="text" class="form-control" name="program_length"
                                                value="{{ $program->program_length }}" required="">
                                        </div>
                                        <div class="col-md-6 columnBox2">
                                            <label class="labels">Cost of Living</label>
                                            <input type="text" class="form-control" name="cost_of_living"
                                                value="{{ $program->cost_of_living }}" required="">
                                        </div>
                                        <div class="col-md-6 columnBox2">
                                            <label class="labels">Gross Tuition</label>
                                            <input type="text" class="form-control" name="gross_tuition"
                                                value="{{ $program->gross_tuition }}" required="">
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Application Fee</label>
                                            <input type="text" class="form-control" name="application_fee"
                                                value="{{ $program->application_fee }}" required="">
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Agent Comission</label>
                                            <input type="text" class="form-control" name="agent_commission"
                                                value="{{ $program->agent_commission }}" required="">
                                        </div>

                                        <div class="col-md-3 mb-3 columnBox2">
                                            <label class="labels">Deadline
                                                <input type="date" class="form-control" id="deadline" name="deadline"
                                                    value="{{ $program->deadline ?? '' }}">
                                                {{ date('d-m-Y', strtotime($program->deadline)) }}
                                        </div>

                                        <div class="col-md-3 mb-3 columnBox2">
                                            <label class="labels">Program Intakes</label>
                                            <select class="form-control" id="select-option" name="program_intake">
                                                <option value="1"
                                                    {{ $program->program_intake == '1' ? 'checked' : '' }}>Open</option>
                                                <option value="2"
                                                    {{ $program->program_intake == '2' ? 'checked' : '' }}>Closed</option>
                                            </select>
                                        </div>

                                        <div class="col-md-3 mb-3 columnBox2">

                                            <label class="labels">Open Till</label>
                                            <input type="date" class="form-control" id="date-field"
                                                name="program_till_date"
                                                value="{{ json_decode($program->program_till_date) ?? '' }}">
                                            {{ json_decode($program->program_till_date) ?? '' }}
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">This program requires valid language test results</label>
                                            <textarea class="form-control" name="program_language_test" rows="3">{{ $program->program_language_test }}</textarea>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels"><b>Commissions</b></label>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Commission Breakdown</label>
                                            <textarea class="form-control" name="commission_breakdown" rows="3">{{ $program->commission_breakdown }}</textarea>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Disclaimer</label>
                                            <textarea class="form-control" name="disclaimer" rows="3">{{ $program->disclaimer }}</textarea>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels"><b>Application Form</b></label>
                                        </div>
                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Student Instruction</label>
                                            <textarea class="form-control" name="student_instruction" rows="3">{{ $program->student_instruction ?? '' }}</textarea>
                                        </div>
                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Attachment</label>
                                            <input type="file" class="form-control" name="student_attachment[]"
                                                multiple>
                                        </div>

                                        @foreach ($program->getMedia('program-student-attachment') ?? [] as $image)
                                            <div class="col-md-9 mb-3 columnBox2">
                                                {{ $image->getUrl() }}<br>
                                            </div>
                                        @endforeach

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels"><b>Copy of Passport</b></label>
                                        </div>
                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Student Instruction</label>
                                            <textarea class="form-control" name="copy_passport" rows="3">{{ $program->copy_passport ?? '' }}</textarea>
                                        </div>
                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Attachment</label>
                                            <input type="file" class="form-control" name="copy_passport_attachment[]"
                                                multiple>
                                        </div>
                                        @foreach ($program->getMedia('program-passport-attachment') ?? [] as $image)
                                            <div class="col-md-9 mb-3 columnBox2">
                                                {{ $image->getUrl() }}<br>
                                            </div>
                                        @endforeach

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels"><b>Custodianship Declaration</b></label>
                                        </div>
                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Student Instruction</label>
                                            <textarea class="form-control" name="custodianship_declaration" rows="3">{{ $program->custodianship_declaration ?? '' }}</textarea>
                                        </div>
                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Attachment</label>
                                            <input type="file" class="form-control"
                                                name="custodianship_declaration_attachment[]" multiple>
                                        </div>
                                        @foreach ($program->getMedia('program-custodianship-declaration-attachment') ?? [] as $image)
                                            <div class="col-md-9 mb-3 columnBox2">
                                                {{ $image->getUrl() }}<br>
                                            </div>
                                        @endforeach

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels"><b>Proof of Immunization</b></label>
                                        </div>
                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Student Instruction</label>
                                            <textarea class="form-control" name="proof_immunization" rows="3">{{ $program->proof_immunization ?? '' }}</textarea>
                                        </div>
                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Attachment</label>
                                            <input type="file" class="form-control"
                                                name="proof_immunization_attachment[]" multiple>
                                        </div>
                                        @foreach ($program->getMedia('program-proof-immunization-attachment') ?? [] as $image)
                                            <div class="col-md-9 mb-3 columnBox2">
                                                {{ $image->getUrl() }}<br>
                                            </div>
                                        @endforeach

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels"><b>Student Participation Agreement (without
                                                    homestay)</b></label>
                                        </div>
                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Student Instruction</label>
                                            <textarea class="form-control" name="participation_agreement" rows="3">{{ $program->participation_agreement ?? '' }}</textarea>
                                        </div>
                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Attachment</label>
                                            <input type="file" class="form-control"
                                                name="participation_agreement_attachment[]" multiple>
                                        </div>
                                        @foreach ($program->getMedia('program-participation-agreement-attachment') ?? [] as $image)
                                            <div class="col-md-9 mb-3 columnBox2">
                                                {{ $image->getUrl() }}<br>
                                            </div>
                                        @endforeach


                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels"><b>Student Self-Introduction Form</b></label>
                                        </div>
                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Student Instruction</label>
                                            <textarea class="form-control" name="self_introduction" rows="3">{{ $program->self_introduction ?? '' }}</textarea>
                                        </div>
                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Attachment</label>
                                            <input type="file" class="form-control"
                                                name="self_introduction_attachment[]" multiple>
                                        </div>
                                        @foreach ($program->getMedia('program-self-introduction-attachment') ?? [] as $image)
                                            <div class="col-md-9 mb-3 columnBox2">
                                                {{ $image->getUrl() }}<br>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="mt-3 text-end">
                                        <button class="btn btn-primary profile-button" type="submit">
                                            Save & Update Profile
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(document).ready(function() {
            var selectedDates = [];

            flatpickr("#date-field", {
                mode: "multiple",
                dateFormat: "Y-m-d",
                minDate: "today",
                onChange: function(selectedDates) {
                    selectedDates.forEach(function(date) {
                        selectedDates.push(date);
                    });
                }
            });

            flatpickr("#deadline", {

                dateFormat: "Y-m-d",
                minDate: "today",

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
                    dateFieldNaNpxoveAttr("disabled");
                }
            });

        });
    </script>
@endpush
