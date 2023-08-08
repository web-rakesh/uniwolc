@extends('website.layouts.layout')
@section('content')
    <!-- Header inner Title -->
    <section class="header-banner-box">
        <div class="container">
            <div class="row">

                <div class="header-abroad-main">
                    <div class="col-lg-6">
                        <div class="header-abroad-content">
                            <h1>Uniwolc Blog</h1>
                            <p>Tips, Advice, And Updates To Help You Across Every Step Of The Study Abroad Journey.</p>
                            <a href="javascript:;">View All Articles</a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="header-img-abroad">
                            <img src="assets/images/inner-banner/blogs-banner.png" alt="" />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Header inner Title End -->

    <!-- Latest Resources -->
    <section class="sub-how-we-help-bg">
        @livewire('website.blog-list')
    </section>
    <!-- Latest Resources End -->
@endsection
