@extends('university.layouts.layout')
@section('content')
    <section style="background-color: #eee;">
        @livewire('university.apply-program-list' , ['program_status' => $status, 'label' => $page_label])

    </section>
@endsection
