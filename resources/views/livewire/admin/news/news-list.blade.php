<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="row">
        <div class="col-9">
            <input wire:model="searchItem" type="search" class="form-control" placeholder="Search Level Name...">
        </div>

        <div class="col-3">
            {{-- <button type="button" class="btn btn-primary btn-block" wire:click="showModal">
                Add New
            </button> --}}
            @if (action_permission('news', 'add') == true)
                <a href="{{ route('admin.news.create') }}" class="btn btn-primary btn-block"> Add New</a>
            @endif
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th> # </th>
                        <th> Title </th>
                        <th> Sub Title </th>
                        <th> Created_at </th>
                        <th> Status </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($news ?? [] as $item)
                        <tr>
                            <td class="py-1">
                                {{ $loop->iteration }}
                            </td>
                            <td> {{ $item->title }} </td>
                            <td> {{ $item->sub_title }} </td>
                            <td> {{ date('M d, Y', strtotime($item->created_at)) }} </td>
                            <td>
                                <div class="form-check form-switch justify-content-center">
                                    <input class="form-check-input" type="checkbox"
                                        wire:change="changeStatus({{ $item }},$event.target.value)"
                                        role="switch" value="{{ $item->block }}"
                                        @if ($item->block == '1') checked @endif>
                                </div>

                            </td>
                            <td>
                                @if (action_permission('news', 'update') == true)
                                    <a href="{{ route('admin.news.edit', $item->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                @endif
                                @if (action_permission('news', 'delete') == true)
                                    @if ($confirming === $item->id)
                                        <button wire:click="kill({{ $item->id }})"
                                            class="btn btn-danger btn-sm">Sure?</button>
                                    @else
                                        <button wire:click="confirmDelete({{ $item->id }})"
                                            class="btn btn-danger btn-sm">Delete</button>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>


        {{ $news->links() }}
    </div>


</div>
