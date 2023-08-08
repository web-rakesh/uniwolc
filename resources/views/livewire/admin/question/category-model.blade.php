    <!-- Modal -->
    <div>
        @if ($isOpen)
            <div style="display: block;" class="modal fade show" tabindex="-1" role="dialog">
            @else
                <div style="display: none;" class="modal fade" tabindex="-1" role="dialog">
        @endif

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $category_id ? 'Edit Catrgory' : 'Create Catrgory' }}</h5>
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
                                <h4 class="card-title">Question Category</h4>
                                {{-- <p class="card-description"> Basic form elements </p> --}}
                                {{-- <form class="forms-sample"> --}}


                                <div class="form-group">
                                    <label for="screen">Screen</label>
                                    <select wire:model="screen_id" class="form-control">
                                        <option value=""> Select Screen</option>
                                        @forelse ($this->screens as $item)
                                            <option value="{{ $item->id }}">{{ $item->sequence_no }}</option>
                                        @empty
                                        @endforelse
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Category Name</label>
                                    <input type="text" wire:model="name" class="form-control" id="exampleInputName1"
                                        placeholder="Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Sub Category</label>

                                    <div class="form-check form-check-danger">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" wire:model="is_sub_category"
                                                id="is_sub_category" value="0" checked> Yes <i
                                                class="input-helper"></i></label>

                                    </div>
                                    <div class="form-check form-check-danger">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" wire:model="is_sub_category"
                                                id="is_sub_category" value="1"> No
                                            <i class="input-helper"></i></label>

                                    </div>
                                </div>

                                @if ($is_sub_category == '1')
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">Table name</label>
                                        <input type="text" class="form-control" wire:model="table_name"
                                            placeholder="Enter your table name">
                                    </div>
                                @endif


                                <div class="form-group">
                                    <label for="exampleInputName1">Field type</label>

                                    <div class="form-check form-check-danger">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" wire:model="type"
                                                id="type" value="radio" checked> Radio Button <i
                                                class="input-helper"></i></label>

                                    </div>
                                    <div class="form-check form-check-danger">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" wire:model="type"
                                                id="type" value="checkbox"> Checkbox
                                            <i class="input-helper"></i></label>
                                    </div>
                                    <div class="form-check form-check-danger">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" wire:model="type"
                                                id="type" value="dropdown"> Dropdown
                                            <i class="input-helper"></i></label>
                                    </div>
                                    <div class="form-check form-check-danger">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" wire:model="type"
                                                id="type" value="text"> Input
                                            <i class="input-helper"></i></label>
                                    </div>

                                    @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" wire:click="{{ $category_id ? 'update' : 'store' }}"
                                    class="btn btn-gradient-primary me-2">Submit</button>
                                <button wire:click="closeModal" class="btn btn-light">Cancel</button>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
