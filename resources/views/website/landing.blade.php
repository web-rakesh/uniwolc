@extends('website.layouts.layout')

@section('content')
    <!-- Header Slider -->
    <section class="header-slider-bg">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1" class=""></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="carousel-caption d-md-block">
                        <div class="carousel-slider-box">
                            <div class="carousel-slider-content">
                                <h1>Our Commitment to <span>Educating the World </span></h1>
                                {{-- <h1>CHANGING THE <span>WORLD</span> THROUGH <span>EDUCATION</span></h1> --}}
                                <p>I am a student exploring studying abroad</p>
                                <div class="carousel-slider-btn">
                                    <a class="carousel-slider-btn-bg" href="javascript:;">I am a recruitment partner</a>
                                    <a class="carousel-slider-btn-white" href="javascript:;">I work at a school</a>
                                </div>
                            </div>
                            <div>
                                <img src="assets/images/slider-01.jpg" height="400" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-caption d-md-block">
                        <div class="carousel-slider-box">
                            <div class="carousel-slider-content">
                                <h1>Our Commitment to <span>Educating the World </span></h1>
                                {{-- <h1>CHANGING THE <span>WORLD</span> THROUGH <span>EDUCATION</span></h1> --}}
                                <p>I am a student exploring studying abroad</p>
                                <div class="carousel-slider-btn">
                                    <a class="carousel-slider-btn-bg" href="javascript:;">I am a recruitment partner</a>
                                    <a class="carousel-slider-btn-white" href="javascript:;">I work at a school</a>
                                </div>
                            </div>
                            <div>
                                <img src="assets/images/slider-01.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-caption d-md-block">
                        <div class="carousel-slider-box">
                            <div class="carousel-slider-content">
                                <h1>Our Commitment to <span>Educating the World </span></h1>
                                {{-- <h1>CHANGING THE <span>WORLD</span> THROUGH <span>EDUCATION</span></h1> --}}
                                <p>I am a student exploring studying abroad</p>
                                <div class="carousel-slider-btn">
                                    <a class="carousel-slider-btn-bg" href="javascript:;">I am a recruitment partner</a>
                                    <a class="carousel-slider-btn-white" href="javascript:;">I work at a school</a>
                                </div>
                            </div>
                            <div>
                                <img src="assets/images/slider-01.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                                                                                                                                                                                                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                                                                                                                                                                          <span class="sr-only">Previous</span>
                                                                                                                                                                                                                        </a>
                                                                                                                                                                                                                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                                                                                                                                                                                                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                                                                                                                                                                          <span class="sr-only">Next</span>
                                                                                                                                                                                                                        </a>-->
        </div>
    </section>
    <!-- Header Slider End -->

    <!-- Help Students -->
    <section class="sub-new-awolc-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="sub-uniwolc-title">
                        <h3>Empowering Students to Secure Admission in Premier International Institutions </h3>

                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="sub-awolc-tab">

                        <div class="demo">
                            <div role="tabpanel">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-justified nav-tabs-dropdown" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#Executive" class="active show" aria-controls="Executive" role="tab"
                                            data-toggle="tab">Students</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#Master" aria-controls="Master" role="tab"
                                            data-toggle="tab">Recruitment Partners</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">

                                    <!-- Students -->
                                    <div role="tabpanel" class="tab-pane active show" id="Executive">
                                        <div class="row">

                                            <div class="col-12 col-lg-4">
                                                <div class="sub-students-box">
                                                    <img src="assets/images/find.png" height="81" alt="" />
                                                    <h5>Find programs quickly</h5>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <div class="sub-students-box">
                                                    <img src="assets/images/customer-service.png" height="81"
                                                        alt="" />
                                                    <h5>A Supportive Team Committed to Assisting You</h5>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <div class="sub-students-box">
                                                    <img src="assets/images/unlock.png" height="81" alt="" />
                                                    <h5>Unlock Access to Special Scholarships</h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Students End -->

                                    <!-- Recruitment Partners -->
                                    <div role="tabpanel" class="tab-pane" id="Master">
                                        <div class="row">

                                            <div class="col-12 col-lg-4">
                                                <div class="sub-students-box">
                                                    <img src="assets/images/easy-application.png" height="81"
                                                        alt="" />
                                                    <h5>One Easy Application Platform</h5>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <div class="sub-students-box">
                                                    <img src="assets/images/knowledge.png" height="81"
                                                        alt="" />
                                                    <h5>Knowledgeable Support Team</h5>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <div class="sub-students-box">
                                                    <img src="assets/images/data-driven.png" height="81"
                                                        alt="" />
                                                    <h5>Data Driven Insights</h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Recruitment Partners End -->

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Help Students End -->

    <!-- How We Help -->
    <section class="sub-how-we-help-bg">
        <div class="container">
            <div class="row">

                <div class="sub-how-we-help-main">
                    <div class="col-lg-6">
                        <div class="sub-how-img-help">
                            <a href="javascript:;" data-toggle="modal" data-target="#exampleModal"><img
                                    src="assets/images/how-we-help.jpg" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="sub-how-we-help-content">
                            <h3>How We <span>Help</span></h3>
                            <p></p>
                            {{-- <p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut
                                    Labore Et Dolore Magna Aliqua.</p> --}}
                            <a href="javascript:;">Partner With Us</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- How We Help End -->

    <!-- A Platform That Supports -->
    <section class="sub-new-awolc-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-6">
                    <div class="sub-plat-img-support">
                        <h2>Empowering You with our Comprehensive Platform </h2>
                        <div class="sub-plat-support-accordion">

                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true">
                                        <span class="title"><img src="assets/images/01-students.png" alt="" />
                                            Students</span>
                                        <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">We believe in your dreams and put in effort to help them
                                            come true. Connect with us to find and apply to programs and schools that fit
                                            your background, skills, and interests.</div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        <span class="title"><img src="assets/images/02-recruitment-partners.png"
                                                alt="" /> Recruitment Partners</span>
                                        <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">UniWolc is not just a platform - we are your reliable
                                            partner. - Our main goal is to support you in doing what you do best: assisting
                                            as many students as you can in achieving their dreams of studying abroad.</div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header collapsed" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false">
                                        <span class="title"><img src="assets/images/03-education-partners.png"
                                                alt="" /> Education Partners</span>
                                        <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">Expand your reach across the globe and attract a higher
                                            number of qualified students using a simple and user-friendly platform that is
                                            trusted by over 1500 institutions worldwide.</div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="sub-plat-img-support">
                        <img src="assets/images/student-supports.jpg" alt="" />
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- A Platform That Supports End -->

    <!-- Count Number -->
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="sub-count-number-bg">
                    <div class="sub-count-number-box">
                        <h6>400,000+</h6>
                        <p>Students Helped</p>
                    </div>
                    <div class="sub-count-number-box">
                        <h6>125,000+</h6>
                        <p>Programs</p>
                    </div>
                    <div class="sub-count-number-box">
                        <h6>10,000+</h6>
                        <p>Recruitment Partners</p>
                    </div>
                    <div class="sub-count-number-box">
                        <h6>1600+</h6>
                        <p>Partners Schools</p>
                    </div>
                    <div class="sub-count-number-box">
                        <h6>125+</h6>
                        <p>Countries</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Count Number End -->

    <!-- Passionate About Making Education -->
    <section class="sub-new-awolc-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="sub-uniwolc-title">
                        <h2>We’re Passionate About Making Education Accessible for Everyone</h2>
                    </div>
                </div>


                <div class="sub-making-education-pt-pb">
                    <div class="col-lg-6">
                        <div class="sub-making-edu-content">
                            <a href="javascript:;" data-toggle="modal" data-target="#exampleModal"><img
                                    src="assets/images/our-story.jpg" alt="" /></a>
                            <p>UNIWOLC Believes That Education Should Be Accessible To All. We Delivered 1,000 Backpacks And
                                School Supplies To Empower Children In India To Dream Big And Work Hard To Achieve Their
                                Dreams.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="sub-making-edu-content">
                            <a href="javascript:;" data-toggle="modal" data-target="#exampleModal"><img
                                    src="assets/images/our-story1.jpg" alt="" /></a>
                            <p>The STEM For Change Scholarship Seeks To Drive Diversity And Inclusion By Empowering Women
                                Worldwide To Pursue An Education In STEM. See How We Surprised The 2021 Recipients.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="sub-making-edu-btn">
                        <a href="javascript:;">Our Story</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Passionate About Making Education End -->

    <!-- Get Started With UNIWOLC -->
    <section class="sub-new-awolc-bg pt-0">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="sub-uniwolc-title">
                        <h2>We provide support to everyone in the industry stakeholders by Being Thought Leaders </h2>
                    </div>
                </div>

                <div class="sub-making-education-pt-pb">
                    <div class="col-lg-4">
                        <div class="sub-get-started-text">
                            <img src="assets/images/student.png" alt="" />
                            <h5>Students</h5>
                            <p>Planning to pursue your education abroad in Canada, the United States, the United Kingdom,
                                Australia, or Ireland? Let our team of experienced professionals assist you every step of
                                the way on your study abroad journey.</p>
                            <a href="{{ route('register') }}">Student Registration</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sub-get-started-text">
                            <img src="assets/images/education-partner.png" alt="" />
                            <h5>Education Partners</h5>
                            <p>Expand the diversity of your campus by becoming a partner institution with UniWolc. Attract
                                highly qualified students from across the globe. Get in touch with our Partner Relations
                                team to connect and explore partnership opportunities.</p>
                            <a href="{{ route('education.partners') }}">Partner Inquiry</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sub-get-started-text sub-get-started-text-last">
                            <img src="assets/images/recruitment-partnership.png" alt="" />
                            <h5>Recruitment Partners</h5>
                            <p>Are you involved in recruiting prospective students interested in studying in Canada, the
                                United States, the United Kingdom, Australia, or Ireland? Join us as a Recruitment Partner
                                at UniWolc and expand your reach to connect with aspiring students in these popular study
                                destinations.</p>
                            <a href="javascript:;">Recruiter Registration</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Get Started With UNIWOLC End -->

    <!-- What Our Partners Have to Say -->
    <section class="sub-new-awolc-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="sub-uniwolc-title">
                        <h2>What Our Partners Have to Say</h2>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="sub-awolc-tab">

                        <div class="demo">
                            <div role="tabpanel">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-justified nav-tabs-dropdown" role="tablist">

                                    <li role="presentation" class="active">
                                        <a href="#01Students" aria-controls="01Students" role="tab"
                                            data-toggle="tab" class="active show" aria-selected="false">Students</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#02Recruitment" aria-controls="02Recruitment" role="tab"
                                            data-toggle="tab" class="" aria-selected="true">Recruitment
                                            Partners</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#03Education" aria-controls="03Education" role="tab"
                                            data-toggle="tab" class="" aria-selected="true">Education Partners</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">

                                    <!-- Students -->
                                    <div role="tabpanel" class="tab-pane active show" id="01Students">
                                        <div class="row">

                                            <div class="sub-our-partners-box">

                                                <div id="testimonial4"
                                                    class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x"
                                                    data-ride="carousel" data-pause="hover" data-interval="5000"
                                                    data-duration="2000">

                                                    <div class="carousel-inner" role="listbox">
                                                        @forelse ($testimonial['student'] as $i => $student)
                                                            <div class="carousel-item {{ $i == 0 ? 'active' : '' }} ">

                                                                <div class="testimonial4_slide">
                                                                    <div class="col-12 col-lg-4"><img
                                                                            src="{{ $student->testimonial_image_url ?? 'assets/images/our-partners/01-our-partners.png' }}"
                                                                            class="img-circle img-responsive" /></div>
                                                                    <div class="col-lg-8">
                                                                        <h4>{{ $student->label ?? '' }}</h4>
                                                                        <span>{{ $student->title ?? '' }}</span>
                                                                        <p>{{ $student->content ?? '' }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @empty
                                                            <h4>No data found</h4>
                                                        @endforelse

                                                    </div>
                                                    @if (!empty($testimonial['student']) && count($testimonial['student']) > 1)
                                                        <a class="carousel-control-prev" href="#testimonial4"
                                                            data-slide="prev"><i class="fa-solid fa-arrow-left"></i></a>
                                                        <a class="carousel-control-next" href="#testimonial4"
                                                            data-slide="next"><i class="fa-solid fa-arrow-right"></i></a>
                                                    @endif
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!-- Students End -->

                                    <!-- Recruitment Partners -->
                                    <div role="tabpanel" class="tab-pane" id="02Recruitment">
                                        <div class="row">

                                            <div class="sub-our-partners-two-box">

                                                <div id="testimonial5"
                                                    class="carousel slide testimonial5_indicators testimonial5_control_button thumb_scroll_x swipe_x"
                                                    data-ride="carousel" data-pause="hover" data-interval="5000"
                                                    data-duration="2000">

                                                    <div class="carousel-inner" role="listbox">
                                                        @forelse ($testimonial['recruitment'] as $i => $recruitment_partner)
                                                            <div class="carousel-item {{ $i == 0 ? 'active' : '' }} ">

                                                                <div class="testimonial4_slide">
                                                                    <div class="col-12 col-lg-4"><img
                                                                            src="{{ $recruitment_partner->testimonial_image_url ?? 'assets/images/our-partners/01-our-partners.png' }}"
                                                                            class="img-circle img-responsive" /></div>
                                                                    <div class="col-lg-8">
                                                                        <h4>{{ $recruitment_partner->label ?? '' }}
                                                                        </h4>
                                                                        <span>{{ $recruitment_partner->title ?? '' }}</span>
                                                                        <p>{{ $recruitment_partner->content ?? '' }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @empty
                                                            <h4>No data found</h4>
                                                        @endforelse
                                                    </div>
                                                    @if (!empty($testimonial['recruitment']) && count($testimonial['recruitment']) > 1)
                                                        <a class="carousel-control-prev" href="#testimonial5"
                                                            data-slide="prev"><i class="fa-solid fa-arrow-left"></i></a>
                                                        <a class="carousel-control-next" href="#testimonial5"
                                                            data-slide="next"><i class="fa-solid fa-arrow-right"></i></a>
                                                    @endif
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!-- Recruitment Partners End -->

                                    <!-- Education Partners -->
                                    <div role="tabpanel" class="tab-pane" id="03Education">
                                        <div class="row">

                                            <div class="sub-our-partners-three-box">

                                                <div id="testimonial6"
                                                    class="carousel slide testimonial6_indicators testimonial6_control_button thumb_scroll_x swipe_x"
                                                    data-ride="carousel" data-pause="hover" data-interval="5000"
                                                    data-duration="2000">

                                                    <div class="carousel-inner" role="listbox">
                                                        @forelse ($testimonial['education'] as $i => $item)
                                                            <div class="carousel-item {{ $i == 0 ? 'active' : '' }} ">

                                                                <div class="testimonial4_slide">
                                                                    <div class="col-12 col-lg-4"><img
                                                                            src="{{ $item->testimonial_image_url ?? 'assets/images/our-partners/01-our-partners.png' }}"
                                                                            class="img-circle img-responsive" /></div>
                                                                    <div class="col-lg-8">
                                                                        <h4>{{ $item->label ?? '' }}</h4>
                                                                        <span>{{ $item->title ?? '' }}</span>
                                                                        <p>{{ $item->content ?? '' }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        @empty
                                                            <h4>No data found</h4>
                                                        @endforelse
                                                    </div>
                                                    @if (!empty($testimonial['education']) && count($testimonial['education']) > 1)
                                                        <a class="carousel-control-prev" href="#testimonial6"
                                                            data-slide="prev"><i class="fa-solid fa-arrow-left"></i></a>
                                                        <a class="carousel-control-next" href="#testimonial6"
                                                            data-slide="next"><i class="fa-solid fa-arrow-right"></i></a>
                                                    @endif

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!-- Education Partners End -->

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- What Our Partners Have to Say End -->

    <!-- Blogs -->
    <section class="sub-how-we-help-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="sub-uniwolc-title sub-blog-pt-pb">
                        <h2>We Support Every Stakeholder in the Industry by Being Thought Leaders</h2>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="main-universities-blog">
                        <div class="sub-img-universities">
                            <img src="assets/images/winners-thumb.jpg" alt="" />
                        </div>
                        <div class="sub-content-universities">
                            <h3><a href="javascript:;">Top Winter Wonderlands For Students In Ontario This Year</a></h3>
                            <p>DECEMBER 12, 2022</p>
                            <a href="javascript:;">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="main-universities-blog">
                        <div class="sub-img-universities">
                            <img src="assets/images/winners-thumb.jpg" alt="" />
                        </div>
                        <div class="sub-content-universities">
                            <h3><a href="javascript:;">Top Winter Wonderlands For Students In Ontario This Year</a></h3>
                            <p>DECEMBER 12, 2022</p>
                            <a href="javascript:;">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="main-universities-blog main-universities-blog-last">
                        <div class="sub-img-universities">
                            <img src="assets/images/winners-thumb.jpg" alt="" />
                        </div>
                        <div class="sub-content-universities">
                            <h3><a href="javascript:;">Top Winter Wonderlands For Students In Ontario This Year</a></h3>
                            <p>DECEMBER 12, 2022</p>
                            <a href="javascript:;">Read More</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Blogs End -->
@endsection

@push('js')
@endpush
