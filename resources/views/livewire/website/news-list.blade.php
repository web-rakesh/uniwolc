<div>
    {{-- The whole world belongs to you. --}}
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="sub-uniwolc-title sub-blog-pt-pb">
                    <h2>Recent Articles</h2>
                </div>
            </div>

            @forelse ($news as $item)
                <div class="col-lg-4">
                    <div class="main-universities-blog">
                        <div class="sub-img-universities">
                            <img src="{{ $item->profile_url }}" alt="" />
                            {{-- <img src="assets/images/news/02-item.png" alt="" /> --}}
                        </div>
                        <div class="sub-content-universities">
                            <h3><a href="{{ route('news-details', $item->slug) }}">{{ $item->title }}</a></h3>
                            <p>{{ date('M d, Y', strtotime($item->created_at)) }}</p>
                            <a href="{{ route('news-details', $item->slug) }}">Read More</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12">
                    <div class="sub-uniwolc-title sub-blog-pt-pb">
                        <h2>No news Found</h2>
                    </div>
                </div>
            @endforelse

            <div class="col-lg-12">
                <div class="sub-explore-btn">
                    @if ($news->hasMorePages())
                        <button class="sub-get-started-btn" wire:click="loadMore">See More Articles</button>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
