<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="mb-3"><a href="{{ route('admin.manage-sub-admin.create') }}" class="btn btn-primary">Add Sub Admin</a></div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body ">
                <h4 class="card-title">Permission Manage</h4>

                <div class="row">

                    <div class="col-md-9 mb-2">
                        <input wire:model="searchItem" type="text" class="form-control" placeholder="Name and Email...">
                    </div>
                    <div class="col-md-3 mb-2">
                    </div>
                </div>
                
                <div class="table-response responsive_table_area">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Name </th>
                                <th> Email </th>
                                <th> Created_at </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subAdmins ?? [] as $item)
                                <tr class="table_item">
                                    <td data-title="#" class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td data-title="Name"> {{ $item->name }} </td>
                                    <td data-title="Email"> {{ $item->email }} </td>

                                    <td data-title="Created_at"> {{ date('M d, Y', strtotime($item->created_at)) }} </td>
                                    <td data-title="Action">
                                        @if (action_permission('item', 'view') == true)
                                            <a href="{{ route('admin.manage-sub-admin.edit',$item->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        @endif
                                        @if (action_permission('item', 'delete') == true)
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
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $subAdmins->links() }}
            </div>
        </div>

    </div>
</div>
