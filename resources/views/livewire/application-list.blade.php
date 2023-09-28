<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
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
                    @include('flash-messages')

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


                        <div class="applicationDtlsBox">
                            <div class="dasboardAppHeader">
                                <div class="leftPart">
                                    <div class="dasboardAppHeaderInfo">
                                        <div class="checkBoxarea">

                                        </div>
                                        <span>Status</span>
                                        <span>App #
                                            <input type="text" wire:model="appId" class="form-control"
                                                placeholder="Search" />
                                        </span>
                                        <span>Student Name
                                            <input type="text" wire:model="studentName" class="form-control"
                                                placeholder="Search" />
                                        </span>
                                        <span>School
                                            <input type="text" wire:model="schoolName" class="form-control"
                                                placeholder="Search" />
                                        </span>
                                        <span>Program
                                            <input type="text" wire:model="programName" class="form-control"
                                                placeholder="Search" />
                                        </span>
                                        <span>Applied Date
                                            <input type="date" wire:model="startDate" class="form-control"
                                                placeholder="Search" />
                                        </span>
                                        <span>Fees
                                            <input type="number" wire:model="programFees" min="0"
                                                class="form-control" placeholder="Search" />
                                        </span>
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

                            @forelse ($applyPrograms ?? [] as $key => $item)
                                <div class="dasboardAppHeader dasboardAppBody">
                                    <div class="leftPart">
                                        <div class="dasboardAppHeaderInfo">
                                            <div class="checkBoxarea">

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
                                            <div class="appId" data-title="App #">
                                                <div class="appIdtxt">{{ $item->getStudent->full_name }}</div>
                                            </div>
                                            <div class="thumanil" data-title="School">

                                                <a
                                                    href="{{ route('school.detail', ['id' => $item->getUniversity->id, 'slug' => $item->getUniversity->slug]) }}">
                                                    <span class="thumanilinner">
                                                        <img src="{{ $item->getUniversity->university_gallery_url }}"
                                                            class="img-fluid" alt="no image" style="height: 50px" />
                                                    </span>
                                                    <p>{{ $item->getUniversity->university_name }}</p>
                                                </a>
                                            </div>
                                            <div class="program" data-title="Program">
                                                @if (auth()->user()->type == 'agent')
                                                    <a
                                                        href="{{ route('agent.program.detail', $item->getProgram->slug) }}">{{ $item->getProgram->program_title }}</a>
                                                @elseif (auth()->user()->type == 'staff')
                                                    <a
                                                        href="{{ route('staff.program.detail', $item->getProgram->slug) }}">{{ $item->getProgram->program_title }}</a>
                                                @else
                                                    <a
                                                        href="{{ route('student.program.detail', $item->getProgram->slug) }}">{{ $item->getProgram->program_title }}</a>
                                                @endif
                                            </div>

                                            <div class="eslStartDate startDate" data-title="Start Date">
                                                {{-- <div class="hd">Academic</div>
                                                <div class="txt">Open Now</div> --}}
                                                <div class="">
                                                    {{  date('M d, Y', strtotime($item->created_at)) }}

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

                                        <div class="ml-3 viewBtnDiv">

                                            @if ($item->application_status == 1 && $item->program_status != 3 && $item->status != 2)
                                                @if (auth()->user()->type == 'agent')
                                                    <a href="{{ route('agent.application.fillup', $item->slug) }}"
                                                        class="btn viewBtn">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-up-right-from-square"></i></span>
                                                        <span class="txt">View</span>
                                                    </a>
                                                @elseif (auth()->user()->type == 'staff')
                                                    <a href="{{ route('staff.application.fillup', $item->slug) }}"
                                                        class="btn viewBtn">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-up-right-from-square"></i></span>
                                                        <span class="txt">View</span>
                                                    </a>
                                                @else
                                                    <a href="{{ route('student.application.fillup', $item->slug) }}"
                                                        class="btn viewBtn">
                                                        <span class="icon"><i
                                                                class="fa-regular fa-up-right-from-square"></i></span>
                                                        <span class="txt">View</span>
                                                    </a>
                                                @endif
                                            @else
                                                @if ($item->program_status == 2 || (1 && $item->status != 2))
                                                    @if (auth()->user()->type == 'agent')
                                                        <a href="{{ route('agent.application.fillup', $item->slug) }}"
                                                            class="btn viewBtn">
                                                            <span class="icon"><i
                                                                    class="fa-regular fa-up-right-from-square"></i></span>
                                                            <span class="txt">FillUp</span>
                                                        </a>
                                                    @elseif (auth()->user()->type == 'staff')
                                                        <a href="{{ route('staff.application.fillup', $item->slug) }}"
                                                            class="btn viewBtn">
                                                            <span class="icon"><i
                                                                    class="fa-regular fa-up-right-from-square"></i></span>
                                                            <span class="txt">FillUp</span>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('student.application.fillup', $item->slug) }}"
                                                            class="btn viewBtn">
                                                            <span class="icon"><i
                                                                    class="fa-regular fa-up-right-from-square"></i></span>
                                                            <span class="txt">FillUp</span>
                                                        </a>
                                                    @endif
                                                @endif
                                            @endif

                                        </div>
                                        @if ($item->status != 2)
                                            <div class="ml-3 viewBtnDiv">
                                                <a href="{{ route('agent.payment.confirm', ['ids' => $item->id]) }}"
                                                    class="btn viewBtn">
                                                    <span class="icon"><i
                                                            class="fa-regular fa-up-right-from-square"></i></span>
                                                    <span class="txt">pay</span>
                                                </a>
                                            </div>
                                        @endif
                                        {{-- <div class="ml-3 deleteBtnDiv">



                                            <form action="{{ route('student.application.destroy', $item->id) }}"
                                                method="POST" class="delete_form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="deleteBtn">
                                                    <span class="icon"><i
                                                            class="fa-regular fa-trash-can"></i></span>
                                                </button>

                                            </form>

                                        </div> --}}
                                        @if ($item->status == 2)
                                            <div class="rightpart">
                                                <div class="appNote">
                                                    <div class="appNoteinner">
                                                        @if (auth()->user()->type == 'agent')
                                                            <a href="{{ route('agent.program.print', $item->slug) }}"
                                                                target="_blank">
                                                                <div class="appNoteBox">
                                                                    <div class="appNoteBoxinner">
                                                                        <span
                                                                            class="fa-light fa-note-sticky icon"></span>
                                                                        <div class="number"></div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        @else
                                                            <a href="{{ route('staff.program.print', $item->slug) }}"
                                                                target="_blank">
                                                                <div class="appNoteBox">
                                                                    <div class="appNoteBoxinner">
                                                                        <span
                                                                            class="fa-light fa-note-sticky icon"></span>
                                                                        <div class="number"></div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

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
                                <div class="dasboardAppHeader dasboardAppBody">
                                    <div class="leftPart">
                                        No Program Found
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>



                <div class="d-flex justify-content-end applicationBtnArea">

                    @if (auth()->user()->type == 'agent')
                        <a href="{{ route('agent.program') }}" class="btn btn1 mr-2">
                            <span class="txt">Find More Program</span>
                        </a>
                    @elseif(auth()->user()->type == 'staff')
                        <a href="{{ route('staff.program') }}" class="btn btn1 mr-2">
                            <span class="txt">Find More Program</span>
                        </a>
                    @else
                        <a href="{{ route('student.programs') }}" class="btn btn1 mr-2">
                            <span class="txt">Find More Program</span>
                        </a>
                    @endif
                </div>
            </section>
            <div>
                {{ $applyPrograms->links() }}
            </div>

        </div>
    </div>
</div>
