@extends('students.layouts.layout')
@section('content')
    <div class="dashboardDtlsAreainner">
        <div class="applicationSecArea">
            <section class="applicationSec mb-4">
                <div class="dashboardCard">
                    <div class="dashboardCardHeader">
                        <div class="headerTitle">
                            <h5 class="title mb-0">
                                <span class="icon me-3"><i class="fa-regular fa-cart-shopping"></i></span>
                                <span class="txt">Unpaid Applications</span>
                            </h5>
                        </div>
                    </div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="dashboardCardBody">
                        <div class="alert alert-danger mb-4">
                            <div class="d-flex">
                                <div class="icon mr-3">
                                    <i class="fa-regular fa-circle-info"></i>
                                </div>
                                <div class="cont">
                                    The student's profile is incomplete and the system is
                                    not able to determine eligibility or calculate correct
                                    administration fees due to incomplete information. It
                                    is highly advised that you complete the profile before
                                    submitting applications.
                                </div>
                            </div>
                        </div>
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        <div class="applicationDtlsBox">
                            <div class="dasboardAppHeader">
                                <div class="leftPart">
                                    <div class="dasboardAppHeaderInfo">
                                        <div class="checkBoxarea">
                                            {{-- <div class="mdCheckbox">
                                                <input id="i1" type="checkbox" />
                                                <label for="i1"></label>
                                            </div> --}}
                                        </div>
                                        <span>Status</span>
                                        <span>App #</span>
                                        <span>School</span>
                                        <span>Program</span>
                                        <span>ESL Start Date</span>
                                        <span>Start Date</span>
                                        <span>Applied Date</span>
                                        <span>Fees</span>
                                    </div>
                                </div>
                                <div class="rightpart"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dashboardCard">
                    <div class="dashboardCardBody">
                        <div class="applicationDtlsBox">
                            {{-- {{ $applyPrograms }} --}}
                            @forelse ($applyPrograms as $key => $item)
                                <div class="dasboardAppHeader dasboardAppBody">
                                    <div class="leftPart">
                                        <div class="dasboardAppHeaderInfo">
                                            <div class="checkBoxarea">
                                                {{-- <div class="mdCheckbox">
                                                    <input id="application{{ $key }}" type="checkbox"
                                                        data-id="{{ $item->id }}"
                                                        data-number="{{ $item->application_number }}" name="application_fee"
                                                        value="{{ $item->fees }}" />
                                                    <label for="application{{ $key }}"></label>
                                                </div> --}}
                                            </div>
                                            <div>
                                                <div class="status" data-title="status">
                                                    <div class="icon">
                                                        <i class="fa-regular fa-cart-shopping"></i>
                                                    </div>
                                                    <div class="content">Payment Pending</div>

                                                </div>
                                            </div>
                                            <div class="appId" data-title="App #">
                                                <div class="appIdtxt">{{ $item->application_number }}</div>
                                            </div>
                                            <div class="thumanil" data-title="School">
                                                <a href="javascript:;">
                                                    <span class="thumanilinner">
                                                        <img src="{{ $item->getUniversity->university_gallery_url }}"
                                                            alt="no image" class="img-fluid" style="height: 50px" />
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="program" data-title="Program">
                                                <a
                                                    href="{{ route('student.program.detail', $item->getProgram->slug) }}">{{ $item->getProgram->program_title }}</a>
                                            </div>
                                            <div class="eslStartDate" data-title="ESL Start Date">
                                                <div class="hd">ESL</div>
                                                <div class="txt"></div>
                                                <div class="">
                                                    <select class="form-control" id="els_intake"
                                                        data-program="{{ $item->program_id }}">
                                                        @foreach ($item->intake_date ? els_intake($item->intake_date->intake_date) : els_intake() ?? [] as $els_intake)
                                                            @foreach ($els_intake as $i => $value)
                                                                <option value="{{ $i }}"
                                                                    {{ $i == date('Y-m-d', strtotime($item->esl_start_date)) ? 'selected' : '' }}>
                                                                    {{ $value }}
                                                                </option>
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="eslStartDate startDate" data-title="Start Date">
                                                <div class="hd">Academic</div>
                                                <div class="txt">Likely Open</div>
                                                <div class="">
                                                    {{-- {{ @$item->start_date ? date('M d, Y', strtotime($item->start_date)) : '--' }} --}}
                                                    <select class="form-control program_intake"
                                                        data-program="{{ $item->program_id }}">
                                                        @foreach ($item->getProgram->intake as $intake)
                                                            <option value="{{ $intake->id }}"
                                                                {{ $intake->id == $item->intake ? 'selected' : '' }}>
                                                                {{ date('Y-M', strtotime($intake->intake_date)) }}</option>
                                                        @endforeach
                                                        {{-- <option>2024-Sep</option> --}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="" data-title="Start Date">

                                                <span
                                                    class="appIdtxt">{{ date('M d, Y', strtotime($item->created_at)) }}</span>
                                            </div>
                                            <div class="appFees" data-title="Application Fees">
                                                <div class="appFeesinner">
                                                    <div class="ttl">Application Fee</div>

                                                    @if ($item->fees == 0)
                                                        <div class="amt">Free</div>
                                                    @else
                                                        <div class="amt">
                                                            {{ get_currency($item->getUniversity->country) . number_format($item->fees, 2) }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rightpart">
                                        {{-- <div class="appNote">
                                            <div class="appNoteinner">
                                                <a href="#">
                                                    <div class="appNoteBox">
                                                        <div class="appNoteBoxinner">
                                                            <span class="fa-light fa-note-sticky icon"></span>
                                                            <div class="number">0</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div> --}}
                                        <div class="ml-3 viewBtnDiv">
                                            @if ($item->application_status == 1)
                                                <div class="ml-3 viewBtnDiv">
                                                    <a href="{{ route('student.payment.confirm', ['ids' => $item->id]) }}"
                                                        class="btn viewBtn">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-up-right-from-square"></i></span>
                                                        <span class="txt">pay</span>
                                                    </a>
                                                </div>
                                            @else
                                                @if ($item->program_status != 1)
                                                    <a href="{{ route('student.application.fillup', $item->slug) }}"
                                                        target="_blank" class="btn viewBtn">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-up-right-from-square"></i></span>
                                                        <span class="txt">FillUp</span>
                                                    </a>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="ml-3 deleteBtnDiv">
                                            {{-- <a href="{{ route('student.application.destroy', $item->id) }}"
                                                class="deleteBtn">
                                                <span class="icon"><i class="fa-regular fa-trash-can"></i></span>
                                            </a> --}}

                                            <form action="{{ route('student.application.destroy', $item->id) }}"
                                                method="POST" class="delete_form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="deleteBtn">
                                                    <span class="icon"><i class="fa-regular fa-trash-can"></i></span>
                                                </button>
                                                {{-- <span class="icon"><i class="fa-regular fa-trash-can"></i></span> --}}

                                            </form>
                                        </div>
                                        <div class="ml-3 viewBtnDiv">
                                            @if ($item->program_status == 1)
                                                <span class="txt">accepted</span>
                                            @elseif ($item->program_status == 3)
                                                <span class="txt">rejected</span>
                                            @else
                                                <span class="txt">pending</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>

                {{-- <div class="dashboardCard">
                    <div class="dashboardCardBody">
                        <div class="dasboardAppHeader dasboardAppBody">
                            <div class="leftPart">
                                <div class="dasboardAppTotal" data-title="Total">
                                    <div class="dasboardAppTotalinner">
                                        <span class="ttl">Total</span>
                                        <span class="amt" id="totalAmount">£0.00 GBP</span>
                                    </div>
                                </div>
                            </div>
                            <div class="rightpart"></div>
                        </div>
                    </div>
                </div> --}}

                <div class="d-flex justify-content-end applicationBtnArea">
                    <a href="{{ route('student.programs') }}" class="btn btn1 mr-2">
                        <span class="txt">Find More Program</span>
                    </a>
                    {{-- <button class="btn btn2" id="pay_for_application" disabled>
                        <span class="icon"></span>
                        <span class="txt">Pay For Application</span>
                    </button> --}}
                </div>
            </section>

            <section class="applicationSec paid">
                <div class="dashboardCard">
                    <div class="dashboardCardHeader">
                        <div class="headerTitle">
                            <h5 class="title mb-0">
                                <span class="icon me-3"><i class="fa-regular fa-check"></i></span>
                                <span class="txt">Paid Applications</span>
                            </h5>
                        </div>
                    </div>
                    <div class="dashboardCardBody">
                        <div class="applicationDtlsBox">
                            <div class="dasboardAppHeader">
                                <div class="leftPart">
                                    <div class="dasboardAppHeaderInfo">
                                        <div class="checkBoxarea">
                                            <div class="mdCheckbox">
                                                {{-- <input id="i3" type="checkbox" />
                                                <label for="i3"></label> --}}
                                            </div>
                                        </div>
                                        <span>Status</span>
                                        <span>App #</span>
                                        <span>School</span>
                                        <span>Program</span>
                                        <span>ESL Start Date</span>
                                        <span>Start Date</span>
                                        <span>Applied Date</span>
                                        <span>Fees</span>
                                    </div>
                                </div>
                                <div class="rightpart">
                                    <span>Program Status</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    {{-- <p>You have no paid applications.</p> --}}
                    @forelse ($applyProgramPaid as $key => $paidItem)
                        <div class="dasboardAppHeader dasboardAppBody">
                            <div class="leftPart">
                                <div class="dasboardAppHeaderInfo">
                                    <div class="checkBoxarea">
                                        {{-- <div class="mdCheckbox">
                                            <input id="applicationPaid{{ $key }}" type="checkbox"
                                                data-id="{{ $item->id }}"
                                                data-number="{{ $item->application_number }}" name="applicationPaid"
                                                value="{{ $item->fees }}" />
                                            <label for="application{{ $key }}"></label>
                                        </div> --}}
                                    </div>
                                    <div>
                                        <div class="status" data-title="status">
                                            <div class="icon">
                                                <i class="fa-regular fa-cart-shopping"></i>
                                            </div>
                                            <div class="content">Payment Paid</div>

                                        </div>
                                    </div>
                                    <div class="appId" data-title="App #">
                                        <div class="appIdtxt">{{ $paidItem->application_number }}</div>
                                    </div>
                                    <div class="thumanil" data-title="School">
                                        <a href="#">
                                            <span class="thumanilinner">
                                                <img src="{{ $paidItem->getUniversity->university_gallery_url }}"
                                                    alt="no image" class="img-fluid" style="height: 50px" />
                                            </span>
                                        </a>
                                    </div>
                                    <div class="program" data-title="Program">
                                        <a
                                            href="{{ route('student.program.detail', $paidItem->getProgram->slug) }}">{{ $paidItem->program_title }}</a>
                                    </div>
                                    <div class="eslStartDate" data-title="ESL Start Date">
                                        <div class="hd">ESL</div>
                                        <div class="txt"></div>
                                        <div class="">
                                            {{ date('M d, Y', strtotime($paidItem->esl_start_date)) }}
                                        </div>
                                    </div>
                                    <div class="eslStartDate startDate" data-title="Start Date">
                                        <div class="hd">Academic</div>
                                        <div class="txt">Open Now</div>
                                        <div class="">
                                            {{ @$paidItem->intake_date->intake_date ? date('M d, Y', strtotime($paidItem->intake_date->intake_date)) : '--' }}
                                            {{-- <select class="form-control">
                                                <option>2023-Sep</option>
                                                <option>2024-Sep</option>
                                            </select> --}}
                                        </div>
                                    </div>
                                    <div class="" data-title="Start Date">
                                        <span
                                            class="appIdtxt">{{ date('M d, Y', strtotime($paidItem->created_at)) }}</span>
                                    </div>
                                    <div class="appFees" data-title="Application Fees">
                                        <div class="appFeesinner">
                                            <div class="ttl">Application Fee</div>

                                            @if ($paidItem->fees == 0)
                                                <div class="amt">Free</div>
                                            @else
                                                <div class="amt">
                                                    {{ get_currency($paidItem->getUniversity->country) . number_format($paidItem->fees, 2) }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rightpart">
                                <div class="appNote">
                                    <div class="appNoteinner">
                                        @if ($paidItem->program_status == 1)
                                            <span class="badge badge-success">Success</span>
                                        @elseif($paidItem->program_status == 3)
                                            <span data-program="{{ $paidItem->id }}"
                                                class="badge badge-danger program-reject-modal">Reject</span>
                                        @else
                                            <span class="badge badge-default">pending</span>
                                        @endif
                                    </div>
                                    <div class="appNoteinner">
                                        <a href="{{ route('student.program.print', $paidItem->slug) }}">
                                            <div class="appNoteBox">
                                                <div class="appNoteBoxinner">
                                                    <span class="fa-light fa-note-sticky icon"></span>
                                                    <div class="number"></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                    @endforelse
                </div>
            </section>
        </div>
        <!-- The Modal -->
        <div class="modal" id="reject-modal">
            <div class="modal-dialog appModalDiolog">
                <div class="modal-content appModalContent">

                    <!-- Modal Header -->
                    <div class="modal-header appModalHeader">
                        <h4 class="modal-title">Rejected Note</h4>
                        <button type="button" class="close" data-dismiss="modal"><i
                                class="fa-regular fa-xmark"></i></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body appModalBody">

                        <div class="form-group">
                            <textarea type="text" readonly class="form-control" id="program-reject-note" placeholder=""></textarea>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })

        $(".program_intake").on('change', function() {

            $.ajax({
                type: 'POST',
                url: "{{ route('intake.program.update') }}",
                data: {
                    intake_id: $(this).val(),
                    program_id: $(this).data('program')
                },
                success: function(response) {
                    $("#els_intake").html(response.els_intake)
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.success,
                    });
                },
                error: function(xhr) {

                }
            });
        })

        $("#els_intake").on('change', function() {
            // alert($(this).data('program'));
            // return
            $.ajax({
                type: 'POST',
                url: "{{ route('els_intake.program.update') }}",
                data: {
                    els_intake: $(this).val(),
                    program_id: $(this).data('program')
                },
                success: function(response) {
                    // $("#els_intake").html(response.els_intake)
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.success,
                    });
                },
                error: function(xhr) {

                }
            });
        })

        $(document).on('click', '.program-reject-modal', function() {

            $.ajax({
                type: 'POST',
                url: "{{ route('program.reject') }}",
                data: {
                    program_id: $(this).data('program')
                },
                success: function(response) {
                    $("#reject-modal").modal('show');
                    $("#program-reject-note").val(response.rejectNote.remark);

                },
                error: function(xhr) {

                }
            });
        })
    </script>
@endpush
