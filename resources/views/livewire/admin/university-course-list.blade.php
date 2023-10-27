<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Program Table</h4>
                <div class="row mb-2">
                    <div class="col-md-4 col-12 mb-2">
                        <input wire:model="searchItem" type="search" class="form-control" placeholder="Search Program...">

                    </div>
                    {{-- @dd(action_permission('program', 'add')) --}}
                    <div class="col-md-4 col-12 mb-2">
                        <select name="" id="" class="form-select" wire:model="select_university">
                            <option value="">Select University</option>
                            @foreach ($universities as $item)
                                <option value="{{ $item->user_id }}">
                                    {{ Str::limit($item->university_name, $limit = 38, '...') }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2 col-7 mb-2">
                        @if (action_permission('program', 'add') == true)
                            <a href="{{ route('admin.university.course.create') }}"
                                class=" d-inline-flex align-items-center justify-content-center btn btn-info btn-sm  w-100 h-100 float-right">Add
                                Program</a>
                        @endif
                    </div>
                    <div class="col-md-2 col-5 mb-2">
                        <button wire:click="courseExport"
                            class="btn btn-success btn-sm h-100 w-100 float-right">Export</button>
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
                                <th> Program Name </th>
                                <th> University </th>
                                <th> Application Fees </th>
                                <th> Created_at </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($allCourses ?? [] as $course)
                                <tr class="table_item">
                                    <td data-title="#" class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td data-title="Program Name">
                                        @if (action_permission('program', 'view') == true || action_permission('program', 'update') == true)
                                            <a
                                                href="{{ route('admin.university.course.edit', $course->id) }}">{{ \Str::limit($course->program_title, '40', '...') }}</a>
                                        @else
                                            {{ \Str::limit($course->program_title, '45', '...') }}
                                        @endif
                                    </td>
                                    <td data-title="University">
                                        {{ \Str::limit($course->getUniversity[0]->university_name, '35', '...') }}
                                    </td>
                                    <td data-title="Deadline"> {{ $course->application_fee == 0 ? 'Free' : get_currency($course->university->country).$course->application_fee }}
                                    </td>
                                    <td data-title="Created_at"> {{ date('M d, Y', strtotime($course->created_at)) }}
                                    </td>
                                    <td data-title="Action">
                                        @if (action_permission('program', 'view') == true || action_permission('program', 'update') == true)
                                            <a href="{{ route('admin.university.course.edit', $course->id) }}"
                                                class="btn btn-info btn-sm">Edit</a>
                                        @endif
                                        @if (action_permission('program', 'delete') == true)
                                            @if ($confirming === $course->id)
                                                <button wire:click="kill({{ $course->id }})"
                                                    class="btn btn-danger btn-sm">Sure?</button>
                                            @else
                                                <button wire:click="confirmDelete({{ $course->id }})"
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
                {{ $allCourses->links() }}
            </div>
        </div>

    </div>
</div>
