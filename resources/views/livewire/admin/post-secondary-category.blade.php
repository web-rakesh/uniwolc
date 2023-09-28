<div>

    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between cardHeadingSection">
                    <h4 class="card-title">Post Category</h4>
                    <a href="javascript:;" wire:click="create" class="btn btn-primary">Add Category</a>
                    <a href="javascript:;" wire:click="createSubCategory" class="btn btn-primary">Add Sub Category</a>
                </div>
                <div class="mt-3 mb-3">
                    <input wire:model="searchItem" type="text" class="form-control" placeholder="Search Students...">
                </div>
               
                <div class="table-responsive responsive_table_area">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Sequence No </th>
                                <th> Category Name </th>
                                <th> Sub Category </th>
                                <th> Created_at </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($categories ?? [] as $key => $category)
                                <tr class="table_item">
                                    <td data-title="Sequence No"> {{ $loop->iteration }} </td>
                                    <td data-title="Label"> {{ $category->name  }}</td>
                                    <td data-title="sub_category">
                                        @if ($category->subCategory)
                                            <a href="javascript:;" wire:click="subCategoryList({{  $category->id }})" class="btn btn-info btn-sm">Sub category</a>    
                                        @else
                                          --  
                                        @endif
                                    </td>
                                    <td data-title="Created_at"> {{ date('M d, Y', strtotime($category->created_at)) }} </td>
                                    <td data-title="Action"> 
                                        <a href="javascript:;" wire:click="editCategory({{  $category->id }})" class="btn btn-info btn-sm">Edit</a> 
                                        <a href="javascript:;" wire:click="deleteCategory({{  $category->id }})" class="btn btn-danger btn-sm">Delete</a> 
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
                                                <input type="text" wire:model="sub_category_name" class="form-control" id="screen"
                                                    placeholder="Enter your screen">
                                                @error('sub_category_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                        
                                    
            
                                            <button type="submit" wire:click="{{ $category_id ? 'update' : 'subCategoryStore' }}"
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
                                                            <td data-title="Action"> <button wire:click="deleteSubCategory({{ $item->id }})" class="btn btn-danger btn-sm">Delete</button> </td>
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
