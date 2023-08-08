<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Education Partner</h4>
                <div>
                    <input wire:model="searchItem" type="search" class="form-control" placeholder="Search Partner...">
                </div>
                </p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> School Name </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Country </th>
                            <th> Created_at </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($partners ?? [] as $partner)
                            <tr>
                                <td class="py-1">
                                    {{ $loop->iteration }}
                                </td>
                                <td> {{ $partner->school_name }} </td>
                                <td> {{ $partner->name }} </td>
                                <td> {{ $partner->email }} </td>
                                <td> {{ $partner->getCountry->name }} </td>
                                <td> {{ date('M d, Y', strtotime($partner->created_at)) }} </td>
                                <td>
                                    {{-- @if (action_permission('partner', 'view') == true) --}}
                                    {{-- <a href="javascript:;" class="btn btn-info btn-sm">View</a> --}}
                                    {{-- @endif --}}
                                    {{-- @if (action_permission('agent', 'delete') == true) --}}
                                    @if ($confirming === $partner->id)
                                        <button wire:click="kill({{ $partner->id }})"
                                            class="btn btn-danger btn-sm">Sure?</button>
                                    @else
                                        <button wire:click="confirmDelete({{ $partner->id }})"
                                            class="btn btn-danger btn-sm">Delete</button>
                                    @endif
                                    {{-- @endif --}}
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>

                {{ $partners->links() }}
            </div>
        </div>

    </div>
</div>
