@extends('admin.layouts.layout')
@push('css')
    <style>
        .card-ponter {
            cursor: pointer;
        }
    </style>
@endpush
@section('content')
    <div class="content-wrapper">

        <div class="content-block-sec">
            <div class="content-block-sectionHeading mb-3">
                <h3 class="mb-0 sectionHeadingTitle">Students Statics</h3>
            </div>
            <div class="content-block-secinner">

                <div class="row">
                    <div class="col-sm-3 mb-4 card-ponter" onclick=window.location='{{ route('admin.student') }}'>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Students</h4>
                                <h1 class="card-title mb-0">{{ $student }}</h1>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 mb-4 card-ponter" onclick=window.location='{{ route('admin.agent') }}'>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Agents</h4>
                                <h1 class="card-title mb-0">{{ $agent }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 mb-4 card-ponter" onclick=window.location='{{ route('admin.staff') }}'>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Staff</h4>
                                <h1 class="card-title mb-0">{{ $staff }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 mb-4 card-ponter" onclick=window.location='{{ route('admin.university') }}'>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Universities</h4>
                                <h1 class="card-title mb-0">{{ $university }}</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 mb-4 card-ponter"
                        onclick=window.location='{{ route('admin.university.course.view') }}'>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Program</h4>
                                <h1 class="card-title mb-0">{{ $program }}</h1>
                            </div>
                        </div>
                    </div>



                    <div class="col-sm-3 mb-4 card-ponter"
                        onclick=window.location='{{ route('admin.application.index') }}'>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total Application</h4>
                                <h1 class="card-title mb-0">{{ $applyProgram }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 mb-4 card-ponter"
                        onclick=window.location='{{ route('admin.application.accepted.application') }}'>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Approved Application</h4>
                                <h1 class="card-title mb-0">{{ $approvedApplication }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 mb-4 card-ponter"
                        onclick=window.location='{{ route('admin.application.accepted.rejected') }}'>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Rejected Application</h4>
                                <h1 class="card-title mb-0">{{ $blockApplication }}</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mb-4 card-ponter" onclick=window.location='{{ route('admin.transaction.all') }}'>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total Payment</h4>
                                <h1 class="card-title mb-0">{{ number_format($totalPayment, 2) }}</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Today Payment</h4>
                                <h1 class="card-title mb-0">{{ number_format($todayPayment, 2) }}</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mb-4">
                        <div class="card">
                            <div class="card-body card-ponter"
                                onclick=window.location='{{ route('admin.transaction.agent') }}'>
                                <h4 class="card-title">Total Commission Fees</h4>
                                <h1 class="card-title mb-0">{{ number_format($totalAgentFees, 2) }}</h1>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- <div class="col-sm-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Total Agent Payout</h4>
                        <h1 class="card-title mb-0">{{ number_format($totalAgentPayoutFees, 2) }}</h1>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
@endsection
