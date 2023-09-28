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
                        <h4 class="card-title mb-4">Add Programs </h4>
                        @include('flash-messages')
                        {{-- <p class="card-description"> Basic form elements </p> --}}
                        <form class="forms-sample" method="post" action="{{ route('admin.university.course.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <select class="form-select" name="university_id" id="universityList" required>
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
                                <label class="labels"><b>Intakes</b></label>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="labels"><b>Program Intakes</b> </label>
                                        <select class="form-select program-intakes" id="program-intakes" required=""
                                            name="intake_date[]">
                                            <option value="">Select Month</option>
                                            @foreach ($months as $key => $item)
                                                <option value="{{ $key }}"> {{ $item }}</option>
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
                                        <input type="date" class="form-control deadline" name="intake_deadline[]">
                                    </div>

                                    <div class="col-md-2">
                                        <label class="labels"><b>Open Date</b> </label>
                                        <input type="date" class="form-control" id="date-field" name="open_date[]"
                                            required="">
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

                            <div class="form-group">
                                <label class="">Post-Secondary Discipline Category</label>
                                <select class="form-control" name="post_secondary_category" id="post-secondary-category">
                                    <option value="">Select...</option>
                                    @forelse ($postCategories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                        
                                    @endforelse
                                </select>

                            </div>
                            <div class="form-group">
                                <label class="">Post-Secondary Discipline Sub Category</label>
                                <select class="form-control" name="post_secondary_sub_category" id="post-secondary-sub-category">
                                  
                                </select>

                            </div>

                            <div class="form-group">
                                <label class="labels"><b>Admission Requirements</b></label>
                            </div>
                            <div class="form-group">
                                <label class="labels">Minimum Level of Education Completed</label>
                                <select class="form-control minimum-level-education" name="minimum_level_education">
                                    @foreach ($educationLevels as $educationLevel)
                                        <option value="{{ $educationLevel->id }}"> {{ $educationLevel->level_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="labels">Minimum GPA</label>
                                <input type="number" class="form-control" name="minimum_gpa" value="">
                            </div>

                            <div class="form-group">
                                <label class="labels"><b>Minimum Language Test Scores</b></label>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label class="labels"><b>English Test Score</b> </label>
                                        <select class="form-select program-intakes" 
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
                                        <button type="button" id="englishTestMoreAdd"
                                            class="btn btn-gradient-primary me-2">Add</button>
                                    </div>
                                </div>
                                <div id="englishTestAddMoreField">
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label class="labels">IELTS</label>
                                <input type="checkbox"  name="english_test[]" value="ielt">
                                <label class="labels">TOEFL </label>
                                <input type="checkbox"  name="english_test[]" value="toefl">
                                <label class="labels">PTE </label>
                                <input type="checkbox"  name="english_test[]" value="pte">
                                <label class="labels">Duolingo </label>
                                <input type="checkbox"  name="english_test[]" value="duolingo">
                            </div> --}}

                            {{-- <div class="form-group">
                                <label class="labels">Average Scores</label>
                                <input type="text" class="form-control" name="average_scores" value="">
                            </div> --}}

                            <div class="form-group">
                                <label class="labels">Program Level</label>
                                {{-- <input type="text" class="form-control" name="program_level" value=""
                                    required=""> --}}

                                <select class="form-control minimum-level-education" name="program_level">
                                    @foreach ($educationLevels as $educationLevel)
                                        <option value="{{ $educationLevel->level_name }}"> {{ $educationLevel->level_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="labels">Program Length</label>
                                <input type="text" class="form-control" name="program_length" value=""
                                    required="">
                            </div>

                            <div class="form-group">
                                <label class="labels">Cost of Living</label>
                                <input type="text" class="form-control decimal" name="cost_of_living" value=""
                                    required="">
                            </div>

                            <div class="form-group">
                                <label class="labels">Gross Tuition</label>
                                <input type="text" class="form-control decimal" name="gross_tuition" value=""
                                    required="">
                            </div>

                            <div class="form-group">
                                <label class="labels">Application Fee</label>
                                <input type="text" class="form-control decimal" name="application_fee" value=""
                                    required="">
                            </div>
                            <div class="form-group">
                                <label class="labels">Agent Comission</label>
                                <input type="text" class="form-control decimal" name="agent_commission" value="">
                            </div>
                            {{-- <div class="form-group">
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

                            </div> --}}
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
    <script>
        $(document).ready(function() {

            $('#universityList, .minimum-level-education, .program-intake-status, .program-intakes ').select2({
                placeholder: 'Select an option',
                allowClear: true
            });

            flatpickr("#date-field, .deadline", {
                mode: "multiple",
                dateFormat: "Y-m-d"
            });

            flatpickr("#deadline", {
                dateFormat: "Y-m-d",
                minDate: "today"
            })


            $("#post-secondary-category").on('change', function(){
                // alert($(this).val())
                $.ajax({
                    url: "{{ route('post.secondary.sub.category') }}",
                    type: "get",
                    data: {category_id : $(this).val()}
                })
                .done(function (response) {
                    console.log(response);
                    $('#post-secondary-sub-category').html('<option value="">Select...</option>');
                    $.each(response.sub_category, function(key, value) {

                        $("#post-secondary-sub-category").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                   
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
                });
            })

            
            $("#intakeMoreAdd").on('click', function() {
                var html = `<div class="row">
                                    <div class="col-md-3">
                                    <label class="labels"><b>Program Intakes</b> </label>
                                        <select class="form-select program-intakes" id="program-intakes" required=""
                                            name="intake_date[]">
                                            <option value="">Select Month</option>
                                            @foreach ($months as $key => $item)
                                                <option value="{{ $key }}"> {{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="labels"><b>Program Intake Status</b> </label>
                                        <select class="form-select program-intake-status" id="program-intake-status"  required="" name="intake_status[]">
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


        });
    </script>
@endpush
