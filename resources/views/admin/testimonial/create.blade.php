@extends('admin.layouts.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="page-header">
                {{-- <h3 class="page-title"> Blogs </h3> --}}
                <nav aria-label="breadcrumb">
                    {{-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol> --}}
                </nav>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="card-title">Basic form elements</h4>
                                       <p class="card-description"> Basic form elements </p> --}}
                        <form class="forms-sample"
                            action="{{ @$testimonial ? route('admin.testimonial.update', $testimonial->id) : route('admin.testimonial.store') }}"
                            enctype="multipart/form-data" method="post">
                            @if (@$testimonial)
                                @method('PUT')
                            @endif
                            @csrf

                            <div class="form-group">
                                <label for="testimonilaCategory">Testimonial Category</label>
                                <select class="form-select @error('category') is-invalid @enderror" name="category"
                                    id="testimonilaCategory">
                                    <option value="">Select Testimonial Category</option>
                                    <option value="1"
                                        {{ @$testimonial->category == '1' ? 'selected' : (old('category') == '1' ? 'selected' : '') }}>
                                        Student
                                    </option>
                                    <option value="2"
                                        {{ @$testimonial->category == '2' ? 'selected' : (old('category') == '2 ' ? 'selected' : '') }}>
                                        Recruitment Partners</option>
                                    <option value="3"
                                        {{ @$testimonial->category == '3' ? 'selected' : (old('category') == '3' ? 'selected' : '') }}>
                                        Education Partners
                                    </option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Label</label>
                                <input type="text" class="form-control @error('label') is-invalid @enderror"
                                    name="label" id="exampleInputName1"
                                    value="{{ @$testimonial->label ?? (old('label') ?? '') }}" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Title</label>
                                <input type="text" class="form-control  @error('title') is-invalid @enderror"
                                    name="title" id="exampleInputName1"
                                    value="{{ @$testimonial->title ?? (old('title') ?? '') }}" placeholder="Title">
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleTextarea1">Sub Title</label>
                                <input type="text" class="form-control" name="sub_title" id="exampleTextarea1"
                                  value="{{ @$testimonial->sub_title ?? old('sub_title') ?? '' }}"  rows="4" placeholder="Sub Title">
                            </div> --}}



                            <div class="form-group">
                                <label for="exampleTextarea6">Content</label>
                                <textarea class="form-control  @error('content') is-invalid @enderror" name="content" id="exampleTextarea6"
                                    rows="4" placeholder="Content">{{ @$testimonial->content ?? (old('content') ?? '') }}</textarea>

                            </div>

                            <div class="form-group">
                                <label for="">Testimonial Image</label>
                                <div class="input-group col-xs-12">
                                    <input type="file" name="testimonial_image"
                                        class="form-control file-upload-info  @error('testimonial_image') is-invalid @enderror"
                                        placeholder="Upload Image">

                                </div>
                                @if ($errors->has('testimonial_image'))
                                    <span class="error">{{ $errors->first('testimonial_image') }}</span><br>
                                @endif
                                @if (@$testimonial->testimonial_image_url)
                                    <img src="{{ $testimonial->testimonial_image_url }}" alt="" width="100px">
                                @endif
                            </div>

                            <button type="submit"
                                class="btn btn-gradient-primary me-2">{{ @$testimonial ? 'Update' : 'Submit' }}</button>
                            {{-- <button class="btn btn-light">Cancel</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
