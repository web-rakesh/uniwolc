@extends('website.layouts.layout')
@section('content')
    <section class="sub-how-we-help-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 offset-lg-2">
                    <div class="sub-our-story-title">
                        <h1>{{ $news->title }}</h1>
                        <span>{{ date('M d, Y', strtotime($news->created_at)) }}</span>
                    </div>
                    <div class="sub-our-story-img-blog">
                        <img src="{{ $news->profile_url }}" alt="" />
                    </div>
                    <div class="sub-our-story-blog-content">
                        {!! $news->content !!}
                    </div>
                    <div class="sub-our-story-blog-content">
                        {!! $news->description !!}
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="sub-how-we-help-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="sub-uniwolc-title sub-blog-pt-pb">
                        <h2>Check Out Our News</h2>
                    </div>
                </div>

                @forelse ($recentNews as $item)
                    <div class="col-lg-4">
                        <div class="main-universities-blog">
                            <div class="sub-img-universities">
                                <img src="{{ $item->profile_url }}" alt="" />
                                {{-- <img src="assets/images/blogs/02-blog.png" alt="" /> --}}
                            </div>
                            <div class="sub-content-universities">
                                <h3><a href="{{ route('news-details', $item->slug) }}">{{ $blog->title }}</a></h3>
                                <p>{{ date('M d, Y', strtotime($item->created_at)) }}</p>
                                <a href="{{ route('news-details', $item->slug) }}">Read More</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12">
                        <div class="sub-uniwolc-title sub-blog-pt-pb">
                            <h4>No Blogs Found</h4>
                        </div>
                    </div>
                @endforelse


            </div>
        </div>
    </section>
@endsection
