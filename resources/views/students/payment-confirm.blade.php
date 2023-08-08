@extends('students.layouts.layout')
@section('content')
    <div class="dashboardDtlsArea">
        <div class="dashboardDtlsAreainner">
            <div class="paymentDtlsArea">
                <div class="paymentDtlsAreainner">
                    <div class="dashboard_card paymentCard">
                        <div class="dashboard_card_body paymentCardBody">
                            <div class="paymenyInfoListArea">
                                <ul class="paymenyInfoList">
                                    <li class="d-flex justify-content-between paymenyInfoListItem">
                                        <div class="ttl">
                                            <strong>Payment Type :</strong>
                                        </div>
                                        <div class="txt">
                                            <strong>Payment</strong>
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between paymenyInfoListItem">
                                        <div class="ttl">
                                            Payment Account
                                        </div>
                                        <div class="txt">
                                            ${{ number_format($totalPayableAmount, 2) }}
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between paymenyInfoListItem">
                                        <div class="ttl">
                                            Prossing Fees
                                        </div>
                                        <div class="txt">
                                            {{ payment_fee() }}%
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between paymenyInfoListItem total">
                                        <div class="ttl">
                                            Total
                                        </div>
                                        <div class="txt">
                                            ${{ number_format(total_payable_amount($totalPayableAmount), 2) }}
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between paymenyInfoListItem method">
                                        <div class="ttl">
                                            Pay Method
                                        </div>
                                        <div class="txt">
                                            Online Payment
                                        </div>
                                    </li>
                                    {{-- <li class="d-flex justify-content-between paymenyInfoListItem">
                                        <div class="ttl">
                                            Memo
                                        </div>
                                        <div class="txt">
                                            -
                                        </div>
                                    </li> --}}
                                </ul>
                            </div>
                            <div class="confirmBtnArea">
                                <a href="{{ route('student.payment', ['id' => $id]) }}" class="confirmBtn">Confirm</a>
                            </div>
                            <div class="paymentContentArea">
                                <h5 class=""><span class="icon"><i class="fa-regular fa-lock-keyhole"></i></span>
                                    <span class="txt">This is a Secure Payment</span>
                                </h5>
                                <p class="mb-2">By Checking confirm you agree to the <a href="#">terms</a></p>
                                <p class="">Lorem Ipsum has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type and scrambled it to make
                                    a type specimen book. It has survived not only five centuries, but also the leap into
                                    electronic typesetting, remaining essentially unchanged.</p>
                                <p class="">Lorem ipsum, placeholder or dummy text used in typesetting and graphic
                                    design.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
