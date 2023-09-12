    <div>
        {{-- The best athlete wants his opponent at his best. --}}
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Wallet List</h4>
                    <span><strong>Wallet Balance : </strong>${{ $totalAmount }}</span>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                        <button class="btn btn-success" wire:click="openModal" type="button">Request</button>
                    </div>
                    <div>
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                    <div class="row">

                        <div class="col-md-7">
                            {{-- <input wire:model="searchItem" type="text" class="form-control"
                                placeholder="Search Program title..."> --}}
                            <select class="form-control" wire:model="paymentStatus">
                                <option value="">Payment Status</option>
                                <option value="10">Pending</option>
                                <option value="1">Paid</option>
                                <option value="2">Rejected</option>
                            </select>
                        </div>


                        <div class="col-md-5">
                            <form wire:submit.prevent="render">
                                <div class="row">
                                    {{-- <label for="start_date"> Date Filter:</label> --}}
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" wire:model="startDate"
                                            id="start_date">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" wire:model="endDate" id="end_date">
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                    </p>
                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Amount </th>
                                    <th> Currency </th>
                                    <th> Status </th>
                                    <th> Created At </th>
                                    <th> Settlement </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactions ?? [] as $transaction)
                                    <tr>
                                        <td class="py-1">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td> ${{ $transaction->transaction_amount }}</td>
                                        <td> {{ $transaction->transaction_currency ?? '' }}</td>
                                        <td>
                                            @if ($transaction->transaction_status == 1)
                                                <label class="badge badge-success">Paid</label>
                                            @elseif ($transaction->transaction_status == 2)
                                                <label class="badge badge-danger">Rejected</label>
                                            @else
                                                <label class="badge badge-warning">Pending</label>
                                            @endif
                                        </td>
                                        <td> {{ date('M d, Y', strtotime($transaction->created_at)) }} </td>
                                        <td> {{ $transaction->transaction_date ? date('M d, Y', strtotime($transaction->transaction_date)) : 'N/A' }}
                                        </td>
                                        <td>
                                            @if ($transaction->transaction_status == 2)
                                                <button class="btn btn-danger btn-sm"
                                                    wire:click="rejectModal({{ $transaction->id }})">Rejected</button>
                                            @else
                                                <label class="badge badge-success">Release</label>
                                            @endif
                                            {{-- <button wire:click="view({{ $transaction->id }})"
                                                class="btn btn-info btn-sm">View</button> --}}
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


        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crudModalLabel">Payment Request Form Wallet Amount :
                        ${{ $totalAmount }}
                    </h5>
                    <button wire:click="closeModal" type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit="save">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row ">
                                <div class="col-md-4">
                                    <label>Withdrawal Amount</label>
                                </div>
                                <div class="col-md-8 d-flex justify-content-center">
                                    <input wire:model="amount" type="number"
                                        class="form-control @error('amount') is-invalid @enderror" placeholder="Amount">
                                </div>
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row ">
                                <div class="col-md-4">
                                    <label>Withdrawal Note </label>
                                </div>
                                <div class="col-md-8 d-flex justify-content-center">
                                    <textarea wire:model="note" class="form-control @error('note') is-invalid @enderror" placeholder="Note"></textarea>
                                </div>
                                @error('note')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="submit" type="button" class="btn btn-primary">Request</button>
                        <button wire:click="closeModal" type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Reject Modal -->
    @if ($rejectModalOpen)
        <div style="display: block;" class="modal fade show" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crudModalLabel">Payment Reject Modal</h5>
                        <button wire:click="closeModal" type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row ">
                                <div class="col-md-4">
                                    <label>Rejected Date</label>
                                </div>
                                <div class="col-md-8 d-flex justify-content-center">
                                    {{ date('M d, Y', strtotime($adminRejectNote->rejected_at)) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row ">
                                <div class="col-md-4">
                                    <label>Reject Note</label>
                                </div>
                                <div class="col-md-8 d-flex justify-content-center">
                                    {{ $adminRejectNote->transaction_reject_reason }}
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
    @endif


    </div>
