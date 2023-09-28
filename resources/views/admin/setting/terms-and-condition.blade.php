@extends('admin.layouts.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3>Terms and Condition</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @include('flash-messages')
                        <form action="{{ route('admin.setting.terms.and.condition.store') }}" method="post"
                            id="add-terms-and-condition">
                            @csrf
                            <div class="form-group">
                                <label class="labels">terms and condition</label>
                                <div id="terms_and_condition">

                                </div>
                            </div>
                            <input type="submit" value="Save" class="btn btn-primary mt-3">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        var termsAndCondition = new Quill('#terms_and_condition', {
            theme: 'snow'
        });

        termsAndCondition.root.innerHTML = `{!! $terms_and_condition ?? '' !!}`;


        document.getElementById('add-terms-and-condition').addEventListener('submit', function(e) {
            var editortermsAndCondition = termsAndCondition.root.innerHTML;

            // Set the content as the value of a hidden input field in the form
            var hiddentermsAndCondition = document.createElement('input');
            hiddentermsAndCondition.setAttribute('type', 'hidden');
            hiddentermsAndCondition.setAttribute('name', 'terms_and_condition');
            hiddentermsAndCondition.setAttribute('value', editortermsAndCondition);
            this.appendChild(hiddentermsAndCondition);
        });
    </script>
@endpush
