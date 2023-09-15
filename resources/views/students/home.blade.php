@extends('students.layouts.layout')
@section('content')
    <div class="dashboardDtlsAreainner">
        <div class="dashboard_card analytics_card dashBeforeApplySec">
            <div class="pb-4 d-flex align-items-center headingSec dashboardHeadingSec">
                <div class="icon mr-3">
                    <img src="{{ asset('/') }}assets/images/map.png" class="img-fluid" alt="">
                </div>
                <div class="content">
                    <h3 class="title mb-0">{{ @$studentDetails->full_name ?? '' }}</h3>
                    <span class="text-danger">Uniwolc ID : {{ @$studentDetails->student_id ?? '' }}</span>
                    {{-- <h3 class="title mb-0">My Progress</h3> --}}
                </div>

            </div>
            <div class="dashBeforeApplyArea mb-1">
                <div class="dashBeforeApplyHeaderArea mb-4">
                    <h5 class="mb-3">Before Applying</h5>
                    <h6 class="mb-0">How it works <a href="#"><i class="fa-regular fa-video"></i></a></h6>
                </div>
                <div class="dashBeforeApplyAreainner">
                    <ul class="row rowBox">

                        <li class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox dashBeforeApplyBox complete">
                            <a href="#" class="dashBeforeApplyLink" data-toggle="modal"
                                data-target="#applyBoardModal">
                                <span class="icon"><i class="fa-regular fa-arrow-right"></i> </span>
                                <span class="text">Check Eligiblity</span>
                            </a>
                        </li>

                        <li class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox dashBeforeApplyBox complete">
                            <a href="{{ @$eligibility ? route('student.quick.search') : 'javascript:;' }}"
                                class="dashBeforeApplyLink">
                                <span class="icon"><i class="fa-regular fa-arrow-right"></i></span>
                                <span class="text">Choose a Program</span>
                            </a>
                        </li>
                        <li class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox dashBeforeApplyBox">
                            <a href="{{ route('student.profile') }}" class="dashBeforeApplyLink ">
                                <span class="icon"><i class="fa-regular fa-arrow-right"></i></span>
                                <span class="text">Complete Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- The Modal -->
            <div class="modal applyBoardModal" id="applyBoardModal">
                <div class="modal-dialog applyBoardModalDiolog">
                    <div class="modal-content applyBoardModalContent applyBoardSec" style="">
                        <div class="applyBoardModalLeftPart">
                            <div class="applyBoardModalLeftPartWrapper">

                                <div class="applyHeighLightSliderArea">
                                    <div class="applyHeighLightSlider owl-carousel">

                                        <div class="applyHeighLightBox">
                                            <div class="applyHeighLightBoxinner">
                                                <div class="icon">
                                                    <img src="{{ asset('/') }}assets/images/location.png"
                                                        class="img-fluid" alt="">
                                                </div>
                                                <div class="content">
                                                    <h4 class="title">The Choose the state</h4>
                                                    <div class="para">
                                                        <p class="mb-0">Toptal is an exclusive network of the world's top
                                                            talent in business, design, and technology.23</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="applyHeighLightBox">
                                            <div class="applyHeighLightBoxinner">
                                                <div class="icon">
                                                    <img src="{{ asset('/') }}assets/images/location.png"
                                                        class="img-fluid" alt="">
                                                </div>
                                                <div class="content">
                                                    <h4 class="title">The Choose the state</h4>
                                                    <div class="para">
                                                        <p class="mb-0">Toptal is an exclusive network of the world's top
                                                            talent in business, design, and technology.23</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="applyHeighLightBox">
                                            <div class="applyHeighLightBoxinner">
                                                <div class="icon">
                                                    <img src="{{ asset('/') }}assets/images/location.png"
                                                        class="img-fluid" alt="">
                                                </div>
                                                <div class="content">
                                                    <h4 class="title">TheChoose the state</h4>
                                                    <div class="para">
                                                        <p class="mb-0">Toptal is an exclusive network of the world's top
                                                            talent in business, design, and technology.23</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>





                        <div class="dashboard_card applyBoardCard custom__bg applyBoardModalRightPart">
                            <div class="dashboard_card_body applyBoardCardBody">

                                {{-- <form> --}}
                                @livewire('student.question-wizard')

                                {{-- </form> --}}
                            </div>
                        </div>




                    </div>
                </div>
            </div>


            <div class="pb-4 dashApplyArea">
                <div class="dashApplyHeaderArea mb-4">
                    <h5 class="mb-3">Applying</h5>
                    <h6 class="mb-0">How it works <a href="#"><i class="fa-regular fa-video"></i></a></h6>
                </div>
                <div class="dashBeforeApplyAreainner">
                    <div class="applyStepAccordian">

                        <div class="applyStepAccordianItem disable active">
                            <div class="applyStepAccordianHeader d-flex justify-content-between align-items-center">
                                <div class="leftSide d-flex align-items-center">
                                    <h5 class="title mb-0">Pay Application Fee</h5>
                                </div>
                                <div class="rightSide">
                                    <span class="info" data-toggle="tooltip" data-placement="top"
                                        title="Application fees are charged by schools (and in some case by Apply Board) to process your applications"><i
                                            class="fa-regular fa-circle-info"></i></span>
                                    <span class="arrow"><i class="fa-regular fa-chevron-down"></i></span>
                                </div>
                            </div>
                            <div class="applyStepAccordianBody">
                                <div class="headerContent d-flex align-items-center">
                                    <div class="logo mr-3"><img
                                            src="{{ asset('/') }}assets/images/University_of_Birmingham_Logo.png"
                                            class="img-fluid" alt="" style="width:50px;"></div>
                                    <div class="content">
                                        <h5 class="title mb-2">Postgraduate Diploma - Nuclear Decommissioning and Waste
                                            Management</h5>
                                        <p class="location mb-0">University of Birmingham - Edgbaston</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="applyStepAccordianItem disable ">
                            <div class="applyStepAccordianHeader d-flex justify-content-between align-items-center">
                                <div class="leftSide d-flex align-items-center">
                                    <h5 class="title mb-0">Prepare Applications</h5>
                                </div>
                                <div class="rightSide">
                                </div>
                            </div>
                            <div class="applyStepAccordianBody">
                            </div>
                        </div>
                        <div class="applyStepAccordianItem disable ">
                            <div class="applyStepAccordianHeader d-flex justify-content-between align-items-center">
                                <div class="leftSide d-flex align-items-center">
                                    <h5 class="title mb-0">Get Result</h5>
                                </div>
                                <div class="rightSide">
                                </div>
                            </div>
                            <div class="applyStepAccordianBody">
                            </div>
                        </div>
                        <div class="applyStepAccordianItem disable ">
                            <div class="applyStepAccordianHeader d-flex justify-content-between align-items-center">
                                <div class="leftSide d-flex align-items-center">
                                    <h5 class="title mb-0">Finalize Visa & Admission</h5>
                                </div>
                                <div class="rightSide">
                                </div>
                            </div>
                            <div class="applyStepAccordianBody">
                            </div>
                        </div>
                        <div class="applyStepAccordianItem disable ">
                            <div class="applyStepAccordianHeader d-flex justify-content-between align-items-center">
                                <div class="leftSide d-flex align-items-center">
                                    <h5 class="title mb-0">Ready to Enroll</h5>
                                </div>
                                <div class="rightSide">
                                </div>
                            </div>
                            <div class="applyStepAccordianBody">
                            </div>
                        </div>
                        <div class="applyStepAccordianItem disable ">
                            <div class="applyStepAccordianHeader d-flex justify-content-between align-items-center">
                                <div class="leftSide d-flex align-items-center">
                                    <h5 class="title mb-0">Enrollment Confirmed</h5>
                                </div>
                                <div class="rightSide">
                                </div>
                            </div>
                            <div class="applyStepAccordianBody">
                            </div>
                        </div>




                    </div>
                </div>
            </div>

            <div class="highlightbanneSec mb-5">
                <img src="{{ asset('/') }}assets/images/addBanner.svg" class="img-fluid w-100" alt="">
            </div>

        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('/') }}assets/js/student-question.js"></script>
    <script>
        var count = 0;
        var inputArray = [];
        var test = new Array();
        $(document).ready(function() {
            $("#preference_" + count).show();
            // $("#preference_1").hide();
            for (let index = 1; index <= 13; index++) {
                $("#preference_" + index).hide();
            }
            $('.applyStepBtnNxt').click(function() {
                var test = new Array();
                if (count == 0) {
                    $("#preference_" + count).hide();
                } else {
                    $("#preference_" + count).hide();
                }
                var inVal = $("input[name='question_" + count + "']").val();
                if ($("input[name='ans_" + count + "']").length > 0) {
                    $("input[name='ans_" + count + "']:checked").each(function() {
                        test.push($(this).val());
                    });
                } else {

                    test.push($("input[name='ans_" + count + "']").val());
                }


                count = count + 1;

                // console.log('input', inVal);
                // console.log('userAns', test);

                inputArray.push({
                    question: inVal,
                    answer: test
                });
                // ajaxSubmit(inputArray)
                // console.log(inputArray);
                $("#preference_" + count).show();

                // if (count == 13) {
                //     ajaxSubmit(inputArray)
                // }



            })

            $(".qaButtonSave").on('click', function() {

                ajaxSubmit(inputArray)
            })
        })

        function ajaxSubmit(inputArray) {
            // console.log(inputArray);
            // return
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            // e.preventDefault();

            $.ajax({
                method: 'POST',
                url: "{{ route('student.question.store') }}",
                data: {
                    data: inputArray
                },
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    $("#lastStepModal").modal('hide');
                    location.reload(true);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    </script>
@endpush
