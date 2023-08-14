<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Agent Table</h4>
                <div class="row">
                    <div class="col-9">
                        <input wire:model="searchItem" type="text" class="form-control" placeholder="Search Agents...">
                    </div>
                    <div class="col-3">
                        <a href="{{ route('admin.agent.create') }}" class="btn btn-primary btn-sm">Add</a>
                    </div>
                </div>
                </p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Country </th>
                            <th> Created_at </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($agents ?? [] as $agent)
                            <tr>
                                <td class="py-1">
                                    {{ $agent->agent_id }}
                                </td>
                                <td>
                                    @if (action_permission('agent', 'view') == true)
                                        <a
                                            href="{{ route('admin.agent.profile', $agent->user_id) }}">{{ $agent->name }}</a>
                                    @else
                                        {{ $agent->name }}
                                    @endif
                                </td>
                                <td> {{ $agent->email }} </td>
                                <td> {{ get_country($agent->country) }} </td>
                                <td> {{ date('M d, Y', strtotime($agent->created_at)) }} </td>
                                <td>
                                    @if (action_permission('agent', 'view') == true)
                                        <a href="{{ route('admin.agent.profile', $agent->user_id) }}"
                                            class="btn btn-info btn-sm">View</a>
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

                {{ $agents->links() }}
            </div>
        </div>

    </div>
</div>
