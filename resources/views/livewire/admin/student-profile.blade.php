<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Students Table</h4>
                <div class="row">

                    <div class="col-md-9">
                        <input wire:model="search" type="text" class="form-control" placeholder="Search Students...">
                    </div>
                    <div class="col-md-3">
                        <button wire:click="studentExport" class="btn btn-primary btn-sm">Export</button>
                    </div>
                </div>
                </p>
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
                        @forelse ($students as $student)
                            <tr>
                                <td class="py-1">
                                    {{ $loop->iteration }}
                                </td>
                                <td> {{ $student->full_name }} </td>
                                <td> {{ $student->email }} </td>
                                <td> {{ $student->userCountry->name ?? '' }} </td>
                                <td> {{ date('M d, Y', strtotime($student->created_at)) }} </td>
                                <td>
                                    @if (action_permission('student', 'view') == true)
                                        <a href="{{ route('admin.student.profile', $student->id) }}" class="btn btn-info btn-sm">View</a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>

                {{ $students->links() }}
            </div>
        </div>

    </div>
</div>
