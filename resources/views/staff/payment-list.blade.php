@extends('staff.layouts.layout')
@section('content')
    <div class="dashboardDtlsArea">
        <div class="dashboardDtlsAreainner">
            <div class="applicationSecArea">
                <div class="pt-4 pb-4 d-flex justify-content-between align-items-center headingSec dashboardHeadingSec">
                    <div class="row row_box">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 column_box">
                            <div class="headingSec mb-4">
                                <h5 class="title mb-1">Staff Payment List</h5>
                                {{-- <p class="mb-1"><small>Last updated 2 weeks ago</small>
                                </p>
                                <p>Showing to 10 programs that are recently opened for fall 2023 and Winter 2024 intake that
                                    opened after March 1st based on historical application</p> --}}
                            </div>
                            <div class="dashTableArea">
                                <div class="table-responsive responsive_table_area">
                                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="example" class="table table-bordered dataTable no-footer"
                                                    style="width: 100%;" role="grid" aria-describedby="example_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th style="width: 52px;">#</th>
                                                            <th style="width: 140px;">Transaction Id</th>
                                                            <th style="width: 140px;">Student</th>
                                                            <th style="width: 140px;">Program Title</th>
                                                            <th style="width: 141px;">Payment Method</th>
                                                            <th style="width: 123px;">Amount</th>
                                                            <th style="width: 141px;">Currency</th>
                                                            <th style="width: 188px;">Payment Date</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($staffPaymentDetails ?? [] as $transaction)
                                                            <tr class="order_item odd" role="row">
                                                                <td data-title="Id " class="sorting_1">
                                                                    <div class="">
                                                                        {{ $loop->iteration }}
                                                                    </div>
                                                                </td>
                                                                <td data-title="Program Name" class="sorting_1">
                                                                    <div class="">
                                                                        {{ $transaction->transaction_id }}
                                                                    </div>
                                                                </td>
                                                                <td data-title="Student Name" class="sorting_2">
                                                                    <div class="">
                                                                        {{ $transaction->student->full_name }}
                                                                    </div>
                                                                </td>
                                                                <td data-title="Program Name" class="sorting_3">
                                                                    <div class="">
                                                                        {{ $transaction->getProgram->program_title ?? '' }}
                                                                    </div>
                                                                </td>
                                                                <td data-title="Intake">
                                                                    <div class="">
                                                                        {{ $transaction->payment_method ?? '' }}
                                                                    </div>
                                                                </td>
                                                                <td data-title="School Name">
                                                                    <div class="">
                                                                        {{ $transaction->amount }}
                                                                    </div>
                                                                </td>

                                                                <td data-title="School Address">
                                                                    <div class="">
                                                                        {{ $transaction->currency }}
                                                                    </div>
                                                                </td>
                                                                <td data-title="Submission Deadline">
                                                                    <div class="">
                                                                        {{ date('M d, Y', strtotime($transaction->payment_date)) }}
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        @empty
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
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
