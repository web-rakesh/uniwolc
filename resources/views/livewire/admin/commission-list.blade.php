<div>

    @include('flash-messages')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between cardHeadingSection">
                    <h4 class="card-title">Student Commissions</h4>
                    <a href="javascript:;" wire:click="create" class="btn btn-primary">Add Commission</a>
                </div>
                <div class="mt-3 mb-3">
                    <input wire:model="searchItem" type="text" class="form-control" placeholder="Search ...">
                </div>

                <div class="table-responsive responsive_table_area">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> School Name </th>
                                <th> Level If Applicable </th>
                                <th> Payment Type </th>
                                <th> Min @ 75% </th>
                                <th> Max @ 75% </th>
                                <th> Tax Type and % </th>
                                <th> Variables Factors </th>
                                <th> Installment Pay Out </th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($commissions ?? [] as $key => $commission)
                                <tr class="table_item">
                                    <td data-title="Sequence No"> {{ $loop->iteration }} </td>
                                    <td data-title="Label"> {{ $commission->school->university_name }}</td>
                                    <td data-title="Applicable">
                                        {{ $commission->applicable ?? '-' }}
                                    </td>
                                    <td data-title="Payment Type"> {{ $commission->payment_type ?? '-' }}</td>
                                    <td data-title="Min"> {{ $commission->min ?? '-' }}</td>
                                    <td data-title="Max"> {{ $commission->min ?? '-' }}</td>
                                    <td data-title="Tax Type Percentage"> {{ $commission->tax_type_percentage ?? '-' }}
                                    </td>
                                    <td data-title="Variable Factor"> {{ $commission->variable_factor ?? '-' }}</td>
                                    <td data-title="Installment Pay Out"> {{ $commission->installment_pay_out ?? '-' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Sub Category</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- {{ $quesScreens->links() }} --}}
            </div>
        </div>

    </div>



    <!-- Modal  -->
    <div>
        @if ($isOpen)
            <div style="display: block;" class="modal fade show" tabindex="-1" role="dialog">
                {{-- @else
                    <div style="display: none;" class="modal fade" tabindex="-1" role="dialog"> --}}

                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $category_id ? 'Edit Category' : 'Create Category' }}</h5>
                            <button wire:click="closeModal" type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Screen</h4>
                                        {{-- <p class="card-description"> Basic form elements </p> --}}
                                        {{-- <form class="forms-sample"> --}}


                                        <div class="form-group">
                                            <label for="screen">School Name</label>

                                            <select wire:model="form.school" class="form-control">
                                                <option value="">Select...</option>
                                                @foreach ($universities as $item)
                                                    <option value="{{ $item->id }}">{{ $item->university_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('label')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="screen">Level If Applicable</label>
                                            <input type="text" wire:model="form.applicable" class="form-control"
                                                id="screen" placeholder="Level If Applicable">
                                            @error('label')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="screen">Payment Type</label>
                                            <select wire:model="form.payment_type" class="form-control">
                                                <option value="">Select...</option>
                                                <option value="%">Percentage(%)</option>
                                                <option value="Fixed">Fixed(-)</option>
                                            </select>
                                            @error('label')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="screen">Min @ 75%</label>
                                            <input type="number" step="0.01" wire:model="form.min"
                                                class="form-control" id="screen" placeholder="Min @ 75%">
                                            @error('label')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="screen">Max @ 75%</label>
                                            <input type="number" step="0.01" wire:model="form.max"
                                                class="form-control" id="screen" placeholder="Max @ 75%">
                                            @error('label')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="screen">Tax Type and %</label>
                                            <input type="text" wire:model="form.tax_type_percentage"
                                                class="form-control" id="screen" placeholder="Tax Type and %">
                                            @error('label')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="screen">Variables Factors</label>
                                            <input type="text" wire:model="form.variable_factor"
                                                class="form-control" id="screen" placeholder="Variables Factors">
                                            @error('label')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="screen">Installment Pay Out</label>
                                            <input type="text" wire:model="form.installment_pay_out"
                                                class="form-control" id="screen"
                                                placeholder="Installment Pay Out">
                                            @error('label')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>



                                        <button type="submit" wire:click="{{ $category_id ? 'update' : 'store' }}"
                                            class="btn btn-gradient-primary me-2">{{ $category_id ? 'Update' : 'Submit' }}</button>
                                        <button wire:click="closeModal" class="btn btn-light">Cancel</button>
                                        {{-- </form> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        @endif
    </div>
    <div>
        @if ($isSubCategoryOpen)
            <div style="display: block;" class="modal fade show" tabindex="-1" role="dialog">
                {{-- @else
                    <div style="display: none;" class="modal fade" tabindex="-1" role="dialog"> --}}

                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $category_id ? 'Edit Category' : 'Create Category' }}</h5>
                            <button wire:click="closeModal" type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Sub Category</h4>
                                        {{-- <p class="card-description"> Basic form elements </p> --}}
                                        {{-- <form class="forms-sample"> --}}

                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select class="form-control" wire:model="ms_category_id" id="category">
                                                <option value="">Select...</option>
                                                @forelse ($all_categories as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @empty
                                                    <option value="">Please add category</option>
                                                @endforelse

                                            </select>
                                            @error('ms_category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label for="screen">Label</label>
                                            <input type="text" wire:model="sub_category_name" class="form-control"
                                                id="screen" placeholder="Enter your screen">
                                            @error('sub_category_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>




                                        <button type="submit"
                                            wire:click="{{ $category_id ? 'update' : 'subCategoryStore' }}"
                                            class="btn btn-gradient-primary me-2">{{ $category_id ? 'Update' : 'Submit' }}</button>
                                        <button wire:click="closeModal" class="btn btn-light">Cancel</button>
                                        {{-- </form> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        @endif

    </div>
    <div>
        @if ($isSubList)
            <div style="display: block;" class="modal fade show" tabindex="-1" role="dialog">
                {{-- @else
                    <div style="display: none;" class="modal fade" tabindex="-1" role="dialog"> --}}

                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $category_id ? 'Edit Category' : 'Create Category' }}</h5>
                            <button wire:click="closeModal" type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Name </th>
                                                    <th> Created_at </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($subLists ?? [] as $key => $item)
                                                    <tr>
                                                        <td class="py-1">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td> {{ $item->name }} </td>
                                                        <td> {{ date('M d, Y', strtotime($item->created_at)) }} </td>
                                                        <td data-title="Action"> <button
                                                                wire:click="deleteSubCategory({{ $item->id }})"
                                                                class="btn btn-danger btn-sm">Delete</button> </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">No Sub Category</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        @endif

    </div>


</div>
