@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Students</h4>
                    <h1 class="card-title mb-0">{{$student}}</h1>

                </div>
            </div>
        </div>
        <div class="col-sm-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Agents</h4>
                    <h1 class="card-title mb-0">{{$agent}}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Staff</h4>
                    <h1 class="card-title mb-0">{{$staff}}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Universities</h4>
                    <h1 class="card-title mb-0">{{$university}}</h1>
                </div>
            </div>
        </div>

        <div class="col-sm-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Program</h4>
                    <h1 class="card-title mb-0">{{$program}}</h1>
                </div>
            </div>
        </div>

        <div class="col-sm-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Education</h4>
                    <h1 class="card-title mb-0">{{$education}}</h1>
                </div>
            </div>
        </div>

        <div class="col-sm-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Apply Program</h4>
                    <h1 class="card-title mb-0">{{$applyProgram}}</h1>
                </div>
            </div>
        </div>

        <div class="col-sm-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Payment History</h4>
                    <h1 class="card-title mb-0">{{$paymentHistory}}</h1>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection