@extends('agent.layouts.layout')
@section('content')
    <div class="dashboardDtlsArea">
        <div class="dashboardDtlsAreainner">
            <div class="applicationSecArea">
                <div class="pt-4 pb-4 d-flex justify-content-between align-items-center headingSec dashboardHeadingSec">
                    <div class="leftSide">
                        <h2 class="title mb-0">Welcome, {{ auth()->user()->name }}!</h2>
                    </div>
                    <div class="rightSide">
                        <a href="{{ route('agent.student.general.detail') }}" class="addNewStudentBtn"><i
                                class="fa-regular fa-plus"></i> <span class="txt">Add
                                new student</span></a>
                    </div>
                </div>
                <div class="analytics_card_area">
                    <div class="row row_flex row_box">

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 column_box">
                            <div class="dashboard_card analytics_card">
                                <a href="{{ route('agent.application', ['status' => 'all']) }}">
                                    <div class="dashboard_card_body analytics_card_body">
                                        <div class="dash-widget-header">
                                            <span class="dash-widget-icon bg-1">
                                                <img src="{{ asset('/') }}assets/images/applications.png"
                                                    class="img-fluid" alt="">
                                            </span>
                                            <div class="dash-count">
                                                <div class="dash-counts">
                                                    <p class="">{{ $data['applications'] ?? 0 }}</p>
                                                </div>
                                                <div class="dash-title">Application</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 column_box">
                            <div class="dashboard_card analytics_card">
                                <a href="{{ route('agent.application', ['status' => 'accepted']) }}">
                                    <div class="dashboard_card_body analytics_card_body">
                                        <div class="dash-widget-header">
                                            <span class="dash-widget-icon bg-1">
                                                <img src="{{ asset('/') }}assets/images/applications.png"
                                                    class="img-fluid" alt="">
                                            </span>
                                            <div class="dash-count">
                                                <div class="dash-counts">
                                                    <p class="">{{ $data['acceptedApplications'] ?? 0 }}</p>
                                                </div>
                                                <div class="dash-title">Accepted</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 column_box">
                            <div class="dashboard_card analytics_card">
                                <a href="{{ route('agent.application', ['status' => 'rejected']) }}">
                                    <div class="dashboard_card_body analytics_card_body">
                                        <div class="dash-widget-header">
                                            <span class="dash-widget-icon bg-1">
                                                <img src="{{ asset('/') }}assets/images/applications.png"
                                                    class="img-fluid" alt="">
                                            </span>
                                            <div class="dash-count">
                                                <div class="dash-counts">
                                                    <p class="">{{ $data['rejectedApplications'] ?? 0 }}</p>
                                                </div>
                                                <div class="dash-title">Rejected</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 column_box">
                            <div class="dashboard_card analytics_card">
                                <a href="{{ route('agent.student') }}">
                                    <div class="dashboard_card_body analytics_card_body">
                                        <div class="dash-widget-header">
                                            <span class="dash-widget-icon bg-1">
                                                <img src="{{ asset('/') }}assets/images/applications.png"
                                                    class="img-fluid" alt="">
                                            </span>
                                            <div class="dash-count">
                                                <div class="dash-counts">
                                                    <p class="">{{ $data['totalStudent'] }}</p>
                                                </div>
                                                <div class="dash-title">Student</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>




                    </div>
                </div>


                <div class="">
                    <div class="row row_box">

                        <div class="col-lg-8 col-md-8 col-sm-12 col-12 column_box">
                            <div class="headingSec mb-4">
                                <h5 class="title mb-1">Recently opened programs</h5>
                                {{-- <p class="mb-1"><small>Last updated 2 weeks ago</small>
                                </p>
                                <p>Showing to 10 programs that are recently opened for fall 2023 and Winter 2024 intake that
                                    opened after March 1st based on historical application</p> --}}
                            </div>
                            <div class="dashTableArea">
                                <div class="table-responsive responsive_table_area">
                                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        {{-- <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="example_length"><label>Show <select
                                                            name="example_length" aria-controls="example"
                                                            class="custom-select custom-select-sm form-control form-control-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> entries</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div id="example_filter" class="dataTables_filter"><label>Search:<input
                                                            type="search" class="form-control form-control-sm"
                                                            placeholder="" aria-controls="example"></label></div>
                                            </div>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="example" class="table table-bordered dataTable no-footer"
                                                    style="width: 100%;" role="grid" aria-describedby="example_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th style="width: 140px;">Program Name</th>
                                                            <th style="width: 141px;">Student Name</th>
                                                            <th style="width: 123px;">School Name</th>
                                                            <th style="width: 141px;">School Address</th>
                                                            <th style="width: 188px;">Submission Deadline</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($data['application_list'] as $item)
                                                            <tr class="order_item odd" role="row">
                                                                <td data-title="Program Name" class="sorting_1">
                                                                    <div class="">
                                                                        {{ $item->program_title }}
                                                                    </div>
                                                                </td>
                                                                <td data-title="Intake">
                                                                    <div class="">{{ $item->getStudent->full_name }}
                                                                    </div>
                                                                </td>
                                                                <td data-title="School Name">
                                                                    <div class="">
                                                                        {{ $item->getProgram->university->university_name }}
                                                                    </div>
                                                                </td>

                                                                <td data-title="School Address">
                                                                    <div class="">
                                                                        {{ $item->getProgram->university->address }}</div>
                                                                </td>
                                                                <td data-title="Submission Deadline">
                                                                    <div class="">
                                                                        {{ @$item->intake_date->deadline ? date('M d, Y', strtotime($item->intake_date->deadline)) : '--' }}
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        @empty
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            {{-- <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info" id="example_info" role="status"
                                                    aria-live="polite">Showing 1 to 1 of 1 entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="dataTables_paginate paging_simple_numbers"
                                                    id="example_paginate">
                                                    <ul class="pagination">
                                                        <li class="paginate_button page-item previous disabled"
                                                            id="example_previous"><a href="#"
                                                                aria-controls="example" data-dt-idx="0" tabindex="0"
                                                                class="page-link">Previous</a></li>
                                                        <li class="paginate_button page-item active"><a href="#"
                                                                aria-controls="example" data-dt-idx="1" tabindex="0"
                                                                class="page-link">1</a></li>
                                                        <li class="paginate_button page-item next disabled"
                                                            id="example_next"><a href="#" aria-controls="example"
                                                                data-dt-idx="2" tabindex="0" class="page-link">Next</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12 column_box">
                            <div class="dashSideBar">
                                <div class="dashSideBarWidget">
                                    <div class="dashSideBarWidgetHeader">
                                        <h5 class="title mb-0">Popular Links</h5>
                                    </div>
                                    <div class="dashSideBarWidgetBody">
                                        <ul class="dashSideBarList dashSideBarList-1">
                                            <li>
                                                <a href="#" class="">
                                                    <span class="icon"><i
                                                            class="fa-regular fa-message-lines"></i></span>
                                                    <span class="txt">WhatsApp chat</span>
                                                    <span class="new"><i class="fa-solid fa-circle"></i> New</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="">
                                                    <span class="icon"><i
                                                            class="fa-regular fa-message-lines"></i></span>
                                                    <span class="txt">Assist-knowledge</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="">
                                                    <span class="icon"><i
                                                            class="fa-regular fa-message-lines"></i></span>
                                                    <span class="txt">Assist-knowledge</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="">
                                                    <span class="icon"><i
                                                            class="fa-regular fa-message-lines"></i></span>
                                                    <span class="txt">Assist-knowledge</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="">
                                                    <span class="icon"><i
                                                            class="fa-regular fa-message-lines"></i></span>
                                                    <span class="txt">Assist-knowledge</span>
                                                </a>
                                            </li>
                                        </ul>
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
