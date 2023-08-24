<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-0">
                <h4 class="card-title">Grading Schema Table</h4>
                <div class="row">
                    <div class="col-md-9 col-12 mb-2">
                        <input wire:model="searchItem" type="search" class="form-control"
                            placeholder="Search Level Name...">
                    </div>

                    <div class="col-md-3 col-12 mb-0">
                        <select wire:model="blockStatus" class="form-select">
                            <option value="">Select Status</option>
                            <option value="1">Blocked</option>
                            <option value="2">Unblocked</option>
                        </select>
                    </div>
                    </div>
					<div class="table-responsive responsive_table_area mb-3">
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
                                 <tr class="table_item">
                                    <td data-title="#" class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td data-title="Short Code"> {{ $country->code }} </td>
                                    <td data-title="Name"> {{ $country->name }} </td>
                                    <td data-title="Phone Code"> +{{ $country->phonecode }} </td>
                                    <td data-title="Created_at"> {{ date('M d, Y', strtotime($country->created_at)) }} </td>
                                    <td data-title="Action">
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
					</div>

                    {{ $countries->links() }}
                </div>
            </div>

        </div>


    </div>
