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
                                    <p class="userName font-weight-bold mb-0">Test Student</p>
                                    <p class="text text-black-50 mb-0">teststd@gmail.com</p>
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
                                    <li class="nav-item active">
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

                    <div class="col-md-9 columnBox border-right dasboardrightPart">
                        <div class="dasboardrightPartWrapper">
                            <form method="post" action="{{ route('student.test-score.store') }}">
                                @csrf
                                <div
                                    class="card shadow1 p-3 py-5 mb-0 bg-white border-0 rounded dasboardrightPartWrapperinner">
                                    <h4 class="card-title text-center1 mb-0"> Englsih Test Scores</h4>
                                    <hr>
                                    <div class="card-body p-0">
                                        <div class="p-3a py-2">


                                            <div class="row rowBox2">
                                                <div class="col-md-12 mb-3 columnBox2">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="toefl-checked"
                                                            name="english_test_type" value="toefl">
                                                        <label for="toefl-checked">TOEFL</label>
                                                    </div>
                                                    <div id="" class="custom-diplay-hidden showall">
                                                        <p class="card-description">Your Scores</p>
                                                        <div class="row rowBox3">
                                                            <div class="col-md-6 columnBox3">
                                                                <div class="form-group row rowBox4">
                                                                    <label
                                                                        class="col-sm-4 columnBox4 col-form-label">Reading
                                                                        Score</label>
                                                                    <div class="col-sm-8 columnBox4 ">
                                                                        <input type="text" class="form-control"
                                                                            name="reading_score" value="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 columnBox3">
                                                                <div class="form-group row rowBox4">
                                                                    <label class="col-sm-4 col-form-label">Listening
                                                                        Score</label>
                                                                    <div class="col-sm-8 columnBox4">
                                                                        <input type="text" class="form-control"
                                                                            name="listening_score" value="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 columnBox3">
                                                                <div class="form-group row rowBox4">
                                                                    <label
                                                                        class="col-sm-4 columnBox4 col-form-label">Writing
                                                                        Score</label>
                                                                    <div class="col-sm-8 columnBox4">
                                                                        <input type="text" class="form-control"
                                                                            name="writing_score" value="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 columnBox3">
                                                                <div class="form-group row rowBox4">
                                                                    <label
                                                                        class="col-sm-4 columnBox4 col-form-label">Speaking
                                                                        Score</label>
                                                                    <div class="col-sm-8 columnBox4">
                                                                        <input type="text" class="form-control"
                                                                            name="" value="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 columnBox3">
                                                                <div class="form-group row rowBox4">
                                                                    <label class="col-sm-4 columnBox4 col-form-label">Exam
                                                                        Date</label>
                                                                    <div class="col-sm-8 columnBox4">
                                                                        <input type="date" class="form-control"
                                                                            name="exam_date" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mb-3 columnBox2">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="ielts-checked"
                                                            name="english_test_type" value="ielts">
                                                        <label for="ielts-checked">IELTS</label>
                                                    </div>
                                                    <div id="" class="custom-diplay-hidden showall">
                                                        <p class="card-description">Your Scores</p>
                                                        <div class="row rowBox3">
                                                            <div class="col-md-6 columnBox3">
                                                                <div class="form-group row rowBox4">
                                                                    <label
                                                                        class="col-sm-4 columnBox4 col-form-label">Reading
                                                                        Score</label>
                                                                    <div class="col-sm-8 columnBox4">
                                                                        <input type="text" class="form-control"
                                                                            name="reading_score" value="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 columnBox3">
                                                                <div class="form-group row rowBox4">
                                                                    <label
                                                                        class="col-sm-4 columnBox4 col-form-label">Listening
                                                                        Score</label>
                                                                    <div class="col-sm-8 columnBox4">
                                                                        <input type="text" class="form-control"
                                                                            name="listening_score" value="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 columnBox3">
                                                                <div class="form-group row rowBox4">
                                                                    <label
                                                                        class="col-sm-4 columnBox4 col-form-label">Writing
                                                                        Score</label>
                                                                    <div class="col-sm-8 columnBox4">
                                                                        <input type="text" class="form-control"
                                                                            name="writing_score" value="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 columnBox3">
                                                                <div class="form-group row rowBox4">
                                                                    <label
                                                                        class="col-sm-4 columnBox4 col-form-label">Speaking
                                                                        Score</label>
                                                                    <div class="col-sm-8 columnBox4">
                                                                        <input type="text" class="form-control"
                                                                            name="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 columnBox3">
                                                                <div class="form-group row rowBox4">
                                                                    <label class="col-sm-4 columnBox4 col-form-label">Exam
                                                                        Date</label>
                                                                    <div class="col-sm-8 columnBox4">
                                                                        <input type="date" class="form-control"
                                                                            name="exam_date" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mb-3 columnBox2">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="pte-checked"
                                                            name="english_test_type" value="pte">
                                                        <label for="pte-checked">PTE</label>
                                                    </div>
                                                    <div id="pte" class="custom-diplay-hidden showall">
                                                        <p class="card-description">Your Scores</p>
                                                        <div class="row rowBox3">
                                                            <div class="col-md-6 columnBox3">
                                                                <div class="form-group row rowBox4">
                                                                    <label class="col-sm-4 columnBox4 col-form-label">Total
                                                                        Score</label>
                                                                    <div class="col-sm-8 columnBox4">
                                                                        <input type="text" class="form-control"
                                                                            name="total_score" value="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 columnBox3">
                                                                <div class="form-group row rowBox4">
                                                                    <label
                                                                        class="col-sm-4 columnBox4 col-form-label">Reading
                                                                        Score</label>
                                                                    <div class="col-sm-8 columnBox4">
                                                                        <input type="text" class="form-control"
                                                                            name="listening_score" value="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 columnBox3">
                                                                <div class="form-group row rowBox4">
                                                                    <label
                                                                        class="col-sm-4 columnBox4 col-form-label">Listening
                                                                        Score</label>
                                                                    <div class="col-sm-8 columnBox4">
                                                                        <input type="text" class="form-control"
                                                                            name="listening_score" value="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 columnBox3">
                                                                <div class="form-group row rowBox4">
                                                                    <label
                                                                        class="col-sm-4 columnBox4 col-form-label">Writing
                                                                        Score</label>
                                                                    <div class="col-sm-8 columnBox4">
                                                                        <input type="text" class="form-control"
                                                                            name="writing_score" value="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 columnBox3">
                                                                <div class="form-group row rowBox4">
                                                                    <label
                                                                        class="col-sm-4 columnBox4 col-form-label">Speaking
                                                                        Score</label>
                                                                    <div class="col-sm-8 columnBox4">
                                                                        <input type="text" class="form-control"
                                                                            name="" value="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 columnBox3">
                                                                <div class="form-group row rowBox4">
                                                                    <label class="col-sm-4 columnBox4 col-form-label">Date
                                                                        of Exam</label>
                                                                    <div class="col-sm-8 columnBox4">
                                                                        <input type="date" class="form-control"
                                                                            name="exam_date" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mb-3 columnBox2">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input"
                                                            id="duolingo-checked" name="english_test_type"
                                                            value="duolingo">
                                                        <label for="duolingo-checked">Duolingo</label>
                                                    </div>
                                                    <div id="duolingo" class="custom-diplay-hidden showall">
                                                        <h5 class="card-description">Your Scores</h5>
                                                        <div class="row rowBox3">
                                                            <div class="col-md-6 columnBox3">
                                                                <div class="form-group row rowBox4">
                                                                    <label class="col-sm-4 columnBox4 col-form-label">Total
                                                                        Score</label>
                                                                    <div class="col-sm-8 columnBox4">
                                                                        <input type="text" class="form-control"
                                                                            name="total_score" value="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 columnBox3">
                                                                <div class="form-group row rowBox4">
                                                                    <label class="col-sm-4 columnBox4 col-form-label">Date
                                                                        of Exam</label>
                                                                    <div class="col-sm-8 columnBox4">
                                                                        <input type="date" class="form-control"
                                                                            name="" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mb-3 columnBox2">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input"
                                                            id="i-dont-have-this-checked" name="english_test_type"
                                                            value="dont_have_this">
                                                        <label for="i-dont-have-this-checked">I don't have this</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mb-3 columnBox2">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input"
                                                            id="not-yet-but-i-will-in-the-future-checked"
                                                            name="english_test_type" value="not_yet_will_feature">
                                                        <label for="i-dont-have-this-checked">Not yet, but I will in the
                                                            future
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 columnBox2">
                                                    <p class="card-description text-muted text-sm">If you haven't taken a
                                                        test yet, UniWolc
                                                        can
                                                        help you take it in the future.</p>
                                                </div>
                                                {{-- <div class="col-md-12 columnBox2">
                                                    <div class="mt-2 text-end">
                                                        <button class="btn btn-primary profile-button" type="submit">
                                                            Save Details
                                                        </button>
                                                    </div>
                                                </div> --}}
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <h4 class="card-title mb-0">GRE or GMAT Scores</h4>
                                    <hr>
                                    <div class="card-body p-0">
                                        <div class="p-3a py-2">


                                            <div class="row">

                                            </div>

                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="gmat" name="is_gmat" value="gmat_exam">
                                                <label class="form-check-label" for="gmat">I have GMAT exam
                                                    scores
                                                </label>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="gre" name="is_gre" value="gre_exam">
                                                <label class="form-check-label" for="gre">I have GRE exam scores
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>.
                                <button class="btn btn-primary profile-button" type="submit">
                                    Save Details
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
