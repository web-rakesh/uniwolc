<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Staff Table</h4>

                <div class="row">

                    <div class="col-md-9">
                        <input wire:model="searchItem" type="text" class="form-control" placeholder="Staff Students...">
                    </div>
                    <div class="col-md-3">
                        <button wire:click="staffExport" class="btn btn-primary btn-sm">Export</button>
                    </div>
                </div>
                </p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Country </th>
                            <th> Created_at </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($staffs ?? [] as $staff)
                            <tr>
                                <td class="py-1">
                                    {{ $loop->iteration }}
                                </td>
                                <td> {{ $staff->name }} </td>
                                <td> {{ $staff->email }} </td>
                                <td> {{ $staff->country }} </td>
                                <td> {{ date('M d, Y', strtotime($staff->created_at)) }} </td>
                                <td>
                                    @if (action_permission('staff', 'view') == true)
                                        <a href="javascript:;" class="btn btn-info btn-sm">View</a>
                                    @endif
                                    @if (action_permission('staff', 'delete') == true)
                                        @if ($confirming === $staff->id)
                                            <button wire:click="kill({{ $staff->id }})"
                                                class="btn btn-danger btn-sm">Sure?</button>
                                        @else
                                            <button wire:click="confirmDelete({{ $staff->id }})"
                                                class="btn btn-danger btn-sm">Delete</button>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>

                {{ $staffs->links() }}
            </div>
        </div>

    </div>
</div>
