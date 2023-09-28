<div>
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
                                        <a href="javascript:;" wire:click="create"
                                            class="btn btn-primary applicationSearchformBtn">Invite
                                            Staff</a>
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

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable no-footer" style="width: 100%;"
                                    aria-describedby="applicationTable_info">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>status</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($agents ?? [] as $key => $agent)
                                            <tr class="tableRowItem odd">
                                                <td>
                                                    <div class="tableContent">{{ $key + 1 }}</div>
                                                </td>
                                                <td>
                                                    <div class="tableContent">{{ $agent->name }}</div>
                                                </td>
                                                <td>
                                                    <div class="tableContent">{{ $agent->email }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch justify-content-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            wire:change="changeStatus({{ $agent }},$event.target.value)"
                                                            role="switch" value="{{ $agent->status }}"
                                                            @if ($agent->status == '1') checked @endif>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="tableContent">
                                                        {{ date('M d, Y', strtotime($agent->created_at)) }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="tableContent">
                                                        <button wire:click="edit({{ $agent->id }})"
                                                            class="btn btn-primary viewBtn">View/Edit</button>
                                                        <button wire:click="delete({{ $agent->id }})"
                                                            class="btn btn-danger viewBtn">Delete</button>
                                                    </div>
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
                                {{-- <div class="dataTables_info" id="applicationTable_info" role="status"
                                    aria-live="polite">Showing 1 to 2 of 2 entries</div> --}}
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="applicationTable_paginate">
                                    {{ $agents->links() }}
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
    <div>
        @if ($isOpen)
            <div style="display: block;" class="modal fade show" tabindex="-1" role="dialog">
            @else
                <div style="display: none;" class="modal fade" tabindex="-1" role="dialog">
        @endif

        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $staff_id ? 'Edit Staff' : 'Create Staff' }}</h5>
                    <button wire:click="closeModal" type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form>
                        <input type="hidden" wire:model="staff_id">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="name">Name</label>
                                <input wire:model="name" type="text" class="form-control" id="name"
                                    placeholder="Enter agent name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="email">Email</label>
                                <input wire:model="email" type="text" class="form-control" id="email"
                                    placeholder="Enter agent email" value="" {{ $staff_id ? 'readonly' : '' }}>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="phone_number">Phone Number</label>
                                <input wire:model="phone_number" type="text" class="form-control"
                                    id="phone_number" placeholder="Enter agent phone number">
                                @error('phone_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="address">Address</label>
                                <input wire:model="address" type="text" class="form-control" id="address"
                                    placeholder="Enter agent address">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="state">State</label>
                                <select class="form-control" wire:model="country_id" id="country">
                                    <option> Select Country</option>
                                    @foreach ($countries as $item)
                                        <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="state">State</label>
                                <select class="form-control" wire:model="state_id" id="state">
                                    <option value="">Select State</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                                @error('state_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group col-6">
                                <label for="city">City</label>
                                {{-- <input wire:model="city" type="text" class="form-control" id="city"
                                    placeholder="Enter agent city"> --}}
                                <select class="form-control" wire:model="city" id="city">
                                    <option value="">Select City</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="location">Location</label>
                                <input wire:model="location" type="text" class="form-control" id="location"
                                    placeholder="Enter agent location">
                                @error('location')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button wire:click="closeModal" type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button wire:click="{{ $staff_id ? 'update' : 'store' }}" type="button"
                        wire:loading.attr="disabled" class="btn btn-primary">
                        @if ($loading)
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        @else
                            {{ $staff_id ? 'Update' : 'Save' }}
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
