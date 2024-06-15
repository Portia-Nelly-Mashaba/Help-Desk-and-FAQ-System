@extends('layouts.admin_auth')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add New Forum</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Forum</li>
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

                                    <h4 class="card-title">Add New Forum</h4>
                                    <p class="card-title-desc">short description of a Forum</p>

                                    <form  method="POST" action="{{ route('forum.store')}}" >
                                        @csrf
                                        <div class="mb-3">
                                            <label>Forum Name</label>
                                            <input name="title" type="text" class="form-control">
                                        </div>
                                        <div class="col-lg-10">
                                            @error('title')
                                                <p class="alert alert-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Select Category</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="category_id">
                                                    @foreach ($categories as $category)
                                                        <option value="{{$category->id}}">{{ $category->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            @error('category_id')
                                                <p class="alert alert-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label>Category Description</label>
                                            <div>
                                                <textarea name="desc"  class="form-control" rows="5"></textarea>
                                            </div>

                                            <input type="number" value="{{auth()->id()}}" name="user_id" hidden>
                                        </div>
                                        <div class="col-lg-10">
                                            @error('desc')
                                                <p class="alert alert-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

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
                                    </form>

                                </div>
                            </div>
                        </div> <!-- end col
                    <!-- end row -->
                    {{-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Select</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                </select>
                        </div>
                    </div> --}}
                </form>
                    <!-- end row -->
                </div>
            </div> 
                           <!-- end row -->
            </div>
            
    
</div>
<!-- end main content-->

</div>
@endsection


