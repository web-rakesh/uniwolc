@extends("$layout.layouts.layout")
@section('content')
    <section class="sub-new-awolc-bg">
        <div class="container">
            <div>
                @include('flash-messages')
            </div>
            <div class="row justify-content-center">

                <div class="col-md-6">
                    <h2 class="mb-4">Request Letter Form</h2>
                    <form action="{{ route('student.request.letter.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="student_id">Country <small class="text-danger">*</small></label>
                            <select class="form-control" id="country" name="country" required>
                                <option value="">Select Country</option>
                                @foreach ($countries ?? [] as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="university">University <small class="text-danger">*</small></label>
                            <select class="form-control" id="university" name="university" required>
                                <option value="">Select University</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Name <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="name" name="student_name"
                                value="{{ auth()->user()->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email <small class="text-danger">*</small></label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ auth()->user()->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message <small class="text-danger">*</small></label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="message">File</label>
                            <input type="file" class="form-control" id="file" name="request_letter">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#country').change(function() {
                var countryId = $(this).val();

                if (countryId) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('student.request.letter.university') }}",
                        type: 'POST',
                        data: {
                            country_id: countryId
                        },
                        dataType: 'json',

                        success: function(data) {
                            // console.log(data);
                            $('#university').empty();
                            $('#university').append(
                                '<option value="">Select University</option>');
                            $.each(data, function(key, value) {
                                $('#university').append('<option value="' + value.id +
                                    '">' + value.university_name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#state').empty();
                    $('#state').append('<option value="">Select State</option>');
                }
            });
        });
    </script>
@endpush
