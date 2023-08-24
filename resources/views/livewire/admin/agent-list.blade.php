<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-0">
                <h4 class="card-title">Agent Table</h4>
                <div class="row mb-2">
                    <div class="col-md-9 col-12 mb-2">
                        <input wire:model="searchItem" type="text" class="form-control" placeholder="Search Agents...">
                    </div>
                    <div class="col-md-3 col-12 mb-2">
                        <a href="{{ route('admin.agent.create') }}" class="d-inline-flex align-items-center justify-content-center btn btn-primary btn-sm w-100 h-100">Add</a>
                    </div>
                </div>
                 <div class="row mb-2">
                    <div class="col-md-4 mb-2">
                        <select wire:model="country_id" class="form-select">
                            <option value="">Select Country</option>
                            @foreach ($countries as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <select wire:model="state_id" class="form-select">
                            <option value="">Select State</option>
                            @foreach ($states ?? [] as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <select wire:model="city_id" class="form-select">
                            <option value="">Select City</option>
                            @forelse ($cities ?? [] as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>

                </div>
                <div class="table-responsive responsive_table_area">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Name </th>
                                <th> Email </th>
                                <th> Country </th>
                                <th> State </th>
                                <th> Created_at </th>
                                <th> Referral </th>
                                <th> Verify </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($agents ?? [] as $agent)
                                <tr class="table_item">
                                    <td data-title="#" class="py-1" class="copyToClipBoard">
                                        {{ $agent->agent_id }}
                                    </td>
                                    <td data-title="Name">
                                        @if (action_permission('agent', 'view') == true)
                                            <a
                                                href="{{ route('admin.agent.profile', $agent->user_id) }}">{{ $agent->name }}</a>
                                        @else
                                            {{ $agent->name }}
                                        @endif
                                    </td>
                                    <td data-title="Email"> {{ $agent->email }} </td>
                                    <td data-title="Country"> {{ $agent->getCountry->name ?? '' }} </td>
                                    <td data-title="Country"> {{ $agent->getState->name ?? '' }} </td>
                                    <td data-title="Created_at"> {{ date('M d, Y', strtotime($agent->created_at)) }}
                                    </td>

                                    <td data-title="Referral">
                                        <button class="copyToClipBoard">
                                            {{-- <span class="mdi mdi-clipboard"></span> --}}
                                            <i class="fa fa-clone" aria-hidden="true"></i>
                                            <input type="hidden" class="code" value="{{ $agent->agent_id }}">
                                        </button>
                                    </td>
                                    <td data-title="Verify">
                                        <div class="form-check form-switch justify-content-center">
                                            <input class="form-check-input customeFormCheck" type="checkbox"
                                                wire:change="changeStatus({{ $agent }},$event.target.value)"
                                                role="switch" value="{{ $agent->is_verify }}"
                                                @if ($agent->is_verify == '1') checked @endif>
                                        </div>

                                    </td>
                                    <td data-title="Action">
                                        @if (action_permission('agent', 'view') == true)
                                            <a href="{{ route('admin.agent.profile', $agent->user_id) }}"
                                                class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('admin.agent.create', ['id' => $agent->user_id]) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                        @endif
                                        @if (action_permission('agent', 'delete') == true)
                                            @if ($confirming === $agent->id)
                                                <button wire:click="kill({{ $agent->id }})"
                                                    class="btn btn-danger btn-sm">Sure?</button>
                                            @else
                                                <button wire:click="confirmDelete({{ $agent->id }})"
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
                {{ $agents->links() }}
            </div>
        </div>

    </div>
</div>

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.10/clipboard.min.js"></script>
    <script>
        // Your JS here.

        var $temp = $("<input>");
        // var $url = $(location).attr('href');

        $('.copyToClipBoard').on('click', function() {
            var row = $(this).closest("tr");
            var copyText = row.find(".code");
            // copyText.val().select();
            var url = window.location.origin + '/register/?referralId=' + copyText.val();
            $("body").append($temp);
            $temp.val(url).select();
            document.execCommand("copy");
            $temp.remove();
            // $("p").text("URL copied!");
        })
    </script>
@endpush
