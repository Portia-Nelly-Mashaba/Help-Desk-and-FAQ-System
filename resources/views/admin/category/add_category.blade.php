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
                <h3 class="page-header"><i class="fa fa-edit"></i>Add New Category > Home > Category > Add</h3>
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
            <label class="col-lg-2" for="title">Category Title</label>
            <div class="col-lg-10">
            <input name="title" type="text" class="form-control" />
            </div>
        </div>
        <div class="col-lg-10">
            @error('title')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

        {{-- Image if you include --}}

        {{-- <div class="form-group">
            <label class="col-lg-2" for="image">Category Image</label>
            <div class="col-lg-10">
            <input name="image" type="file" class="form-control" name="post-image" />
            </div>
        </div>
        <div class="col-lg-10">
            @error('image')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div> --}}
        

        <div class="form-group">
            <label class="col-lg-2" form-control"> Category Description</label>
            <div class="col-lg-10">
            <textarea
            class="form-control"
            name="desc">
            </textarea>
            </div>
        </div>
        <div class="col-lg-10">
            @error('desc')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
            
        
        <button type="submit" class="btn btn-primary mt-2 mb-lg-5">
            Add
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
