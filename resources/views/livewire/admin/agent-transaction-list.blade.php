<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-0">
                <h4 class="card-title">Agent Commission Transaction List</h4>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                    <button class="btn btn-success" wire:click="exportAgentCommissionPaymentHistory"
                        type="button">Export</button>
                </div>
                @include('flash-messages')
                <div class="row">
                    <div class="col-md-7 col-12 mb-2">
                        <input wire:model="searchItem" type="search" class="form-control"
                            placeholder="Search Agent...">
                    </div>
                    <div class="col-md-5 col-12 mb-2">
                        <form wire:submit.prevent="render">
                            <div class="row">
                                {{-- <label for="start_date"> Date Filter:</label> --}}
                                <div class="col-md-6 col-6 mb-2">
                                    <input type="date" class="form-control" wire:model="startDate" id="start_date">
                                </div>
                                <div class="col-md-6 col-6 mb-2">
                                    <input type="date" class="form-control" wire:model="endDate" id="end_date">
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
                                <th> Student Name </th>
                                <th> Program Title </th>
                                <th> Amount </th>
                                <th> Country </th>
                                <th> Status </th>

                                <th> Payment Date </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($agentCommissions ?? [] as $transaction)
                                <tr class="table_item">
                                    <td data-title="#" class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td data-title="Agent Name"> {{ $transaction->agent->name ?? '' }} </td>
                                    <td data-title="Student Name"> {{ $transaction->student->FullName ?? '' }} </td>
                                    <td data-title="Program Title"> {{ $transaction->program->program_title ?? '' }}
                                    </td>
                                    <td data-title="Amount">
                                        {{ get_currency($transaction->country_id) . number_format($transaction->amount, 2) ?? '' }}
                                    </td>
                                    <td data-title="Country"> {{ get_country($transaction->country_id) ?? '' }} </td>
                                    <td data-title="Status">
                                        @if ($transaction->status == 1)
                                            <label class="badge badge-success">Ready</label>
                                        @else
                                            <label class="badge badge-danger">No</label>
                                        @endif

                                    </td>
                                    <td data-title="Payment Date">
                                        {{ $transaction->payment_date ? date('M d, Y', strtotime($transaction->payment_date)) : 'N/A' }}
                                    </td>
                                    <td data-title="Action">
                                        @if (action_permission('transaction', 'view') == true)
                                            <a href="{{ route('admin.agent.commission.detail', $transaction->id) }}"
                                                class="btn btn-info btn-sm">View</a>
                                        @endif
                                        @if ($transaction->status == 1)
                                            @if ($transaction->payment_status == 0)
                                                @if ($confirming == $transaction->id)
                                                    <button wire:click="release({{ $transaction->id }})"
                                                        class="btn btn-success btn-sm">Sure?</button>
                                                @else
                                                    <button wire:click="confirmRelease({{ $transaction->id }})"
                                                        class="btn btn-danger btn-sm">Release</button>
                                                @endif
                                            @else
                                                <button class="btn btn-success btn-sm">Released</button>
                                            @endif
                                        @else
                                            <button class="btn btn-default btn-sm">N/A</button>
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


                {{ $agentCommissions->links() }}
            </div>
        </div>

    </div>

</div>
