<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <a href="{{ route('admin.manage-sub-admin.create') }}" class="btn btn-primary">Add Sub Admin</a>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Permission Manage</h4>

                <div class="row">

                    <div class="col-md-9">
                        <input wire:model="searchItem" type="text" class="form-control" placeholder="Name and Email...">
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
                </p>
                <div class="table-response">
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
                                <tr>
                                    <td class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td> {{ $item->name }} </td>
                                    <td> {{ $item->email }} </td>

                                    <td> {{ date('M d, Y', strtotime($item->created_at)) }} </td>
                                    <td>
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
