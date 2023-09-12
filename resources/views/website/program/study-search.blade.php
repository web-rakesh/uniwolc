@forelse ($studyResult as $item)
    <ul class="dropdown-menu d-block position-relative w-100 job-search-dropdown" role="menu">
        <li>{{ $item->program_title }}</li>
    </ul>
@empty
    <ul class="dropdown-menu d-block position-relative w-100 job-search-dropdown" role="menu">
        <li>No Result Found</li>
    </ul>
@endforelse
