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
                                <div class="col-sm-6">{{$profile->name}}</div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-6">Email:</label>
                                <div class="col-sm-6">{{$profile->email}}</div>
                            </div>

                        </div>
                        <div class="col-sm-6"></div>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Addedd</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <td>{{$student->first_name}} {{$student->last_name}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->mobile_number}}</td>
                                    <td>{{$student->address}}</td>
                                    <td>{{$student->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5>Staff</h5>
                    <div class="row">
                        <table class="table">
                            <thead>

                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Addedd</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach($staffs as $staff)
                                <tr>
                                    <td>{{$staff->name}}</td>
                                    <td>{{$staff->email}}</td>
                                    <td>{{$staff->phone_number}}</td>
                                    <td>{{$staff->address}}</td>
                                    <td>{{$staff->created_at}}</td>
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