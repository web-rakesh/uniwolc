@extends('university.layouts.layout')
@section('content')
    <section class="dashboardPgaesSec bg-white">
        <div class="container rounded ">
            <div class="dashboardPgaesSecinner">
                <div class="row rowBox">
                    <div class="col-md-9 border-right dasboardrightPart">
                        <div class="dasboardrightPartWrapper">
                            <div class="card shadow1 p-3 py-5 mb-0 bg-white border-0 rounded dasboardrightPartWrapperinner">
                                <h4 class="card-title text-center1 mb-0"> {{ $data }}</h4>
                                <hr>
                                <p class="text-muted">*Instructions</p>
                                {{-- {{ route('university.application-requirement.store') }} --}}
                                <div class="card-body p-0 ">
                                    <div class="p-3a py-2">
                                        <form id="myForm" method="post"
                                            action="{{ route('university.application-requirement.store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="requirement" value="{{ $data }}">
                                            <div id="dynamicFields">
                                                <div class="form-group">
                                                    <label for="field1">Instruction 1</label>
                                                    <input type="text" name="instruction[]" class="form-control"
                                                        id="field1" name="field1">
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary" onclick="addField()">Add
                                                Field</button>
                                            <button type="button" class="btn btn-danger" onclick="removeField()">Remove
                                                Field</button>
                                            <br><br>
                                            <div class="form-group">
                                                <label for="fileUpload">File Upload</label>
                                                <input type="file" class="form-control-file" name="document_upload"
                                                    id="fileUpload" name="fileUpload">
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>

    <script>
        let fieldCounter = 1;

        function addField() {
            fieldCounter++;

            let newField = `<div class="form-group">
                        <label for="field${fieldCounter}">Instruction ${fieldCounter}</label>
                        <input type="text" class="form-control" id="field${fieldCounter}" name="field${fieldCounter}">
                      </div>`;

            $("#dynamicFields").append(newField);
        }

        function removeField() {
            if (fieldCounter > 1) {
                $(`#field${fieldCounter}`).parent().remove();
                fieldCounter--;
            }
        }
    </script>
@endpush
