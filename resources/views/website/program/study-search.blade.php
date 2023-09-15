<ul class="dropdown-menu custome-dropdown-menu d-block position-relative w-100 job-search-dropdown" role="menu">
    @forelse ($studyResult as $item)
        <li>{{ $item->program_title }}</li>
    @empty
        <li>No Result Found</li>
    @endforelse
</ul>
