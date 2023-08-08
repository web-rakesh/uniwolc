<div>
    @include('livewire.admin.question.category-model')
    @include('livewire.admin.question.get-subcategory')

    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Question Category Table</h4>
                    <a href="javascript:;" wire:click="create" class="btn btn-primary">Add
                        Category</a>
                </div>
                <div class="mt-3">
                    <input wire:model="searchItem" type="text" class="form-control" placeholder="Search Students...">
                </div>
                </p>
                <div class=" table-responsive">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Name </th>
                                <th> Table </th>
                                <th> Is Category </th>
                                <th> Screen </th>
                                <th> Type </th>
                                <th> Created_at </th>
                                {{-- <th> Action </th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories ?? [] as $key => $categorie)
                                <tr>
                                    <td class="py-1">
                                        {{ $key + 1 }}
                                    </td>
                                    <td> {{ $categorie->name }} </td>
                                    <td> {{ $categorie->table_name == '' ? 'N/A' : $categorie->table_name }} </td>
                                    <td>
                                        @if ($categorie->has_sub_category == '0')
                                            <a href="javascript:;" wire:click="getSubCategory({{ $categorie->id }})"
                                                class="btn btn-info btn-sm">View</a>
                                        @else
                                            <a href="javascript:;" class="btn btn-info btn-sm">No Sub Category</a>
                                        @endif
                                    </td>
                                    <td>{{ $categorie->screen_id }}</td>
                                    <td>{{ $categorie->type }}</td>
                                    <td> {{ date('M d, Y', strtotime($categorie->created_at)) }} </td>
                                    <td>
                                        {{-- <a href="javascript:;" class="btn btn-info btn-sm">View</a> --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Category</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>


                {{ $categories->links() }}
            </div>
        </div>

    </div>

</div>
