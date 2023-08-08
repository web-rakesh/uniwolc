   @extends('admin.layouts.layout')
   @push('css')
       <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
   @endpush
   @section('content')
       <div class="content-wrapper">
           <div class="row">
               <div class="page-header">
                   <h3 class="page-title"> Blogs </h3>
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
                           <div class="col-12 grid-margin stretch-card">
                               <div class="card">
                                   <div class="card-body">
                                       {{-- <h4 class="card-title">Basic form elements</h4>
                                       <p class="card-description"> Basic form elements </p> --}}
                                       <form class="forms-sample" id="blog-form"
                                           action="{{ route('admin.blog.update', $blog->id) }}" enctype="multipart/form-data"
                                           method="post">
                                           @csrf
                                           <div class="form-group">
                                               <label for="exampleInputName1">Title</label>
                                               <input type="text" class="form-control" name="title"
                                                   id="exampleInputName1" placeholder="Title" value="{{ $blog->title }}">
                                           </div>
                                           <div class="form-group">
                                               <label for="exampleTextarea1">Sub Title</label>
                                               <textarea class="form-control" name="sub_title" id="exampleTextarea1" rows="4" placeholder="Sub Title">{{ $blog->sub_title }}</textarea>
                                           </div>
                                           <div class="form-group">
                                               <label for="">Blog Image</label>
                                               <div class="input-group col-xs-12">
                                                   <input type="file" name="blog_image"
                                                       class="form-control file-upload-info" placeholder="Upload Image">

                                               </div>

                                               <div class="col-md-12">
                                                   <div class="row mt-3 mb-3">
                                                       <div class="col-md-6">
                                                           <img src="{{ $blog->profile_url }}" alt=""
                                                               width="150">
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label for="exampleTextarea4">Description</label>
                                                   <div id="description">
                                                       <!-- The Quill editor will be placed here -->
                                                   </div>
                                               </div>

                                               <div class="form-group">
                                                   <label for="exampleTextarea6">Content</label>
                                                   <div id="editor-container">
                                                       <!-- The Quill editor will be placed here -->
                                                   </div>
                                               </div>


                                               <div class="form-group">
                                                   <label for="meta_tag">Meta Tag</label>
                                                   <input type="text" class="form-control" name="meta_tag" id="meta_tag"
                                                       placeholder="Meta Tag" value="{{ $blog->meta_tag }}">
                                               </div>

                                               <div class="form-group">
                                                   <label for="meta_description">Meta Description</label>
                                                   <textarea type="text" class="form-control" name="meta_description" id="meta_description"
                                                       placeholder="Meta description">{{ $blog->meta_description }}</textarea>
                                               </div>


                                               <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                                               <button class="btn btn-light">Cancel</button>
                                       </form>
                                   </div>
                               </div>
                           </div>

                       </div>
                   </div>
               </div>
           </div>
       </div>
   @endsection

   @push('js')
       <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
       <!-- Initialize Quill editor -->
       <script>
           // Initialize Quill editor
           var quill = new Quill('#editor-container', {
               theme: 'snow' // or 'bubble' if you prefer a different theme
           });
           var description = new Quill('#description', {
               theme: 'snow' // or 'bubble' if you prefer a different theme
           });

           // Optional: If you want to set the initial content of the editor
           quill.root.innerHTML = "{!! $blog->content !!}";
           description.root.innerHTML = "{!! $blog->description !!}";

           // Capture the content when the form is submitted
           document.getElementById('blog-form').addEventListener('submit', function(e) {
               // Get the HTML content from the editor
               var editorContent = quill.root.innerHTML;
               var editorDescription = description.root.innerHTML;

               // Set the content as the value of a hidden input field in the form
               var hiddenInput = document.createElement('input');
               hiddenInput.setAttribute('type', 'hidden');
               hiddenInput.setAttribute('name', 'content');
               hiddenInput.setAttribute('value', editorContent);
               this.appendChild(hiddenInput);

               // Set the content as the value of a hidden input field in the form
               var hiddenDescriptionInput = document.createElement('input');
               hiddenDescriptionInput.setAttribute('type', 'hidden');
               hiddenDescriptionInput.setAttribute('name', 'description');
               hiddenDescriptionInput.setAttribute('value', editorDescription);
               this.appendChild(hiddenDescriptionInput);
           });
       </script>
   @endpush
