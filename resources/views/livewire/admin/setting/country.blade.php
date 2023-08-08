<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Grading Schema Table</h4>
                <div class="row">
                    <div class="col-9">
                        <input wire:model="searchItem" type="search" class="form-control"
                            placeholder="Search Level Name...">
                    </div>

                    <div class="col-3">
                        <select wire:model="blockStatus" class="form-select">
                            <option value="">Select Status</option>
                            <option value="1">Blocked</option>
                            <option value="2">Unblocked</option>
                        </select>
                    </div>
                    </p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Short Code </th>
                                <th> Name </th>
                                <th> Phone Code </th>
                                <th> Created_at </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($countries ?? [] as $country)
                                <tr>
                                    <td class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td> {{ $country->code }} </td>
                                    <td> {{ $country->name }} </td>
                                    <td> +{{ $country->phonecode }} </td>
                                    <td> {{ date('M d, Y', strtotime($country->created_at)) }} </td>
                                    <td>
                                        <div class="form-check form-switch justify-content-center">
                                            <input class="form-check-input" type="checkbox"
                                                wire:change="changeStatus({{ $country }},$event.target.value)"
                                                role="switch" value="{{ $country->block }}"
                                                @if ($country->block == '1') checked @endif>
                                        </div>

                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>

                    {{ $countries->links() }}
                </div>
            </div>

        </div>


    </div>
