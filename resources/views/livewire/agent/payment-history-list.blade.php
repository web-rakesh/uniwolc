<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Transaction List</h4>
                <div class="row">

                    <div class="col-md-7">
                        <input wire:model="searchItem" type="text" class="form-control" placeholder="Search Program title...">
                    </div>
                    <div class="col-md-5">
                        <form wire:submit.prevent="render">
                            <div class="row">
                                {{-- <label for="start_date"> Date Filter:</label> --}}
                                <div class="col-md-6">
                                    <input type="date" class="form-control" wire:model="startDate" id="start_date">
                                </div>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" wire:model="endDate" id="end_date">
                                </div>

                            </div>
                        </form>
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
                                <th> Program Title </th>
                                <th> Currency </th>
                                <th> Program Fees </th>
                                <th> Commission </th>
                                <th> Amount </th>
                                <th> Payment Date </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions ?? [] as $transaction)
                                <tr>
                                    <td class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td> <a target="_blank"
                                            href="{{ route('agent.program.detail', $transaction->Program->slug) }}">
                                            {{ $transaction->Program->program_title_limit }}</a></td>
                                    <td> {{ get_currency($transaction->country_id) }}</td>
                                    <td> {{ $transaction->program_fees }}</td>
                                    <td> {{ $transaction->commission . '%' ?? '' }}</td>
                                    <td> {{ $transaction->amount }} </td>
                                    <td> {{ date('M d, Y', strtotime($transaction->payment_date)) }} </td>
                                    <td>

                                        <button wire:click="view({{ $transaction->id }})"
                                            class="btn btn-info btn-sm">View</button>
                                        {{-- <a href="{{ route('student.invoice', $transaction->id) }}" target="_blank"
                                            class="btn btn-success btn-sm">Invoice</a> --}}

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


    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crudModalLabel">View - {{ $program_title }}
                </h5>
                <button wire:click="closeModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row ">
                        <div class="col-md-4">
                            <label>Program Title</label>
                        </div>
                        <div class="col-md-8 d-flex justify-content-center">
                            <label class="form-check-label">{{ $program_title }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row ">
                        <div class="col-md-4">
                            <label>Student Name </label>
                        </div>
                        <div class="col-md-8 d-flex justify-content-center">
                            <label class="form-check-label">{{ $studentName }}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row ">
                        <div class="col-md-4">
                            <label>Country</label>
                        </div>
                        <div class="col-md-8 d-flex justify-content-center">
                            <label class="form-check-label">{{ get_country($country) }}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row ">
                        <div class="col-md-4">
                            <label>Currency</label>
                        </div>
                        <div class="col-md-8 d-flex justify-content-center">
                            <label class="form-check-label">{{ $currency }}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row ">
                        <div class="col-md-4">
                            <label>Commission</label>
                        </div>
                        <div class="col-md-8 d-flex justify-content-center">
                            <label class="form-check-label">{{ $commission . '%' ?? '' }}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row ">
                        <div class="col-md-4">
                            <label>Amount</label>
                        </div>
                        <div class="col-md-8 d-flex justify-content-center">
                            <label class="form-check-label">{{ $amount ?? 0 }}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row ">
                        <div class="col-md-4">
                            <label>payment Status</label>
                        </div>
                        <div class="col-md-8 d-flex justify-content-center">
                            <label class="form-check-label">{{ $payment_status }}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row ">
                        <div class="col-md-4">
                            <label>Payment Date</label>
                        </div>
                        <div class="col-md-8 d-flex justify-content-center">
                            <label class="form-check-label">{{ $payment_date }}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row ">
                        <div class="col-md-4">
                            <label>Payment Created_at</label>
                        </div>
                        <div class="col-md-8 d-flex justify-content-center">
                            <label class="form-check-label">{{ $created_at }}</label>
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
