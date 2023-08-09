@extends('staff.layouts.layout')
@section('content')
    <div class="dashboardDtlsArea">
        <div class="dashboardDtlsAreainner">
            <div class="paymentDtlsArea">
                <div class="paymentDtlsAreainner">
                    <div class="paymentSuccessFulArea">
                        <div class="paymentSuccessFulAreainner">
                            <div class="dashboard_card paymentSuccessCard">
                                <div class="dashboard_card_body paymentSuccessCardBody">
                                    <div class="paymentSuccessIcon">
                                        <span class="icon"><img src="{{ asset('/') }}assets/images/success.png"
                                                class="" alt=""></span>
                                        <p class="mb-0 mt-2">Payment request sent</p>
                                    </div>
                                    <div class="paymentSuccessContent">
                                        <h6 class="">We habe sent the Payment Link to the student.Please follow-up if
                                            required</h6>
                                    </div>
                                    <div class="paymentInfo">
                                        <h6 class="">Payment Summery</h6>
                                        <p class="">Prateek K</p>
                                        <p class="">Engineering Entrance Coaching</p>
                                        <p class="">{{ '$' . number_format($amount, 2) }}</p>
                                        <p class="mb-3">11 Clasess</p>
                                        <h6 class="">Payment Link</h6>
                                        <p class=""><span id="">https://kidzz.in/projects/SiteFinal</span>
                                            <span class="copyBtn">Copy</span>
                                        </p>
                                    </div>
                                    <div class="backBtnArea">
                                        <a href="#" class="backBtn">Okay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
