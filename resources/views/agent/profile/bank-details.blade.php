@extends('agent.layouts.layout')
@section('content')
    <section class="dashboardPgaesSec bg-white">
        <div class="container rounded">
            <div class="dashboardPgaesSecinner">
                <div class="row rowBox">
                    <div class="col-md-3 columnBox border-right dasboardLeftSideBar">
                        <div class="dasboardLeftSideBarinner">
                            <div class="d-flex flex-column align-items-center text-center userProfileArea">
                                <div class="userProfileThumnail">
                                    <img class="rounded-circle" width=""
                                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                </div>
                                <div class="userProfileInfo">
                                    <p class="userName font-weight-bold mb-0">{{ auth()->user()->name }}</p>
                                    <p class="text text-black-50 mb-0">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                            <div class="dasboardLeftSideBarMenuArea">
                                <ul class="nav">
                                    <li class="nav-item ">
                                        <a class="nav-link"
                                            href="{{ route('agent.general.details', $agentBankDetail ? $agentBankDetail->user_id : '') }}"><span
                                                class="icon"><i class="fa-regular fa-address-card"></i></span> <span
                                                class="txt">General Info</span></a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link"
                                            href="{{ $agentBankDetail ? route('agent.bank.details', $agentBankDetail ? $agentBankDetail->user_id : '') : 'javascript:;' }}"><span
                                                class="icon"><i class="fa-regular fa-graduation-cap"></i></span> <span
                                                class="txt">Banking</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ $agentBankDetail ? route('agent.school.commission', $agentBankDetail ? $agentBankDetail->user_id : '') : 'javascript:;' }}"><span
                                                class="icon"><i class="fa-regular fa-rectangle-list"></i></span> <span
                                                class="txt">School Commissions</span> </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ $agentBankDetail ? route('agent.commission.policy', $agentBankDetail ? $agentBankDetail->user_id : '') : 'javascript:;' }}"><span
                                                class="icon"><i class="fa-regular fa-id-card-clip"></i></span> <span
                                                class="txt">Commission Policy</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ $agentBankDetail ? route('agent.manage.staff', $agentBankDetail ? $agentBankDetail->user_id : '') : 'javascript:;' }}"><span
                                                class="icon"><i class="fa-regular fa-id-card-clip"></i></span> <span
                                                class="txt">Manage Staff</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 columnBox border-right dasboardrightPart">
                        <div class="dasboardrightPartWrapper">

                            <h4 class="card-title text-center1 mb-0"> Update Bank Details</h4>
                            <hr>
                            @include('flash-messages')
                            <form method="post" action="{{ route('agent.bank.details.store') }}">
                                @csrf
                                <input type="hidden" name="user_id"
                                    value="{{ $agentBankDetail ? $agentBankDetail->agent_id : '' }}">
                                <div class="row rowBox2 mt-3">

                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels">Account Holder Name</label>
                                        <input type="text" class="form-control" placeholder="Account Holder Name"
                                            name="account_holder_name"
                                            value="{{ $agentBankDetail ? $agentBankDetail->account_holder_name : '' }}"
                                            required="">
                                        @if ($errors->has('account_holder_name'))
                                            <span class="text-danger">{{ $errors->first('account_holder_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels">Bank Name</label>
                                        <input type="text" class="form-control" name="bank_name"
                                            value="{{ $agentBankDetail ? $agentBankDetail->bank_name : '' }}"
                                            placeholder="Bank Name" required="">
                                        @if ($errors->has('bank_name'))
                                            <span class="text-danger">{{ $errors->first('bank_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels">Account Number</label>
                                        <input type="text" class="form-control"
                                            value="{{ $agentBankDetail ? $agentBankDetail->account_number : '' }}"
                                            name="account_number" placeholder="Account Number" required="">
                                        @if ($errors->has('account_number'))
                                            <span class="text-danger">{{ $errors->first('account_number') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels">IFSC CODE</label>
                                        <input type="text" class="form-control" name="ifsc_code"
                                            value="{{ $agentBankDetail ? $agentBankDetail->ifsc_code : '' }}"
                                            placeholder="IFSC CODE" required="">
                                        @if ($errors->has('ifsc_code'))
                                            <span class="text-danger">{{ $errors->first('ifsc_code') }}</span>
                                        @endif

                                    </div>
                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels">SWIFT CODE</label>
                                        <input type="text" class="form-control" name="swift_code"
                                            placeholder="SWIFT CODE"
                                            value="{{ $agentBankDetail ? $agentBankDetail->swift_code : '' }}"
                                            required="">
                                        @if ($errors->has('swift_code'))
                                            <span class="text-danger">{{ $errors->first('swift_code') }}</span>
                                        @endif

                                    </div>

                                    <div class="col-md-6 mb-3 columnBox2">
                                        <label class="labels">Note</label>
                                        <textarea class="form-control" name="note" id="" cols="30" rows="5">{{ $agentBankDetail ? $agentBankDetail->note : '' }}</textarea>
                                        @if ($errors->has('note'))
                                            <span class="text-danger">{{ $errors->first('note') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <div class="mt-3 text-end">
                                    <button class="btn btn-primary profile-button" type="submit">
                                        Save & Update Profile
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
