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
                <h3 class="page-header"><i class="fa fa-edit"></i>Edit Forum > Home > Forum > Edit</h3>
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
      <form  method="POST" action="{{ route('forum.update', $forum->id)}}" >
          @csrf

          <div class="form-group">
            <label class="col-lg-2" for="title">Forum Title</label>
            <div class="col-lg-10">
            <input name="title" type="text" class="form-control" value="{{$forum->title}}"/>
            </div>
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

        <div class="form-group">
            <label class="col-lg-2" form-control"> Forum Description</label>
            <div class="col-lg-10">
            <textarea class="form-control" name="desc"> {{ $forum->desc }} </textarea>
            </div>

            <input type="number" value="{{auth()->id()}}" name="user_id" hidden>

        </div>


        <button type="submit" class="btn btn-primary mt-2 mb-lg-5">Update Forum</button>
        <a href="/admin/dashboard/forums" class="btn btn-danger">Cancel</a>
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
