<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Account Balances</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-primary">
                                    <h5>Apply Credits</h5>
                                    <svg class="bi bi-cash" width="1em" height="1em" fill="currentColor"
                                        viewBox="0 0 16 16" focusable="false">
                                        <path
                                            d="M11 13h2v-2h-2v2zm1-11C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-14c-2.21 0-4 1.79-4 4h2c0-1.1.9-2 2-2s2 .9 2 2c0 2-3 1.75-3 5h2c0-2.25 3-2.5 3-5 0-2.21-1.79-4-4-4z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="avatar"></div>
                                        <div class="list-item-text">
                                            <div class="balance">$0.00</div>
                                            <p class="currency">USD</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Transaction List</h4>
                <div class="row">

                    <div class="col-md-4">
                        <input wire:model="searchItem" type="search" class="form-control"
                            placeholder="Search Students...">
                    </div>
                    <div class="col-md-4">
                        <form wire:submit.prevent="render">
                            <div class="row">
                                {{-- <label for="start_date"> Date Filter:</label> --}}
                                <div class="col-md-5">
                                    <input type="date" class="form-control" wire:model="startDate" id="start_date">
                                </div>
                                <div class="col-md-5">
                                    <input type="date" class="form-control" wire:model="endDate" id="end_date">
                                </div>
                                <div class="col-md-2">
                                    <button wire:click="resetDate" class="btn btn-primary btn-sm">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                    <input type="number" class="form-control" min="0" placeholder="Min amount" wire:model="minAmount" >
                                </div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" min="0" placeholder="Max amount" wire:model="maxAmount">
                                </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-3">
                        <button wire:click="studentExport" class="btn btn-primary btn-sm">Export</button>
                    </div> --}}
                </div>
                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Transaction Id </th>
                                {{-- <th> Program Title </th> --}}
                                <th> Payment Method </th>
                                <th> Amount </th>
                                <th> Currency </th>
                                <th> Status </th>
                                <th> Payment Date </th>
                                {{-- <th> Action </th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions ?? [] as $transaction)
                                <tr>
                                    <td class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td> {{ $transaction->transaction_id }}</td>
                                    {{-- <td>

                                        @foreach ($transaction->program as $item)
                                            {{ $item->program_title }} <br>
                                        @endforeach
                                    </td> --}}
                                    <td> {{ $transaction->payment_method ?? '' }} </td>
                                    <td> {{ $transaction->amount }} </td>
                                    <td> {{ $transaction->currency }}</td>
                                    <td>{{ $transaction->status }}</td>
                                    <td> {{ date('M d, Y', strtotime($transaction->payment_date)) }} </td>
                                    <td>

                                        <button wire:click="view({{ $transaction->id }})"
                                            class="btn btn-info btn-sm">View</button>
                                        <a href="{{ route('student.invoice', $transaction->id) }}" target="_blank"
                                            class="btn btn-success btn-sm">Invoice</a>
                                        {{-- <a href="javascript:;" class="btn btn-info btn-sm">View</a> --}}

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Data Found</td>
                                </tr>
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
