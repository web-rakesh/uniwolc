<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            @include('flash-messages')
            <div class="card-body">
                <h4 class="card-title">Testimonial List</h4>

                <div class="row">
                    <div class="col-md-6 col-12 mb-2">
                        <input wire:model="searchItem" type="text" class="form-control" placeholder="Search Agents...">
                    </div>
                    <div class="col-md-4 col-12 mb-2">
                        <select wire:model="category" class="form-select">
                            <option value="">Select Category</option>
                            <option value="1">Student</option>
                            <option value="2">Recruitment Partners</option>
                            <option value="3">Education Partners</option>
                        </select>
                    </div>
                    <div class="col-2 mb-2">
                        <a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary btn-sm">+Add</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Title </th>
                                <th> Category </th>
                                <th> Image </th>
                                <th> Created_at </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($testimonials ?? [] as $testimonial)
                                <tr>
                                    <td class="py-1" class="copyToClipBoard">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td> {{ Str::words($testimonial->title, 7, '...') }} </td>
                                    <td> {{ $testimonial->category == 1 ? 'Student' : ($testimonial->category == 2 ? 'Recruitment Partners' : 'Education Partners') }}
                                    </td>
                                    <td>
                                        <img src="{{ $testimonial->testimonial_image_url }}" alt="" />
                                    </td>
                                    <td> {{ date('M d, Y', strtotime($testimonial->created_at)) }} </td>

                                    <td>

                                        <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}"
                                            class="btn btn-info btn-sm">Edit</a>

                                        @if ($confirming === $testimonial->id)
                                            <button wire:click="kill({{ $testimonial->id }})"
                                                class="btn btn-danger btn-sm">Sure?</button>
                                        @else
                                            <button wire:click="confirmDelete({{ $testimonial->id }})"
                                                class="btn btn-danger btn-sm">Delete</button>
                                        @endif

                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $testimonials->links() }}
            </div>
        </div>

    </div>
</div>
