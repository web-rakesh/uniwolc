<div>
    @include('livewire.admin.question.sub-category-model')
    @include('livewire.admin.question.sub-category-edit-model')

    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Question Sub Categories</h4>
                    <a href="javascript:;" wire:click="create" class="btn btn-primary">Add Sub
                        Category</a>
                </div>
                <div class="mt-3">
                    <input wire:model="searchItem" type="text" class="form-control" placeholder="Search Students...">
                </div>
                </p>
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
                            <tr>
                                <td class="py-1">
                                    {{ $loop->iteration }}
                                </td>
                                <td> {{ $categorie->name }} </td>
                                <td> {{ $categorie->category->name }} </td>
                                <td> {{ date('M d, Y', strtotime($categorie->created_at)) }} </td>
                                <td>
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

                {{ $subCategory->links() }}
            </div>
        </div>

    </div>

</div>
