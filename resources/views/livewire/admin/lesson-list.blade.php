<div>

    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between cardHeadingSection">
                    <h4 class="card-title">Lesson</h4>
                    <a href="javascript:;" wire:click="create" class="btn btn-primary">Add Chapter</a>
                </div>
                <div class="row">

                    <div class="mt-3 mb-3 col-md-4">
                        <input wire:model="searchItem" type="search" class="form-control" placeholder="Search ...">
                    </div>
                    <div class="mt-3 mb-3 col-md-4">
                        <select wire:model="courseId" class="form-select">
                            <option value="">Select...</option>
                            @foreach ($courses ?? [] as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3 mb-3 col-md-4">
                        <select wire:model="chapterId" class="form-select">
                            <option value="">Select...</option>
                            @foreach ($chapters ?? [] as $course)
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
                                <th> Chapter </th>
                                <th> Title </th>
                                <th> Description </th>
                                <th> Video </th>
                                <th> Created_at </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lessons ?? [] as $key => $lesson)
                                <tr class="table_item">
                                    <td data-title="Sequence No"> {{ $loop->iteration }} </td>
                                    <td data-title="Course"> {{ $lesson->getChapter->getCourse->title }}</td>
                                    <td data-title="Course"> {{ $lesson->getChapter->title }}</td>
                                    <td data-title="Title"> {{ $lesson->title }}</td>
                                    <td data-title="Content"> {{ Str::limit($lesson->content, 60) }} </td>
                                    <td data-title="Video">
                                        @if ($lesson->lesson_video_url == null)
                                            <span class="text-danger">--</span>
                                        @else
                                            <a href="{{ $lesson->lesson_video_url }}" target="_blank">View</a>
                                        @endif
                                    </td>
                                    <td data-title="Created_at"> {{ date('M d, Y', strtotime($lesson->created_at)) }}
                                    </td>
                                    <td data-title="Action">
                                        <a href="javascript:;" wire:click="editLesson({{ $lesson->id }})"
                                            class="btn btn-info btn-sm">Edit</a>
                                        <a href="javascript:;" wire:click="deleteChapter({{ $lesson->id }})"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Chapter</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- {{ $chapters->links() }} --}}
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
                            <h5 class="modal-title">{{ $lesson_id ? 'Edit course' : 'Create course' }}</h5>
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
                                        <h4 class="card-title">Lesson</h4>
                                        {{-- <p class="card-description"> Basic form elements </p> --}}
                                        {{-- <form class="forms-sample"> --}}


                                        <div class="form-group">
                                            <label for="course">Course </label>
                                            <select wire:model="selectedCourse" class="form-select">
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
                                            <label for="course">Chapter </label>
                                            <select wire:model="formData.chapter_id" class="form-select">
                                                <option value="">Select...</option>
                                                @foreach ($chapters as $chapter)
                                                    <option value="{{ $chapter->id }}">{{ $chapter->title }}</option>
                                                @endforeach
                                            </select>

                                            @error('formData.chapter_id')
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

                                        <div class="form-group">
                                            <label for="Video">Video <small style="color:red">(Supported format:
                                                    .mp4,
                                                    .mkv limit size:
                                                    less
                                                    then 5MB)</small></label>
                                            <input type="file" class="form-control" wire:model="formData.video"
                                                accept="video/*">

                                            @error('formData.video')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <button type="submit" wire:click="{{ $lesson_id ? 'update' : 'store' }}"
                                            class="btn btn-gradient-primary me-2">{{ $lesson_id ? 'Update' : 'Submit' }}</button>
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
