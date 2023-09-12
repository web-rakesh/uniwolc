{{-- @if (auth()->user()->type == '3')
    @extends('staff.layouts.layout')
@elseif(auth()->user()->type == '1')
    @extends('agent.layouts.layout')
@else
@endif --}}

@extends('students.layouts.layout')

@section('content')

    
    <div class="singleProgramsSec">


        <div class="singleProgramsGalleryArea">
            <div class="singleProgramsGalleryAreainner">
                <div class="row rowBox">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 columbBox singleProgramsGalleryBigThumnailArea">
                        <div class="singleProgramsGalleryBigThumnail">
                            <img src="{{ $schoolDetails->university_gallery_url }}" class="img-fluid w-100" alt=""
                                data-lightbox="photos">
                            {{-- @foreach ($universityImage->getMedia('university-picture') as $image)
                                @if ($loop->first)
                                    <a href="{{ $image->getUrl() }}" data-lightbox="photos">
                                        <img src="{{ $image->getUrl() }}" class="img-fluid w-100" alt=""
                                            data-lightbox="photos">
                                    </a>
                                    <p>Our first element of the array</p>
                                @endif
                            @endforeach --}}


                            <div class="overLayBtnArea">
                                @if (!empty($schoolDetails->university_gallery_url))
                                    <a href="{{ $schoolDetails->university_gallery_url }}" class="overLayBtn showPhotoBtn"
                                        data-lightbox="photos"><i class="fa-regular fa-camera"></i> <span
                                            class="txt">Show
                                            photos</span></a>
                                @endif
                                @if ($schoolDetails->location != '')
                                    <a href="https://www.google.com/maps?q={{ urlencode($schoolDetails->location) }}"
                                        target="_blank" class="overLayBtn viewMapBtn"><i
                                            class="fa-regular fa-location-dot"></i>
                                        <span class="txt">View on
                                            map</span></a>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div
                        class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 columbBox singleProgramsGallerySmallThumnailArea">
                        <div class="singleProgramsGallerySmallThumnailAreainner">
                            @foreach ($universityImage as $key => $image)
                                @if ($key > 0 && $key < 3)
                                    <div class="singleProgramsGallerySmallThumnailBox">
                                        <div class="singleProgramsGallerySmallThumnail">
                                            <a href="{{ $image->getUrl() }}" data-lightbox="photos">
                                                <img src="{{ $image->getUrl() }}" class="img-fluid w-100" alt=""
                                                    data-lightbox="photos">
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            {{-- <div class="singleProgramsGallerySmallThumnailBox">
                                <div class="singleProgramsGallerySmallThumnail">
                                    <a href="https://www.propertyfinder.ae/property/2a73a8ca14ffa4d2193d3fb95cf2b727/1312/894/MODE/1bb11f/9608948-c9a7co.webp?ctr=ae"
                                        data-lightbox="photos">
                                        <img src="https://www.propertyfinder.ae/property/2a73a8ca14ffa4d2193d3fb95cf2b727/1312/894/MODE/1bb11f/9608948-c9a7co.webp?ctr=ae"
                                            class="img-fluid w-100" alt="" data-lightbox="photos">
                                    </a>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="singleProgramsGalleryMoreThumnail">
                <a href="https://www.propertyfinder.ae/property/0331397d228470003a3b2041e2e90927/1312/894/MODE/f8affc/9608948-50e5fo.webp?ctr=ae"
                    data-lightbox="photos">
                </a>
                <a href="https://www.propertyfinder.ae/property/cf744a14c7045d88391d4a9fd875f596/1312/894/MODE/831d47/9608948-c8496o.webp?ctr=ae"
                    data-lightbox="photos">
                </a>
                <a href="https://www.propertyfinder.ae/property/6320b81736b49cdf68f7afc1f9af68f6/1312/894/MODE/a2dfac/9608948-c7f84o.webp?ctr=ae"
                    data-lightbox="photos">
                </a>
                <a href="https://www.propertyfinder.ae/property/745469241a72f848834b8b9131ded16e/1312/894/MODE/bd24d6/9608948-327d5o.webp?ctr=ae"
                    data-lightbox="photos">
                </a>
            </div> --}}


        </div>

        <div class="singleProgramsSecinner">
            <div class="row rowBox">
                <div class="col-xl-8 xol-lg-8 col-md-12 col-sm-12 col-12 columBox">
                    <div class="leftSingleProgramsArea">
                        <div class="singleProgramsDtlsItem">
                            <div class="singleProgramsDtls">
                                <div class="programsCardIntroType"> </div>
                                <div class="programsCardIntroTitle">{{ $schoolDetails->university_name }}</div>
                                <div class="singleProgramsAmenities">
                                    <div class="row rowBox2">
                                        <div
                                            class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 columnBox2 singleProgramsAmenitiesItem">
                                            <div class="singleProgramsAmenitiesIteminner">
                                                <div class="title"><i class="fa-regular fa-address-book"></i>
                                                    <span class="txt"></span>Address:
                                                </div>
                                                <div class="content">{{ $schoolDetails->address }},
                                                    {{ get_country($schoolDetails->country) }}</div>

                                            </div>
                                        </div>
                                        {{-- <div
                                            class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 columnBox2 singleProgramsAmenitiesItem">
                                            <div class="singleProgramsAmenitiesIteminner">
                                                <div class="title"><i class="fa-regular fa-bed-front"></i> <span
                                                        class="txt"></span>Property size:</div>
                                                <div class="content">6,847 sqft / 636 sqm</div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 columnBox2 singleProgramsAmenitiesItem">
                                            <div class="singleProgramsAmenitiesIteminner">
                                                <div class="title"><i class="fa-regular fa-bed-front"></i> <span
                                                        class="txt"></span>Bedrooms:</div>
                                                <div class="content">4 + Maid</div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 columnBox2 singleProgramsAmenitiesItem">
                                            <div class="singleProgramsAmenitiesIteminner">
                                                <div class="title"><i class="fa-regular fa-bed-front"></i> <span
                                                        class="txt"></span>Bathrooms:</div>
                                                <div class="content">5</div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="borderHr">

                        <div class="singleProgramsDtlsItem">
                            {{-- <div class="tagDescriptionsArea">
                                <div class="tagDescriptionsAreainner">
                                    <div class="row rowBox2">
                                        <div
                                            class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 columnBox2 tagDescriptionsBox">

                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <hr class="borderHr">

                            {{-- <div class="singleProgramsDtlsItem">
                                <div class="programLocationAgentArea">
                                    <div class="programLocationAgentAreainner">
                                        <div class="row rowBox2">
                                            <div
                                                class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 columnBox2 programLocationAgentBox programLocationBox">
                                                <div class="d-flex programLocationAgentinner">
                                                    <div class="mapThumnail">
                                                        <img src="https://www.propertyfinder.ae/dist/common/assets/c70d76248e.map.svg"
                                                            class="img-fluid" alt="">
                                                        <a href="#" class="mapLink">Map</a>
                                                    </div>
                                                    <div class="content">
                                                        <p class="mb-1">Legacy Nova Villas</p>
                                                        <p class="mb-0">Dubai, Jumeirah Park</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 columnBox2 programLocationAgentBox programAgentBox">
                                                <div class="d-flex programLocationAgentinner">
                                                    <div class="userThumnail">
                                                        <img src="https://t3.ftcdn.net/jpg/00/64/67/52/360_F_64675209_7ve2XQANuzuHjMZXP3aIYIpsDKEbF5dD.jpg"
                                                            class="img-fluid" alt="">
                                                    </div>
                                                    <div class="content">
                                                        <p class="mb-1"><a href="#">Ryan Kenna</a></p>
                                                        <p class="mb-1">Sales Manager at fam Properties - Branch 7
                                                            (177 properties)</p>
                                                        <p class="mb-0">Speaks English</p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <hr class="borderHr">

                            <div class="singleProgramsDtlsItem">
                                <h4 class="d-flex align-items-center hdTitle"><span class="icon"><i
                                            class="fa-regular fa-building-columns"></i></span> <span
                                        class="txt">About</span></h4>
                                <div class="programAminitiesArea">
                                    <div class="programAminitiesAreainner">
                                        <div class="row rowBox2">

                                            {{ $schoolDetails->about_university }}

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="borderHr">

                            <div class="singleProgramsDtlsItem">
                                <h4 class="d-flex align-items-center hdTitle"><span class="icon"><i
                                            class="fa-regular fa-clipboard-list-check"></i></span> <span
                                        class="txt">Average Graduate Program</span></h4>
                                <div class="singleProgramsDtlsContentArea">
                                    {{ $schoolDetails->average_graduate_program }}
                                </div>
                            </div>
                            <hr class="borderHr">


                            {{-- <div class="applyNowBtnArea text-center mt-4 mb-2">
                                <a href="{{ route('student.program.apply', $program->id) }}"
                                    class="btn btn-primary applyNowBtn"><span class="txt">Apply
                                        Now</span></a>
                            </div>
                            <hr class="borderHr">

                            <div class="singleProgramsDtlsItem">
                                <h4 class="d-flex align-items-center hdTitle"><span class="icon"><i
                                            class="fa-regular fa-book-open-cover"></i></span> <span class="txt">Similar
                                        Programs </span></h4>
                                <div class="singleProgramsDtlsContentArea">
                                    <h5 class="txt-center">Sorry, we couldn't find any similar programs</h5>
                                </div>
                            </div> --}}

                            <hr class="borderHr">
                            <div class="singleProgramsDtlsItem">
                                <h4 class="d-flex align-items-center hdTitle"><span class="icon"><i
                                            class="fa-regular fa-building-columns"></i></span> <span
                                        class="txt">Description</span></h4>
                                <div class="singleProgramsDtlsContentArea">
                                    <p>{{ $schoolDetails->feature }}</p>

                                </div>
                            </div>

                            <hr class="borderHr">
                            <div class="singleProgramsDtlsItem">
                                <h4 class="d-flex align-items-center hdTitle"><span class="icon"><i
                                            class="fa-regular fa-building-columns"></i></span> <span class="txt">Home
                                        Stay</span></h4>
                                <div class="singleProgramsDtlsContentArea">

                                    <p> {{ $schoolDetails->home_stay }}</p>
                                </div>
                            </div>



                        </div>

                    </div>
                </div>
                <div class="col-xl-4 xol-lg-4 col-md-12 col-sm-12 col-12 columBox">
                    <div class="singleProgramsSideBar">
                        <div class="sidebarAgentDtlsArea">
                            <div class="sidebarAgentDtlsAreainner">
                                <div class="programsPrice">
                                    {{-- <h4 class="mb-0">$ 47</h4> --}}
                                </div>
                                {{-- <div class="applyNowBtnArea">
                                    <a href="{{ route('student.program.apply', $program->id) }}"
                                        class="btn btn-primary w-100 applyNowBtn"><span class="txt">Apply
                                            Now</span></a>
                                </div> --}}

                            </div>
                        </div>

                        <div class="singleProgramsSideBarWidget">
                            <div class="singleProgramsSideBarWidgetBody">
                                <ul class="sidebarList">



                                    <li class="d-flex sidebarListItem">
                                        <div class="icon">
                                            <svg aria-hidden="true" color="primary" role="img" viewBox="0 0 48 48"
                                                xmlns="http://www.w3.org/2000/svg" class="css-1ucx5lj">
                                                <path
                                                    d="M26.9994 9.36008V7H24.9994V9.2085C23.9923 9.36116 23.1196 10.0537 22.764 11.0521C22.1872 12.671 23.179 14.4252 24.8636 14.7655L26.7536 15.1475C27.1771 15.233 27.4647 15.6285 27.4157 16.0578C27.3633 16.516 26.9483 16.8443 26.4904 16.7898L24.1184 16.5074C23.57 16.4421 23.0725 16.8338 23.0072 17.3822C22.9419 17.9306 23.3336 18.4281 23.882 18.4934L24.9994 18.6264V21H26.9994V18.7664C28.2398 18.5855 29.2536 17.5901 29.4027 16.2849C29.5697 14.824 28.591 13.4783 27.1497 13.1871L25.2597 12.8052C24.7689 12.706 24.4799 12.1949 24.648 11.7232C24.7781 11.3581 25.1455 11.1334 25.5298 11.184L27.8697 11.4918C28.4173 11.5639 28.9196 11.1784 28.9916 10.6308C29.0637 10.0833 28.6782 9.58097 28.1306 9.50892L26.9994 9.36008Z">
                                                </path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M25.9994 2C19.372 2 13.9994 7.37258 13.9994 14C13.9994 20.6274 19.372 26 25.9994 26C32.6268 26 37.9994 20.6274 37.9994 14C37.9994 7.37258 32.6268 2 25.9994 2ZM15.9994 14C15.9994 8.47715 20.4765 4 25.9994 4C31.5222 4 35.9994 8.47715 35.9994 14C35.9994 19.5228 31.5222 24 25.9994 24C20.4765 24 15.9994 19.5228 15.9994 14Z">
                                                </path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M4.99939 30C4.99939 28.8954 5.89482 28 6.99939 28H11.9994C13.104 28 13.9994 28.8954 13.9994 30V30.0719L15.996 29.3459C17.5609 28.7768 19.2345 28.5705 20.8908 28.7424L33.0544 30.0049C33.564 30.0578 33.9512 30.4872 33.9512 30.9995V32.049C33.9512 34.0173 32.5192 35.693 30.575 36L26.9051 36.5795L29.9385 37.143C30.1739 37.1867 30.4153 37.1878 30.6511 37.1462L41.8259 35.176C42.117 35.1247 42.4159 35.2048 42.6423 35.3948C42.8688 35.5848 42.9995 35.8652 42.9995 36.1608V40.1027C42.9995 41.8816 41.8249 43.4467 40.1169 43.9435L33.8127 45.7775C28.7395 47.2533 23.3129 46.9375 18.4452 44.8832L13.9994 43.0069C13.9956 44.1083 13.1017 45 11.9994 45H6.99939C5.89482 45 4.99939 44.1046 4.99939 43V30ZM13.9994 40.8361V32.2L16.6795 31.2255C17.9598 30.7599 19.3292 30.591 20.6843 30.7317L31.9512 31.9011V32.049C31.9512 33.0331 31.2352 33.871 30.2631 34.0245L26.5932 34.604C24.3731 34.9545 24.33 38.1353 26.5398 38.5458L29.5733 39.1093C30.0441 39.1968 30.5268 39.199 30.9983 39.1159L40.9995 37.3526V40.1027C40.9995 40.9922 40.4122 41.7747 39.5582 42.0231L33.254 43.8571C28.622 45.2046 23.6673 44.9162 19.2228 43.0406L13.9994 40.8361ZM11.9994 30H6.99939V43H11.9994V30Z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="sidebarContent">
                                            <div class="sidebarTitle">{{ get_currency($schoolDetails->country) }}
                                                {{ $schoolDetails->application_fee ?? 0 }} </div>
                                            <div class="sidebarText">Application Fees</div>
                                        </div>
                                    </li>

                                    <li class="d-flex sidebarListItem">
                                        <div class="icon">
                                            <svg aria-hidden="true" color="primary" role="img" viewBox="0 0 48 48"
                                                xmlns="http://www.w3.org/2000/svg" class="css-1ucx5lj">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M20 1C20 0.447715 20.4477 0 21 0H27.5C28.0523 0 28.5 0.447715 28.5 1V6C28.5 6.55228 28.0523 7 27.5 7H22V8.56545L30.6823 16.6689C30.885 16.8581 31 17.1228 31 17.4V21.5H29V17.8346L21 10.3679L13 17.8346V23V38H21.5V40H12H3C2.44772 40 2 39.5523 2 39V27.0635C2 26.6704 2.23026 26.3138 2.5885 26.1521L11 22.3543V17.4C11 17.1228 11.115 16.8581 11.3177 16.6689L20 8.56545V6V4V1ZM26.5 5H22V4V2H26.5V5ZM11 38V24.5487L4 27.7092V38H11ZM20.84 23.68C21.8562 23.68 22.68 22.8562 22.68 21.84C22.68 20.8238 21.8562 20 20.84 20C19.8238 20 19 20.8238 19 21.84C19 22.8562 19.8238 23.68 20.84 23.68ZM20.84 25.68C22.9608 25.68 24.68 23.9608 24.68 21.84C24.68 19.7192 22.9608 18 20.84 18C18.7192 18 17 19.7192 17 21.84C17 23.9608 18.7192 25.68 20.84 25.68ZM26 36C26 30.4772 30.4772 26 36 26C41.5229 26 46 30.4772 46 36C46 41.5229 41.5229 46 36 46C30.4772 46 26 41.5229 26 36ZM36 24C29.3726 24 24 29.3726 24 36C24 42.6274 29.3726 48 36 48C42.6274 48 48 42.6274 48 36C48 29.3726 42.6274 24 36 24ZM37 31.3598V29H35V31.208C33.9926 31.3604 33.1195 32.053 32.7638 33.0517C32.187 34.6706 33.1789 36.4248 34.8634 36.7652L36.7534 37.1471C37.177 37.2327 37.4646 37.6281 37.4155 38.0574C37.3631 38.5156 36.9481 38.8439 36.4902 38.7894L34.1182 38.507C33.5698 38.4417 33.0723 38.8334 33.007 39.3818C32.9417 39.9302 33.3334 40.4277 33.8818 40.493L35 40.6261V43H37V40.7659C38.2401 40.5847 39.2534 39.5894 39.4026 38.2845C39.5695 36.8236 38.5908 35.4779 37.1495 35.1867L35.2595 34.8048C34.7687 34.7056 34.4798 34.1945 34.6478 33.7229C34.7779 33.3577 35.1453 33.133 35.5296 33.1836L37.8695 33.4915C38.4171 33.5635 38.9194 33.178 38.9915 32.6305C39.0635 32.0829 38.678 31.5806 38.1305 31.5085L37 31.3598Z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="sidebarContent">
                                            <div class="sidebarTitle">{{ get_currency($schoolDetails->country) }}
                                                {{ $schoolDetails->gross_tuition }} </div>
                                            <div class="sidebarText">Total Fees</div>
                                        </div>
                                    </li>

                                    <li class="d-flex sidebarListItem">
                                        <div class="icon">
                                            <svg aria-hidden="true" color="primary" role="img" viewBox="0 0 48 48"
                                                xmlns="http://www.w3.org/2000/svg" class="css-1ucx5lj">
                                                <path
                                                    d="M25.2858 17.9998V21.3182L27.2734 21.5797C27.8209 21.6518 28.2064 22.1541 28.1344 22.7016C28.0623 23.2492 27.56 23.6347 27.0125 23.5626L23.6697 23.1228C22.9204 23.0242 22.204 23.4623 21.9503 24.1743C21.6227 25.094 22.1861 26.0904 23.143 26.2838L25.8431 26.8294C27.684 27.2014 28.934 28.9202 28.7208 30.7861C28.5158 32.5797 27.0326 33.9152 25.2858 33.99V37.1426H23.2858V33.7993L21.3104 33.5642C20.762 33.4989 20.3704 33.0014 20.4356 32.453C20.5009 31.9046 20.9984 31.5129 21.5468 31.5782L24.9354 31.9816C25.8254 32.0875 26.6319 31.4495 26.7337 30.559C26.8291 29.7247 26.2701 28.9561 25.447 28.7898L22.7469 28.2442C20.5963 27.8096 19.33 25.57 20.0663 23.5031C20.563 22.109 21.8491 21.1821 23.2858 21.113V17.9998H25.2858Z">
                                                </path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M25.4142 5.99985C24.6332 5.2188 23.3669 5.2188 22.5858 5.99985L16 12.5857V8.99976C16 8.44747 15.5523 7.99976 15 7.99976H10C9.44772 7.99976 9 8.44747 9 8.99976V19.5857L3.58582 24.9998L5.00003 26.4141L9 22.4141V40.9998C9 42.1043 9.89543 42.9998 11 42.9998H37C38.1046 42.9998 39 42.1043 39 40.9998V22.414L43 26.4141L44.4142 24.9998L38.7138 19.2994C38.7094 19.2949 38.7049 19.2904 38.7004 19.286L25.4142 5.99985ZM37 20.414L24 7.41406L11 20.4141V40.9998H37V20.414ZM11 17.5857L14.0034 14.5823C14.0011 14.5551 14 14.5276 14 14.4998V9.99976H11V17.5857Z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="sidebarContent">
                                            <div class="sidebarTitle">{{ get_currency($schoolDetails->country) }}
                                                {{ $schoolDetails->cost_of_living }} </div>
                                            <div class="sidebarText">Cost of Living</div>
                                        </div>
                                    </li>

                                    <li class="d-flex sidebarListItem">
                                        <div class="icon">
                                            <svg aria-hidden="true" color="primary" role="img" viewBox="0 0 48 48"
                                                xmlns="http://www.w3.org/2000/svg" class="css-1ucx5lj">
                                                <path d="M17 31H11V33H17V31Z"></path>
                                                <path d="M21 25H27V27H21V25Z"></path>
                                                <path d="M17 25H11V27H17V25Z"></path>
                                                <path d="M21 31H27V33H21V31Z"></path>
                                                <path d="M37 25H31V27H37V25Z"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M15 9V6H13V9H7C5.89543 9 5 9.89543 5 11V39C5 40.1046 5.89543 41 7 41H41C42.1046 41 43 40.1046 43 39V11C43 9.89543 42.1046 9 41 9H35V6H33V9H25V6H23V9H15ZM33 11H25V14H23V11H15V14H13V11H7L7 17H41V11H35V14H33V11ZM7 39L7 19H41V39H7Z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="sidebarContent">
                                            <div class="sidebarTitle"> {{ $schoolDetails->program_length }} </div>
                                            <div class="sidebarText">Program Length</div>
                                        </div>
                                    </li>



                                </ul>
                            </div>
                        </div>


                        {{-- <div class="singleProgramsSideBarWidget">
                            <div class="singleProgramsSideBarWidgetHeader">
                                <h4 class="title">Related Programs</h4>
                            </div>
                            <div class="singleProgramsSideBarWidgetBody">
                                <ul class="sidebarList">
                                    @forelse ($relatedPrograms as $item)
                                        <li class="sidebarListItem">
                                            <a href="{{ route('student.program.detail', $item->id) }}"
                                                class="sidebarListLink">{{ $item->program_title }}</a>
                                        </li>
                                    @empty
                                        No program available
                                    @endforelse
                                </ul>
                            </div>
                        </div> --}}

                        <div class="singleProgramsSideBarWidget">
                            <div class="singleProgramsSideBarWidgetBody">
                                {{-- <ul class="sidebarList">

                                    <li class="sidebarListItem">
                                        <div class="sidebarContent">
                                            <div class="sidebarTitle">{{ $program->program_level }}</div>
                                            <div class="sidebarText">Program Level</div>
                                        </div>
                                    </li>

                                    <li class="sidebarListItem">
                                        <div class="sidebarContent">
                                            <div class="sidebarTitle">{{ $program->program_length }}</div>
                                            <div class="sidebarText">Program Length</div>
                                        </div>
                                    </li>

                                    <li class="sidebarListItem">
                                        <div class="sidebarContent">
                                            <div class="sidebarTitle">£{{ number_format($program->cost_of_living, 2) }}
                                                GBP
                                                / Year</div>
                                            <div class="sidebarText">Cost of Living</div>
                                        </div>
                                    </li>

                                    <li class="sidebarListItem">
                                        <div class="sidebarContent">
                                            <div class="sidebarTitle">£{{ number_format($program->gross_tuition, 2) }}
                                                GBP / Year</div>
                                            <div class="sidebarText">Tuition</div>
                                        </div>
                                    </li>

                                    <li class="sidebarListItem">
                                        <div class="sidebarContent">
                                            <div class="sidebarTitle">£{{ number_format($program->application_fee, 2) }}
                                                GBP</div>
                                            <div class="sidebarText">Application Fee</div>
                                        </div>
                                    </li>


                                </ul> --}}
                            </div>
                        </div>

                        <div class="singleProgramsSideBarWidget">
                            <div class="singleProgramsSideBarWidgetHeader">
                                <h4 class="title"> Institution Details</h4>
                            </div>
                            <div class="singleProgramsSideBarWidgetBody">
                                <ul class="sidebarList">

                                    <li class="d-flex justify-content-between sidebarListItem">
                                        <span class="ttl">Founded</span>
                                        <span class="txt">{{ $schoolDetails->founded }}</span>
                                    </li>
                                    <li class="d-flex justify-content-between sidebarListItem">
                                        <span class="ttl">School ID</span>
                                        <span class="txt">{{ $schoolDetails->school_id }}</span>
                                    </li>
                                    <li class="d-flex justify-content-between sidebarListItem">
                                        <span class="ttl">DLI number</span>
                                        <span class="txt">{{ $schoolDetails->provider_id_number }}</span>
                                    </li>
                                    <li class="d-flex justify-content-between sidebarListItem">
                                        <span class="ttl">Institution type</span>
                                        <span class="txt">{{ $schoolDetails->institution_type }}</span>
                                    </li>
                                    <li class="d-flex justify-content-between sidebarListItem">
                                        <span class="ttl">Country</span>
                                        <span class="txt"> {{ get_country($schoolDetails->country) }}</span>
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
