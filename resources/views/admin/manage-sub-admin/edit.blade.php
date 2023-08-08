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
            <form action="{{ route('admin.manage-sub-admin.update', $editSubAdmin->id) }}" method="post">
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
                                        placeholder="Name" value="{{ $editSubAdmin->name ?? old('name') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail3">Email address</label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail3"
                                        placeholder="Email" value="{{ $editSubAdmin->email }}" readonly>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleInputPassword4">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword4"
                                    placeholder="Password">
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            {{-- {{ get_user_permission($editSubAdmin->id, 'student', 'add') }} --}}

                            @php
                                // student
                                $studentAdd = get_user_permission($editSubAdmin->id, 'student', 'add');
                                $studentView = get_user_permission($editSubAdmin->id, 'student', 'view');
                                $studentUpdate = get_user_permission($editSubAdmin->id, 'student', 'update');
                                $studentDelete = get_user_permission($editSubAdmin->id, 'student', 'delete');

                                // agent
                                $agentAdd = get_user_permission($editSubAdmin->id, 'agent', 'add');
                                $agentView = get_user_permission($editSubAdmin->id, 'agent', 'view');
                                $agentUpdate = get_user_permission($editSubAdmin->id, 'agent', 'update');
                                $agentDelete = get_user_permission($editSubAdmin->id, 'agent', 'delete');

                                // staff
                                $staffAdd = get_user_permission($editSubAdmin->id, 'staff', 'add');
                                $staffView = get_user_permission($editSubAdmin->id, 'staff', 'view');
                                $staffUpdate = get_user_permission($editSubAdmin->id, 'staff', 'update');
                                $staffDelete = get_user_permission($editSubAdmin->id, 'staff', 'delete');

                                // university
                                $universityAdd = get_user_permission($editSubAdmin->id, 'university', 'add');
                                $universityView = get_user_permission($editSubAdmin->id, 'university', 'view');
                                $universityUpdate = get_user_permission($editSubAdmin->id, 'university', 'update');
                                $universityDelete = get_user_permission($editSubAdmin->id, 'university', 'delete');

                                // program
                                $programAdd = get_user_permission($editSubAdmin->id, 'program', 'add');
                                $programView = get_user_permission($editSubAdmin->id, 'program', 'view');
                                $programUpdate = get_user_permission($editSubAdmin->id, 'program', 'update');
                                $programDelete = get_user_permission($editSubAdmin->id, 'program', 'delete');

                                // manage_application
                                $manage_applicationAdd = get_user_permission($editSubAdmin->id, 'manage_application', 'add');
                                $manage_applicationView = get_user_permission($editSubAdmin->id, 'manage_application', 'view');
                                $manage_applicationUpdate = get_user_permission($editSubAdmin->id, 'manage_application', 'update');
                                $manage_applicationDelete = get_user_permission($editSubAdmin->id, 'manage_application', 'delete');

                                // blog
                                $blogAdd = get_user_permission($editSubAdmin->id, 'blog', 'add');
                                $blogView = get_user_permission($editSubAdmin->id, 'blog', 'view');
                                $blogUpdate = get_user_permission($editSubAdmin->id, 'blog', 'update');
                                $blogDelete = get_user_permission($editSubAdmin->id, 'blog', 'delete');

                                // news
                                $newsAdd = get_user_permission($editSubAdmin->id, 'news', 'add');
                                $newsView = get_user_permission($editSubAdmin->id, 'news', 'view');
                                $newsUpdate = get_user_permission($editSubAdmin->id, 'news', 'update');
                                $newsDelete = get_user_permission($editSubAdmin->id, 'news', 'delete');
                            @endphp

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
                                                    {{ $studentAdd == true ? 'checked' : '' }} value="add"> Add <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-success m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="student[]"
                                                    {{ $studentView == true ? 'checked' : '' }} value="view"> View <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-info m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="student[]"
                                                    {{ $studentUpdate == true ? 'checked' : '' }} value="update"> Update <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-danger m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="student[]"
                                                    {{ $studentDelete == true ? 'checked' : '' }} value="delete"> Delete <i
                                                    class="input-helper"></i></label>
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
                                                    {{ $agentAdd == true ? 'checked' : '' }} value="add"> Add <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-success m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="agent[]"
                                                    {{ $agentView == true ? 'checked' : '' }} value="view"> View <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-info m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="agent[]"
                                                    {{ $studentUpdate == true ? 'checked' : '' }} value="update"> Update <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-danger m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="agent[]"
                                                    {{ $agentDelete == true ? 'checked' : '' }} value="delete"> Delete <i
                                                    class="input-helper"></i></label>
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
                                                    {{ $staffAdd == true ? 'checked' : '' }} value="add"> Add <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-success m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="staff[]"
                                                    {{ $staffView == true ? 'checked' : '' }} value="view"> View <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-info m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="staff[]"
                                                    {{ $staffUpdate == true ? 'checked' : '' }} value="update"> Update <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-danger m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="staff[]"
                                                    {{ $staffDelete == true ? 'checked' : '' }} value="delete"> Delete <i
                                                    class="input-helper"></i></label>
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
                                                    {{ $universityAdd == true ? 'checked' : '' }} value="add"> Add <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-success m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="university[]"
                                                    {{ $universityView == true ? 'checked' : '' }} value="view"> View <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-info m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="university[]"
                                                    {{ $universityUpdate == true ? 'checked' : '' }} value="update">
                                                Update
                                                <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-danger m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="university[]"
                                                    {{ $universityDelete == true ? 'checked' : '' }} value="delete">
                                                Delete
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
                                                    {{ $programAdd == true ? 'checked' : '' }} value="add"> Add <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-success m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="program[]"
                                                    {{ $programView == true ? 'checked' : '' }} value="view"> View <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-info m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="program[]"
                                                    {{ $programUpdate == true ? 'checked' : '' }} value="update"> Update
                                                <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-danger m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="program[]"
                                                    {{ $programDelete == true ? 'checked' : '' }} value="delete"> Delete
                                                <i class="input-helper"></i></label>
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
                                                    {{ $manage_applicationAdd == true ? 'checked' : '' }}
                                                    name="manage_application[]" value="add">
                                                Add <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-success m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input"
                                                    {{ $manage_applicationView == true ? 'checked' : '' }}
                                                    name="manage_application[]" value="view">
                                                View <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-info m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input"
                                                    {{ $manage_applicationUpdate == true ? 'checked' : '' }}
                                                    name="manage_application[]" value="update">
                                                Update <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-danger m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input"
                                                    {{ $manage_applicationDelete == true ? 'checked' : '' }}
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
                                                    {{ $blogAdd == true ? 'checked' : '' }} value="add"> Add <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-success m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="blog[]"
                                                    {{ $blogView == true ? 'checked' : '' }} value="view"> View <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-info m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="blog[]"
                                                    {{ $blogUpdate == true ? 'checked' : '' }} value="update"> Update <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-danger m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="blog[]"
                                                    {{ $blogDelete == true ? 'checked' : '' }} value="delete"> Delete <i
                                                    class="input-helper"></i></label>
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
                                                    {{ $newsAdd == true ? 'checked' : '' }} value="add"> Add <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-success m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="news[]"
                                                    {{ $newsView == true ? 'checked' : '' }} value="view"> View <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-info m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="news[]"
                                                    {{ $newsUpdate == true ? 'checked' : '' }} value="update"> Update <i
                                                    class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-danger m-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="news[]"
                                                    {{ $newsDelete == true ? 'checked' : '' }} value="delete"> Delete <i
                                                    class="input-helper"></i></label>
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

                            <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                            <a href="{{ route('admin.manage-sub-admin.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
