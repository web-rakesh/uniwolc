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
                                    <h5 class="card-title">Education Partner Details</h5>
                                </div>
                                <div class="col-3">
                                    <a href="{{ URL::previous() }}" class="btn btn-primary">Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-2 "> <strong> School Name:</strong>
                                {{ $educationPartner->school_name ?? '' }}</p>
                            <p class="card-text mb-2 "><strong>Name:</strong>
                                {{ $educationPartner->name ?? '' }}</p>
                            <p class="card-text mb-2 "><strong>Email:</strong>
                                {{ $educationPartner->email ?? '' }}</p>
                            <p class="card-text mb-2 "><strong>Phone Number:</strong>
                                {{ '+' . $educationPartner->phone_code . $educationPartner->phone_number ?? '' }}</p>
                            <p class="card-text mb-2 "><strong>Contact Title:</strong>
                                {{ $educationPartner->contact_title ?? '' }}</p>
                            <p class="card-text mb-2 "><strong>Apply:</strong>
                                {{ $educationPartner->is_apply == 'on' ? 'Applyed' : 'N/A' }}</p>
                            <p class="card-text mb-2 "><strong>Refer Name:</strong>
                                {{ $educationPartner->refer_name }}</p>
                            <p class="card-text mb-2 "><strong>Refer Email:</strong>
                                {{ $educationPartner->refer_email }}</p>
                            <p class="card-text mb-2 "><strong>Comment:</strong>
                                {{ $educationPartner->comment }}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
