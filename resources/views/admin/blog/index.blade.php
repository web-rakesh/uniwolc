   @extends('admin.layouts.layout')
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
                           @livewire('admin.blog.blog')

                       </div>
                   </div>
               </div>
           </div>
       </div>
   @endsection
