<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-0">
                <h4 class="card-title">{{ $label }} Table</h4>
                <div class="row mb-2">

                    <div class="col-md-9 col-12 mb-2">
                        <input wire:model="searchItem" type="text" class="form-control" placeholder="Search Students...">
                    </div>
                    <div class="col-md-3 col-12 mb-2">
                        {{-- <button wire:click="studentExport" class="btn btn-primary btn-sm h-100 w-100">Export</button> --}}
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-4 mb-2">

                    </div>
                    <div class="col-md-4 mb-2">

                    </div>
                    <div class="col-md-4 mb-2">

                    </div>

                </div>

                <div class="table-responsive responsive_table_area">
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
                            @forelse ($registers ?? [] as $register)
                                <tr class="table_item">
                                    <td data-title="#" class="py-1">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td data-title="Name"> {{ $register->name }} </td>
                                    <td data-title="Email"> {{ $register->email }} </td>
                                    <td data-title="Created_at"> {{ date('M d, Y', strtotime($register->created_at)) }}
                                    </td>
                                    <td data-title="Action">
                                        @if (action_permission('student', 'view') == true)
                                            <a href="{{ route('admin.student.profile', $register->id) }}"
                                                class="btn btn-info btn-sm">View</a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="text-center">No Data Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $registers->links() }}
            </div>
        </div>

    </div>
</div>
