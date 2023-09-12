<div>
    {{-- The whole world belongs to you. --}}
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="sub-uniwolc-title sub-blog-pt-pb">
                    <h2>Recent Articles</h2>
                </div>
            </div>

            @forelse ($blogs as $blog)
                <div class="col-lg-4">
                    <div class="main-universities-blog">
                        <div class="sub-img-universities">
                             <img src="{{ $blog->profile_url }}" weight="612" height="307" alt="{{ $blog->title }}" />
                            {{-- <img src="assets/images/blogs/02-blog.png" alt="" /> --}}
                        </div>
                        <div class="sub-content-universities">
                            <h3><a href="{{ route('blog-details', $blog->slug) }}">{{ {{ \Str::words($blog->title, $limit = 10, $end = '...') }} }}</a></h3>
                            <p>{{ date('M d, Y', strtotime($blog->created_at)) }}</p>
                            <a href="{{ route('blog-details', $blog->slug) }}">Read More</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12">
                    <div class="sub-uniwolc-title sub-blog-pt-pb">
                        <h2>No Blogs Found</h2>
                    </div>
                </div>
            @endforelse

            <div class="col-lg-12">
                <div class="sub-explore-btn">
                    @if ($blogs->hasMorePages())
                        <button class="sub-get-started-btn" wire:click="loadMore">See More Articles</button>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
