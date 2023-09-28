@extends('website.layouts.layout')
@section('content')
    <!-- Custome Page Content Starts-->
    <section class="pt-5 pb-5 customePageContentsec">
        <div class="container">
            <div class="customePageContentsecinner">
                <div class="row">
                    <div class="col-md-12">
                        {!! $terms_and_condition !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Custome Page Content End -->
@endsection
