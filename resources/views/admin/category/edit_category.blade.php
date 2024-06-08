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
              <h3 class="page-header"><i class="fa fa-edit"></i>Edit Category > Home > Category > Edit</h3>
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

      @If ($category)

      <form  method="POST" action="{{ route('category.update', $category->id)}}" >
          @csrf

          <div class="form-group">
            <label class="col-lg-2" for="title">Category Title</label>
            <div class="col-lg-10">
            <input name="title" value="{{ $category->title}}" type="text" class="form-control" />
            </div>
        </div>


        <div class="form-group">
            <label class="col-lg-2" form-control"> Category Description</label>
            <div class="col-lg-10">
            <textarea class="form-control" name="desc">{{ $category->desc }}</textarea>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary mt-2 mb-lg-5">Update</button>
        
        </form>
        <div></div>

            </div>
    </form>
    @endif

    </div>
  </section>
</div>


        </section>
      </section>
      <!--main content end-->

@endsection
