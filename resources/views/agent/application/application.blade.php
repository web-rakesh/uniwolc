@extends('agent.layouts.layout')
@section('content')
    @livewire('application-list', ['applications' => $applications, 'programStatus' => $programStatus])
@endsection
