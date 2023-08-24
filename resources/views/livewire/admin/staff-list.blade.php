<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-0">
                <h4 class="card-title">Staff Table</h4>

                <div class="row mb-2">

                    <div class="col-md-9 col-12 mb-2">
                        <input wire:model="searchItem" type="text" class="form-control" placeholder="Staff Students...">
                    </div>
                    <div class="col-md-3 col-12 mb-2">
                        <button wire:click="staffExport" class="btn btn-primary btn-sm w-100 h-100">Export</button>
                    </div>
                </div>
                  <div class="row mb-2">
                    <div class="col-md-4 mb-2">
                        <select wire:model="country_id" class="form-select">
                            <option value="">Select Country</option>
                            @foreach ($countries as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <select wire:model="state_id" class="form-select">
                            <option value="">Select State</option>
                            @foreach ($states ?? [] as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <select wire:model="city_id" class="form-select">
                            <option value="">Select City</option>
                            @forelse ($cities ?? [] as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>

                </div>
                <div class="table-responsive responsive_table_area">
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
                                <tr class="table_item">
                                    <td data-title="#" class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td data-title="Name">
                                        @if (action_permission('staff', 'view') == true)
                                            <a
                                                href="{{ route('admin.staff.profile', $staff->id) }}">{{ $staff->name }}</a>
                                        @else
                                            {{ $staff->name }}
                                        @endif

                                    </td>
                                    <td data-title="Email"> {{ $staff->email }} </td>
                                    <td data-title="Country"> {{ $staff->country }} </td>
                                    <td data-title="Created_at"> {{ date('M d, Y', strtotime($staff->created_at)) }}
                                    </td>
                                    <td data-title="Action">
                                        @if (action_permission('staff', 'view') == true)
                                            <a href="{{ route('admin.staff.profile', $staff->id) }}"
                                                class="btn btn-info btn-sm">View</a>
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
                </div>

                {{ $staffs->links() }}
            </div>
        </div>

    </div>
</div>
