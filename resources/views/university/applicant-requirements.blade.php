@extends('university.layouts.layout')
@section('content')
    <div class="dashboardInnerWrapperinner py-2">
        <div class="dashboardHeaderSec">
            <h4 class="title">Applicant Requirements</h4>
        </div>
        <div class="dashboardPanel">
            <div class="dashboardPanelBody">
                <div class="applicationSearchArea mt-2">
                    <div class="applicationSearchAreainner">
                        <div class="applicationSearchformArea">
                            <div class="row rowBox">

                                {{-- <div class="col-lg-2 col-md-2 col-sm-6 col-12 columnBox">
                                    <a href="{{ route('university.application-requirement.create') }}" type="button"
                                        class="btn btn-primary">Add
                                        Requirement</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboardPanel">
            <div class="dashboardPanelBody">
                <div class="dashboardTableArea table-responsive">

                    <div class="row rowBox">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Application Form</h5>
                                    <p class="card-text">Please fill out attached student Written Application Form document
                                        and upload it.</p>
                                    <a href="{{ route('university.application-requirement.create', ['data' => 'Application Form']) }}"
                                        class="btn btn-primary">Add</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Copy of Passport</h5>
                                    <p class="card-text">Please attach a copy of applicant's passport - pages that include
                                        applicant's identity information:</p>
                                    <a href="{{ route('university.application-requirement.create', ['data' => 'Copy of Passport']) }}"
                                        class="btn btn-primary">Add</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Custodianship Declaration</h5>
                                    <p class="card-text">Please complete the attached Custodianship Declaration.</p>
                                    <a href="{{ route('university.application-requirement.create', ['data' => 'Custodianship Declaration']) }}"
                                        class="btn btn-primary">Add</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Proof of Immunization</h5>
                                    <p class="card-text">Please fill out attached Proof of Immunization document.</p>
                                    <a href="{{ route('university.application-requirement.create', ['data' => 'Proof of Immunization']) }}"
                                        class="btn btn-primary">Add</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Student Participation Agreement (without homestay)</h5>
                                    <p class="card-text">Please have the applicant and their parents/legal.</p>
                                    <a href="{{ route('university.application-requirement.create', ['data' => 'Student Participation Agreement']) }}"
                                        class="btn btn-primary">Add</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Student Self-Introduction Form</h5>
                                    <p class="card-text">Please fill out attached student self introduction .</p>
                                    <a href="{{ route('university.application-requirement.create', ['data' => 'Student Self-Introduction Form']) }}"
                                        class="btn btn-primary">Add</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
