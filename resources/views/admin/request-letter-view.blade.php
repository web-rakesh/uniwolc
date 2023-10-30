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
                                <a href="{{ $requestLetter->request_letter_url ?? 'javascript:;' }}" class="btn btn-primary" target="_blank">File</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
