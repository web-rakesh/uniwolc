<div>
    <div class="row">
        <div class="col-lg-8 offset-lg-4">
            <div class="row">
                <div class="sub-courses-form">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" class="form-control" wire:model="studies"
                                placeholder="What would you like to study?" />
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <input type="text" class="form-control" wire:model="schoolOrLocation"
                                placeholder="Where? e.g. school name or location" />
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-primary" wire:click="eligibilitySearch()">
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="sub-courses-form-left">
                <h3>Eligibility</h3>

                <div class="sub-courses-form-left-box">

                    <div class="form-group">
                        <label>Do you have a valid Study Permit / Visa?</label>
                        <select class="form-control" wire:model="visa_permit">
                            <option selected="selected">I don't have this</option>
                            <option>USA F1 Visa</option>
                            <option>Canadian Study Permit or Visitor Visa</option>
                            <option>
                                UK Student Visa (Tier 4) or short Term Study Visa
                            </option>
                            <option>Australian Student Visa</option>
                            <option>Irish Stamp 2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nationality</label>
                        <select class="form-control">
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Education Country</label>
                        <select class="form-control">
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Education Level</label>
                        <select class="form-control" wire:model="education_level">
                            @foreach ($educationLevels as $level)
                                <option value="{{ $level->id }}">{{ $level->level_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Grading Scheme</label>
                        <select class="form-control">
                            @foreach ($gradingSchemes as $item)
                                <option value="{{ $item->id }}">{{ $item->scheme }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Grading Average</label>
                        <input type="text" class="form-control" wire:model="grading_average" />
                    </div>
                    <div class="form-group">
                        <label>Education Level</label>
                        <select class="form-control">
                            <option selected="selected">I don't have this</option>
                            <option>I will provide this later</option>
                            <option>TOEFL</option>
                            <option>IETLS</option>
                            <option>Duolingo English Test</option>
                            <option>PTE</option>
                        </select>
                    </div>
                    <div class="form-group sub-border-none">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                            <label class="form-check-label" for="exampleCheck1">Only Show Direct
                                Admissions</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" wire:click="eligibilitySearch()">
                        Apply Filters
                    </button>

                </div>

                <h3 class="pt-5">School Filters</h3>

                <div class="sub-courses-form-left-box">
                    <form>
                        <div class="form-group">
                            <label>Countries</label>
                            <select class="form-control" wire:model="schoolCountry">
                                <option selected="selected">Select...</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <div class="sub-school-border-none">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck3" />
                                    <label class="form-check-label" for="exampleCheck3">Post-Graduation Work
                                        Permit Available
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Provinces / States</label>
                            <select class="form-control">
                                <option value="">Select Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label>Campus City</label>
                            <select class="form-control">
                                <option selected="selected">Select...</option>
                                <option>USA</option>
                                <option>Canada</option>
                                <option>United Kingdom</option>
                                <option>Australia</option>
                                <option>Ireland</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>School Types</label>
                            <div class="sub-school-border-none">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" wire:model="schoolType"
                                        id="exampleCheck4" value="university" />
                                    <label class="form-check-label" for="exampleCheck4">University</label>
                                </div>
                            </div>
                            <div class="sub-school-border-none">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" wire:model="schoolType"
                                        id="exampleCheck5" value="college" />
                                    <label class="form-check-label" for="exampleCheck5">College</label>
                                </div>
                            </div>
                            <div class="sub-school-border-none">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck6"
                                        wire:model="schoolType" value="english_institution" />
                                    <label class="form-check-label" for="exampleCheck6">English Institute</label>
                                </div>
                            </div>
                            <div class="sub-school-border-none">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck7"
                                        wire:model="schoolType" value="school" />
                                    <label class="form-check-label" for="exampleCheck7">High School</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group sub-border-none">
                            <label>Schools</label>
                            <select class="form-control">
                                <option selected="selected">Select...</option>
                                <option>Conestoga College - Doon</option>
                                <option>University of Waterloo</option>
                                <option>Humber College - North</option>
                            </select>
                        </div>
                    </form>
                </div>

                <h3 class="pt-5">Program Filters</h3>

                <div class="sub-courses-form-left-box">
                    <div class="form-group">
                        <label>Program Levels</label>
                        <select class="form-control" wire:model="program_level">
                            <option selected="selected">Select...</option>
                            @foreach ($educationLevels as $level)
                                <option value="{{ $level->id }}">{{ $level->level_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Intakes</label>
                        <select class="form-control">
                            <option selected="selected">Select...</option>
                            <option>Dec 2022 - Mar 2023</option>
                            <option>February 2023</option>
                            <option>March 2023</option>
                            <option>Apr - Jul 2023</option>
                            <option>April 2023</option>
                            <option>May 2023</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Intakes Status</label>
                        <select class="form-control">
                            <option selected="selected">Select...</option>
                            <option>Open</option>
                            <option>Likely Open</option>
                            <option>Will Open</option>
                            <option>Waitlist</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Post-Secondary Discipline</label>
                        <select class="form-control">
                            <option selected="selected">Select...</option>
                            <option>
                                Aero space, Aviation and Pilot Technology
                            </option>
                            <option>Agriculture</option>
                            <option>Architure</option>
                            <option>Biomedical Engineering</option>
                        </select>
                    </div>
                    <div class="form-group sub-border-none">
                        <label>Post-Secondary Sub-Categories</label>
                        <select class="form-control">
                            <option selected="selected">Select...</option>
                            <option>
                                Aero space, Aviation and Pilot Technology
                            </option>
                            <option>Agriculture</option>
                            <option>Architure</option>
                            <option>Biomedical Engineering</option>
                        </select>
                        <p>
                            All amounts are listed in the currency charged by the
                            school. For best results, please specify a country of
                            the school.
                        </p>
                    </div>
                    <div class="form-group sub-border-none">
                        <div class="d-flex flex-wrap justify-content-between">
                            <div><label>Tuition Fee</label></div>
                            <div>
                                <div class="sub-school-border-none">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck8" />
                                        <label class="form-check-label" for="exampleCheck8">Include living
                                            costs</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group sub-border-none">
                        <div class="range-slider">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="slider-range"></div>
                                </div>
                            </div>
                            <div class="slider-labels">
                                <div class="caption">
                                    <span id="slider-range-value1"></span>
                                </div>
                                <div class="text-right caption">
                                    <span id="slider-range-value2"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <form>
                                        <input type="hidden" name="min-value" value="" />
                                        <input type="hidden" name="max-value" value="" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group sub-border-none">
                        <label>Application Fee</label>
                    </div>

                    <div class="form-group sub-border-none">
                        <div class="row sub-form-btn-appl-clear d-flex flex-wrap justify-content-between">
                            <div class="col-lg-6">
                                <a class="sub-program-det-border-btn mt-0" href="javascript:;">APPLY FILTERS</a>
                            </div>
                            <div class="col-lg-6">
                                <a class="sub-start-btn-applica" wire:click="clearFilter()" href="javascript:;">CLEAR
                                    FILTERS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="course-left-wrap">
                <div class="course-tab-list nav pt-40 pb-25 mb-35">
                    <a class="active" href="#course-details-1" data-toggle="tab">
                        <h4>Programs <span>({{ $programs->count() }}+)</span></h4>
                    </a>
                    <a href="#course-details-2" data-toggle="tab" class="">
                        <h4>Schools <span>({{ $schools->count() }}+)</span></h4>
                    </a>
                </div>
                <div class="course-tab-relevance sub-cour-two-right">
                    <div class="form-group">
                        <select class="form-control" wire:model="school_short">
                            <option value="" selected="selected">Relevance</option>
                            <option value="school_rank">School Rank</option>
                            <option value="tuition_l_h">
                                Tuition (Low to High)
                            </option>
                            <option value="tuition_h_l">
                                Tuition (High to Low)
                            </option>
                            <option value="application_fee_l_h">
                                Application Fee (Low to High)
                            </option>
                            <option value="application_fee_h_l">
                                Application Fee (High to Low)
                            </option>
                        </select>
                    </div>
                </div>
                {{-- {{ $programs }} --}}
                <div class="tab-content jump">
                    <!-- course-details-1 -->
                    <div class="tab-pane active" id="course-details-1">
                        {{-- @forelse ($programs as $program) --}}

                        @forelse ($programs as $item)

                            <div class="programsCard">
                                <div class="programsCardBody">
                                    <div class="programsCardThumnailGalleryArea">
                                        <div class="verified">
                                            <i class="fa-regular fa-shield-check"></i>
                                            <span class="txt">Verified</span>
                                        </div>
                                        <div class="superagent">
                                            <i class="fa-regular fa-star"></i>
                                            <span class="txt">Superagent</span>
                                        </div>
                                        <div class="programsCardThumnailSlider owl-carousel owl-loaded owl-drag">
                                            <div class="owl-stage-outer">
                                                <div class="owl-stage"
                                                    style="transform: translate3d(-39.375rem, 0rem, 0rem); transition: all 0s ease 0s; width: 137.8125rem;">
                                                    @forelse ($item->university->getMedia('university-picture') ?? [] as $image)
                                                        <div class="owl-item cloned"
                                                            style="width: 18.75rem; margin-right: .9375rem">
                                                            <div class="programsCardThumnailSliderItem">
                                                                <div class="programsCardThumnail">
                                                                    <img src="{{ $image->getUrl() }}"
                                                                        class="img-fluid w-100"
                                                                        alt="{{ $image->getUrl() }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <div class="owl-item"
                                                            style="width: 18.75rem; margin-right: .9375rem">
                                                            <div class="programsCardThumnailSliderItem">
                                                                <div class="programsCardThumnail">
                                                                    <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                        class="img-fluid w-100" alt="" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforelse


                                                </div>
                                            </div>
                                            <div class="owl-nav">
                                                <button type="button" role="presentation" class="owl-prev">
                                                    <i class="fa fa-angle-left"
                                                        aria-hidden="true"></i></button><button type="button"
                                                    role="presentation" class="owl-next">
                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            <div class="owl-dots">
                                                <button role="button" class="owl-dot active">
                                                    <span></span></button><button role="button" class="owl-dot">
                                                    <span></span></button><button role="button" class="owl-dot">
                                                    <span></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="programsCardContentArea">
                                        <div class="d-flex justify-content-between programsCardIntro">
                                            <div class="programsCardIntroLeftPart">
                                                @if (auth()->user()->type == 'agent')
                                                    <a target="blank"
                                                        href="{{ route('agent.program.detail', $item->slug) }}">
                                                        <div class="programsCardIntroPrice">
                                                            {{ $item->program_title }}
                                                        </div>
                                                    </a>
                                                @elseif(auth()->user()->type == 'staff')
                                                    <a target="blank"
                                                        href="{{ route('staff.program.detail', $item->slug) }}">
                                                        <div class="programsCardIntroPrice">
                                                            {{ $item->program_title }}
                                                        </div>
                                                    </a>
                                                @else
                                                    <a target="blank"
                                                        href="{{ route('student.program.detail', $item->slug) }}">">
                                                        <div class="programsCardIntroPrice">
                                                            {{ $item->program_title }}
                                                        </div>
                                                    </a>
                                                @endif
                                                <div class="programsCardIntroTitle">
                                                    Non dolores sed eos
                                                    {{ $item->program_level }}
                                                </div>
                                                <div class="programsCardIntroTitle">
                                                    {{ $item->minimum_level_education }}
                                                </div>
                                                <div class="programsCardIntroTitle">
                                                    Tuition Fee:
                                                    {{ get_currency($item->university->country) }}{{ $item->gross_tuition }}

                                                </div>
                                                <div class="programsCardIntroTitle">
                                                    Application Fee:
                                                    {{ get_currency($item->university->country) }}{{ $item->application_fee }}
                                                </div>
                                            </div>
                                            <!-- <div class="programsCardIntroRightPart">
                                                 <p class="programsCardIntroTag programsCardIntroPremium">Premium</p>
                                                 <div class="">
                                                 <div class="programsCardIntroBrokerImage">
                                                 <img src="https://www.propertyfinder.ae/broker/1/178/98/MODE/ac93a7/5521-logo.webp?ctr=ae" class="img-fluid" alt="">
                                                 </div>
                                                 </div>
                                                 </div> -->
                                        </div>
                                        <div class="programsCardTop"></div>
                                        <div class="programsSpecifications">
                                            <p class="programsSpecificationsLocation">
                                                <span class="programsSpecificationsLocationText">
                                                    <i class="fa-regular fa-location-dot"></i>
                                                    Est consectetur lib, Nostrum velit non h,
                                                    Aliqua Repellendus, India,Harum minima non ips
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="programsCardFooter">
                                    <div class="d-flex programsCardFooterinner">
                                        <div class="leftPart">
                                            <div class="d-flex programsUserArea">
                                                <!-- <div class="programsUserThumnail">
                                                 <img src="https://t3.ftcdn.net/jpg/00/64/67/52/360_F_64675209_7ve2XQANuzuHjMZXP3aIYIpsDKEbF5dD.jpg" class="img-fluid" alt="">
                                                 </div> -->
                                                <div class=""></div>
                                            </div>
                                        </div>

                                        <div class="rightpart">
                                            <div class="programsCardFooterButtonsArea">
                                                @if (auth()->user()->type == 'agent')
                                                    <a href="{{ route('agent.program.detail', $item->slug) }}">
                                                        <button type="button"
                                                            class="programsCardFooterButton callBtn">
                                                            Apply
                                                        </button>
                                                    </a>
                                                @elseif(auth()->user()->type == 'staff')
                                                    <a href="{{ route('staff.program.detail', $item->slug) }}">
                                                        <button type="button"
                                                            class="programsCardFooterButton callBtn">
                                                            Apply
                                                        </button>
                                                    </a>
                                                @else
                                                    <a href="{{ route('student.program.detail', $item->slug) }}">
                                                        <button type="button"
                                                            class="programsCardFooterButton callBtn">
                                                            Apply
                                                        </button>
                                                    </a>
                                                @endif
                                                {{-- <a href="{{ route('student.program.detail', $item->id) }}">
                                                    <button type="button" class="programsCardFooterButton callBtn">
                                                        Apply
                                                    </button>
                                                </a> --}}
                                                <!-- <a href="#">
                                                                            <button  type="button" class="programsCardFooterButton callBtn">Details</button>
                                                                            </a> -->
                                                @if (auth()->user()->type == 'student')
                                                    <a href="{{ route('student.program.detail', $item->slug) }}">
                                                        <button type="button"
                                                            class="programsCardFooterButton callBtn">
                                                            Details
                                                        </button>
                                                    </a>
                                                @endif
                                                <!-- <button  type="button" class="programsCardFooterButton callBtn"><i class="fa-regular fa-phone"></i> Call</button>
                                                 <button  type="button" class="programsCardFooterButton emailBtn"><i class="fa-regular fa-envelope"></i> Email</button>
                                                 <button  type="button" class="programsCardFooterButton whatsappBtn"><i class="fa-brands fa-whatsapp"></i> Whatsapp</button>
                                                 <button  type="button" class="programsCardFooterButton faviouritrBtn"><i class="fa-regular fa-heart"></i></button>
                                                 <button  type="button" class="programsCardFooterButton moreBtn"><i class="fa-solid fa-ellipsis-vertical"></i></button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            No Data Found
                        @endforelse
                        {{--
                        @empty
                            No Data Found
                        @endforelse --}}

                        {{-- <div class="programsCard">
                            <div class="programsCardBody">
                                <div class="programsCardThumnailGalleryArea">
                                    <div class="verified">
                                        <i class="fa-regular fa-shield-check"></i>
                                        <span class="txt">Verified</span>
                                    </div>
                                    <div class="superagent">
                                        <i class="fa-regular fa-star"></i>
                                        <span class="txt">Superagent</span>
                                    </div>
                                    <div class="programsCardThumnailSlider owl-carousel owl-loaded owl-drag">
                                        <div class="owl-stage-outer">
                                            <div class="owl-stage"
                                                style="
                                    transform: translate3d(-39.375rem, 0rem, 0rem);
                                    transition: all 0s ease 0s;
                                    width: 137.8125rem;
                                  ">
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/312707a379c1e6b1f5a4a232ff4eaebc/260/185/MODE/22dc28/9853674-fa2bdo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item active"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/5a86c4c660d863d658ddc4269bc4622e/260/185/MODE/661947/9853674-b7966o.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/312707a379c1e6b1f5a4a232ff4eaebc/260/185/MODE/22dc28/9853674-fa2bdo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/5a86c4c660d863d658ddc4269bc4622e/260/185/MODE/661947/9853674-b7966o.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-nav">
                                            <button type="button" role="presentation" class="owl-prev">
                                                <i class="fa fa-angle-left" aria-hidden="true"></i></button><button
                                                type="button" role="presentation" class="owl-next">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <div class="owl-dots">
                                            <button role="button" class="owl-dot active">
                                                <span></span></button><button role="button" class="owl-dot">
                                                <span></span></button><button role="button" class="owl-dot">
                                                <span></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="programsCardContentArea">
                                    <div class="d-flex justify-content-between programsCardIntro">
                                        <div class="programsCardIntroLeftPart">
                                            <div class="programsCardIntroType">Villa</div>
                                            <div class="programsCardIntroPrice">
                                                295,000 AED/year
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                Fully Upgraded | Full Lake View | Type 2M
                                            </div>
                                        </div>
                                        <div class="programsCardIntroRightPart">
                                            <p class="programsCardIntroTag programsCardIntroPremium">
                                                Premium
                                            </p>
                                            <div class="">
                                                <div class="programsCardIntroBrokerImage">
                                                    <img src="https://www.propertyfinder.ae/broker/1/178/98/MODE/ac93a7/5521-logo.webp?ctr=ae"
                                                        class="img-fluid" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="programsCardTop"></div>
                                    <div class="programsSpecifications">
                                        <p class="programsSpecificationsLocation">
                                            <span class="programsSpecificationsLocationText"><i
                                                    class="fa-regular fa-location-dot"></i>
                                                Springs 4, The Springs, Dubai</span>
                                        </p>

                                        <div class="d-flex programsSpecificationsAmenities">
                                            <div class="programsSpecificationsItem">
                                                <span class="icon"><i class="fa-regular fa-bed-front"></i></span>
                                                <span class="txt">3 bedrooms</span>
                                            </div>
                                            <div class="programsSpecificationsItem">
                                                <span class="icon"><i class="fa-regular fa-bath"></i></span>
                                                <span class="txt">4 bathrooms</span>
                                            </div>
                                            <div class="programsSpecificationsItem">
                                                <span class="icon"><i
                                                        class="fa-light fa-square-dashed"></i></span>
                                                <span class="txt">2,588 sqft</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="programsCardFooter">
                                <div class="d-flex programsCardFooterinner">
                                    <div class="leftPart">
                                        <div class="d-flex programsUserArea">
                                            <div class="programsUserThumnail">
                                                <img src="https://t3.ftcdn.net/jpg/00/64/67/52/360_F_64675209_7ve2XQANuzuHjMZXP3aIYIpsDKEbF5dD.jpg"
                                                    class="img-fluid" alt="" />
                                            </div>
                                            <div class="programsUserContent">
                                                <p class="mb-0">Listed 5 days ago</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="rightpart">
                                        <div class="programsCardFooterButtonsArea">
                                            <button type="button" class="programsCardFooterButton callBtn">
                                                <i class="fa-regular fa-phone"></i> Call
                                            </button>
                                            <button type="button" class="programsCardFooterButton emailBtn">
                                                <i class="fa-regular fa-envelope"></i> Email
                                            </button>
                                            <button type="button" class="programsCardFooterButton whatsappBtn">
                                                <i class="fa-brands fa-whatsapp"></i> Whatsapp
                                            </button>
                                            <button type="button" class="programsCardFooterButton faviouritrBtn">
                                                <i class="fa-regular fa-heart"></i>
                                            </button>
                                            <button type="button" class="programsCardFooterButton moreBtn">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="programsCard">
                            <div class="programsCardBody">
                                <div class="programsCardThumnailGalleryArea">
                                    <div class="verified">
                                        <i class="fa-regular fa-shield-check"></i>
                                        <span class="txt">Verified</span>
                                    </div>
                                    <div class="superagent">
                                        <i class="fa-regular fa-star"></i>
                                        <span class="txt">Superagent</span>
                                    </div>
                                    <div class="programsCardThumnailSlider owl-carousel owl-loaded owl-drag">
                                        <div class="owl-stage-outer">
                                            <div class="owl-stage"
                                                style="
                                    transform: translate3d(-39.375rem, 0rem, 0rem);
                                    transition: all 0s ease 0s;
                                    width: 137.8125rem;
                                  ">
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/312707a379c1e6b1f5a4a232ff4eaebc/260/185/MODE/22dc28/9853674-fa2bdo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item active"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/5a86c4c660d863d658ddc4269bc4622e/260/185/MODE/661947/9853674-b7966o.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/312707a379c1e6b1f5a4a232ff4eaebc/260/185/MODE/22dc28/9853674-fa2bdo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/5a86c4c660d863d658ddc4269bc4622e/260/185/MODE/661947/9853674-b7966o.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-nav">
                                            <button type="button" role="presentation" class="owl-prev">
                                                <i class="fa fa-angle-left" aria-hidden="true"></i></button><button
                                                type="button" role="presentation" class="owl-next">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <div class="owl-dots">
                                            <button role="button" class="owl-dot active">
                                                <span></span></button><button role="button" class="owl-dot">
                                                <span></span></button><button role="button" class="owl-dot">
                                                <span></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="programsCardContentArea">
                                    <div class="d-flex justify-content-between programsCardIntro">
                                        <div class="programsCardIntroLeftPart">
                                            <div class="programsCardIntroPrice">
                                                Nesciunt quae delen
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                Non dolores sed eos
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                The University Of Burdwan
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                Tuition Fee: £96
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                Application Fee: £47 GBP
                                            </div>
                                        </div>

                                    </div>
                                    <div class="programsCardTop"></div>
                                    <div class="programsSpecifications">
                                        <p class="programsSpecificationsLocation">
                                            <span class="programsSpecificationsLocationText">
                                                <i class="fa-regular fa-location-dot"></i>
                                                Est consectetur lib, Nostrum velit non h,
                                                Aliqua Repellendus, India,Harum minima non ips
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="programsCardFooter">
                                <div class="d-flex programsCardFooterinner">
                                    <div class="leftPart">
                                        <div class="d-flex programsUserArea">

                                            <div class=""></div>
                                        </div>
                                    </div>

                                    <div class="rightpart">
                                        <div class="programsCardFooterButtonsArea">
                                            <a href="apply.html">
                                                <button type="button" class="programsCardFooterButton callBtn">
                                                    Apply
                                                </button>
                                            </a>
                                            <!-- <a href="#">
                                                                <button  type="button" class="programsCardFooterButton callBtn">Details</button>
                                                                </a> -->

                                            <a href="programsdetails.html">
                                                <button type="button" class="programsCardFooterButton callBtn">
                                                    Details
                                                </button>
                                            </a>
                                            <!-- <button  type="button" class="programsCardFooterButton callBtn"><i class="fa-regular fa-phone"></i> Call</button>
                                     <button  type="button" class="programsCardFooterButton emailBtn"><i class="fa-regular fa-envelope"></i> Email</button>
                                     <button  type="button" class="programsCardFooterButton whatsappBtn"><i class="fa-brands fa-whatsapp"></i> Whatsapp</button>
                                     <button  type="button" class="programsCardFooterButton faviouritrBtn"><i class="fa-regular fa-heart"></i></button>
                                     <button  type="button" class="programsCardFooterButton moreBtn"><i class="fa-solid fa-ellipsis-vertical"></i></button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="programsCard">
                            <div class="programsCardBody">
                                <div class="programsCardThumnailGalleryArea">
                                    <div class="verified">
                                        <i class="fa-regular fa-shield-check"></i>
                                        <span class="txt">Verified</span>
                                    </div>
                                    <div class="superagent">
                                        <i class="fa-regular fa-star"></i>
                                        <span class="txt">Superagent</span>
                                    </div>
                                    <div class="programsCardThumnailSlider owl-carousel owl-loaded owl-drag">
                                        <div class="owl-stage-outer">
                                            <div class="owl-stage"
                                                style="
                                    transform: translate3d(-39.375rem, 0rem, 0rem);
                                    transition: all 0s ease 0s;
                                    width: 137.8125rem;
                                  ">
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/312707a379c1e6b1f5a4a232ff4eaebc/260/185/MODE/22dc28/9853674-fa2bdo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item active"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/5a86c4c660d863d658ddc4269bc4622e/260/185/MODE/661947/9853674-b7966o.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/312707a379c1e6b1f5a4a232ff4eaebc/260/185/MODE/22dc28/9853674-fa2bdo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/5a86c4c660d863d658ddc4269bc4622e/260/185/MODE/661947/9853674-b7966o.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-nav">
                                            <button type="button" role="presentation" class="owl-prev">
                                                <i class="fa fa-angle-left" aria-hidden="true"></i></button><button
                                                type="button" role="presentation" class="owl-next">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <div class="owl-dots">
                                            <button role="button" class="owl-dot active">
                                                <span></span></button><button role="button" class="owl-dot">
                                                <span></span></button><button role="button" class="owl-dot">
                                                <span></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="programsCardContentArea">
                                    <div class="d-flex justify-content-between programsCardIntro">
                                        <div class="programsCardIntroLeftPart">
                                            <div class="programsCardIntroPrice">
                                                Nesciunt quae delen
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                Non dolores sed eos
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                The University Of Burdwan
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                Tuition Fee: £96
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                Application Fee: £47 GBP
                                            </div>
                                        </div>
                                        <!-- <div class="programsCardIntroRightPart">
                                     <p class="programsCardIntroTag programsCardIntroPremium">Premium</p>
                                     <div class="">
                                     <div class="programsCardIntroBrokerImage">
                                     <img src="https://www.propertyfinder.ae/broker/1/178/98/MODE/ac93a7/5521-logo.webp?ctr=ae" class="img-fluid" alt="">
                                     </div>
                                     </div>
                                     </div> -->
                                    </div>
                                    <div class="programsCardTop"></div>
                                    <div class="programsSpecifications">
                                        <p class="programsSpecificationsLocation">
                                            <span class="programsSpecificationsLocationText">
                                                <i class="fa-regular fa-location-dot"></i>
                                                Est consectetur lib, Nostrum velit non h,
                                                Aliqua Repellendus, India,Harum minima non ips
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="programsCardFooter">
                                <div class="d-flex programsCardFooterinner">
                                    <div class="leftPart">
                                        <div class="d-flex programsUserArea">
                                            <!-- <div class="programsUserThumnail">
                                     <img src="https://t3.ftcdn.net/jpg/00/64/67/52/360_F_64675209_7ve2XQANuzuHjMZXP3aIYIpsDKEbF5dD.jpg" class="img-fluid" alt="">
                                     </div> -->
                                            <div class=""></div>
                                        </div>
                                    </div>

                                    <div class="rightpart">
                                        <div class="programsCardFooterButtonsArea">
                                            <a href="apply.html">
                                                <button type="button" class="programsCardFooterButton callBtn">
                                                    Apply
                                                </button>
                                            </a>
                                            <!-- <a href="#">
                                                                <button  type="button" class="programsCardFooterButton callBtn">Details</button>
                                                                </a> -->

                                            <a href="programsdetails.html">
                                                <button type="button" class="programsCardFooterButton callBtn">
                                                    Details
                                                </button>
                                            </a>
                                            <!-- <button  type="button" class="programsCardFooterButton callBtn"><i class="fa-regular fa-phone"></i> Call</button>
                                     <button  type="button" class="programsCardFooterButton emailBtn"><i class="fa-regular fa-envelope"></i> Email</button>
                                     <button  type="button" class="programsCardFooterButton whatsappBtn"><i class="fa-brands fa-whatsapp"></i> Whatsapp</button>
                                     <button  type="button" class="programsCardFooterButton faviouritrBtn"><i class="fa-regular fa-heart"></i></button>
                                     <button  type="button" class="programsCardFooterButton moreBtn"><i class="fa-solid fa-ellipsis-vertical"></i></button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="programsCard">
                            <div class="programsCardBody">
                                <div class="programsCardThumnailGalleryArea">
                                    <div class="verified">
                                        <i class="fa-regular fa-shield-check"></i>
                                        <span class="txt">Verified</span>
                                    </div>
                                    <div class="superagent">
                                        <i class="fa-regular fa-star"></i>
                                        <span class="txt">Superagent</span>
                                    </div>
                                    <div class="programsCardThumnailSlider owl-carousel owl-loaded owl-drag">
                                        <div class="owl-stage-outer">
                                            <div class="owl-stage"
                                                style="
                                    transform: translate3d(-39.375rem, 0rem, 0rem);
                                    transition: all 0s ease 0s;
                                    width: 137.8125rem;
                                  ">
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/312707a379c1e6b1f5a4a232ff4eaebc/260/185/MODE/22dc28/9853674-fa2bdo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item active"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/5a86c4c660d863d658ddc4269bc4622e/260/185/MODE/661947/9853674-b7966o.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/312707a379c1e6b1f5a4a232ff4eaebc/260/185/MODE/22dc28/9853674-fa2bdo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/5a86c4c660d863d658ddc4269bc4622e/260/185/MODE/661947/9853674-b7966o.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-nav">
                                            <button type="button" role="presentation" class="owl-prev">
                                                <i class="fa fa-angle-left" aria-hidden="true"></i></button><button
                                                type="button" role="presentation" class="owl-next">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <div class="owl-dots">
                                            <button role="button" class="owl-dot active">
                                                <span></span></button><button role="button" class="owl-dot">
                                                <span></span></button><button role="button" class="owl-dot">
                                                <span></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="programsCardContentArea">
                                    <div class="d-flex justify-content-between programsCardIntro">
                                        <div class="programsCardIntroLeftPart">
                                            <div class="programsCardIntroPrice">
                                                Nesciunt quae delen
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                Non dolores sed eos
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                The University Of Burdwan
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                Tuition Fee: £96
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                Application Fee: £47 GBP
                                            </div>
                                        </div>
                                        <!-- <div class="programsCardIntroRightPart">
                                     <p class="programsCardIntroTag programsCardIntroPremium">Premium</p>
                                     <div class="">
                                     <div class="programsCardIntroBrokerImage">
                                     <img src="https://www.propertyfinder.ae/broker/1/178/98/MODE/ac93a7/5521-logo.webp?ctr=ae" class="img-fluid" alt="">
                                     </div>
                                     </div>
                                     </div> -->
                                    </div>
                                    <div class="programsCardTop"></div>
                                    <div class="programsSpecifications">
                                        <p class="programsSpecificationsLocation">
                                            <span class="programsSpecificationsLocationText">
                                                <i class="fa-regular fa-location-dot"></i>
                                                Est consectetur lib, Nostrum velit non h,
                                                Aliqua Repellendus, India,Harum minima non ips
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="programsCardFooter">
                                <div class="d-flex programsCardFooterinner">
                                    <div class="leftPart">
                                        <div class="d-flex programsUserArea">
                                            <!-- <div class="programsUserThumnail">
                                     <img src="https://t3.ftcdn.net/jpg/00/64/67/52/360_F_64675209_7ve2XQANuzuHjMZXP3aIYIpsDKEbF5dD.jpg" class="img-fluid" alt="">
                                     </div> -->
                                            <div class=""></div>
                                        </div>
                                    </div>

                                    <div class="rightpart">
                                        <div class="programsCardFooterButtonsArea">
                                            <a href="apply.html">
                                                <button type="button" class="programsCardFooterButton callBtn">
                                                    Apply
                                                </button>
                                            </a>
                                            <!-- <a href="#">
                                                                <button  type="button" class="programsCardFooterButton callBtn">Details</button>
                                                                </a> -->

                                            <a href="programsdetails.html">
                                                <button type="button" class="programsCardFooterButton callBtn">
                                                    Details
                                                </button>
                                            </a>
                                            <!-- <button  type="button" class="programsCardFooterButton callBtn"><i class="fa-regular fa-phone"></i> Call</button>
                                     <button  type="button" class="programsCardFooterButton emailBtn"><i class="fa-regular fa-envelope"></i> Email</button>
                                     <button  type="button" class="programsCardFooterButton whatsappBtn"><i class="fa-brands fa-whatsapp"></i> Whatsapp</button>
                                     <button  type="button" class="programsCardFooterButton faviouritrBtn"><i class="fa-regular fa-heart"></i></button>
                                     <button  type="button" class="programsCardFooterButton moreBtn"><i class="fa-solid fa-ellipsis-vertical"></i></button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="programsCard">
                            <div class="programsCardBody">
                                <div class="programsCardThumnailGalleryArea">
                                    <div class="verified">
                                        <i class="fa-regular fa-shield-check"></i>
                                        <span class="txt">Verified</span>
                                    </div>
                                    <div class="superagent">
                                        <i class="fa-regular fa-star"></i>
                                        <span class="txt">Superagent</span>
                                    </div>
                                    <div class="programsCardThumnailSlider owl-carousel owl-loaded owl-drag">
                                        <div class="owl-stage-outer">
                                            <div class="owl-stage"
                                                style="
                                    transform: translate3d(-39.375rem, 0rem, 0rem);
                                    transition: all 0s ease 0s;
                                    width: 137.8125rem;
                                  ">
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/312707a379c1e6b1f5a4a232ff4eaebc/260/185/MODE/22dc28/9853674-fa2bdo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item active"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/5a86c4c660d863d658ddc4269bc4622e/260/185/MODE/661947/9853674-b7966o.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/312707a379c1e6b1f5a4a232ff4eaebc/260/185/MODE/22dc28/9853674-fa2bdo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/5a86c4c660d863d658ddc4269bc4622e/260/185/MODE/661947/9853674-b7966o.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-nav">
                                            <button type="button" role="presentation" class="owl-prev">
                                                <i class="fa fa-angle-left" aria-hidden="true"></i></button><button
                                                type="button" role="presentation" class="owl-next">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <div class="owl-dots">
                                            <button role="button" class="owl-dot active">
                                                <span></span></button><button role="button" class="owl-dot">
                                                <span></span></button><button role="button" class="owl-dot">
                                                <span></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="programsCardContentArea">
                                    <div class="d-flex justify-content-between programsCardIntro">
                                        <div class="programsCardIntroLeftPart">
                                            <div class="programsCardIntroPrice">
                                                Nesciunt quae delen
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                Non dolores sed eos
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                The University Of Burdwan
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                Tuition Fee: £96
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                Application Fee: £47 GBP
                                            </div>
                                        </div>
                                        <!-- <div class="programsCardIntroRightPart">
                                     <p class="programsCardIntroTag programsCardIntroPremium">Premium</p>
                                     <div class="">
                                     <div class="programsCardIntroBrokerImage">
                                     <img src="https://www.propertyfinder.ae/broker/1/178/98/MODE/ac93a7/5521-logo.webp?ctr=ae" class="img-fluid" alt="">
                                     </div>
                                     </div>
                                     </div> -->
                                    </div>
                                    <div class="programsCardTop"></div>
                                    <div class="programsSpecifications">
                                        <p class="programsSpecificationsLocation">
                                            <span class="programsSpecificationsLocationText">
                                                <i class="fa-regular fa-location-dot"></i>
                                                Est consectetur lib, Nostrum velit non h,
                                                Aliqua Repellendus, India,Harum minima non ips
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="programsCardFooter">
                                <div class="d-flex programsCardFooterinner">
                                    <div class="leftPart">
                                        <div class="d-flex programsUserArea">
                                            <!-- <div class="programsUserThumnail">
                                     <img src="https://t3.ftcdn.net/jpg/00/64/67/52/360_F_64675209_7ve2XQANuzuHjMZXP3aIYIpsDKEbF5dD.jpg" class="img-fluid" alt="">
                                     </div> -->
                                            <div class=""></div>
                                        </div>
                                    </div>

                                    <div class="rightpart">
                                        <div class="programsCardFooterButtonsArea">
                                            <a href="apply.html">
                                                <button type="button" class="programsCardFooterButton callBtn">
                                                    Apply
                                                </button>
                                            </a>
                                            <!-- <a href="#">
                                                                <button  type="button" class="programsCardFooterButton callBtn">Details</button>
                                                                </a> -->

                                            <a href="programsdetails.html">
                                                <button type="button" class="programsCardFooterButton callBtn">
                                                    Details
                                                </button>
                                            </a>
                                            <!-- <button  type="button" class="programsCardFooterButton callBtn"><i class="fa-regular fa-phone"></i> Call</button>
                                     <button  type="button" class="programsCardFooterButton emailBtn"><i class="fa-regular fa-envelope"></i> Email</button>
                                     <button  type="button" class="programsCardFooterButton whatsappBtn"><i class="fa-brands fa-whatsapp"></i> Whatsapp</button>
                                     <button  type="button" class="programsCardFooterButton faviouritrBtn"><i class="fa-regular fa-heart"></i></button>
                                     <button  type="button" class="programsCardFooterButton moreBtn"><i class="fa-solid fa-ellipsis-vertical"></i></button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="programsCard">
                            <div class="programsCardBody">
                                <div class="programsCardThumnailGalleryArea">
                                    <div class="verified">
                                        <i class="fa-regular fa-shield-check"></i>
                                        <span class="txt">Verified</span>
                                    </div>
                                    <div class="superagent">
                                        <i class="fa-regular fa-star"></i>
                                        <span class="txt">Superagent</span>
                                    </div>
                                    <div class="programsCardThumnailSlider owl-carousel owl-loaded owl-drag">
                                        <div class="owl-stage-outer">
                                            <div class="owl-stage"
                                                style="
                                    transform: translate3d(-39.375rem, 0rem, 0rem);
                                    transition: all 0s ease 0s;
                                    width: 137.8125rem;
                                  ">
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/312707a379c1e6b1f5a4a232ff4eaebc/260/185/MODE/22dc28/9853674-fa2bdo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item active"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/5a86c4c660d863d658ddc4269bc4622e/260/185/MODE/661947/9853674-b7966o.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/312707a379c1e6b1f5a4a232ff4eaebc/260/185/MODE/22dc28/9853674-fa2bdo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/5a86c4c660d863d658ddc4269bc4622e/260/185/MODE/661947/9853674-b7966o.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-nav">
                                            <button type="button" role="presentation" class="owl-prev">
                                                <i class="fa fa-angle-left" aria-hidden="true"></i></button><button
                                                type="button" role="presentation" class="owl-next">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <div class="owl-dots">
                                            <button role="button" class="owl-dot active">
                                                <span></span></button><button role="button" class="owl-dot">
                                                <span></span></button><button role="button" class="owl-dot">
                                                <span></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="programsCardContentArea">
                                    <div class="d-flex justify-content-between programsCardIntro">
                                        <div class="programsCardIntroLeftPart">
                                            <div class="programsCardIntroPrice">
                                                Nesciunt quae delen
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                Non dolores sed eos
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                The University Of Burdwan
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                Tuition Fee: £96
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                Application Fee: £47 GBP
                                            </div>
                                        </div>
                                        <!-- <div class="programsCardIntroRightPart">
                                     <p class="programsCardIntroTag programsCardIntroPremium">Premium</p>
                                     <div class="">
                                     <div class="programsCardIntroBrokerImage">
                                     <img src="https://www.propertyfinder.ae/broker/1/178/98/MODE/ac93a7/5521-logo.webp?ctr=ae" class="img-fluid" alt="">
                                     </div>
                                     </div>
                                     </div> -->
                                    </div>
                                    <div class="programsCardTop"></div>
                                    <div class="programsSpecifications">
                                        <p class="programsSpecificationsLocation">
                                            <span class="programsSpecificationsLocationText">
                                                <i class="fa-regular fa-location-dot"></i>
                                                Est consectetur lib, Nostrum velit non h,
                                                Aliqua Repellendus, India,Harum minima non ips
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="programsCardFooter">
                                <div class="d-flex programsCardFooterinner">
                                    <div class="leftPart">
                                        <div class="d-flex programsUserArea">
                                            <!-- <div class="programsUserThumnail">
                                     <img src="https://t3.ftcdn.net/jpg/00/64/67/52/360_F_64675209_7ve2XQANuzuHjMZXP3aIYIpsDKEbF5dD.jpg" class="img-fluid" alt="">
                                     </div> -->
                                            <div class=""></div>
                                        </div>
                                    </div>

                                    <div class="rightpart">
                                        <div class="programsCardFooterButtonsArea">
                                            <a href="apply.html">
                                                <button type="button" class="programsCardFooterButton callBtn">
                                                    Apply
                                                </button>
                                            </a>
                                            <!-- <a href="#">
                                                                <button  type="button" class="programsCardFooterButton callBtn">Details</button>
                                                                </a> -->

                                            <a href="programsdetails.html">
                                                <button type="button" class="programsCardFooterButton callBtn">
                                                    Details
                                                </button>
                                            </a>
                                            <!-- <button  type="button" class="programsCardFooterButton callBtn"><i class="fa-regular fa-phone"></i> Call</button>
                                     <button  type="button" class="programsCardFooterButton emailBtn"><i class="fa-regular fa-envelope"></i> Email</button>
                                     <button  type="button" class="programsCardFooterButton whatsappBtn"><i class="fa-brands fa-whatsapp"></i> Whatsapp</button>
                                     <button  type="button" class="programsCardFooterButton faviouritrBtn"><i class="fa-regular fa-heart"></i></button>
                                     <button  type="button" class="programsCardFooterButton moreBtn"><i class="fa-solid fa-ellipsis-vertical"></i></button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="programsCard">
                            <div class="programsCardBody">
                                <div class="programsCardThumnailGalleryArea">
                                    <div class="verified">
                                        <i class="fa-regular fa-shield-check"></i>
                                        <span class="txt">Verified</span>
                                    </div>
                                    <div class="superagent">
                                        <i class="fa-regular fa-star"></i>
                                        <span class="txt">Superagent</span>
                                    </div>
                                    <div class="programsCardThumnailSlider owl-carousel owl-loaded owl-drag">
                                        <div class="owl-stage-outer">
                                            <div class="owl-stage"
                                                style="
                                    transform: translate3d(-39.375rem, 0rem, 0rem);
                                    transition: all 0s ease 0s;
                                    width: 137.8125rem;
                                  ">
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/312707a379c1e6b1f5a4a232ff4eaebc/260/185/MODE/22dc28/9853674-fa2bdo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item active"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/5a86c4c660d863d658ddc4269bc4622e/260/185/MODE/661947/9853674-b7966o.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/312707a379c1e6b1f5a4a232ff4eaebc/260/185/MODE/22dc28/9853674-fa2bdo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/5a86c4c660d863d658ddc4269bc4622e/260/185/MODE/661947/9853674-b7966o.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-item cloned"
                                                    style="width: 18.75rem; margin-right: .9375rem">
                                                    <div class="programsCardThumnailSliderItem">
                                                        <div class="programsCardThumnail">
                                                            <img src="https://www.propertyfinder.ae/property/83abfbac83c1ea46e4ca58346019b24b/260/185/MODE/60ab56/9853674-f6cdfo.webp?ctr=ae"
                                                                class="img-fluid w-100" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-nav">
                                            <button type="button" role="presentation" class="owl-prev">
                                                <i class="fa fa-angle-left" aria-hidden="true"></i></button><button
                                                type="button" role="presentation" class="owl-next">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <div class="owl-dots">
                                            <button role="button" class="owl-dot active">
                                                <span></span></button><button role="button" class="owl-dot">
                                                <span></span></button><button role="button" class="owl-dot">
                                                <span></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="programsCardContentArea">
                                    <div class="d-flex justify-content-between programsCardIntro">
                                        <div class="programsCardIntroLeftPart">
                                            <div class="programsCardIntroPrice">
                                                Nesciunt quae delen
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                Non dolores sed eos
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                The University Of Burdwan
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                Tuition Fee: £96
                                            </div>
                                            <div class="programsCardIntroTitle">
                                                Application Fee: £47 GBP
                                            </div>
                                        </div>
                                        <!-- <div class="programsCardIntroRightPart">
                                     <p class="programsCardIntroTag programsCardIntroPremium">Premium</p>
                                     <div class="">
                                     <div class="programsCardIntroBrokerImage">
                                     <img src="https://www.propertyfinder.ae/broker/1/178/98/MODE/ac93a7/5521-logo.webp?ctr=ae" class="img-fluid" alt="">
                                     </div>
                                     </div>
                                     </div> -->
                                    </div>
                                    <div class="programsCardTop"></div>
                                    <div class="programsSpecifications">
                                        <p class="programsSpecificationsLocation">
                                            <span class="programsSpecificationsLocationText">
                                                <i class="fa-regular fa-location-dot"></i>
                                                Est consectetur lib, Nostrum velit non h,
                                                Aliqua Repellendus, India,Harum minima non ips
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="programsCardFooter">
                                <div class="d-flex programsCardFooterinner">
                                    <div class="leftPart">
                                        <div class="d-flex programsUserArea">
                                            <!-- <div class="programsUserThumnail">
                                     <img src="https://t3.ftcdn.net/jpg/00/64/67/52/360_F_64675209_7ve2XQANuzuHjMZXP3aIYIpsDKEbF5dD.jpg" class="img-fluid" alt="">
                                     </div> -->
                                            <div class=""></div>
                                        </div>
                                    </div>

                                    <div class="rightpart">
                                        <div class="programsCardFooterButtonsArea">
                                            <a href="apply.html">
                                                <button type="button" class="programsCardFooterButton callBtn">
                                                    Apply
                                                </button>
                                            </a>
                                            <!-- <a href="#">
                                                                <button  type="button" class="programsCardFooterButton callBtn">Details</button>
                                                                </a> -->

                                            <a href="programsdetails.html">
                                                <button type="button" class="programsCardFooterButton callBtn">
                                                    Details
                                                </button>
                                            </a>
                                            <!-- <button  type="button" class="programsCardFooterButton callBtn"><i class="fa-regular fa-phone"></i> Call</button>
                                     <button  type="button" class="programsCardFooterButton emailBtn"><i class="fa-regular fa-envelope"></i> Email</button>
                                     <button  type="button" class="programsCardFooterButton whatsappBtn"><i class="fa-brands fa-whatsapp"></i> Whatsapp</button>
                                     <button  type="button" class="programsCardFooterButton faviouritrBtn"><i class="fa-regular fa-heart"></i></button>
                                     <button  type="button" class="programsCardFooterButton moreBtn"><i class="fa-solid fa-ellipsis-vertical"></i></button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <!--
                                                                        <div class="course-tab-content">
                                                                            <div class="d-flex flex-wrap justify-content-between">
                                                                                <div class="col-lg-9 p-0">
                                                                                  <div class="sub-course-tt-box">
                                                                                      <div class="sub-course-unt-title">
                                                                                          <h6>1-Year Post-Secondary Certificate</h6>
                                                                                          <h3>T-Level - Design, Surveying and Planning for Construction</h3>
                                                                                          <p>Cheshire College South and West - Ellesmere Port</p>
                                                                                      </div>
                                                                                      <div class="sub-course-country">
                                                                                          <i class="fa-sharp fa-solid fa-location-dot"></i> Ellesmere Port, North West, United Kingdom
                                                                                      </div>
                                                                                      <div class="sub-course-appl-bg">
                                                                                          <div class="d-flex flex-wrap align-items-center justify-content-between">
                                                                                              <div class="sub-tution-text">
                                                                                                  <h6>Tuition Fee</h6>
                                                                                                  <p>&#163;14,250.00 GBP</p>
                                                                                              </div>
                                                                                              <div class="sub-tution-text">
                                                                                                  <h6>Application Fee</h6>
                                                                                                  <p>&#163;0.00 GBP</p>
                                                                                              </div>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                                </div>
                                                                                <div class="col-lg-3 p-0">
                                                                                    <div class="sub-course-btn-left">
                                                                                        <a class="sub-start-btn-applica" href="javascript:;">Start Application</a>
                                                                                        <a class="sub-program-det-border-btn" href="javascript:;">Program Details</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="course-tab-content">
                                                                            <div class="d-flex flex-wrap justify-content-between">
                                                                                <div class="col-lg-9 p-0">
                                                                                  <div class="sub-course-tt-box">
                                                                                      <div class="sub-course-unt-title">
                                                                                          <h6>1-Year Post-Secondary Certificate</h6>
                                                                                          <h3>T-Level - Design, Surveying and Planning for Construction</h3>
                                                                                          <p>Cheshire College South and West - Ellesmere Port</p>
                                                                                      </div>
                                                                                      <div class="sub-course-country">
                                                                                          <i class="fa-sharp fa-solid fa-location-dot"></i> Ellesmere Port, North West, United Kingdom
                                                                                      </div>
                                                                                      <div class="sub-course-appl-bg">
                                                                                          <div class="d-flex flex-wrap align-items-center justify-content-between">
                                                                                              <div class="sub-tution-text">
                                                                                                  <h6>Tuition Fee</h6>
                                                                                                  <p>&#163;14,250.00 GBP</p>
                                                                                              </div>
                                                                                              <div class="sub-tution-text">
                                                                                                  <h6>Application Fee</h6>
                                                                                                  <p>&#163;0.00 GBP</p>
                                                                                              </div>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                                </div>
                                                                                <div class="col-lg-3 p-0">
                                                                                    <div class="sub-course-btn-left">
                                                                                        <a class="sub-start-btn-applica" href="javascript:;">Start Application</a>
                                                                                        <a class="sub-program-det-border-btn" href="javascript:;">Program Details</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="course-tab-content">
                                                                            <div class="d-flex flex-wrap justify-content-between">
                                                                                <div class="col-lg-9 p-0">
                                                                                  <div class="sub-course-tt-box">
                                                                                      <div class="sub-course-unt-title">
                                                                                          <h6>1-Year Post-Secondary Certificate</h6>
                                                                                          <h3>T-Level - Design, Surveying and Planning for Construction</h3>
                                                                                          <p>Cheshire College South and West - Ellesmere Port</p>
                                                                                      </div>
                                                                                      <div class="sub-course-country">
                                                                                          <i class="fa-sharp fa-solid fa-location-dot"></i> Ellesmere Port, North West, United Kingdom
                                                                                      </div>
                                                                                      <div class="sub-course-appl-bg">
                                                                                          <div class="d-flex flex-wrap align-items-center justify-content-between">
                                                                                              <div class="sub-tution-text">
                                                                                                  <h6>Tuition Fee</h6>
                                                                                                  <p>&#163;14,250.00 GBP</p>
                                                                                              </div>
                                                                                              <div class="sub-tution-text">
                                                                                                  <h6>Application Fee</h6>
                                                                                                  <p>&#163;0.00 GBP</p>
                                                                                              </div>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                                </div>
                                                                                <div class="col-lg-3 p-0">
                                                                                    <div class="sub-course-btn-left">
                                                                                        <a class="sub-start-btn-applica" href="javascript:;">Start Application</a>
                                                                                        <a class="sub-program-det-border-btn" href="javascript:;">Program Details</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="course-tab-content">
                                                                            <div class="d-flex flex-wrap justify-content-between">
                                                                                <div class="col-lg-9 p-0">
                                                                                  <div class="sub-course-tt-box">
                                                                                      <div class="sub-course-unt-title">
                                                                                          <h6>1-Year Post-Secondary Certificate</h6>
                                                                                          <h3>T-Level - Design, Surveying and Planning for Construction</h3>
                                                                                          <p>Cheshire College South and West - Ellesmere Port</p>
                                                                                      </div>
                                                                                      <div class="sub-course-country">
                                                                                          <i class="fa-sharp fa-solid fa-location-dot"></i> Ellesmere Port, North West, United Kingdom
                                                                                      </div>
                                                                                      <div class="sub-course-appl-bg">
                                                                                          <div class="d-flex flex-wrap align-items-center justify-content-between">
                                                                                              <div class="sub-tution-text">
                                                                                                  <h6>Tuition Fee</h6>
                                                                                                  <p>&#163;14,250.00 GBP</p>
                                                                                              </div>
                                                                                              <div class="sub-tution-text">
                                                                                                  <h6>Application Fee</h6>
                                                                                                  <p>&#163;0.00 GBP</p>
                                                                                              </div>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                                </div>
                                                                                <div class="col-lg-3 p-0">
                                                                                    <div class="sub-course-btn-left">
                                                                                        <a class="sub-start-btn-applica" href="javascript:;">Start Application</a>
                                                                                        <a class="sub-program-det-border-btn" href="javascript:;">Program Details</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="course-tab-content">
                                                                            <div class="d-flex flex-wrap justify-content-between">
                                                                                <div class="col-lg-9 p-0">
                                                                                  <div class="sub-course-tt-box">
                                                                                      <div class="sub-course-unt-title">
                                                                                          <h6>1-Year Post-Secondary Certificate</h6>
                                                                                          <h3>T-Level - Design, Surveying and Planning for Construction</h3>
                                                                                          <p>Cheshire College South and West - Ellesmere Port</p>
                                                                                      </div>
                                                                                      <div class="sub-course-country">
                                                                                          <i class="fa-sharp fa-solid fa-location-dot"></i> Ellesmere Port, North West, United Kingdom
                                                                                      </div>
                                                                                      <div class="sub-course-appl-bg">
                                                                                          <div class="d-flex flex-wrap align-items-center justify-content-between">
                                                                                              <div class="sub-tution-text">
                                                                                                  <h6>Tuition Fee</h6>
                                                                                                  <p>&#163;14,250.00 GBP</p>
                                                                                              </div>
                                                                                              <div class="sub-tution-text">
                                                                                                  <h6>Application Fee</h6>
                                                                                                  <p>&#163;0.00 GBP</p>
                                                                                              </div>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                                </div>
                                                                                <div class="col-lg-3 p-0">
                                                                                    <div class="sub-course-btn-left">
                                                                                        <a class="sub-start-btn-applica" href="javascript:;">Start Application</a>
                                                                                        <a class="sub-program-det-border-btn" href="javascript:;">Program Details</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="course-tab-content">
                                                                            <div class="d-flex flex-wrap justify-content-between">
                                                                                <div class="col-lg-9 p-0">
                                                                                  <div class="sub-course-tt-box">
                                                                                      <div class="sub-course-unt-title">
                                                                                          <h6>1-Year Post-Secondary Certificate</h6>
                                                                                          <h3>T-Level - Design, Surveying and Planning for Construction</h3>
                                                                                          <p>Cheshire College South and West - Ellesmere Port</p>
                                                                                      </div>
                                                                                      <div class="sub-course-country">
                                                                                          <i class="fa-sharp fa-solid fa-location-dot"></i> Ellesmere Port, North West, United Kingdom
                                                                                      </div>
                                                                                      <div class="sub-course-appl-bg">
                                                                                          <div class="d-flex flex-wrap align-items-center justify-content-between">
                                                                                              <div class="sub-tution-text">
                                                                                                  <h6>Tuition Fee</h6>
                                                                                                  <p>&#163;14,250.00 GBP</p>
                                                                                              </div>
                                                                                              <div class="sub-tution-text">
                                                                                                  <h6>Application Fee</h6>
                                                                                                  <p>&#163;0.00 GBP</p>
                                                                                              </div>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                                </div>
                                                                                <div class="col-lg-3 p-0">
                                                                                    <div class="sub-course-btn-left">
                                                                                        <a class="sub-start-btn-applica" href="javascript:;">Start Application</a>
                                                                                        <a class="sub-program-det-border-btn" href="javascript:;">Program Details</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="course-tab-content">
                                                                            <div class="d-flex flex-wrap justify-content-between">
                                                                                <div class="col-lg-9 p-0">
                                                                                  <div class="sub-course-tt-box">
                                                                                      <div class="sub-course-unt-title">
                                                                                          <h6>1-Year Post-Secondary Certificate</h6>
                                                                                          <h3>T-Level - Design, Surveying and Planning for Construction</h3>
                                                                                          <p>Cheshire College South and West - Ellesmere Port</p>
                                                                                      </div>
                                                                                      <div class="sub-course-country">
                                                                                          <i class="fa-sharp fa-solid fa-location-dot"></i> Ellesmere Port, North West, United Kingdom
                                                                                      </div>
                                                                                      <div class="sub-course-appl-bg">
                                                                                          <div class="d-flex flex-wrap align-items-center justify-content-between">
                                                                                              <div class="sub-tution-text">
                                                                                                  <h6>Tuition Fee</h6>
                                                                                                  <p>&#163;14,250.00 GBP</p>
                                                                                              </div>
                                                                                              <div class="sub-tution-text">
                                                                                                  <h6>Application Fee</h6>
                                                                                                  <p>&#163;0.00 GBP</p>
                                                                                              </div>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                                </div>
                                                                                <div class="col-lg-3 p-0">
                                                                                    <div class="sub-course-btn-left">
                                                                                        <a class="sub-start-btn-applica" href="javascript:;">Start Application</a>
                                                                                        <a class="sub-program-det-border-btn" href="javascript:;">Program Details</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="course-tab-content">
                                                                            <div class="d-flex flex-wrap justify-content-between">
                                                                                <div class="col-lg-9 p-0">
                                                                                  <div class="sub-course-tt-box">
                                                                                      <div class="sub-course-unt-title">
                                                                                          <h6>1-Year Post-Secondary Certificate</h6>
                                                                                          <h3>T-Level - Design, Surveying and Planning for Construction</h3>
                                                                                          <p>Cheshire College South and West - Ellesmere Port</p>
                                                                                      </div>
                                                                                      <div class="sub-course-country">
                                                                                          <i class="fa-sharp fa-solid fa-location-dot"></i> Ellesmere Port, North West, United Kingdom
                                                                                      </div>
                                                                                      <div class="sub-course-appl-bg">
                                                                                          <div class="d-flex flex-wrap align-items-center justify-content-between">
                                                                                              <div class="sub-tution-text">
                                                                                                  <h6>Tuition Fee</h6>
                                                                                                  <p>&#163;14,250.00 GBP</p>
                                                                                              </div>
                                                                                              <div class="sub-tution-text">
                                                                                                  <h6>Application Fee</h6>
                                                                                                  <p>&#163;0.00 GBP</p>
                                                                                              </div>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                                </div>
                                                                                <div class="col-lg-3 p-0">
                                                                                    <div class="sub-course-btn-left">
                                                                                        <a class="sub-start-btn-applica" href="javascript:;">Start Application</a>
                                                                                        <a class="sub-program-det-border-btn" href="javascript:;">Program Details</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                         --->
                    </div>
                    <!-- course-details-1 End -->

                    <!-- course-details-2 -->
                    <div class="tab-pane" id="course-details-2">
                        <div class="d-flex flex-wrap align-items-center justify-content-center">
                            @forelse ($schools as $school)
                                <div class="col-lg-6">
                                    <div class="sub-agent-content">
                                        <div>
                                            <div class="sub-agent-icon">
                                                <img src="{{ $school->university_gallery_url ?? 'https://archive.org/download/no-photo-available/no-photo-available.png' }}"
                                                    alt="" />
                                            </div>
                                        </div>
                                        <div>
                                            <div class="sub-agent-text">
                                                <a href="{{ route('school.detail', $school->slug) }}"
                                                    target="_blank">{{ $school->university_name }}
                                                    , {{ $school->address }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @empty
                            @endforelse

                            {{-- <div class="col-lg-6">
                                <div class="sub-agent-content">
                                    <div>
                                        <div class="sub-agent-icon">
                                            <img src="assets/images/courses/Cambridge_ Education.png"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="sub-agent-text">
                                            <a href="javascript:;">University of Greenwich (Medway Campus)
                                                Chattam , South East</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="sub-agent-content">
                                    <div>
                                        <div class="sub-agent-icon">
                                            <img src="assets/images/courses/Cambridge_ Education.png"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="sub-agent-text">
                                            <a href="javascript:;">University of Greenwich (Medway Campus)
                                                Chattam , South East</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="sub-agent-content">
                                    <div>
                                        <div class="sub-agent-icon">
                                            <img src="assets/images/courses/Cambridge_ Education.png"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="sub-agent-text">
                                            <a href="javascript:;">University of Greenwich (Medway Campus)
                                                Chattam , South East</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="sub-agent-content">
                                    <div>
                                        <div class="sub-agent-icon">
                                            <img src="assets/images/courses/Cambridge_ Education.png"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="sub-agent-text">
                                            <a href="javascript:;">University of Greenwich (Medway Campus)
                                                Chattam , South East</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="sub-agent-content">
                                    <div>
                                        <div class="sub-agent-icon">
                                            <img src="assets/images/courses/Cambridge_ Education.png"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="sub-agent-text">
                                            <a href="javascript:;">University of Greenwich (Medway Campus)
                                                Chattam , South East</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="sub-agent-content">
                                    <div>
                                        <div class="sub-agent-icon">
                                            <img src="assets/images/courses/Cambridge_ Education.png"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="sub-agent-text">
                                            <a href="javascript:;">University of Greenwich (Medway Campus)
                                                Chattam , South East</a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <!-- course-details-2 End -->
                </div>
            </div>
        </div>
    </div>
</div>
