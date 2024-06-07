<?php
use Illuminate\Support\Facades\Session;
?>
@extends('layouts.dashboard')

@section('content')
          <!--main content start-->


    <section id="main-content">
        <section class="wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-edit"></i>Add  new Category</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="/dashboard/home">Home</a></li>
                <li><i class="fa fa-question"></i>Category</li>
              <li><i class="fa fa-plus"></i>Add</li>
              </ol>
            </div>
          </div>


          <!-- edit-profile -->
<div id="edit-profile" class="tab-pane">
  <section class="panel">
    <div class="panel-body bio-graph-info">
        @if (session()->has('errors'))
            @foreach ($errors as $error)
                {{$error}}
            @endforeach
        @endif
      @if(\Session::has('message'))

      <p class="alert
      {{ Session::get('alert-class', 'alert-success') }}">{{Session::get('message') }}</p>

      @endif
      <form  method="POST" action="{{ route('category.store')}}" >
          @csrf

          <div class="form-group">
            <label for="title">Category Title</label>
            <input name="title" type="text" class="form-control" />
            @error('title')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

                <div class="form-group">
                    <label for="image">Category Image</label>
                    <input name="image" type="file" class="form-control" name="post-image" />
                </div>
                <div class="form-group">
                    <label class="col-lg-2 form-control"> Category Description</label>
                    <textarea
                    class="form-control"
                    name="desc"
                    id=""
                    rows="10"
                    required
                    ></textarea>
                    @error('title')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-2 mb-lg-5">
                    Create post
                </button>
                <button type="reset" class="btn btn-danger mt-2 mb-lg-5">Reset</button>
                </form>
                <div></div>

            </div>
              </form>
    </div>
  </section>
</div>


        </section>
      </section>
      <!--main content end-->

@endsection
