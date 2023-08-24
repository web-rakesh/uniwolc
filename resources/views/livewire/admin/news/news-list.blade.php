<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="row">
        <div class="col-md-9 col-12 mb-2">
            <input wire:model="searchItem" type="search" class="form-control" placeholder="Search Level Name...">
        </div>

        <div class="col-md-3 col-12 mb-2">
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
        <div class="table-responsive responsive_table_area">
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
                        <tr class="table_item">
                            <td data-title="#" class="py-1">
                                {{ $loop->iteration }}
                            </td>
                            <td data-title="Title">
                                    @if (action_permission('news', 'update') == true)
                                    <a href="{{ route('admin.news.edit', $item->id) }}"
                                 >{{ $item->title }}</a>
                                 @else
                                    {{ $item->title }}
                                @endif

                            </td>
                            <td data-title="Sub Title"> {{ $item->sub_title }} </td>
                            <td data-title="Created_at"> {{ date('M d, Y', strtotime($item->created_at)) }} </td>
                            <td data-title="Status">
                                <div class="form-check form-switch justify-content-center">
                                    <input class="form-check-input" type="checkbox"
                                        wire:change="changeStatus({{ $item }},$event.target.value)"
                                        role="switch" value="{{ $item->block }}"
                                        @if ($item->block == '1') checked @endif>
                                </div>

                            </td>
                            <td data-title="Action">
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
