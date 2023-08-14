<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $label }} </h4>
                <button type="button" wire:click="applyProgramExport" class="btn btn-primary btn-sm float-right mb-2">
                    Export
                </button>
                <div class="row">
                    <div class="col-md-4">
                        <input wire:model="searchItem" type="text" class="form-control"
                            placeholder="Search Applicaton...">
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" wire:model="universityId" id="">
                            <option value="">Select University</option>
                            @foreach ($universities as $item)
                                <option value="{{ $item->id }}">{{ $item->university_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" wire:model="studentId" id="">
                            <option value="">Select Student</option>
                            @foreach ($students as $item)
                                <option value="{{ $item->user_id }}">{{ $item->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select" wire:model="pay_status">
                            <option value="">Select Status</option>
                            <option value="1">Due</option>
                            <option value="2">Paid</option>
                        </select>
                    </div>
                </div>
                </p>
                <div class="table-responsive">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Program Title </th>
                                <th> Fees </th>
                                <th> University </th>
                                <th> Student </th>
                                <th> Agent </th>
                                <th> Commission </th>
                                <th> Payment </th>
                                <th> Created_at </th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($programs ?? [] as $program)
                                <tr>
                                    <td class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td> {{ $program->program_title }} </td>
                                    <td> {{ $program->fees == '0' ? 'Free' : '$' . number_format($program->fees, 2) }}
                                    </td>
                                    <td> {{ $program->getProgram->university->university_name ?? '' }} </td>
                                    <td> {{ $program->getStudent->full_name ?? '' }} </td>
                                    <td> {{ $program->getStudent->agentDetail->name ?? 'N/A' }} </td>
                                    <td> {{ isset($program->getStudent->agentDetail->name) ? '$' . ($program->getProgram->agent_commission / 100) * $program->fees . '(' . $program->getProgram->agent_commission . '%)' : '--' }}
                                    </td>
                                    <td> {{ $program->status == 1 ? 'Due' : 'Paid' }}</td>
                                    <td> {{ date('M d, Y', strtotime($program->created_at)) }} </td>
                                    <td>
                                        {{-- <a href="javascript:;" class="btn btn-info btn-sm">View</a> --}}
                                        <a href="{{ route('admin.application.print', $program->id) }}"
                                            class="btn btn-success btn-sm" target="_blank">
                                            <span class="mdi mdi-file-pdf-box"></span>
                                        </a>

                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>


                {{ $programs->links() }}
            </div>
        </div>

    </div>
</div>
