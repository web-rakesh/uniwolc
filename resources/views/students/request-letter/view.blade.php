@extends('students.layouts.layout')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card mt-3">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            Letter Request
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Student Name: {{ $requestLetter->student_name }}</h5>
                            <p class="card-title">Student Email: {{ $requestLetter->email }}</p>
                            <p class="card-text">School Name: {{ $requestLetter->university->university_name ?? '' }}</p>
                            <p class="card-text">Country Name: {{ $requestLetter->university->getCountry->name ?? '' }}</p>
                            <p class="card-text">Subject: {{ $requestLetter->subject }}</p>
                            <p class="card-text">Message: {{ $requestLetter->message }}</p>
                            <a href="{{ $requestLetter->request_letter_url ?? 'javascript:;' }}" class="btn btn-primary"
                                target="_blank">File</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
