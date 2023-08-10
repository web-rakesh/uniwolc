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
                        @if (session('error'))
                            <div class="col-sm-12">
                                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}

                                </div>
                            </div>
                        @endif
                        <p class="card-description"> Agent form elements </p>
                        <form class="forms-sample" method="post" action="{{ route('admin.agent.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputName1"
                                    placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail3"
                                    placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhone">Phone</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputPhone"
                                    placeholder="Phone number">
                            </div>

                            <div class="form-group">
                                <label for="exampleAddress">Address</label>
                                <textarea class="form-control" name="address" id="exampleAddress" rows="4"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleCountry">Country</label>
                                <select class="form-select" name="country" id="exampleCountry">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputCity1">City</label>
                                <input type="text" name="city" class="form-control" id="exampleInputCity1"
                                    placeholder="City">
                            </div>
                            <div class="form-group">
                                <label for="examplePostalCode">Postal Code</label>
                                <input type="text" name="postal_code" class="form-control" id="examplePostalCode"
                                    placeholder="Postal Code">
                            </div>
                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
