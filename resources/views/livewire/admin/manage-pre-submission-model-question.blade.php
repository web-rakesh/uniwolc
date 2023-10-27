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
                                <th> Label </th>
                                <th> Model </th>
                                <th> Created_at </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($questions ?? [] as $key => $question)
                                <tr class="table_item">
                                    <td data-title="Sequence No"> {{ $loop->iteration }} </td>
                                    <td data-title="Label"> {{ Str::limit( $question->label, $limit = 66, '...') }}</td>
                                    <th data-title="Model"> {{ $question->modal_label->title?? '' }}</th>
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

                {{ @$questions->links() }}
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
                                            <label for="modal">Model</label>
                                            <select wire:model="formData.pre_model_question_id" class="form-control" id="modal">
                                                <option value="">Select Model</option>
                                                @foreach ($modelQuestions as $model)
                                                    <option value="{{ $model->id }}">{{ $model->title }}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label for="screen">Label</label>
                                            <input type="text" wire:model="formData.label" class="form-control"
                                                id="screen" placeholder="Enter your Label">
                                            @error('formData.label')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="model-type">Type</label>
                                            <select wire:model="formData.type" class="form-control" id="model-type">
                                                <option value="">Select Type</option>
                                                <option value="textarea">Textarea</option>
                                                <option value="select">Select</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="required">Required</label>
                                            <select wire:model="formData.required" class="form-control" id="required">
                                                <option value="">Select Required</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="screen">Placeholder</label>
                                            <input type="text" wire:model="formData.placeholder" class="form-control"
                                                id="screen" placeholder="Enter your Placeholder">
                                            @error('formData.placeholder')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label for="screen">Options  E.G.:<small> ["Yes", "No"] </small> </label>
                                             <textarea wire:model="formData.options" class="form-control" id="screen"
                                                placeholder="Enter your Options"></textarea>
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
