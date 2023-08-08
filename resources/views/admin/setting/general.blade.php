@extends('admin.layouts.layout')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> General Setting </h3>
            <nav aria-label="breadcrumb">
                {{-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol> --}}
            </nav>
        </div>
        <div class="row">
          @livewire('admin.setting.general')
        </div>
    </div>
@endsection
