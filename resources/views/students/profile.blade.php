@extends('students.layouts.layout')
@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            @include('flash-messages')
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ auth()->user()->name }}</h5>
                            <p class="text-muted mb-1">{{ Auth::user()->email }}</p>

                            <div class="d-flex justify-content-center mb-2">
                                <a href="{{ route('student.student-detail.index') }}" type="button"
                                    class="btn btn-primary">Edit
                                    Profile Details</a>
                            </div>
                        </div>
                    </div>


                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fas fa-globe fa-lg text-warning"></i>
                                    <p class="mb-0">{{ $studentDetail->website ?? 'website' }}</p>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                    <p class="mb-0">{{ $studentDetail->twitter ?? 'twitter' }}</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                    <p class="mb-0">{{ $studentDetail->instagram ?? 'instagram' }}</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                    <p class="mb-0">{{ $studentDetail->facebook ?? 'facebook' }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>

                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $studentDetail->first_name ?? '' }}
                                        {{ $studentDetail->middle_name ?? '' }} {{ $studentDetail->last_name ?? '' }}</p>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>

                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $studentDetail->email ?? '' }}</p>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Mobile Number</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> {{ $studentDetail->mobile_number ?? '' }}</p>
                                </div>
                            </div>

                            <hr>


                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Alternative Mobile Number</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $studentDetail->alt_mobile_number ?? '' }}</p>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>

                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        {{ $studentDetail->address ?? '' }}
                                        {{ @$studentDetail->city ? ',' . @$studentDetail->city : '' }}
                                        {{ @$studentDetail->country ? ',' . $studentDetail->userCountry->name : '' }}
                                        {{ @$studentDetail->pincode ? ',' . $studentDetail->pincode : '' }}</p>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Status</p>
                                </div>
                                <div class="col-sm-9">
                                    @if (auth()->user()->profile_is_updated == 1)
                                        <label class="badge badge-success">Active</label>
                                    @else
                                        <label class="badge badge-warning">Pending</label>
                                    @endif

                                    {{-- <label class="badge badge-success">Active</label>

                                    <label class="badge badge-danger">Inactive</label> --}}

                                </div>
                            </div>

                            <hr>


                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>

                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Student Source Country</p>
                                </div>

                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> {{ $studentDetail->alt_country ?? '' }}</p>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Preferred Contact Method</p>
                                </div>

                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Preferred Contact Method Number</p>
                                </div>

                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $studentDetail->alt_mobile_number ?? '' }}</p>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">How Did You Find About Uniwolc</p>
                                </div>

                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>

                            <hr>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
