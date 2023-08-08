@extends('admin.layouts.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @livewire('admin.setting.level-of-education')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
