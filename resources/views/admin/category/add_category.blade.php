@extends('layouts.admin_auth')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add New Category</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Category</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="card">
                <div class="card-body">
                    @if (session()->has('errors'))
                        @foreach ($errors as $error)
                            {{$error}}
                        @endforeach
                    @endif
                    @if(\Session::has('message'))

                    <p class="alert
                    {{ Session::get('alert-class', 'alert-success') }}">{{Session::get('message') }}</p>

                    @endif

                    <h4 class="card-title">Add New Category</h4>
                    <p></p>
                    <form method="POST" action="{{ route('category.store')}}" >
                        @csrf
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label" for="title">Category Title</label>
                        <div class="col-sm-10">
                            <input name="title" class="form-control" type="text"  id="example-text-input">
                        </div>
                    </div>
                    <div class="col-lg-10">
                        @error('title')
                            <p class="alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- end row -->
                    <div class="mb-3">
                        <label>Category Description</label>
                        <div>
                            <textarea name="desc"  class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        @error('desc')
                            <p class="alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- end row -->
                    <div class="mb-0">
                        <div>
                            <button type="submit" class="btn btn-dark waves-effect waves-light me-1">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect">
                                Cancel
                            </button>
                        </div>
                    </div>
                    <!-- end row -->
                </form>
                    
                </div>
            </div> 

        </div>
            
    
</div>
<!-- end main content-->

</div>
@endsection


