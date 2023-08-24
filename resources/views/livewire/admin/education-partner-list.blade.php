<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-0">
                <h4 class="card-title">Education Partner</h4>
                <div class="mb-4">
                    <input wire:model="searchItem" type="search" class="form-control" placeholder="Search Partner...">
                </div>
               <div class="table-responsive responsive_table_area">
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
                             <tr class="table_item">
                                <td data-title="#" class="py-1">
                                    {{ $loop->iteration }}
                                </td>
                                <td data-title="School Name">
                                    @if (action_permission('partner', 'view') == true)
                                        <a
                                            href="{{ route('admin.education.partner.details', $partner->id) }}">{{ $partner->school_name }}</a>
                                    @else
                                        {{ $partner->school_name }}
                                    @endif

                                </td>
                                <td data-title="Name"> {{ $partner->name }} </td>
                                <td data-title="Email"> {{ $partner->email }} </td>
                                <td data-title="Country"> {{ $partner->getCountry->name }} </td>
                                <td data-title="Created_at"> {{ date('M d, Y', strtotime($partner->created_at)) }} </td>
                                <td data-title="Action">
                                    @if (action_permission('partner', 'view') == true)
                                        <a href="{{ route('admin.education.partner.details', $partner->id) }}"
                                            class="btn btn-info btn-sm">View</a>
                                    @endif
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
				</div>
				
                {{ $partners->links() }}
            </div>
        </div>

    </div>
</div>
