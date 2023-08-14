    <!-- Modal -->
    <div>
        @if ($isEditOpen)
            <div style="display: block;" class="modal fade show" tabindex="-1" role="dialog">
            @else
                <div style="display: none;" class="modal fade" tabindex="-1" role="dialog">
        @endif

        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $category_id ? 'Edit Sub Catrgory' : 'Create Sub Catrgory' }}</h5>
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
                                <h4 class="card-title">Question Sub Category</h4>
                                {{-- <p class="card-description"> Basic form elements </p> --}}
                                {{-- <form class="forms-sample"> --}}

                                <div class="form-group">
                                    <label for="exampleSelectCategory">Category</label>
                                    <select class="form-select" wire:model="selectCategory" id="exampleSelectCategory">
                                        <option> ---> Select Category <--- </option>
                                                @forelse ($getCategories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>

                                    @empty
                                        @endforelse

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Sub Category Name</label>

                                    <input type="text" wire:model="sub_category_name" class="form-control"
                                        placeholder="Sub Category">
                                    @error('sub_category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    {{-- <input type="text" wire:model="name" class="form-control"
                                            id="exampleInputName1" placeholder="Name"> --}}

                                </div>


                                <button type="submit" wire:click="update"
                                    class="btn btn-gradient-primary me-2">Update</button>
                                <button wire:click="closeModal" class="btn btn-light">Cancel</button>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
