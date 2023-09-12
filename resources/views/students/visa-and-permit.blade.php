@extends('students.layouts.layout')
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
                                        <a class="nav-link" href="{{ route('student.student-detail.index') }}"><span
                                                class="icon"><i class="fa-regular fa-address-card"></i></span> <span
                                                class="txt">General Info</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('student.education-summary.index') }}"><span
                                                class="icon"><i class="fa-regular fa-graduation-cap"></i></span> <span
                                                class="txt">Education History</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('student.test-score.index') }}"><span
                                                class="icon"><i class="fa-regular fa-rectangle-list"></i></span> <span
                                                class="txt">Test Score</span> </a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ route('student.visa-and-permit.index') }}"><span
                                                class="icon"><i class="fa-regular fa-id-card-clip"></i></span> <span
                                                class="txt">Visa
                                                &amp; Study Permit</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9 columnBox border-right dasboardrightPart">
                        <div class="dasboardrightPartWrapper">
                            <div class="card shadow1 p-3 py-5 mb-0 bg-white border-0 rounded dasboardrightPartWrapperinner">
                                <h4 class="card-title text-center1 mb-0"> Visa And Permit</h4>

                                <p class="text-muted">Please enter the information for the highest academic level that you
                                    have
                                    completed.</p>
                                <hr>
                                @include('flash-messages')
                                <div class="card-body p-0">
                                    <div class="pp-3a py-2">
                                        <form method="post" action="{{ route('student.visa-and-permit.store') }}">
                                            @csrf
                                            <div class="row33">
                                                <div class="row rowBox2">
                                                    <div class="col-md-12 columnBox2">
                                                        <h5>Have you been refused a visa from Canada, the USA, the United
                                                            Kingdom, New
                                                            Zealand, Australia or Ireland?&thinsp;</h5>
                                                    </div>
                                                    <div class="col-md-6 columnBox2">
                                                        <div class="form-group row rowBox4">
                                                            <label
                                                                class="col-sm-3 col-4 columnBox4 col-form-label">Yes</label>
                                                            <div class="col-sm-9 col-8 columnBox4"
                                                                style="padding-top: .4375rem;">

                                                                <input class="form-check-input" type="radio"
                                                                    id="exampleRadios1" value="Yes"
                                                                    {{ isset($visaPermit->refused_a_visa) ? ($visaPermit->refused_a_visa == 'Yes' ? 'checked' : '') : '' }}
                                                                    name="refused_a_visa">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 columnBox2">
                                                        <div class="form-group row rowBox4">
                                                            <label
                                                                class="col-sm-3 col-4 columnBox4 col-form-label">No</label>
                                                            <div class="col-sm-9 col-8 columnBox4"
                                                                style="padding-top: .4375rem;">
                                                                <input class="form-check-input" type="radio"
                                                                    id="exampleRadios2" value="No"
                                                                    {{ isset($visaPermit->refused_a_visa) ? ($visaPermit->refused_a_visa == 'No' ? 'checked' : '') : '' }}
                                                                    name="refused_a_visa">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row rowBox2">
                                                    <div class="col-md-12 columnBox2">
                                                        <h5>Which valid study permits or visas do you have?</h5>
                                                    </div>
                                                    <div class="col-md-12 columnBox2">
                                                        <div class="form-group row rowBox4">
                                                            <label class="col-sm-4 col-9 columbox 4col-form-label">Canadian
                                                                Study Permit/ Visitor
                                                                Visa</label>
                                                            <div class="col-sm-8 col-3 columnBox4">
                                                                <input class="form-check-input" type="radio"
                                                                    id="canadian_study_permit"
                                                                    value="Canadian Study Permit/ Visitor Visa"
                                                                    {{ isset($visaPermit->study_permit_or_visa) ? ($visaPermit->study_permit_or_visa == 'Canadian Study Permit/ Visitor Visa' ? 'checked' : '') : '' }}
                                                                    name="study_permit_or_visa">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 columnBox2">
                                                        <div class="form-group row rowBox4">
                                                            <label class="col-sm-4 col-9 columnBox4 col-form-label">USA F1
                                                                Visa</label>
                                                            <div class="col-sm-8 col-3 columnBox4">
                                                                <input class="form-check-input" type="radio"
                                                                    id="usa_study_permit" value="USA F1 Visa"
                                                                    {{ isset($visaPermit->study_permit_or_visa) ? ($visaPermit->study_permit_or_visa == 'USA F1 Visa' ? 'checked' : '') : '' }}
                                                                    name="study_permit_or_visa">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 columnBox2">
                                                        <div class="form-group row rowbox4">
                                                            <label
                                                                class="col-sm-4 col-9 columnBox4 col-form-label">Australian
                                                                Study Visa</label>
                                                            <div class="col-sm-8 col-3 columnBox4">
                                                                <input class="form-check-input" type="radio"
                                                                    id="au_study_permit" value="Australian Study Visa"
                                                                    {{ isset($visaPermit->study_permit_or_visa) ? ($visaPermit->study_permit_or_visa == 'Australian Study Visa' ? 'checked' : '') : '' }}
                                                                    name="study_permit_or_visa">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 columnBox2">
                                                        <div class="form-group row rowBox4">
                                                            <label class="col-sm-4 col-9 columnBox4 col-form-label">UK Tier
                                                                4 Student/ Short Term Study
                                                                Visa</label>
                                                            <div class="col-sm-8 col-3 columnBox4">
                                                                <input class="form-check-input" type="radio"
                                                                    id="uk_study_permit"
                                                                    value="UK Tier 4 Student/ Short Term Study Visa"
                                                                    {{ isset($visaPermit->study_permit_or_visa) ? ($visaPermit->study_permit_or_visa == 'UK Tier 4 Student/ Short Term Study Visa' ? 'checked' : '') : '' }}
                                                                    name="study_permit_or_visa">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 columnBox2">
                                                        <div class="form-group row rowBox4">
                                                            <label class="col-sm-4 col-9 columnBox4 col-form-label">Irish
                                                                Stamp 2</label>
                                                            <div class="col-sm-8 col-3 columnBox4">
                                                                <input class="form-check-input" type="radio"
                                                                    id="irish_study_permit" value="Irish Stamp 2"
                                                                    {{ isset($visaPermit->study_permit_or_visa) ? ($visaPermit->study_permit_or_visa == 'Irish Stamp 2' ? 'checked' : '') : '' }}
                                                                    name="study_permit_or_visa">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 columnBox2">
                                                        <div class="form-group row rowBox4">
                                                            <label class="col-sm-4 col-9 columnBox4 col-form-label">I don't
                                                                have this</label>
                                                            <div class="col-sm-8 col-3 columnBox4">
                                                                <input class="form-check-input" type="radio"
                                                                    id="none" value="I don't have this"
                                                                    {{ isset($visaPermit->study_permit_or_visa) ? ($visaPermit->study_permit_or_visa == "I don't have this" ? 'checked' : '') : '' }}
                                                                    name="study_permit_or_visa">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row rowBox2">
                                                    <div class="col-md-12 columnBox2">
                                                        <h5>Please provide more information about your current study
                                                            permit/visa and any
                                                            past refusals, if any&thinsp;</h5>
                                                    </div>
                                                    <div class="col-md-12 columnBox2">
                                                        <div class="form-group row rowBo4">
                                                            <div class="col-md-12 columnBox4">
                                                                <textarea class="form-control" name="about_visa_permit" id="" rows="3" name="">{{ $visaPermit->about_visa_permit ?? '' }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-2 text-end">
                                                <button class="btn btn-primary profile-button" type="submit">
                                                    Save Profile
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
