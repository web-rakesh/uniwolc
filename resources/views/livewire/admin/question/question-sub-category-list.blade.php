<div>
    @include('livewire.admin.question.sub-category-model')
    @include('livewire.admin.question.sub-category-edit-model')

    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between cardHeadingSection">
                    <h4 class="card-title">Question Sub Categories</h4>
                    <a href="javascript:;" wire:click="create" class="btn btn-primary">Add Sub
                        Category</a>
                </div>
                <div class="mt-3 mb-3">
                    <input wire:model="searchItem" type="text" class="form-control" placeholder="Search Students...">
                </div>                
				<div class="table-responsive responsive_table_area">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Is Category </th>
                            <th> Created_at </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subCategory ?? [] as $key => $categorie)
                            <tr class="table_item">
                                <td data-title="#" class="py-1">
                                    {{ $loop->iteration }}
                                </td>
                                <td data-title="Name"> {{ $categorie->name }} </td>
                                <td data-title="Is Category"> {{ $categorie->category->name }} </td>
                                <td data-title="Created_at"> {{ date('M d, Y', strtotime($categorie->created_at)) }} </td>
                                <td data-title="Action">
                                    <a href="javascript:;" wire:click="edit({{ $categorie->id }})"
                                        class="btn btn-info btn-sm">Edit</a>

                                    @if ($confirming === $categorie->id)
                                        <button wire:click="kill({{ $categorie->id }})"
                                            class="btn btn-danger btn-sm">Sure?</button>
                                    @else
                                        <button wire:click="confirmDelete({{ $categorie->id }})"
                                            class="btn btn-danger btn-sm">Delete</button>
                                    @endif
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

                {{ $subCategory->links() }}
            </div>
        </div>

    </div>

</div>
