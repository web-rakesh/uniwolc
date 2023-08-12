@extends('admin.layouts.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="page-header">
                {{-- <h3 class="page-title"> Blogs </h3> --}}
                <nav aria-label="breadcrumb">
                    {{-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol> --}}
                </nav>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-9">
                                    <h5 class="card-title">Agent Commission Details</h5>
                                </div>
                                <div class="col-3">
                                    <a href="{{ URL::previous() }}" class="btn btn-primary">Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-2 "> <strong> Agent:</strong>
                                {{ $agentCommission->agent->name ?? '' }}</p>
                            <p class="card-text mb-2 "><strong>Student:</strong>
                                {{ $agentCommission->student->FullName ?? '' }}</p>
                            <p class="card-text mb-2 "><strong>Program:</strong>
                                {{ $agentCommission->program->program_title ?? '' }}</p>

                            <p class="card-text"><strong>University Name:</strong>
                                {{ $agentCommission->program->university->university_name }}</p>
                            <p class="card-text"><strong>University Country:</strong>
                                {{ get_country($agentCommission->program->university->country) ?? '' }}</p>

                            <p class="card-text"><strong>Commission Rate:</strong> {{ $agentCommission->commission }}%</p>
                            <p class="card-text"><strong>Commission Amount:</strong>
                                {{ get_currency($agentCommission->country_id) . number_format($agentCommission->amount, 2) ?? '' }}
                            </p>

                            <p class="card-text"><strong>Status:</strong>
                                {{ $agentCommission->status == 1 ? 'Ready' : 'No' }}</p>

                            <p class="card-text"><strong>Payment Status: </strong>
                                {{ $agentCommission->payment_status == 1 ? 'Paid' : 'Unpaid' }}</p>
                            <p class="card-text"><strong>Payment Date</strong>
                                {{ $agentCommission->payment_date ? date('M d, Y', strtotime($agentCommission->payment_date)) : '' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
