@forelse ($programs as $program)
    <div class="course-tab-content">
        <div class="d-flex flex-wrap justify-content-between">
            <div class="col-lg-9 p-0">
                <div class="sub-course-tt-box">
                    <div class="sub-course-unt-title">
                        <h6>{{ $program->program_level }}</h6>
                        <h3>{{ $program->program_length }}</h3>
                        <p>{{ $program->program_title }}</p>
                    </div>
                    <div class="sub-course-country">
                        <i class="fa-sharp fa-solid fa-location-dot"></i> {{ $program->university->location }}
                    </div>
                    <div class="sub-course-appl-bg">
                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <div class="sub-tution-text">
                                <h6>Tuition Fee</h6>
                                <p>
                                    {{ get_currency($program->university->country) }}
                                    {{ $program->gross_tuition }}
                                    {{-- {{ number_format($program->gross_tuition ?? 0, 2) }} --}}
                                    {{ get_payment_currency($program->university->country) }}

                                </p>
                            </div>
                            <div class="sub-tution-text">
                                <h6>Application Fee</h6>
                                <p>
                                    {{ get_currency($program->university->country) }}
                                    {{ $program->application_fee }}
                                    {{-- {{ number_format($program->application_fee, 2) }} --}}
                                    {{ get_payment_currency($program->university->country) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 p-0">
                <div class="sub-course-btn-left">
                    @auth
                        <a class="sub-start-btn-applica agent-student-apply-eligibility"
                          data-program="{{ $program->id }}"  href="javascript:;">Start
                            Application</a>
                        {{-- <a class="sub-start-btn-applica agent-student-apply-eligibility"
                            href="{{ route('student.program.apply', $program->id) }}">Start
                            Application</a> --}}
                    @else
                        <a class="sub-start-btn-applica" href="{{ route('login') }}">Start
                            Application</a>
                    @endauth
                    <a class="sub-program-det-border-btn" target="_blank"
                        href="{{ route('program.detail', ['id' => $program->id, 'slug' => $program->slug]) }}">Program
                        Details</a>
                </div>
            </div>
        </div>
    </div>
@empty
    <h1>No Programs Found</h1>
@endforelse
{{-- <div>
    <button id="load_more_button" data-page="{{ $programs->currentPage() + 1 }}" class="btn btn-primary">Load
        More</button>
</div> --}}

