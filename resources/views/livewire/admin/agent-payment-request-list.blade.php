<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-0">
                <h4 class="card-title">Agent Payment Request List</h4>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                    {{-- <button class="btn btn-success" wire:click="exportAgentCommissionPaymentHistory"
                        type="button">Export</button> --}}
                </div>
                @include('flash-messages')
                <div class="row">
                    <div class="col-md-4 col-12 mb-2">
                        <select class="form-select" wire:model="agentSearch">
                            <option value="">Select Agent</option>
                            @foreach ($agents as $agent)
                                <option value="{{ $agent->user_id }}">{{ $agent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 col-12 mb-2">
                        <select class="form-select" wire:model="paymentStatus">
                            <option value="">Payment Status</option>
                            <option value="10">Pending</option>
                            <option value="1">Paid</option>
                            <option value="2">Rejected</option>
                        </select>
                    </div>
                    <div class="col-md-5 col-12 mb-2">
                        <form wire:submit.prevent="render">
                            <div class="row">
                                {{-- <label for="start_date"> Date Filter:</label> --}}
                                <div class="col-md-5 col-6 mb-2">
                                    <input type="date" class="form-control" wire:model="startDate" id="start_date">
                                </div>
                                <div class="col-md-5 col-6 mb-2">
                                    <input type="date" class="form-control" wire:model="endDate" id="end_date">
                                </div>
                                <div class="col-md-2 col-6 mb-2 pr-3">
                                    <button wire:click="clearDate" class="btn btn-danger btn-sm">Clear</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="table-responsive responsive_table_area">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Agent Name </th>
                                <th> Currency </th>
                                <th> Amount </th>
                                <th> Status </th>
                                <th> Settlement </th>
                                <th> Payment Date </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($agentWallets ?? [] as $transaction)
                                <tr class="table_item">
                                    <td data-title="#" class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td data-title="Agent Name"> {{ $transaction->agent->name ?? '' }} </td>

                                    <td data-title="Country"> {{ $transaction->transaction_currency ?? '' }} </td>
                                    <td data-title="Amount">
                                        ${{ number_format($transaction->transaction_amount, 2) ?? '' }}
                                    </td>
                                    <td data-title="Status">
                                        @if ($transaction->transaction_status == 1)
                                            <label class="badge badge-success">Paid</label>
                                        @elseif ($transaction->transaction_status == 2)
                                            <label class="badge badge-danger">Rejected</label>
                                        @else
                                            <label class="badge badge-warning">Pending</label>
                                        @endif

                                    </td>
                                    <td data-title="Settelment Date">
                                        {{ $transaction->transaction_date ? date('M d, Y', strtotime($transaction->transaction_date)) : 'N/A' }}
                                    </td>
                                    <td data-title="Payment Date">
                                        {{ $transaction->created_at ? date('M d, Y', strtotime($transaction->created_at)) : 'N/A' }}
                                    </td>
                                    <td data-title="Action">

                                        @if ($transaction->transaction_status == 0)
                                            @if ($confirming == $transaction->id)
                                                <button wire:click="release({{ $transaction->id }})"
                                                    class="btn btn-success btn-sm">Sure?</button>
                                            @else
                                                <button wire:click="confirmRelease({{ $transaction->id }})"
                                                    class="btn btn-info btn-sm">Release</button>
                                                <button wire:click="openModal({{ $transaction->id }})"
                                                    class="btn btn-danger btn-sm">Reject</button>
                                            @endif
                                        @elseif($transaction->transaction_status == 2)
                                            <button class="btn btn-danger btn-sm"
                                                wire:click="rejectModal({{ $transaction->id }})">Rejected</button>
                                        @else
                                            <label class="badge badge-success">Release</label>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">
                                        <h4> No Data Found</h4>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>


                {{ $agentWallets->links() }}
            </div>
        </div>

    </div>


    <!-- Request Modal -->
    @if ($isOpen)
        <div style="display: block;" class="modal fade show" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crudModalLabel">Payment Request Modal</h5>
                        <button wire:click="closeModal" type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row ">
                                <div class="col-md-4">
                                    <label>Reject Note</label>
                                </div>
                                <div class="col-md-8 d-flex justify-content-center">
                                    <textarea wire:model="rejectNote" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button wire:click="rejectRequest" type="button" class="btn btn-danger">Reject</button>
                        <button wire:click="closeModal" type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Accept Modal -->
    @if ($isAcceptModalOpen)
        <div style="display: block;" class="modal fade show" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crudModalLabel">Payment Accept Modal</h5>
                        <button wire:click="closeModal" type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row ">
                                <div class="col-md-4">
                                    <label>Amount</label>
                                </div>
                                <div class="col-md-8 d-flex justify-content-center">
                                    ${{ $agentPaymentDetails['amount'] }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row ">
                                <div class="col-md-4">
                                    <label>Bank Details</label>
                                </div>
                                <div class="col-md-8  justify-content-center">
                                    <strong>Card Holder:</strong> {{ $bankDetails->account_holder_name ?? '' }} <br>
                                    <strong>Bank Name:</strong> {{ $bankDetails->bank_name ?? '' }} <br>
                                    <strong>Account Number:</strong> {{ $bankDetails->account_number ?? '' }} <br>
                                    <strong>IFSC Code:</strong> {{ $bankDetails->ifsc_code ?? '' }} <br>
                                    <strong>Swift Code:</strong> {{ $bankDetails->swift_code ?? '' }} <br>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row ">
                                <div class="col-md-4">
                                    <label>Request Note</label>
                                </div>
                                <div class="col-md-8 d-flex justify-content-center">
                                    {{ $agentPaymentDetails['remark'] }}
                                    {{-- <textarea wire:model="" class="form-control" rows="5"></textarea> --}}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Payment Info</label>
                        </div>

                        <div class="form-group">
                            <div class="row ">
                                <div class="col-md-4">
                                    <label>Transaction Id</label>
                                </div>
                                <div class="col-md-8 d-flex justify-content-center">
                                    <input wire:model="transactionId" class="form-control" type="text">
                                </div>
                                <div class="text-danger">
                                    @error('transactionId')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row ">
                                <div class="col-md-4">
                                    <label>Transaction Date</label>
                                </div>
                                <div class="col-md-8 d-flex justify-content-center">
                                    <input wire:model="transactionDate" class="form-control" type="date">
                                </div>
                                <div class="text-danger">
                                    @error('transactionDate')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row ">
                                <div class="col-md-4">
                                    <label>Transaction Note</label>
                                </div>
                                <div class="col-md-8 d-flex justify-content-center">
                                    <textarea wire:model="transactionNote" class="form-control" rows="5"></textarea>
                                </div>
                                <div class="text-danger">
                                    @error('transactionNote')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button wire:click="acceptPayment" type="button" class="btn btn-success">Accept</button>
                        <button wire:click="closeModal" type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    @endif

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
