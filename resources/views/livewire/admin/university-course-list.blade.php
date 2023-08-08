<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Program Table</h4>
                <div class="row">
                    <div class="col-md-4">
                        <input wire:model="searchItem" type="text" class="form-control" placeholder="Search Program...">

                    </div>
                    {{-- @dd(action_permission('program', 'add')) --}}
                    <div class="col-md-4">
                        <select name="" id="" class="form-select" wire:model="select_university">
                            <option value="">Select University</option>
                            @foreach ($universities as $item)
                                <option value="{{ $item->user_id }}"> {{ $item->university_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        @if (action_permission('program', 'add') == true)
                            <a href="{{ route('admin.university.course.create') }}"
                                class="btn btn-info btn-sm  float-right">Add
                                Program</a>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <button wire:click="courseExport" class="btn btn-success btn-sm float-right">Export</button>
                    </div>


                </div>
                </p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Program Name </th>
                            <th> University </th>
                            <th> Deadline </th>
                            <th> Created_at </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($allCourses ?? [] as $course)
                            <tr>
                                <td class="py-1">
                                    {{ $loop->iteration }}
                                </td>
                                <td> {{ $course->program_title }} </td>
                                <td> {{ $course->getUniversity[0]->university_name }} </td>
                                <td> {{ date('M d, Y', strtotime($course->deadline)) }} </td>
                                <td> {{ date('M d, Y', strtotime($course->created_at)) }} </td>
                                <td>
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

                {{ $allCourses->links() }}
            </div>
        </div>

    </div>
</div>
