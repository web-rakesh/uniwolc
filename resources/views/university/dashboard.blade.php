@extends('university.layouts.layout')
@section('content')
    <section class="dashboardPgaesSec bg-white">
        <div class="container rounded">
            <div class="dashboardPgaesSecinner">
                <div class="row rowBox">


                    <div class="col-sm-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total Programs</h4>
                                <h1 class="card-title mb-0">{{ $data['total_programs'] ?? 0 }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Today programs</h4>
                                <h1 class="card-title mb-0">{{ $data['today_programs'] ?? 0 }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total Applications</h4>
                                <h1 class="card-title mb-0">{{ $data['total_approved_applications'] ?? 0 }}</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Accepted Applicaton</h4>
                                <h1 class="card-title mb-0">{{ $data['total_rejected_applications'] ?? 0 }}</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Rejected Applicaton</h4>
                                <h1 class="card-title mb-0">{{ $data['total_pending_applications'] ?? 0 }}</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total Applicaton Fees</h4>
                                <h1 class="card-title mb-0">{{ number_format($data['total_application_fee'], 2) ?? 0 }}</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Today Applicaton Fees</h4>
                                <h1 class="card-title mb-0">{{ number_format($data['today_application_fee'], 2) ?? 0 }}</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total  Students</h4>
                                <h1 class="card-title mb-0">{{ $data['total_apply_student'] ?? 0 }}</h1>
                            </div>
                        </div>
                    </div>




                </div>
            </div>

        </div>
    </section>
@endsection
