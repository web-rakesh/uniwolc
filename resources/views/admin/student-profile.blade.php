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
                                <div class="col-sm-6">{{$profile->first_name}} {{$profile->last_name}}</div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-6">Email:</label>
                                <div class="col-sm-6">{{$profile->email}}</div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-6">Phone:</label>
                                <div class="col-sm-6">{{$profile->mobile_number}}</div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-6">gender:</label>
                                <div class="col-sm-6">{{$profile->gender}}</div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-6">dob:</label>
                                <div class="col-sm-6">{{$profile->dob}}</div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-6">fast_language:</label>
                                <div class="col-sm-6">{{$profile->fast_language}}</div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-6">gender:</label>
                                <div class="col-sm-6">{{$profile->gender}}</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <label for="" class="col-sm-6">passport_number:</label>
                                <div class="col-sm-6">{{$profile->passport_number}} </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-6">marital_status:</label>
                                <div class="col-sm-6">{{$profile->marital_status}}</div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-6">address:</label>
                                <div class="col-sm-6">{{$profile->address}}</div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-6">country:</label>
                                <div class="col-sm-6">{{$profile->country}}</div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-6">city:</label>
                                <div class="col-sm-6">{{$profile->city}}</div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-6">pincode:</label>
                                <div class="col-sm-6">{{$profile->pincode}}</div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-6">website:</label>
                                <div class="col-sm-6">{{$profile->website}}</div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5>Apply Programs</h5>
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
                        
                            @foreach($profile->applied_student_programs as $value)
                            <tr>
                                <td>{{$value->program_title}}</td>
                                <td>{{$value->application_number}}</td>
                                <td>{{$value->start_date}}</td>
                                <td>{{($value->application_status == 1)?'Paid':'Pending'}}</td>
                                <td>{{$value->fees}}</td>
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