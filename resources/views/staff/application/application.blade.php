@extends('staff.layouts.layout')
@section('content')

    @livewire('application-list' , ['applications' => $applications])

@endsection
