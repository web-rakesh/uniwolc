<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="dashboardInnerWrapperinner py-2">
        <div class="dashboardHeaderSec">
            <h4 class="title">Staffs</h4>
        </div>
        <div class="dashboardPanel">
            <div class="dashboardPanelBody">
                @if (session()->has('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="applicationSearchArea mt-2">
                    <div class="applicationSearchAreainner">
                        <div class="applicationSearchformArea">
                            <form>
                                <div class="row rowBox">
                                    {{-- <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox">
                                        <div class="form-group col-6 mb-2">
                                            <input type="text" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 columnBox">
                                        <div class="form-group col-6 mb-2">
                                            <input type="email" class="form-control" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox">
                                        <div class="form-group col-6 mb-2">
                                            <input type="number" class="form-control" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-2 col-sm-6 col-12 columnBox">
                                        <div class="applicationSearchformBtnArea mb-2">
                                            <button type="button"
                                                class="btn btn-primary applicationSearchformBtn">Search</button>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-12 columnBox">
                                        <a href="{{ route('staff.student.general.detail') }}"
                                            class="btn btn-primary applicationSearchformBtn">Add
                                            Student</a>
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
                                            class="custom-select custom-select-sm form-control form-control-sm">
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

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable no-footer" style="width: 100%;"
                                    aria-describedby="applicationTable_info">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Country</th>
                                            <th>Address</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($students ?? [] as $key => $student)
                                            <tr class="tableRowItem odd">
                                                <td>
                                                    <div class="tableContent">{{ $key + 1 }}</div>
                                                </td>
                                                <td>
                                                    <div class="tableContent">{{ $student->fullname }}</div>
                                                </td>
                                                <td>
                                                    <div class="tableContent">{{ $student->email }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="tableContent">{{ $student->country }}</div>
                                                </td>
                                                <td>
                                                    <div class="tableContent">{{ $student->address }}</div>
                                                </td>
                                                <td>
                                                    <div class="tableContent">
                                                        {{ date('M d, Y', strtotime($student->created_at)) }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="tableContent">
                                                        <a href="{{ route('staff.student.general.detail', $student->user_id) }}"
                                                            class="btn btn-primary viewBtn">View</a>

                                                        <button wire:click="delete({{ $student->id }})"
                                                            class="btn btn-danger viewBtn">Delete</button>
                                                    </div>
                                                </td>

                                            </tr>

                                        @empty
                                            <tr>
                                                <td colspan="7">
                                                    <div class="tableContent text-center">No students are available
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                {{-- <div class="dataTables_info" id="applicationTable_info" role="status"
                                    aria-live="polite">Showing 1 to 2 of 2 entries</div> --}}
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="applicationTable_paginate">
                                    {{-- {{ $students->links() }} --}}
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
