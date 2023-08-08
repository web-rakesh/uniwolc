@extends('admin.layouts.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="page-header">
                <h3 class="page-title"> Manage sub admin </h3>
                <nav aria-label="breadcrumb">
                    {{-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol> --}}
                </nav>
            </div>

            @if (Session::has('error'))
                <div class="alert alert-danger mt-2">{{ Session::get('error') }}
                </div>
            @endif
            <form action="{{ route('admin.manage-sub-admin.store') }}" method="post">
                @csrf
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            {{-- <h4 class="card-title">Basic form elements</h4>
                            <p class="card-description"> Basic form elements </p> --}}

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputName1">Name</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputName1"
                                        placeholder="Name" value="{{ old('name') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail3">Email address</label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail3"
                                        placeholder="Email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword4"
                                    placeholder="Password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <div class="row ">
                                    <div class="col-md-4">
                                        <label>Students</label>
                                        <input type="hidden" name="menu_name[]" value="student">
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-center">
                                        <div class="form-check form-check-primary m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="student[]"
                                                    value="add"> Add <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-success m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="student[]"
                                                    value="view"> View <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-info m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="student[]"
                                                    value="update"> Update <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-danger m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="student[]"
                                                    value="delete"> Delete <i class="input-helper"></i></label>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="row ">
                                    <div class="col-md-4">
                                        <label>Agents</label>
                                        <input type="hidden" name="menu_name[]" value="agent">
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-center">
                                        <div class="form-check form-check-primary m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="agent[]"
                                                    value="add"> Add <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-success m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="agent[]"
                                                    value="view"> View <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-info m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="agent[]"
                                                    value="update"> Update <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-danger m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="agent[]"
                                                    value="delete"> Delete <i class="input-helper"></i></label>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="row ">
                                    <div class="col-md-4">
                                        <label>Staffs</label>
                                        <input type="hidden" class="form-control form-control-lg" name="menu_name[]"
                                            value="staff">
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-center">
                                        <div class="form-check form-check-primary m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="staff[]"
                                                    value="add"> Add <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-success m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="staff[]"
                                                    value="view"> View <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-info m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="staff[]"
                                                    value="update"> Update <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-danger m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="staff[]"
                                                    value="delete"> Delete <i class="input-helper"></i></label>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="row ">
                                    <div class="col-md-4">
                                        <label>University</label>
                                        <input type="hidden" name="menu_name[]" value="university">
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-center">
                                        <div class="form-check form-check-primary m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="university[]"
                                                    value="add"> Add <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-success m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="university[]"
                                                    value="view"> View <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-info m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="university[]"
                                                    value="update"> Update
                                                <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-danger m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="university[]"
                                                    value="delete"> Delete
                                                <i class="input-helper"></i></label>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="row ">
                                    <div class="col-md-4">
                                        <label>Programs</label>
                                        <input type="hidden" name="menu_name[]" value="program">
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-center">
                                        <div class="form-check form-check-primary m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="program[]"
                                                    value="add"> Add <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-success m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="program[]"
                                                    value="view"> View <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-info m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="program[]"
                                                    value="update"> Update <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-danger m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="program[]"
                                                    value="delete"> Delete <i class="input-helper"></i></label>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="row ">
                                    <div class="col-md-4">
                                        <label>Manage Application</label>
                                        <input type="hidden" name="menu_name[]" value="manage_application">
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-center">
                                        <div class="form-check form-check-primary m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input"
                                                    name="manage_application[]" value="add">
                                                Add <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-success m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input"
                                                    name="manage_application[]" value="view">
                                                View <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-info m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input"
                                                    name="manage_application[]" value="update">
                                                Update <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-danger m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input"
                                                    name="manage_application[]" value="delete">
                                                Delete <i class="input-helper"></i></label>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="row ">
                                    <div class="col-md-4">
                                        <label>Blogs</label>
                                        <input type="hidden" name="menu_name[]" value="blog">
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-center">
                                        <div class="form-check form-check-primary m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="blog[]"
                                                    value="add"> Add <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-success m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="blog[]"
                                                    value="view"> View <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-info m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="blog[]"
                                                    value="update"> Update <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-danger m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="blog[]"
                                                    value="delete"> Delete <i class="input-helper"></i></label>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="row ">
                                    <div class="col-md-4">
                                        <label>News</label>
                                        <input type="hidden" name="menu_name[]" value="news">
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-center">
                                        <div class="form-check form-check-primary m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="news[]"
                                                    value="add"> Add <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-success m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="news[]"
                                                    value="view"> View <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-info m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="news[]"
                                                    value="update"> Update <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-danger m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="news[]"
                                                    value="delete"> Delete <i class="input-helper"></i></label>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body justify-content-end d-flex p-3">
                            {{-- <h4 class="card-title">Basic form elements</h4>
                            <p class="card-description"> Basic form elements </p> --}}

                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
