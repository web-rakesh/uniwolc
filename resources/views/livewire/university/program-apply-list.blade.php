<div>
    <div class="dashboardInnerWrapperinner py-2">
        <div class="dashboardHeaderSec">
            <h4 class="title">Programs</h4>
        </div>
        <div class="dashboardPanel">
            <div class="dashboardPanelBody">
                <div class="applicationSearchArea mt-2">
                    <div class="applicationSearchAreainner">
                        <div class="applicationSearchformArea">
                            <form>
                                <div class="row rowBox">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox">
                                        <div class="form-group mb-2">
                                            <input type="text" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 columnBox">
                                        <div class="form-group mb-2">
                                            <input type="email" class="form-control" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox">
                                        <div class="form-group mb-2">
                                            <input type="number" class="form-control" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-2 col-sm-6 col-12 columnBox">
                                        <div class="applicationSearchformBtnArea mb-2">
                                            <button type="button"
                                                class="btn btn-primary applicationSearchformBtn">Search</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-12 columnBox">
                                        <a href="{{ route('university.programs.add') }}" type="button"
                                            class="btn btn-primary">Add
                                            Program</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboardPanel">
            <div class="dashboardPanelBody">
                <div class="dashboardTableArea table-responsive">
                    <div id="applicationTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="applicationTable_length">
                                    <label>
                                        Show
                                        <select name="applicationTable_length" aria-controls="applicationTable"
                                            class="custom-select custom-select-sm form-control form-control-sm"
                                            wire:model="paginationCount">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                        entries
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="applicationTable_filter" class="dataTables_filter"><label>Search:<input
                                            type="search" class="form-control form-control-sm" placeholder=""
                                            wire:model="searchItem"></label></div>
                            </div>
                        </div>
                        {{-- {{ $programs }} --}}
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable no-footer" style="width: 100%;"
                                    aria-describedby="applicationTable_info">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Program Title</th>
                                            <th>Education Level</th>
                                            <th>Minimum GPA</th>
                                            <th>Program Level</th>
                                            <th>Program End Date</th>
                                            <th>Payment</th>
                                            <th>Student</th>
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($applies as $program)
                                            <tr class="tableRowItem odd">
                                                <td>
                                                    <div class="tableContent">#</div>
                                                </td>
                                                <td>
                                                    <div class="tableContent">{{ $program->program_title }}</div>
                                                </td>
                                                <td>
                                                    <div class="tableContent">
                                                        {{ $program->getProgram->minimum_level_education }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="tableContent">{{ $program->getProgram->minimum_gpa }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="tableContent">{{ $program->getProgram->program_level }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="tableContent">
                                                        {{ $program->created_at->format('Y-m-d') }}</div>
                                                </td>
                                                <td>
                                                    <div class="tableContent">
                                                        {{ $program->status == 2 ? 'Paid' : 'Due' }}</div>
                                                </td>
                                                <td>
                                                    <div class="tableContent">
                                                        {{ $program->getStudent->full_name ?? '' }}
                                                    </div>
                                                <td>
                                                    {{-- <div class="tableContent">
                                                        <a class="btn btn-primary viewBtn"
                                                            href="{{ route('university.program.show', $program->id) }}">View</a>
                                                        <a class="btn btn-primary viewBtn"
                                                            href="{{ route('university.program.edit', $program->id) }}">Edit</a>
                                                    </div> --}}
                                                </td>

                                            </tr>

                                        @empty
                                            No programs are available
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="applicationTable_info" role="status"
                                    aria-live="polite">Showing 1 to 2 of 2 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="applicationTable_paginate">
                                    {{ $applies->links() }}
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
</div>
