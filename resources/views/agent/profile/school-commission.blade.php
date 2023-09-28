@extends('agent.layouts.layout')
@section('content')
    <section class="dashboardPgaesSec bg-white">
        <div class="container rounded">
            <div class="dashboardPgaesSecinner">
                <div class="row rowBox">
                    <div class="col-md-3 columnBox border-right dasboardLeftSideBar">
                        <div class="dasboardLeftSideBarinner">
                            <div class="d-flex flex-column align-items-center text-center userProfileArea">
                                <div class="userProfileThumnail">
                                    <img class="rounded-circle" width=""
                                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                </div>
                                <div class="userProfileInfo">
                                    <p class="userName font-weight-bold mb-0">{{ auth()->user()->name }}</p>
                                    <p class="text text-black-50 mb-0">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                            <div class="dasboardLeftSideBarMenuArea">
                                <ul class="nav">
                                    <li class="nav-item ">
                                        <a class="nav-link"
                                            href="{{ route('agent.general.details', auth()->user()->id) }}"><span
                                                class="icon"><i class="fa-regular fa-address-card"></i></span> <span
                                                class="txt">General Info</span></a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link"
                                            href="{{ route('agent.bank.details', auth()->user()->id) }}"><span
                                                class="icon"><i class="fa-regular fa-graduation-cap"></i></span> <span
                                                class="txt">Banking</span></a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link"
                                            href="{{ route('agent.school.commission', auth()->user()->id) }}"><span
                                                class="icon"><i class="fa-regular fa-rectangle-list"></i></span> <span
                                                class="txt">School Commissions</span> </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('agent.commission.policy', auth()->user()->id) }}"><span
                                                class="icon"><i class="fa-regular fa-id-card-clip"></i></span> <span
                                                class="txt">Commission Policy</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('agent.manage.staff', auth()->user()->id) }}"><span
                                                class="icon"><i class="fa-regular fa-id-card-clip"></i></span> <span
                                                class="txt">Manage Staff</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 columnBox border-right dasboardrightPart">
                        <div class="dasboardrightPartWrapper">

                            <h4 class="card-title text-center1 mb-0"> School Commissions</h4>
                            <hr>
                            <div>
                                <span> School Commissions </span>
                            </div>

                            <div
                                class="MuiPaper-root MuiCard-root sc-himrzO hnFvvQ sc-gXmSlM eJUtPr MuiPaper-elevation0 MuiPaper-rounded">
                                <div class="sc-ciZhAO ajEhN">
                                    <div class="sc-jdAMXn wZoGH"><svg width="24" height="24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11 17h2v-6h-2v6zm1-15C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zM11 9h2V7h-2v2z"
                                                fill="#F0C"></path>
                                        </svg></div>
                                    <div class="sc-cCsOjp eEoMwY">
                                        <p class="MuiTypography-root sc-iqcoie iwIUbr MuiTypography-body1">
                                        <div>IMPORTANT DISCLAIMER/NOTICE</div>
                                        <div>The Commission viewable here is a high-level estimate of what may be receivable
                                            by you upon a school confirming successful full-time enrollment. The estimate
                                            uses the gross tuition amount posted on the school program page; however, note
                                            that the actual Commission you may receive is based on a final determination
                                            resulting from ApplyBoard's agreement with the school, the net amount payable to
                                            ApplyBoard after deducting ancillary fees, scholarships and/or other
                                            non-commissionable fees, and is subject to several variables relevant to each
                                            student, such as ESL courses, nationality, the volume of credits/courses,
                                            transfer policy (if any), agent change (if any) and the term and/or program. For
                                            further specific commission details, consult each student's ApplyBoard
                                            application page, specifically the Notes tab.</div>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <div>
                                    <div
                                        class="MuiPaper-root MuiCard-root sc-himrzO hnFvvQ sc-gXmSlM eQpqQq MuiPaper-elevation0 MuiPaper-rounded">
                                        <div class="sc-ciZhAO ajEhN">
                                            <div class="sc-jdAMXn dkuWDt"><svg width="24" height="24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.27 2.994c.77-1.33 2.69-1.33 3.46 0l9.266 16.004c.772 1.333-.19 3.002-1.73 3.002H2.733c-1.54 0-2.502-1.669-1.73-3.002l9.265-16.004zM21.264 20L12 3.996 2.734 20h18.532z"
                                                        fill="current"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M13 18h-2v-2h2v2zM13 14h-2V9h2v5z" fill="current"></path>
                                                </svg></div>
                                            <div class="sc-cCsOjp eEoMwY">
                                                <p class="MuiTypography-root sc-iqcoie iwIUbr MuiTypography-body1">The
                                                    information that you see reflected in the table assumes a commission
                                                    agreement of 75%. Please refer to the <b><a
                                                            class="MuiTypography-root MuiLink-root MuiLink-underlineHover MuiTypography-colorInherit"
                                                            href="/profile#tab-commission-policy" target="_blank"
                                                            rel="noopener">commissions policy</a></b> tab to see your
                                                    specific agreement.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row p-4">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th> School Name </th>
                                            <th> Level If Applicable </th>
                                            <th> Payment Type </th>
                                            <th> Min @ 75% </th>
                                            <th> Max @ 75% </th>
                                            <th> Tax Type and % </th>
                                            <th> Variables Factors </th>
                                            <th> Installment Pay Out </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($commissions ?? [] as $key => $commission)
                                            <tr class="table_item">
                                                <td data-title="Label"> {{ $commission->school->university_name }}</td>
                                                <td data-title="Applicable">
                                                    {{ $commission->applicable ?? '-' }}
                                                </td>
                                                <td data-title="Payment Type"> {{ $commission->payment_type ?? '-' }}</td>
                                                <td data-title="Min"> {{ $commission->min ?? '-' }}</td>
                                                <td data-title="Max"> {{ $commission->min ?? '-' }}</td>
                                                <td data-title="Tax Type Percentage">
                                                    {{ $commission->tax_type_percentage ?? '-' }}</td>
                                                <td data-title="Variable Factor"> {{ $commission->variable_factor ?? '-' }}
                                                </td>
                                                <td data-title="Installment Pay Out">
                                                    {{ $commission->installment_pay_out ?? '-' }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No Sub Category</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
