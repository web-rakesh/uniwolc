<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-0">
                <h4 class="card-title">University List Table</h4>
                <div class="row mb-2 ">
                    <div class="col-md-7 col-12 mb-2">
                        <input wire:model="search" type="text" class="form-control" placeholder="Search Students...">
                    </div>
                    <div class="col-md-3 col-7 mb-2">
                        @if (action_permission('university', 'add') == true)
                            <a href="{{ route('admin.university.create') }}"
                                class="btn btn-primary btn-sm float-right">Add
                                University</a>
                        @endif
                    </div>
                    <div class="col-md-2 col-5 ">
                        <button wire:click="universityExport" class="btn btn-success btn-sm float-right">Export</button>
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
                                <th> State </th>
                                <th> City </th>
                                <th> Blocked Country </th>
                                <th> Created_at </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($university as $item)
                                <tr class="table_item">
                                    <td data-title="#" class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td data-title="Name">
                                        @if (action_permission('university', 'view') == true)
                                            <a  data-toggle="tooltip" title="{{ $item->university_name }}"
                                                href="{{ route('admin.university.create', $item->id) }}">{{ Str::limit($item->university_name, $limit = 30, '...') }}</a>
                                        @else
                                            {{ Str::limit($item->university_name, $limit = 30, '...') }}
                                        @endif

                                    </td>
                                    <td data-title="Email"> {{ $item->email }} </td>
                                    <td data-title="Country"> {{ $item->getCountry->name ?? '--' }} </td>
                                    <td data-title="state"> {{ $item->getState->name ?? '--' }} </td>
                                    <td data-title="City"> {{ $item->getCity->name ?? '--' }} </td>
                                    <td data-title="Blocked Country">
                                        {{ $item->blocked_country != '' ? implode(',', get_blocked_country($item->blocked_country)) : '--' }}
                                    </td>
                                    <td data-title="Created_at"> {{ date('M d, Y', strtotime($item->created_at)) }}
                                    </td>
                                    <td data-title="Action">
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
