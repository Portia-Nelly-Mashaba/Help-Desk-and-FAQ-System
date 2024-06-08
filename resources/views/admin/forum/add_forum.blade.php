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
                <h3 class="page-header"><i class="fa fa-edit"></i>Add New Forum > Home > Forum > Add</h3>
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
      <form  method="POST" action="{{ route('forum.store')}}" >
          @csrf

          <div class="form-group">
            <label class="col-lg-2" for="title">Forum Title</label>
            <div class="col-lg-10">
            <input name="title" type="text" class="form-control" />
            </div>
        </div>
        <div class="col-lg-10">
            @error('title')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>


        <div class="form-group">
            <label class="col-lg-2" for="image">Select Category</label>
            <div class="col-lg-10">
            <select name="category_id">
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
        

        <div class="form-group">
            <label class="col-lg-2" form-control"> Forum Description</label>
            <div class="col-lg-10">
            <textarea
            class="form-control"
            name="desc">
            </textarea>
            </div>

            <input type="number" value="{{auth()->id()}}" name="user_id" hidden>

        </div>
        <div class="col-lg-10">
            @error('desc')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
            
        
        <button type="submit" class="btn btn-primary mt-2 mb-lg-5">Add Forum</button>
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
