<ul class="dropdown-menu custome-dropdown-menu d-block position-relative w-100 job-search-dropdown" role="menu">
    @forelse ($schoolLocationResult as $item)
        <li>{{ $item->university_name }}</li>
    @empty
        <li>No Result Found</li>
    @endforelse
</ul>
