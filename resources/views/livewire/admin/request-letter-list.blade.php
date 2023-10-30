<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-0">
                <h4 class="card-title">Request Letter</h4>
                <div class=" row">

                    <div class="mb-4 col-md-6">
                        <input wire:model="searchItem" type="search" class="form-control" placeholder="Search letter...">
                    </div>
                    <div class="col-md-6">
                        <select wire:model="country_id" class="form-select">
                            <option value="">Select Country</option>
                            @foreach ($countries as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="table-responsive responsive_table_area">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> School Name </th>
                                <th> Student Name </th>
                                <th> Subject </th>
                                <th> Country </th>
                                <th> Created_at </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($requestLetters ?? [] as $letter)
                                <tr class="table_item">
                                    <td data-title="#" class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td data-title="School Name">
                                        {{ Str::limit($letter->university->university_name ?? '', $limit = 40, '...') }}
                                    </td>
                                    <td data-title="Name"> {{ $letter->student_name }} </td>
                                    <td data-title="Email"> {{ $letter->email }} </td>
                                    <td data-title="Country"> {{ $letter->university->getCountry->name ?? '' }} </td>
                                    <td data-title="Created_at"> {{ date('M d, Y', strtotime($letter->created_at)) }}
                                    </td>
                                    <td data-title="Action">
                                        @if (action_permission('letter', 'view') == true)
                                            <a href="{{ route('admin.request.show', $letter->id) }}"
                                                class="btn btn-info btn-sm">View</a>
                                        @endif
                                        {{-- @if (action_permission('agent', 'delete') == true) --}}
                                        @if ($confirming == $letter->id)
                                            <button wire:click="kill({{ $letter->id }})"
                                                class="btn btn-danger btn-sm">Sure?</button>
                                        @else
                                            <button wire:click="confirmDelete({{ $letter->id }})"
                                                class="btn btn-danger btn-sm">Delete</button>
                                        @endif
                                        {{-- @endif --}}
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $requestLetters->links() }}
            </div>
        </div>

    </div>
</div>
