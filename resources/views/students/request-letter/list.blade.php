@extends('students.layouts.layout')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card mt-3">
        <div class="card">
            <div class="card-body">
                <div>
                    @include('flash-messages')
                </div>
                <h4 class="card-title">Letter Request List</h4>
                {{-- <div class="row">

                    <div class="col-md-4">
                        <input name="searchItem" type="search" class="form-control" placeholder="Search...">
                    </div>
                </div> --}}
                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> School Name </th>
                                <th> Email </th>
                                <th> Subject </th>
                                <th> Country </th>
                                <th> Created_at </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($requestLetters ?? [] as $letter)
                                <tr>
                                    <td class="py-1">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ Str::limit($letter->university->university_name ?? '', $limit = 40, '...') }}
                                    </td>
                                    <td> {{ $letter->email }} </td>
                                    <td> {{ $letter->subject }} </td>
                                    <td> {{ $letter->university->getCountry->name ?? '' }} </td>
                                    <td> {{ date('M d, Y', strtotime($letter->created_at)) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('student.request.letter.student.show', ['id' => $letter->id, 'school' => Str::slug($letter->university->university_name)]) }}"
                                            class="btn btn-info btn-sm">View</a>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Data Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>


                {{-- {{ $transactions->links() }} --}}
            </div>
        </div>

    </div>
@endsection
