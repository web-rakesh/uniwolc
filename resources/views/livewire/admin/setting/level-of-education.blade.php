<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-0">
                <h4 class="card-title">Level Of Education Table</h4>
                <div class="row">
                    <div class="col-md-5 col-12 mb-2">
                        <input wire:model="searchItem" type="search" class="form-control"
                            placeholder="Search Level Name...">
                    </div>
                    <div class="col-md-5 col-12 mb-2">
                        <select wire:model="category_id" class="form-select">
                            <option value="">Select Category</option>
                            @forelse ($categories ?? [] as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="col-md-2 col-12 mb-2">
                        <button wire:click="create" type="button" class="btn btn-primary btn-fw">Add New</button>
                    </div>
                    </div>
					 <div class="table-responsive responsive_table_area">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Name </th>
                                <th> Category </th>
                                <th> Created_at </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($levelOfEducation ?? [] as $education)
                                <tr class="table_item">
                                    <td data-title="#" class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td data-title="Name"> {{ $education->level_name }} </td>
                                    <td data-title="Category"> {{ $education->categoriesOfEducation->name }} </td>
                                    <td data-title="Created_at"> {{ date('M d, Y', strtotime($education->created_at)) }} </td>
                                    <td data-title="Action">
                                        <button wire:click="edit({{ $education->id }})"
                                            class="btn btn-primary btn-sm">View/Edit</button>

                                        @if ($confirming === $education->id)
                                            <button wire:click="kill({{ $education->id }})"
                                                class="btn btn-danger btn-sm">Sure?</button>
                                        @else
                                            <button wire:click="confirmDelete({{ $education->id }})"
                                                class="btn btn-danger btn-sm">Delete</button>
                                        @endif

                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
					</div>

                    {{ $levelOfEducation->links() }}
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

            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $level_id ? 'Edit Level' : 'Create Level' }}</h5>
                        <button wire:click="closeModal" type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form>
                            <input type="hidden" wire:model="staff_id">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="name">Level Name</label>
                                    <input wire:model="level_name" type="text" class="form-control" id="name"
                                        placeholder="Level name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label for="email">Category</label>
                                    <select wire:model="category_id" class="form-select">
                                        <option value="">Select Category</option>
                                        @forelse ($categories ?? [] as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="closeModal" type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button wire:click="{{ $level_id ? 'update' : 'store' }}" type="button"
                            class="btn btn-primary">{{ $level_id ? 'Update' : 'Save' }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
