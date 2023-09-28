<div>

    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between cardHeadingSection">
                    <h4 class="card-title">Chapter</h4>
                    <a href="javascript:;" wire:click="create" class="btn btn-primary">Add Chapter</a>
                </div>
                <div class="row">

                    <div class="mt-3 mb-3 col-md-6">
                        <input wire:model="searchItem" type="search" class="form-control" placeholder="Search Title...">
                    </div>
                    <div class="mt-3 mb-3 col-md-6">
                        <select wire:model="course_id" class="form-select">
                            <option value="">Select...</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="table-responsive responsive_table_area">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Sequence No </th>
                                <th> Course </th>
                                <th> Title </th>
                                <th> Description </th>
                                <th> Created_at </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($chapters ?? [] as $key => $chapter)
                                <tr class="table_item">
                                    <td data-title="Sequence No"> {{ $loop->iteration }} </td>
                                    <td data-title="Course"> {{ $chapter->getCourse->title }}</td>
                                    <td data-title="Title"> {{ $chapter->title }}</td>
                                    <td data-title="Content"> {{ Str::limit($chapter->content, 60) }} </td>
                                    <td data-title="Created_at"> {{ date('M d, Y', strtotime($chapter->created_at)) }}
                                    </td>
                                    <td data-title="Action">
                                        <a href="javascript:;" wire:click="editChapter({{ $chapter->id }})"
                                            class="btn btn-info btn-sm">Edit</a>
                                        <a href="javascript:;" wire:click="deleteChapter({{ $chapter->id }})"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Chapter</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $chapters->links() }}
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
                            <h5 class="modal-title">{{ $chapter_id ? 'Edit course' : 'Create course' }}</h5>
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
                                        <h4 class="card-title">Chapter</h4>
                                        {{-- <p class="card-description"> Basic form elements </p> --}}
                                        {{-- <form class="forms-sample"> --}}


                                        <div class="form-group">
                                            <label for="course">Course </label>
                                            <select wire:model="formData.course_id" class="form-select">
                                                <option value="">Select...</option>
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                                @endforeach
                                            </select>

                                            @error('formData.course_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="screen">Titile</label>
                                            <input type="text" wire:model="formData.title" class="form-control"
                                                id="screen" placeholder="Enter your course title">
                                            @error('formData.title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="screen">Content</label>
                                            <textarea class="form-control" wire:model="formData.content" cols="30" rows="10"
                                                placeholder="Enter your course Content"></textarea>
                                            @error('formData.content')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" wire:click="{{ $chapter_id ? 'update' : 'store' }}"
                                            class="btn btn-gradient-primary me-2">{{ $chapter_id ? 'Update' : 'Submit' }}</button>
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
