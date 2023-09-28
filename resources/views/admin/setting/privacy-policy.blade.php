@extends('admin.layouts.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3>Privacy Policy</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @include('flash-messages')
                        <form action="{{ route('admin.setting.privacy.policy.store') }}" method="post"
                            id="add-pirvacy-policy">
                            @csrf
                            <div class="form-group">
                                <label class="labels">privacy policy</label>
                                <div id="privacy_policy">

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
        var privacyPolicy = new Quill('#privacy_policy', {
            theme: 'snow'
        });

        privacyPolicy.root.innerHTML = `{!! $privacy_policy ?? '' !!}`;


        document.getElementById('add-pirvacy-policy').addEventListener('submit', function(e) {
            var editorPrivacyPolicy = privacyPolicy.root.innerHTML;

            // Set the content as the value of a hidden input field in the form
            var hiddenPrivacyPolicy = document.createElement('input');
            hiddenPrivacyPolicy.setAttribute('type', 'hidden');
            hiddenPrivacyPolicy.setAttribute('name', 'privacy_policy');
            hiddenPrivacyPolicy.setAttribute('value', editorPrivacyPolicy);
            this.appendChild(hiddenPrivacyPolicy);
        });
    </script>
@endpush
