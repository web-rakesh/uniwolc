<div>
    @include('livewire.admin.question.add-screen-model')
    @include('livewire.admin.question.category-screen-model')

    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between cardHeadingSection">
                    <h4 class="card-title">Question Screen</h4>
                    <a href="javascript:;" wire:click="create" class="btn btn-primary">Add Screen</a>
                </div>
                <div class="mt-3 mb-3">
                    <input wire:model="searchItem" type="text" class="form-control" placeholder="Search Students...">
                </div>
               
                <div class="table-responsive responsive_table_area">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Sequence No </th>
                                <th> Label</th>
                                <th> Description </th>
                                <th> Created_at </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($quesScreens ?? [] as $key => $screen)
                                <tr class="table_item">
                                    <td data-title="Sequence No"> {{ $screen->sequence_no ?? '' }} </td>
                                    <td data-title="Label"> {{ $screen->label ?? '--' }}</td>
                                    <td data-title="Description"> {{ $screen->description ?? '--' }} </td>
                                    <td data-title="Created_at"> {{ date('M d, Y', strtotime($screen->created_at)) }} </td>
                                    <td data-title="Action"> <a href="javascript:;" wire:click="editScreen({{  $screen->id }})" class="btn btn-info btn-sm">Edit</a> </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Sub Category</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $quesScreens->links() }}
            </div>
        </div>

    </div>

</div>
