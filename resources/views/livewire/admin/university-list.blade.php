<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">University List Table</h4>
                <div class="row ">
                    <div class="col-5">
                        <input wire:model="search" type="text" class="form-control" placeholder="Search Students...">
                    </div>
                    <div class="col-5 ">
                        @if (action_permission('university', 'add') == true)
                            <a href="{{ route('admin.university.create') }}"
                                class="btn btn-primary btn-sm float-right">Add
                                University</a>
                        @endif
                    </div>
                    <div class="col-2">
                        <button wire:click="universityExport" class="btn btn-success btn-sm float-right">Export</button>
                    </div>
                </div>
                </p>
                <div class="table-responsive">


                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Name </th>
                                <th> Email </th>
                                <th> Country </th>
                                <th> Blocked Country </th>
                                <th> Created_at </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($university as $item)
                                <tr>
                                    <td class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        @if (action_permission('university', 'view') == true)
                                            <a href="{{ route('admin.university.create', $item->id) }}"
                                               >{{ $item->university_name }}</a>
                                        @else
                                            {{ $item->university_name }}
                                        @endif

                                    </td>
                                    <td> {{ $item->email }} </td>
                                    <td> {{ $item->getCountry->name ?? '--' }} </td>
                                    <td> {{ $item->blocked_country != '' ? implode(',', get_blocked_country($item->blocked_country)) : '--' }}
                                    </td>
                                    <td> {{ date('M d, Y', strtotime($item->created_at)) }} </td>
                                    <td>
                                        @if (action_permission('university', 'view') == true)
                                            <a href="{{ route('admin.university.create', $item->id) }}"
                                                class="btn btn-info btn-sm">View/Edit</a>
                                        @endif
                                        @if (action_permission('university', 'delete') == true)
                                            @if ($confirming === $item->id)
                                                <button wire:click="kill({{ $item->id }})"
                                                    class="btn btn-danger btn-sm">Sure?</button>
                                            @else
                                                <button wire:click="confirmDelete({{ $item->id }})"
                                                    class="btn btn-danger btn-sm">Delete</button>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <h4>No Data Available</h4>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $university->links() }}
            </div>
        </div>

    </div>
</div>
