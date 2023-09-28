@extends('students.layouts.layout')
@push('css')
    <style>
        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 10px auto;
        }

        .avatar-upload .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
        }

        .avatar-upload .avatar-edit input {
            display: none;
        }

        .avatar-upload .avatar-edit input+label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #FFFFFF;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }

        .avatar-upload .avatar-edit input+label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }

        .avatar-upload .avatar-edit input+label:after {
            content: "\f040";
            font-family: 'FontAwesome';
            color: #757575;
            position: absolute;
            top: 10px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }

        .avatar-upload .avatar-preview {
            width: 152px;
            height: 152px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }

        .avatar-upload .avatar-preview>div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
@endpush
@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            @include('flash-messages')
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload"></label>
                                </div>
                                <div class="avatar-preview">
                                    @if (auth()->user()->profile_photo_path)
                                        <div id="imagePreview"
                                            style="background-image: url({{ asset('storage/') . '/' . auth()->user()->profile_photo_path }});">
                                        </div>
                                    @else
                                        <div id="imagePreview"
                                            style="background-image: url('https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg');">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;"> --}}
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

@push('js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);

            var formData = new FormData();
            formData.append('profile_image', this.files[0]);
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: '{{ route('update.profile.image') }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    readURL(this);
                    // Update the image on the page

                    $('#avatarImage').attr('src', '{{ asset('storage/') }}/' + response.profile_image);
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });
        });
    </script>
@endpush
