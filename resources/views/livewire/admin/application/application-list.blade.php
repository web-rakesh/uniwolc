<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-0">
                <h4 class="card-title">{{ $label }} </h4>
                <button type="button" wire:click="applyProgramExport" class="btn btn-primary btn-sm float-right mb-2">
                    Export
                </button>
                <div class="row mb-2">
                    <div class="col-md-4 mb-2">
                        <input wire:model="searchItem" type="text" class="form-control"
                            placeholder="Search Applicaton...">
                    </div>
                    <div class="col-md-3 mb-2">
                        <select class="form-select" wire:model="universityId" id="">
                            <option value="">Select University</option>
                            @foreach ($universities as $item)
                                <option value="{{ $item->id }}">{{ Str::limit($item->university_name, 30) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-2">
                        <select class="form-select" wire:model="studentId" id="">
                            <option value="">Select Student</option>
                            @foreach ($students as $item)
                                <option value="{{ $item->user_id }}">{{ $item->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-2">
                        <select class="form-select" wire:model="pay_status">
                            <option value="">Select Status</option>
                            <option value="1">Due</option>
                            <option value="2">Paid</option>
                        </select>
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
                                <tr class="table_item">
                                    <td data-title="#" class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td data-toggle="tooltip" title="{{ $program->program_title }}"
                                        data-title="Program Title">
                                        {{ Str::limit($program->program_title, $limit = 25, '...') }} </td>
                                    <td data-title="Fees">
                                        {{ $program->fees == '0' ? 'Free' : '$' . number_format($program->fees, 2) }}
                                    </td>
                                    <td data-title="University">
                                        {{ $program->getProgram->university->university_name ?? '' }} </td>
                                    <td data-title="Student"> {{ $program->getStudent->full_name ?? '' }} </td>
                                    <td data-title="Agent"> {{ $program->getStudent->agentDetail->name ?? 'N/A' }}
                                    </td>
                                    <td data-title="Commission">
                                        {{ isset($program->getStudent->agentDetail->name) ? '$' . ($program->getProgram->agent_commission / 100) * $program->fees . '(' . $program->getProgram->agent_commission . '%)' : '--' }}
                                    </td>
                                    <td data-title="Payment"> {{ $program->status == 1 ? 'Due' : 'Paid' }}</td>
                                    <td data-title="Created_at"> {{ date('M d, Y', strtotime($program->created_at)) }}
                                    </td>
                                    <td data-title="action">
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
