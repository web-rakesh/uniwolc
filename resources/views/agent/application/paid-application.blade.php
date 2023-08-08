@extends('agent.layouts.layout')
@section('content')
    <div class="dashboardDtlsAreainner">
        <div class="applicationSecArea">
            <section class="applicationSec mb-4 paid">
                <div class="dashboardCard">
                    <div class="dashboardCardHeader">
                        <div class="headerTitle">
                            <h5 class="title mb-0">
                                <span class="icon me-3"><i class="fa-regular fa-check"></i></span>
                                <span class="txt">No. of Applications</span>
                            </h5>
                        </div>
                    </div>
                    {{-- <div class="dashboardCardHeader">
                        <div class="headerTitle">
                            <h5 class="title mb-0">
                                <span class="icon me-3"><i class="fa-regular fa-cart-shopping"></i></span>
                                <span class="txt">Unpaid Applications</span>
                            </h5>
                        </div>
                    </div> --}}
                    <div class="dashboardCardBody">

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
                            @forelse ($applyProgramPaid as $key => $item)
                                <div class="dasboardAppHeader dasboardAppBody">
                                    <div class="leftPart">
                                        <div class="dasboardAppHeaderInfo">
                                            <div class="checkBoxarea">
                                                <div class="mdCheckbox">
                                                    #
                                                    {{-- <input id="application{{ $key }}" type="checkbox"
                                                        data-id="{{ $item->id }}"
                                                        data-number="{{ $item->application_number }}" name="application_fee"
                                                        value="{{ $item->fees }}" />
                                                    <label for="application{{ $key }}"></label> --}}
                                                </div>
                                            </div>
                                            <div>
                                                <div class="status" data-title="status">
                                                    <div class="icon">
                                                        <i class="fa-regular fa-cart-shopping"></i>
                                                    </div>
                                                    @if ($item->status == 1)
                                                        <div class="content">Payment Done</div>
                                                    @else
                                                        <div class="content">Payment Pending</div>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="appId" data-title="App #">
                                                <div class="appIdtxt">{{ $item->application_number }}</div>
                                            </div>
                                            <div class="thumanil" data-title="School">
                                                <a href="#">
                                                    <span class="thumanilinner">
                                                        <img src="assets/images/University_of_Birmingham_Logo.png"
                                                            class="img-fluid" alt="" style="height: 3.125rem" />
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="program" data-title="Program">
                                                <a target="_blank"
                                                    href="{{ route('agent.program.detail', $item->getProgram->slug) }}">{{ $item->program_title }}</a>
                                            </div>
                                            <div class="eslStartDate" data-title="ESL Start Date">
                                                <div class="hd">ESL</div>
                                                <div class="txt"></div>
                                                <div class="">
                                                    <select class="form-control" aria-label="Disabled select example"
                                                        disabled>
                                                        <option>NA</option>
                                                        <option>NA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="eslStartDate startDate" data-title="Start Date">
                                                <div class="hd">Academic</div>
                                                <div class="txt">Open Now</div>
                                                <div class="">
                                                    <select class="form-control">
                                                        <option>2023-Sep</option>
                                                        <option>2024-Sep</option>
                                                    </select>
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
                                                <a href="{{ route('agent.program.print', $item->getProgram->slug) }}"
                                                    target="_blank">
                                                    <div class="appNoteBox">
                                                        <div class="appNoteBoxinner">
                                                            <span class="fa-light fa-note-sticky icon"></span>
                                                            <div class="number">0</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        {{-- <div class="ml-3 viewBtnDiv">
                                            <a href="{{ route('student.application.fillup', $item->id) }}"
                                                class="btn viewBtn">
                                                <span class="icon"><i
                                                        class="fa-regular fa-up-right-from-square"></i></span>
                                                <span class="txt">FillUp</span>
                                            </a>
                                        </div> --}}
                                        <div class="ml-3 deleteBtnDiv">


                                            {{-- <form action="{{ route('student.application.destroy', $item->id) }}"
                                                method="POST" class="delete_form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="deleteBtn">
                                                    <span class="icon"><i class="fa-regular fa-trash-can"></i></span>
                                                </button>

                                            </form> --}}
                                        </div>
                                    </div>
                                </div>

                            @empty
                                <div>
                                    <h3 class="text-center">No Application Found</h3>
                                </div>
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

                {{-- <div class="d-flex justify-content-end applicationBtnArea">
                    <a href="{{ route('student.programs') }}" class="btn btn1 mr-2">
                        <span class="txt">Find More Program</span>
                    </a>
                    <button class="btn btn2" id="pay_for_application" disabled>

                        <span class="icon"></span>
                        <span class="txt">Pay For Application</span>

                    </button>
                </div> --}}
            </section>


        </div>
    </div>
@endsection
