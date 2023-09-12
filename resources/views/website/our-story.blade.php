@extends('website.layouts.layout')
@section('content')
    <!-- Header inner Title -->
    <section class="header-banner-box">
        <div class="container">
            <div class="row">

                <div class="header-abroad-main">
                    <div class="col-lg-6">
                        <div class="header-abroad-content">
                            <h1>We’re UNIWOLC</h1>
                            <p>We Empower People Around The World To Study Abroad And Access The Best Education.</p>
                            <a href="{{ route('login') }}">Learn How</a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="header-img-abroad">
                            <img src="assets/images/inner-banner/our-story-two-banner.jpg" height="603" alt="" />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Header inner Title End -->

    <!-- Our Story -->
    <section class="sub-how-we-help-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-6">
                    <div class="sub-best-img-programs">
                        <img src="assets/images/quality-applications.jpg" height="600" width="630" alt="" />
                        <div class="sub-story-btn-pt">
                            <a class="sub-start-btn-applica" href="{{ route('leadership') }}">Learn More About Our Leaders</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="sub-best-programs-content">
                        <p class="pt-0 pb-0">Uniwolc Simplifies The Study Abroad Search, Application, And Acceptance Process
                            By Connecting International Students, Recruitment Partners, And Academic Institutions On One
                            Platform. Founded In 2015 By Brothers Martin, Meti, And Massi Basiri, We’ve Built Partnerships
                            With 1,600+ Primary, Secondary, And Post-Secondary Educational Institutions, And Work With
                            10,000+ Recruitment Partners To Drive Diversity On Campuses Across Canada, The United States,
                            The United Kingdom, And Australia And Ireland.</p>
                        <p class="pb-0">Uniwolc Has Grown To Become The World’s Largest Online Platform For International
                            Student Recruitment, Assisting More Than 400,000 Students With Their Educational Journeys. In
                            2019, Uniwolc Was Named The Fastest-Growing Technology Company In Canada By Deloitte, Ranking #1
                            On The Technology Fast 50™ List. In 2021, Uniwolc Ranked #8 On Linkedin’s Top Startups List In
                            Canada.</p>
                        <p class="pb-0">Our Team Has Grown Rapidly In The Past Six Years, And We Now Have 1,500+ Team
                            Members Across The Globe. The Uniwolc Headquarters Is Located In Downtown Kitchener, ON, With
                            Representatives In More Than 30 Other Countries Including India, China, Vietnam, The
                            Philippines, Nepal, Bangladesh, The United Kingdom, Australia, And The United States.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Our Story End -->

    <!-- What We Do -->
    <section class="sub-new-awolc-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-6">
                    <div class="sub-plat-img-support">
                        <h2>What We Do</h2>

                        <div class="sub-plat-support-accordion">

                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true">
                                        <span class="title"><img src="assets/images/01-students.png" alt="">
                                            Students</span>
                                        <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed
                                            Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Lorem Ipsum Dolor
                                            Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut
                                            Labore Et Dolore Magna Aliqua.</div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        <span class="title"><img src="assets/images/02-recruitment-partners.png"
                                                alt=""> Recruitment Partners</span>
                                        <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed
                                            Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Lorem Ipsum Dolor
                                            Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut
                                            Labore Et Dolore Magna Aliqua.</div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseThree"
                                        aria-expanded="false">
                                        <span class="title"><img src="assets/images/03-education-partners.png"
                                                alt=""> Education Partners</span>
                                        <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed
                                            Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Lorem Ipsum Dolor
                                            Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut
                                            Labore Et Dolore Magna Aliqua.</div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="sub-plat-img-support">
                        <img src="assets/images/what-we-do.jpg" alt="" />
                        <div class="sub-story-btn-pt">
                            <a class="sub-start-btn-applica" href="{{ route('login') }}">Recruiter Registration</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- What We Do End -->

    <!-- How We Help -->
    <section class="sub-how-we-help-bg">
        <div class="container">
            <div class="row">

                <div class="sub-best-programs-box">
                    <div class="col-lg-6">
                        <div class="sub-best-img-programs">
                            <a href="{{ route('login') }}" data-toggle="modal" data-target="#exampleModal"><img
                                    src="assets/images/how-we-help-three.jpg" height="616" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="sub-best-programs-content sub-intern-wd-btn">
                            <h2>How We Help</h2>
                            <a href="{{ route('login') }}">Partner With Us</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- How We Help End -->

    <!-- At Uniwolc We’re Committed to Our Values -->
    <section class="sub-new-awolc-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="sub-uniwolc-title sub-choose-tt-pd">
                        <h2>At Uniwolc We’re Committed to Our Values</h2>
                    </div>
                </div>

                <div class="sub-easy-to-use-main">

                    <div class="col-lg-4">
                        <div class="sub-easy-to-use-box sub-expanding-hgt">
                            <img src="assets/images/help-students.png" height="71" alt="" />
                            <h6>Helping Students Achieve Success</h6>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sub-easy-to-use-box sub-expanding-hgt">
                            <img src="assets/images/caring-about.png" height="71" alt="" />
                            <h6>Caring About Each Other</h6>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sub-easy-to-use-box sub-expanding-hgt">
                            <img src="assets/images/experience.png" height="71" alt="" />
                            <h6>Delivering A+ Customer Experience</h6>
                        </div>
                    </div>

                </div>

                <div class="sub-easy-to-use-main pt-4">

                    <div class="col-lg-4">
                        <div class="sub-easy-to-use-box sub-expanding-hgt">
                            <img src="assets/images/ownership.png" height="71" alt="" />
                            <h6>Taking Ownership</h6>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sub-easy-to-use-box sub-expanding-hgt">
                            <img src="assets/images/innovating.png" height="71" alt="" />
                            <h6>Innovating an Improving</h6>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sub-easy-to-use-box sub-expanding-hgt">
                            <img src="assets/images/making-work.png" height="71" alt="" />
                            <h6>Making Work Fun</h6>
                        </div>
                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="sub-explore-btn">
                        <a class="sub-get-started-btn" href="{{ route('login') }}">Let’s Get Started</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- At Uniwolc We’re Committed to Our Values End -->

    <!-- Count Number -->
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="sub-count-number-bg sub-count-number-bg-pt-pb mt-0">
                    <div class="sub-count-number-box">
                        <h6>400,000+</h6>
                        <p>Students Helped</p>
                    </div>
                    <div class="sub-count-number-box">
                        <h6>10,000+</h6>
                        <p>Recruitment Partners</p>
                    </div>
                    <div class="sub-count-number-box">
                        <h6>1,600+</h6>
                        <p>Partners Schools</p>
                    </div>
                    <div class="sub-count-number-box">
                        <h6>1,500+</h6>
                        <p>Team Members Globally</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Count Number End -->

    <!-- Our History -->
    <section class="sub-how-we-help-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="sub-uniwolc-title sub-choose-tt-pd">
                        <h2>Our History</h2>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="timeline">

                        <div class="timeline-container right">
                            <div class="number">
                                <span class="circle">1</span>
                            </div>
                            <div class="content">
                                <div class="date  date_bg_1 gradient_forest ">
                                    <h4>January 2021</h4>
                                </div>
                                <p>Launched Down Under In Australia</p>
                            </div>
                        </div>

                        <div class="timeline-container left">
                            <div class="number">
                                <span class="circle">2</span>
                            </div>
                            <div class="content">
                                <div class="date  date_bg_2 gradient_blue">
                                    <h4>February 2021</h4>
                                </div>
                                <p>Partnered With 7,500 Recruitment Partners</p>
                            </div>
                        </div>

                        <div class="timeline-container right">
                            <div class="number">
                                <span class="circle">3</span>
                            </div>
                            <div class="content">
                                <div class="date  date_bg_1 gradient_forest">
                                    <h4>January 2021</h4>
                                </div>
                                <p>Launched Down Under In Australia</p>
                            </div>
                        </div>

                        <div class="timeline-container left">
                            <div class="number">
                                <span class="circle">4</span>
                            </div>
                            <div class="content">
                                <div class="date  date_bg_2 gradient_blue">
                                    <h4>February 2021</h4>
                                </div>
                                <p>Launched Down Under In Australia</p>
                            </div>
                        </div>

                        <div class="timeline-container right">
                            <div class="number">
                                <span class="circle">5</span>
                            </div>
                            <div class="content">
                                <div class="date  date_bg_1 gradient_forest">
                                    <h4>March 2021</h4>
                                </div>
                                <p>Launched STEM For Change Scholarship Program For Women Studying STEM</p>
                            </div>
                        </div>

                        <div class="timeline-container left">
                            <div class="number">
                                <span class="circle">6</span>
                            </div>
                            <div class="content">
                                <div class="date  date_bg_2 gradient_blue">
                                    <h4>April 2021</h4>
                                </div>
                                <p>Launched ABCC – Canada Course To Enable Recruitment Partners To Succeed</p>
                            </div>
                        </div>

                        <div class="timeline-container right">
                            <div class="number">
                                <span class="circle">7</span>
                            </div>
                            <div class="content">
                                <div class="date  date_bg_1 gradient_forest">
                                    <h4>May 2021</h4>
                                </div>
                                <p>200,000 Students Helped</p>
                            </div>
                        </div>

                        <div class="timeline-container left">
                            <div class="number">
                                <span class="circle">8</span>
                            </div>
                            <div class="content">
                                <div class="date  date_bg_2 gradient_blue">
                                    <h4>June 2021</h4>
                                </div>
                                <p>$375 Million Series D Funding</p>
                            </div>
                        </div>

                        <div class="timeline-container right">
                            <div class="number">
                                <span class="circle">9</span>
                            </div>
                            <div class="content">
                                <div class="date  date_bg_1 gradient_forest">
                                    <h4>June 2021</h4>
                                </div>
                                <p>1,000 Team Members</p>
                            </div>
                        </div>

                        <div class="timeline-container left">
                            <div class="number">
                                <span class="circle">10</span>
                            </div>
                            <div class="content">
                                <div class="date  date_bg_2 gradient_blue">
                                    <h4>October 2021</h4>
                                </div>
                                <p>Ranked #8 On Linkedin Top Startups</p>
                            </div>
                        </div>

                        <div class="timeline-container right">
                            <div class="number">
                                <span class="circle">11</span>
                            </div>
                            <div class="content">
                                <div class="date  date_bg_1 gradient_forest">
                                    <h4>November 2021</h4>
                                </div>
                                <p>Uniwolc Ranks #7 On The 2021 Deloitte Technology Fast 50™ Program</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Our History End -->

    <!-- Get Started with Uniwolc -->
    <section class="sub-new-awolc-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="sub-uniwolc-title sub-blog-pt-pb">
                        <h2>Get Started with Uniwolc</h2>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="main-universities-blog">
                        <div class="sub-img-universities">
                            <img src="assets/images/blog-thumb.jpg" alt="" />
                        </div>
                        <div class="sub-content-universities">
                            <h3><a href="{{ route('login') }}">Students</a></h3>
                            <p>Are You A Student Looking To Study Abroad In Canada, The United States, The United Kingdom,
                                Or Australia? Register To Let Our Team Of Experts Guide You Through Your Journey.</p>
                            <a href="{{ route('register') }}">Student Registration</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="main-universities-blog">
                        <div class="sub-img-universities">
                            <img src="assets/images/blog-thumb.jpg" alt="" />
                        </div>
                        <div class="sub-content-universities">
                            <h3><a href="{{ route('login') }}">Partner Schools</a></h3>
                            <p>Become An Uniwolc Partner School To Diversify Your Campus By Attracting Qualified Students
                                From Around The World. Complete This Form And Our Partner Relations Team Will Be In Touch.
                            </p>
                            <a href="{{ route('register') }}">Partner Inquiry</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="main-universities-blog">
                        <div class="sub-img-universities">
                            <img src="assets/images/blog-thumb.jpg" alt="" />
                        </div>
                        <div class="sub-content-universities">
                            <h3><a href="{{ route('login') }}">Recruitment Partners</a></h3>
                            <p>Do You Recruit Prospective Students Who Want To Study In Canada, The United States, The
                                United Kingdom, Or Australia? Register To Become An Uniwolc Certified Recruitment Partner.
                            </p>
                            <a href="{{ route('register') }}">Recruiter Registration</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Get Started with Uniwolc End -->
@endsection
