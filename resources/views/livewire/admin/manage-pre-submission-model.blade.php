<div>

    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between cardHeadingSection">
                    <h4 class="card-title">Pre Submission Model</h4>
                    <a href="javascript:;" wire:click="create" class="btn btn-primary">Add</a>
                </div>
                <div class="mt-3 mb-3">
                    <input wire:model="searchItem" type="text" class="form-control" placeholder="Search Title...">
                </div>

                <div class="table-responsive responsive_table_area">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Sequence No </th>
                                <th> Course Title </th>

                                <th> Created_at </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($modelQuestions ?? [] as $key => $question)
                                <tr class="table_item">
                                    <td data-title="Sequence No"> {{ $loop->iteration }} </td>
                                    <td data-title="Label"> {{ $question->title }}</td>

                                    <td data-title="Created_at"> {{ date('M d, Y', strtotime($question->created_at)) }}
                                    </td>
                                    <td data-title="Action">
                                        <a href="javascript:;" wire:click="editCourse({{ $question->id }})"
                                            class="btn btn-info btn-sm">Edit</a>
                                        <a href="javascript:;" wire:click="deleteCourse({{ $question->id }})"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Sub course</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{ @$modelQuestions->links() }}
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
                            <h5 class="modal-title">{{ $course_id ? 'Edit course' : 'Create course' }}</h5>
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
                                        <h4 class="card-title">Course</h4>
                                        {{-- <p class="card-description"> Basic form elements </p> --}}
                                        {{-- <form class="forms-sample"> --}}


                                        <div class="form-group">
                                            <label for="screen">Titile</label>
                                            <input type="text" wire:model="formData.title" class="form-control"
                                                id="screen" placeholder="Enter your course title">
                                            @error('formData.title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" wire:click="{{ $course_id ? 'update' : 'store' }}"
                                            class="btn btn-gradient-primary me-2">{{ $course_id ? 'Update' : 'Submit' }}</button>
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
</div>
