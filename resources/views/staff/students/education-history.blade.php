@extends('staff.layouts.layout')
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
                                    <p class="userName font-weight-bold mb-0">Test Student</p>
                                    <p class="text text-black-50 mb-0">teststd@gmail.com</p>
                                </div>
                            </div>
                            <div class="dasboardLeftSideBarMenuArea">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('staff.student.general.detail', $user_id ?? '') }}"><span
                                                class="icon"><i class="fa-regular fa-address-card"></i></span> <span
                                                class="txt">General Info</span></a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link"
                                            href="{{ route('staff.student.education.history', $user_id ?? '') }}"><span
                                                class="icon"><i class="fa-regular fa-graduation-cap"></i></span> <span
                                                class="txt">Education History</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('staff.student.test.score', $user_id ?? '') }}"><span
                                                class="icon"><i class="fa-regular fa-rectangle-list"></i></span> <span
                                                class="txt">Test Score</span> </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('staff.student.visa.permit', $user_id ?? '') }}"><span
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
                                <div class="card-body p-0 ">
                                    <div class="p-3a py-2">
                                        <form method="post" action="{{ route('staff.education-summary.store') }}">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $user_id ?? '' }}">
                                            <div class="row rowBox2">
                                                <div class="col-md-6 mb-3 columnBox2">
                                                    <label class="labels">Country of Education </label>

                                                    <select class="form-control" name="education_country" required="">
                                                        <option value="">Select Country Of Education</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}"
                                                                {{ $educationSummery ? ($educationSummery->education_country == $country->id ? 'selected' : '') : '' }}>
                                                                {{ $country->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3 columnBox2">

                                                    <label class="labels">Highest Level Of Education</label>
                                                    <select class="form-control" name="education_level" required="">
                                                        <option value="">Select Highest Level Of Education</option>
                                                        @foreach ($education_levels as $item)
                                                            <option value="{{ $item->level_name }}"
                                                                {{ $educationSummery ? ($educationSummery->education_level == $item->level_name ? 'selected' : '') : '' }}>
                                                                {{ $item->level_name }}
                                                            </option>
                                                        @endforeach
                                                        {{-- <option value=""></option>
                                                        <optgroup label="Primary">
                                                            <option value="Grade 1">
                                                                Grade 1
                                                            </option>
                                                            <option value="Grade 2">
                                                                Grade 2
                                                            </option>
                                                            <option value="Grade 3">
                                                                Grade 3
                                                            </option>
                                                            <option value="Grade 4">
                                                                Grade 4
                                                            </option>
                                                            <option value="Grade 5">
                                                                Grade 5
                                                            </option>
                                                            <option value="Grade 6">
                                                                Grade 6
                                                            </option>
                                                            <option value="Grade 7">
                                                                Grade 7
                                                            </option>
                                                            <option value="Grade 8">
                                                                Grade 8
                                                            </option>
                                                        </optgroup>
                                                        <optgroup label="Secondary">
                                                            <option value="Grade 9">
                                                                Grade 9
                                                            </option>
                                                            <option value="Grade 10">
                                                                Grade 10
                                                            </option>
                                                            <option value="Grade 11">
                                                                Grade 11
                                                            </option>
                                                            <option value="Grade 12">
                                                                Grade 12 / High School
                                                            </option>
                                                        </optgroup>
                                                        <optgroup label="Undergraduate">
                                                            <option value="1-Year Post-Secondary Certificate">
                                                                1-Year
                                                                Post-Secondary Certificate
                                                            </option>
                                                            <option value="2-Year Undergraduate Diploma">
                                                                2-Year Undergraduate Diploma
                                                            </option>
                                                            <option value="3-Year Undergraduate Advanced Diploma">
                                                                3-Year Undergraduate
                                                                Advanced Diploma
                                                            </option>
                                                            <option value="3-Year Bachelors Degree">
                                                                3-Year Bachelors Degree
                                                            </option>
                                                            <option value="4-Year Bachelors Degree">
                                                                4-Year Bachelors Degree
                                                            </option>
                                                        </optgroup>
                                                        <optgroup label="Postgraduate">
                                                            <option value="Postgraduate Certificate / Diploma">
                                                                1-Year
                                                                Postgraduate Certificate / Diploma
                                                            </option>
                                                            <option value="Master Degree">Master Degree
                                                            </option>
                                                            <option value="Doctoral Degree(Phd, M.D, ...)">
                                                                Doctoral Degree(Phd, M.D,
                                                                ...)
                                                            </option>
                                                        </optgroup> --}}
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3 columnBox2">
                                                    <label class="labels">Grading Scheme</label>

                                                    <select class="form-control" name="education_scheme_grade"
                                                        required="">
                                                        <option value="Grade 1">Select Grading
                                                            Scheme
                                                        </option>
                                                        @foreach ($gradingScheme as $item)
                                                            <option value="{{ $item->scheme }}"
                                                                {{ $educationSummery ? ($educationSummery->education_scheme_grade == $item->scheme ? 'selected' : '') : '' }}>
                                                                {{ $item->scheme }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3 columnBox2">
                                                    <label class="labels">Grade Average</label><input type="text"
                                                        class="form-control" name="education_average_grade"
                                                        placeholder="Grade Average"
                                                        value="{{ $educationSummery ? $educationSummery->education_average_grade : '' }}"
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
