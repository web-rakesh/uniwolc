$(document).ready(function () {
    $(".created-application-btn").on("click", function () {
        $("#agentViaProgramApply").modal("show");
    });

    $("#agent-student-eligibility-formp").on("submit", function (e) {
        e.preventDefault(); // Prevent default form submission

        var formData = $(this).serialize(); // Serialize form data
        console.log(formData);
        return false;
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: formData,
            success: function (response) {
                // Handle success
            },
            error: function (error) {
                // Handle error
            },
        });
    });

    $(document).on("click", ".agent-student-apply-eligibility", function () {
        // alert($(this).data("program"));

        $.ajax({
            url: url_eligibility,
            type: "GET",
            data: { programId: $(this).data("program") },
            success: function (response) {
                // Handle success
                // console.log(response);
                $("#_eligibility_program_id").val(response.program_id);
                $("#eligibility_program").text(response.program_title);
                $("#agentStudentEligibilityProgramListModal").modal("show");
            },
            error: function (error) {
                // Handle error
            },
        });
    });
});

$(document).on("change", ".agent-student-apply-program", function () {
    let studentId = $(this).val();

    var programId = $("#_eligibility_program_id").val();
    var csrf_token = $('meta[name="csrf-token"]').attr("content");

    $.ajax({
        url: url,
        type: "POST",
        data: {
            student_id: studentId,
            program_id: programId,
            _token: csrf_token,
        },
        success: function (response) {
            // console.log(response);
            $("#student-name").html(response.student_name);
            $("#student-profile-status").html("");
            if (response.error_profile) {
                $("#student-profile-status").html(
                    `<div class="alert alert-danger row">
                                        <div class="col-md-1">
                                                <svg aria-hidden="true" height="20" width="20" data-icon-color="negative" data-icon-contrast="mid" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="css-1bqge26"><path d="M11 14V16H13V14H11Z"></path><path d="M11 7V12H13V7H11Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12Z"></path></svg>
                                        </div>
                                        <div class="col-md-7 h5">
                                             ${response.error_profile}
                                        </div>
                                        <div class="col-md-4 h5">
                                            <a href="${response.profile_url}" target="_blank" class="btn btn-light text-danger" >Update profile data</a>
                                        </div>

                                </div>`
                );
            }
            if (response.error) {
                $("#student-profile-status").html(
                    `<div class="alert alert-danger">
                                     ${response.error}
                                </div>`
                );
            }
            if (response.success) {
                $("#student-profile-status").html(
                    `<div class="alert alert-success">
                                     ${response.success}
                                </div>`
                );
            }
            // $("#student-profile-status").html(response.html);
            if (response.status == true) {
                $(".appModalFooter .btn")
                    .removeClass("disabled")
                    .attr("type", "submit");
            } else {
                $(".appModalFooter .btn")
                    .addClass("disabled")
                    .attr("type", "button");
            }
        },
    });
});
