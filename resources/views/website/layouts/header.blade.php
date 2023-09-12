<!-- Header -->
<header>
    <div class="container">
        <div class="row1">

            <div class="header-menu-uinw headerArea d-flex flex-wrap1 align-items-center justify-content-center">


                <nav class="navbar navbar-expand-lg navbar-dark">
                    <a class="navbar-brand" href="{{ route('landing') }}"><img
                            src="{{ asset('/') }}assets/images/logo.png" alt="" /></a>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="{{ route('students') }}">Students</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('recruiters') }}">Recruitments
                                    Partners</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('education.partners') }}">Education
                                    Partners</a></li>
                        </ul>
                    </div>


                    <div class="headerMiddleArea">
                        <div class="header-search-box">
                            {{-- <div>
                            <form class="form-inline">
                                <input class="form-control" type="search" placeholder="Search">
                                <button class="btn btn-outline-success my-2 my-lg-0" type="submit"><i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div> --}}
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-bars"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('our.solutions') }}">Our Solutions</a>
                                    <a class="dropdown-item" href="{{ route('our.story') }}">Our Story</a>
                                    <a class="dropdown-item" href="{{ route('careers') }}">Careers</a>
                                    <a class="dropdown-item" href="{{ route('press') }}">Press</a>
                                    <a class="dropdown-item" href="{{ route('life') }}">Life</a>
                                    <a class="dropdown-item" href="{{ route('leadership') }}">Leadership</a>
                                    <a class="dropdown-item" href="{{ route('contact') }}">Contact</a>
                                    <a class="dropdown-item" href="{{ route('blog') }}">Blog</a>
                                    <a class="dropdown-item" href="{{ route('news') }}">News</a>
                                    {{-- <a class="dropdown-item" href="{{ route('apply.insights') }}">ApplyInsights</a> --}}
                                    {{-- <a class="dropdown-item" href="{{ route('apply.insights') }}">Trends Report</a> --}}
                                    <a class="dropdown-item" href="{{ route('trends.report') }}">Global Trends</a>
                                    {{-- <a class="dropdown-item" href="{{ route('trends.report') }}">Trends Report</a> --}}
                                </div>
                            </div>
                        </div>

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation"><!-- <span
                                class="navbar-toggler-icon"></span>--> <i class="fa-solid fa-bars"></i></button>

                    </div>
                </nav>
                <div class="headerrightArea">
                    @auth
                        <div class="sub-btn-regst my-2 my-md-0">

                            @if (Auth::user()->type == 'agent')
                                <a href="{{ route('agent.dashboard') }}" class="btn btn-outline-primary"> Dashboard</a>
                            @elseif(Auth::user()->type == 'student')
                                <a href="{{ route('student.dashboard') }}" class="btn btn-outline-primary"> Dashboard</a>
                            @elseif(Auth::user()->type == 'staff')
                                <a href="{{ route('staff.dashboard') }}" class="btn btn-outline-primary"> Dashboard</a>
                            @elseif(Auth::user()->type == 'university')
                                <a href="{{ route('university.dashboard') }}" class="btn btn-outline-primary">
                                    Dashboard</a>
                            @else
                                <a href="{{ route('landing') }}" class="btn btn-outline-primary"> Dashboard</a>
                            @endif
                            {{-- <a href="{{ route('logout') }}"> <button class="btn btn-primary"
                                    type="submit">Logout</button></a> --}}

                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <button class="btn btn-primary" type="submit">Logout</button>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    @else
                        <div class="sub-btn-regst my-2 my-lg-0">
                            <a href="{{ route('login') }}"> <button class="btn btn-outline-primary" type="submit">Log
                                    In</button></a>
                            <a href="{{ route('register') }}"> <button class="btn btn-primary" type="submit">Sign
                                    Up</button></a>
                        </div>
                    @endauth
                    {{-- <div class="sub-btn-regst my-2 my-lg-0">
                        <a href="{{ route('login') }}"> <button class="btn btn-outline-primary" type="submit">Log
                                In</button></a>
                        <a href="{{ route('register') }}"> <button class="btn btn-primary" type="submit">Sign
                                Up</button></a>
                    </div> --}}
                </div>



            </div>

        </div>
    </div>
</header>
<!-- Header End -->
