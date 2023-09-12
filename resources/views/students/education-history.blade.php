@extends('students.layouts.layout')
@section('content')
    <section class="dashboardPgaesSec bg-white">
        <div class="container rounded ">
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
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ route('student.education-summary.index') }}"><span
                                                class="icon"><i class="fa-regular fa-graduation-cap"></i></span> <span
                                                class="txt">Education History</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('student.test-score.index') }}"><span
                                                class="icon"><i class="fa-regular fa-rectangle-list"></i></span> <span
                                                class="txt">Test Score</span> </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('student.visa-and-permit.index') }}"><span
                                                class="icon"><i class="fa-regular fa-id-card-clip"></i></span> <span
                                                class="txt">Visa
                                                &amp; Study Permit</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 border-right dasboardrightPart">
                        <div class="dasboardrightPartWrapper">
                            <div class="card shadow1 p-3 py-5 mb-0 bg-white border-0 rounded dasboardrightPartWrapperinner">
                                <h4 class="card-title text-center1 mb-0"> Education Summary</h4>
                                <hr>
                                <p class="text-muted">Please enter the information for the highest academic level that you
                                    have
                                    completed.
                                </p>
                                <hr>
                                @include('flash-messages')
                                <div class="card-body p-0 ">
                                    <div class="p-3a py-2">
                                        <form method="post" action="{{ route('student.education-summary.store') }}">
                                            @csrf
                                            <div class="row rowBox2">
                                                <div class="col-md-6 mb-3 columnBox2">
                                                    <label class="labels">Country of Education</label>
                                                    <select class="form-control" name="education_country" required="">
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}"
                                                                {{ $educationSummary ? ($educationSummary->education_country == $country->id ? 'selected' : '') : '' }}>
                                                                {{ $country->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3 columnBox2">
                                                    <label class="labels">Highest Level Of Education</label>
                                                    <select class="form-control" name="education_level" required="">
                                                        @foreach ($level_of_educations as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ $educationSummary ? ($educationSummary->education_level == $item->id ? 'selected' : '') : '' }}>
                                                                {{ $item->level_name }}
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3 columnBox2">
                                                    <label class="labels">Grading Scheme</label>
                                                    <select class="form-control" name="education_scheme_grade"
                                                        required="">
                                                        @foreach ($grading_schemes as $grading_scheme)
                                                            <option value="{{ $grading_scheme->id }}"
                                                                {{ $educationSummary ? ($educationSummary->education_scheme_grade == $grading_scheme->id ? 'selected' : '') : '' }}>
                                                                {{ $grading_scheme->scheme }}
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3 columnBox2">
                                                    <label class="labels">Grade Average</label><input type="text"
                                                        class="form-control" name="education_average_grade"
                                                        placeholder="Grade Average"
                                                        value="{{ $educationSummary->education_average_grade ?? '' }}"
                                                        required="">
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
