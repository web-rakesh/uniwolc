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
                                        {{-- <span>ESL Start Date</span> --}}
                                        <span>Start Date</span>
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
                                                <a href="#">
                                                    <span class="thumanilinner">
                                                        <img src="assets/images/University_of_Birmingham_Logo.png"
                                                            class="img-fluid" alt="" style="height: 50px" />
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="program" data-title="Program">
                                                <a
                                                    href="{{ route('student.program.detail', $item->getProgram->slug) }}">{{ $item->getProgram->program_title }}</a>
                                            </div>
                                            {{-- <div class="eslStartDate" data-title="ESL Start Date">
                                                <div class="hd">ESL</div>
                                                <div class="txt"></div>
                                                <div class="">
                                                    <select class="form-control" aria-label="Disabled select example"
                                                        disabled>
                                                        <option>NA</option>
                                                        <option>NA</option>
                                                    </select>
                                                </div>
                                            </div> --}}
                                            <div class="eslStartDate startDate" data-title="Start Date">
                                                <div class="hd">Academic</div>
                                                <div class="txt">Open Now</div>
                                                <div class="">
                                                    {{ @$item->start_date ? date('M d, Y', strtotime($item->start_date)) : '--' }}
                                                    {{-- <select class="form-control">
                                                        <option>2023-Sep</option>
                                                        <option>2024-Sep</option>
                                                    </select> --}}
                                                </div>
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
                                            @if ($item->application_status == 2)
                                                <a href="{{ route('student.application.fillup', $item->id) }}"
                                                    class="btn viewBtn">
                                                    <span class="icon"><i
                                                            class="fa-regular fa-up-right-from-square"></i></span>
                                                    <span class="txt">View</span>
                                                </a>
                                            @else
                                                @if ($item->program_status !== 3)
                                                    <a href="{{ route('student.application.fillup', $item->slug) }}"
                                                        class="btn viewBtn">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-up-right-from-square"></i></span>
                                                        <span class="txt">FillUp</span>
                                                    </a>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="ml-3 viewBtnDiv">
                                            <a href="{{ route('student.payment.confirm', ['ids' => $item->id]) }}"
                                                class="btn viewBtn">
                                                <span class="icon"><i
                                                        class="fa-regular fa-up-right-from-square"></i></span>
                                                <span class="txt">pay</span>
                                            </a>
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
                                        {{-- <span>ESL Start Date</span> --}}
                                        <span>Start Date</span>
                                        <span>Fees</span>
                                    </div>
                                </div>
                                <div class="rightpart"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    {{-- <p>You have no paid applications.</p> --}}
                    @forelse ($applyProgramPaid as $key => $item)
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
                                        <div class="appIdtxt">{{ $item->application_number }}</div>
                                    </div>
                                    <div class="thumanil" data-title="School">
                                        <a href="#">
                                            <span class="thumanilinner">
                                                <img src="assets/images/University_of_Birmingham_Logo.png"
                                                    class="img-fluid" alt="" style="height: 50px" />
                                            </span>
                                        </a>
                                    </div>
                                    <div class="program" data-title="Program">
                                        <a
                                            href="{{ route('student.program.detail', $item->getProgram->slug) }}">{{ $item->program_title }}</a>
                                    </div>
                                    {{-- <div class="eslStartDate" data-title="ESL Start Date">
                                        <div class="hd">ESL</div>
                                        <div class="txt"></div>
                                        <div class="">
                                            <select class="form-control" aria-label="Disabled select example" disabled>
                                                <option>NA</option>
                                                <option>NA</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="eslStartDate startDate" data-title="Start Date">
                                        <div class="hd">Academic</div>
                                        <div class="txt">Open Now</div>
                                        <div class="">
                                            {{ @$item->start_date ? date('M d, Y', strtotime($item->start_date)) : '--' }}
                                            {{-- <select class="form-control">
                                                <option>2023-Sep</option>
                                                <option>2024-Sep</option>
                                            </select> --}}
                                        </div>
                                    </div>
                                    <div class="appFees" data-title="Application Fees">
                                        <div class="appFeesinner">
                                            <div class="ttl">Application Fee</div>

                                            @if ($item->fees == 0)
                                                <div class="amt">Free</div>
                                            @else
                                                <div class="amt">{{ number_format($item->fees, 2) }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rightpart">
                                <div class="appNote">
                                    <div class="appNoteinner">
                                        <a href="{{ route('student.program.print', $item->slug) }}">
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
    </div>
@endsection
