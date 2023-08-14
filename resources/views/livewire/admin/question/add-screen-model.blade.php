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
                    <h5 class="modal-title">{{ $screen_id ? 'Edit Screen' : 'Create Screen' }}</h5>
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
                                    <label for="screen">Label</label>
                                    <input type="text" wire:model="label" class="form-control" id="screen"
                                        placeholder="Enter your screen">
                                    @error('label')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Description</label>
                                    <input type="text" wire:model="description" class="form-control"
                                        id="exampleInputName1" placeholder="Description">
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" wire:click="{{ $screen_id ? 'update' : 'store' }}"
                                    class="btn btn-gradient-primary me-2">{{ $screen_id ? 'Update' : 'Submit' }}</button>
                                <button wire:click="closeModal" class="btn btn-light">Cancel</button>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
