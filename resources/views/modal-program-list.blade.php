    <!-- The Modal -->
    <div class="modal appModal" id="agentStudentEligibilityProgramListModal">
        <div class="modal-dialog appModalDiolog">
            <div class="modal-content appModalContent">

                <!-- Modal Header -->
                <div class="modal-header appModalHeader">
                    <h4 class="modal-title"> New Application</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fa-regular fa-xmark"></i></button>
                </div>
                <form id="agent-student-eligibility-form" action="{{ route('agent.program.apply') }}" method="post">
                    <!-- Modal body -->
                    @csrf
                    <div class="modal-body appModalBody">
                        <div class="agent-student-eligibility-programme"
                            style="border: 0.5px solid #d2d2d2;border-radius:10px; padding:20px;margin-top:20px">
                            <div class="form-group" style="font-size: 17px">
                                <input type="hidden" name="program_id" id="_eligibility_program_id">
                                <strong>Program </strong>
                                <p id="eligibility_program"></p>
                            </div>
                            <div class="form-group" style="font-size: 17px">
                                <strong>Student </strong>
                                <p id="student-name"></p>
                            </div>
                        </div>

                        <div class="form-group" style="padding-top: 20px">
                            <label class="labelName" style="font-size: 17px">
                                Please select a student to check their eligibility for this program.
                                <sup style="color:#ff0000;">*</sup></label>
                            <p style="font-size: 17px;margin-top:10px">Student</p>
                            <select class="form-control agent-student-apply-program" name="user_id">
                                <option>Select... </option>
                                @forelse (get_admin_student() ?? [] as $item)
                                    <option value="{{ $item->user_id }}">[{{ $item->user_id }}] {{ $item->full_name }}
                                    </option>
                                @empty
                                @endforelse

                            </select>
                        </div>

                        <div class="ml-3 mr-3" id="student-profile-status">

                        </div>
                    </div>
                    <div class="modal-footer appModalFooter">
                        <button type="button" class="btn btn-primary disabled">Create Application </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- -->
