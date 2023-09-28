<div>
    <div class="dashboardInnerWrapperinner py-2">
        <div class="dashboardHeaderSec">
            <h4 class="title">{{ $label }} Programs</h4>
        </div>
        <div class="dashboardPanel">

        </div>
        <div class="dashboardPanel">
            <div class="dashboardPanelBody">
                <div class="dashboardTableArea table-responsive">
                    <div id="applicationTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="applicationTable_length">
                                    <label>
                                        Select
                                        <select name="applicationTable_length" aria-controls="applicationTable"
                                            class="custom-select custom-select-sm form-control form-control-sm"
                                            wire:model="programSelectId">
                                            <option value="">Select Program</option>
                                            @foreach ($programList as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ strlen($item->program_title) > 60 ? substr($item->program_title, 0, 60) : $item->program_title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        Programs
                                    </label>
                                </div>
                            </div>
                            {{-- <div class="col-sm-12 col-md-6">
                                <div id="applicationTable_filter" class="dataTables_filter"><label>Search:<input
                                            type="search" class="form-control form-control-sm" placeholder=""
                                            wire:model="searchItem"></label></div>
                            </div> --}}

                            <div class="col-md-5 col-12 mb-2">
                                <form wire:submit.prevent="render">
                                    <div class="row">
                                        {{-- <label for="start_date"> Date Filter:</label> --}}
                                        <div class="col-md-6 col-6 mb-2">
                                            <input type="date" class="form-control" wire:model="startDate"
                                                id="start_date">
                                        </div>
                                        <div class="col-md-6 col-6 mb-2">
                                            <input type="date" class="form-control" wire:model="endDate"
                                                id="end_date">
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="col-md-1 col-12 mb-2">
                                <button class="btn btn-danger" wire:click="clearDate" type="button">Clear</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable no-footer" style="width: 100%;"
                                    aria-describedby="applicationTable_info">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Program Title</th>
                                            {{-- <th>Education Level</th> --}}
                                            <th>Application Number</th>
                                            <th>Application Status</th>
                                            <th>Created At</th>
                                            <th>Payment</th>
                                            <th>Student</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($applyProgramList ?? [] as $item)

                                            @if ($item->status == 2)
                                                <tr class="tableRowItem odd">
                                                    <td>
                                                        <div class="tableContent">#</div>
                                                    </td>
                                                    <td>
                                                        <div class="tableContent">
                                                            <a
                                                                href="{{ route('university.program.details', ['id' => $item->id, 'slug' => $item->slug]) }}">
                                                                {{ $item->program_title }}
                                                            </a>
                                                        </div>
                                                    </td>
                                                    {{--  <td>
                                                         <div class="tableContent">
                                                            {{ $item->getProgram->minimum_level_education }}
                                                        </div>
                                                    </td> --}}
                                                    <td>
                                                        <div class="tableContent">{{ $item->application_number }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="tableContent">
                                                            {{ $item->application_status == 1 ? 'Done' : 'Pending' }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="tableContent">
                                                            {{ $item->created_at->format('M d, Y') }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="tableContent">
                                                            {{ $item->status == 2 ? 'Paid' : 'Due' }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="tableContent">
                                                            {{ $item->getStudent->full_name ?? '' }}
                                                        </div>
                                                    <td>

                                                        @if ($item->program_status == 0)
                                                            <div class="tableContent">
                                                                @if ($confirming === $item->id)
                                                                    <button
                                                                        wire:click="acceptProgram({{ $item->id }})"
                                                                        class="btn btn-success viewBtn">Sure?</button>
                                                                @else
                                                                    <button
                                                                        wire:click="confirmAccept({{ $item->id }})"
                                                                        class="btn btn-primary viewBtn">Accept</button>
                                                                @endif

                                                                <a class="btn btn-danger viewBtn"
                                                                    wire:click="openModal({{ $item->id }})">Reject</a>
                                                            @elseif ($item->program_status == 1)
                                                                <button
                                                                    class="btn btn-success viewBtn">Accepted</button>
                                                            @else
                                                                <button class="btn btn-danger viewBtn"
                                                                    wire:click="openModal({{ $item->id }} , 'reject' )">Rejected</button>

                                                            </div>
                                                        @endif

                                                    </td>

                                                </tr>
                                            @endif
                                        @empty

                                            <tr class="tableRowItem odd">
                                                <td colspan="8" class="text-center">
                                                    No programs are available
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="applicationTable_paginate">
                                    {{ $applyProgramList->links() }}
                                    {{-- <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled"
                                            id="applicationTable_previous"><a aria-controls="applicationTable"
                                                aria-disabled="true" aria-role="link" data-dt-idx="previous"
                                                tabindex="0" class="page-link">Previous</a></li>
                                        <li class="paginate_button page-item active"><a href="#"
                                                aria-controls="applicationTable" aria-role="link" aria-current="page"
                                                data-dt-idx="0" tabindex="0" class="page-link">1</a></li>
                                        <li class="paginate_button page-item next disabled" id="applicationTable_next">
                                            <a aria-controls="applicationTable" aria-disabled="true" aria-role="link"
                                                data-dt-idx="next" tabindex="0" class="page-link">Next</a>
                                        </li>
                                    </ul> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    @if ($showModal)
        <div style="display: block;" class="modal fade show" tabindex="-1" role="dialog">
        @else
            <div style="display: none;" class="modal fade" tabindex="-1" role="dialog">
    @endif

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal with Textarea Field</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <label>Reject Reson</label>
                <textarea wire:model="textareaValue" class="form-control" rows="5"></textarea>

                @if (!$mood)
                    <label for="">Backup Program</label>
                    <select class="form-control" wire:model="backup_program_id">
                        <option value="">Select Backup Program</option>
                        @foreach ($backupPrograms ?? [] as $program)
                            <option value="{{ $program->id }}">{{ $program->program_title }}</option>
                        @endforeach
                    </select>
                @else
                    <label for="">Rejected Program</label>
                    <input type="text" class="form-control" value="{{ $program_name }}" disabled>
                @endif

                <hr />

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    wire:click="closeModal">Close</button>
                @if (!$mood)
                    <button type="button" class="btn btn-primary" wire:click="saveBackupReject">Save
                        changes</button>
                @endif
            </div>
        </div>
    </div>
</div>
</div>


</div>
