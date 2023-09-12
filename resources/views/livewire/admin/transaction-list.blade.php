<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-0">
                <div class="row d-flex justify-content-between mb-2">
                    <div class="col-md-9 col-12">

                        <h4 class="card-title">Transaction List</h4>
                    </div>
                    <div class="col-md-3 col-12">
                        <button class="btn btn-success" wire:click="exportAllPaymentHistory"
                            type="button">Export</button>
                    </div>
                </div>
                <div class="row mb-2">

                    <div class="col-md-7 col-12 mb-2">
                        <input wire:model="searchItem" type="text" class="form-control"
                            placeholder="Search Students...">
                    </div>
                    <div class="col-md-5 mb-2">
                        <form wire:submit.prevent="render">
                            <div class="row">
                                {{-- <label for="start_date"> Date Filter:</label> --}}
                                <div class="col-md-6 col-6  mb-2">
                                    <input type="date" class="form-control" wire:model="startDate" id="start_date">
                                </div>
                                <div class="col-md-6 col-6 mb-2">
                                    <input type="date" class="form-control" wire:model="endDate" id="end_date">
                                </div>

                            </div>
                        </form>
                    </div>
                    {{-- <div class="col-md-3 mb-2">
                        <button wire:click="studentExport" class="btn btn-primary btn-sm">Export</button>
                    </div> --}}

                </div>
                <div class="table-responsive responsive_table_area">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> # </th>
                                {{-- <th> Transaction Id </th> --}}
                                <th> Student Name </th>
                                {{-- <th> Program Title </th> --}}
                                {{-- <th> Payment Method </th> --}}
                                <th> Amount </th>
                                <th> Currency </th>
                                <th> Status </th>
                                <th> Payment Date </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions ?? [] as $transaction)
                                <tr class="table_item">
                                    <td data-title="#" class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    {{-- <td data-title="Transaction Id"> {{ $transaction->transaction_id }}</td> --}}
                                    <td data-title="Student Name"> {{ $transaction->student->full_name ?? '' }} </td>
                                    {{-- <td data-title="Program Title">

                                        @foreach ($transaction->program as $item)
                                            {{ $item->program_title }} <br>
                                        @endforeach
                                    </td> --}}
                                    {{-- <td data-title="Payment Method"> {{ $transaction->payment_method ?? '' }} </td> --}}
                                    <td data-title="Amount"> {{ $transaction->amount }} </td>
                                    <td data-title="Currency"> {{ $transaction->currency }}</td>
                                    <td data-title="Status">{{ $transaction->status }}</td>
                                    <td data-title="Payment Date">
                                        {{ date('M d, Y', strtotime($transaction->payment_date)) }} </td>
                                    <td data-title="Action">
                                        @if (action_permission('transaction', 'view') == true)
                                            <button wire:click="view({{ $transaction->id }})"
                                                class="btn btn-info btn-sm">View</button>
                                            <a href="{{ route('admin.invoice', $transaction->id) }}" target="_blank"
                                                class="btn btn-success btn-sm">Invoice</a>
                                            <button wire:click="sendInvoice({{ $transaction->id }})"
                                                class="btn btn-primary btn-sm">Send Invoice</button>
                                            {{-- <a href="javascript:;" class="btn btn-info btn-sm">View</a> --}}
                                        @endif
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>


                {{ $transactions->links() }}
            </div>
        </div>

    </div>


    <!-- Modal -->
    @if ($isOpen)
        <div style="display: block;" class="modal fade show" tabindex="-1" role="dialog">
        @else
            <div style="display: none;" class="modal fade" tabindex="-1" role="dialog">
    @endif


    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crudModalLabel">View
                </h5>
                <button wire:click="closeModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row ">
                        <div class="col-md-4">
                            <label>Transaction Id</label>
                        </div>
                        <div class="col-md-8 d-flex justify-content-center">
                            <label class="form-check-label">{{ $transactionId }}</label>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row ">
                        <div class="col-md-4">
                            <label>Student Name</label>
                        </div>
                        <div class="col-md-8 d-flex justify-content-center">
                            <label class="form-check-label">{{ $studentName }}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row ">
                        <div class="col-md-4">
                            <label>Program </label>
                        </div>
                        <div class="col-md-8 d-flex justify-content-center">
                            <label class="form-check-label">
                                @foreach ($programId ?? [] as $item)
                                    <div class="row">
                                        <div class="col-4">
                                            Program
                                        </div>
                                        <div class="col-8">
                                            {{ $item->program_title }}
                                        </div>
                                        <hr>
                                        <div class="col-4">
                                            University
                                        </div>
                                        <div class="col-8">
                                            {{ $item->university->university_name }}
                                        </div>
                                        <hr>
                                    </div>
                                @endforeach

                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row ">
                        <div class="col-md-4">
                            <label>Payment Method</label>
                        </div>
                        <div class="col-md-8 d-flex justify-content-center">
                            <label class="form-check-label">{{ $paymentMethod }}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row ">
                        <div class="col-md-4">
                            <label>amount</label>
                        </div>
                        <div class="col-md-8 d-flex justify-content-center">
                            <label class="form-check-label">{{ $amount }}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row ">
                        <div class="col-md-4">
                            <label>currency</label>
                        </div>
                        <div class="col-md-8 d-flex justify-content-center">
                            <label class="form-check-label">{{ $currency }}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row ">
                        <div class="col-md-4">
                            <label>paymentDate</label>
                        </div>
                        <div class="col-md-8 d-flex justify-content-center">
                            <label class="form-check-label">{{ $paymentDate }}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row ">
                        <div class="col-md-4">
                            <label>status</label>
                        </div>
                        <div class="col-md-8 d-flex justify-content-center">
                            <label class="form-check-label">{{ $status }}</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click="closeModal" type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

</div>
