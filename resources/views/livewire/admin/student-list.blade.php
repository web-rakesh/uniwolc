<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-0">
                <h4 class="card-title">Students Table</h4>
                <div class="row mb-2">

                    <div class="col-md-9 col-12 mb-2">
                        <input wire:model="search" type="text" class="form-control" placeholder="Search Students...">
                    </div>
                    <div class="col-md-3 col-12 mb-2">
                        <button wire:click="studentExport" class="btn btn-primary btn-sm h-100 w-100">Export</button>
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
                                <th> State </th>
                                <th> Created_at </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr class="table_item">
                                    <td data-title="#" class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td data-title="Name">
                                        @if (action_permission('student', 'view') == true)
                                            <a
                                                href="{{ route('admin.student.profile', $student->id) }}">{{ $student->full_name }}</a>
                                        @else
                                            {{ $student->full_name }}
                                        @endif

                                    </td>
                                    <td data-title="Email"> {{ $student->email }} </td>
                                    <td data-title="Country"> {{ $student->userCountry->name ?? '' }} </td>
                                    <td data-title="State"> {{ $student->userState->name ?? '' }} </td>
                                    <td data-title="City"> {{ $student->userCity->name ?? '' }} </td>
                                    <td data-title="Created_at"> {{ date('M d, Y', strtotime($student->created_at)) }}
                                    </td>
                                    <td data-title="Action">
                                        @if (action_permission('student', 'view') == true)
                                            <a href="{{ route('admin.student.profile', $student->id) }}"
                                                class="btn btn-info btn-sm">View</a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $students->links() }}
            </div>
        </div>

    </div>
</div>
