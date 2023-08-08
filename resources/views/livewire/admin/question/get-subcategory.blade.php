    <!-- Modal -->
    <div>
        @if ($isSubCategoryOpen)
            <div style="display: block;" class="modal fade show" tabindex="-1" role="dialog">
            @else
                <div style="display: none;" class="modal fade" tabindex="-1" role="dialog">
        @endif

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button wire:click="closeCategoryModal" type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Name </th>
                                    <th> Created_at </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subCategory ?? [] as $key => $categorie)
                                    <tr>
                                        <td class="py-1">
                                            {{ $key + 1 }}
                                        </td>
                                        <td> {{ $categorie->name }} </td>
                                        <td> {{ date('M d, Y', strtotime($categorie->created_at)) }} </td>
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
