@extends('admin.layouts.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h5>General Information</h5>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-6">Name:</label>
                                    <div class="col-sm-6">{{ $profile->name }}</div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-6">Email:</label>
                                    <div class="col-sm-6">{{ $profile->email }}</div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-6">Phone:</label>
                                    <div class="col-sm-6">{{ $profile->phone_number }}</div>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-6">address:</label>
                                    <div class="col-sm-6">{{ $profile->address }} </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-6">city:</label>
                                    <div class="col-sm-6">{{ $profile->city }}</div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-6">state:</label>
                                    <div class="col-sm-6">{{ get_state((int) $profile->state) }}</div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-6">country:</label>
                                    <div class="col-sm-6">{{ get_country((int) $profile->country) }}</div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-6">location:</label>
                                    <div class="col-sm-6">{{ $profile->location }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h5>Students</h5>
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>program_title</th>
                                        <th>application_number</th>
                                        <th>start_date</th>
                                        <th>application_status</th>
                                        <th>fees</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->mobile_number }}</td>
                                            <td>{{ $student->address }}</td>
                                            <td>{{ $student->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
