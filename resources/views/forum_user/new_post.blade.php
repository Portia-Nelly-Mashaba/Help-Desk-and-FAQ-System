@extends('layouts.app')

@section('content')

<div class="container">
    <nav class="breadcrumb">
      <a href="/" class="breadcrumb-item">Categories</a>
      <a href="{{route('category.overview', $forum->category->id)}}" class="breadcrumb-item">{{$forum->category->title}}</a>
      <a href="#" class="breadcrumb-item">{{$forum->title}}</a>
      <span class="breadcrumb-item active">New Discussion</span>
    </nav>

    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <!-- Category one -->
          <div class="col-lg-12">
            <!-- second section  -->
            <h4 class="text-white bg-dark mb-0 p-4 rounded">Create New Discussion</h4>
          </div>
        </div>
      </div>
    </div>

    <form action="{{route('store.discussion')}}" class="mb-3" method="POST">
        @csrf
      <div class="form-group">
        <label for="title">Topic Name</label>
        <input name="title" type="text" class="form-control" />
      </div>
      <div class="form-control">
        <select name="forum_id" class="form-control">
            @foreach ($forums as $forum)
            <option value="{{$forum->id}}">{{$forum->title}}</option>
            @endforeach

        </select>
      </div>
      <div class="form-group">
        <textarea
          class="form-control"
          name="desc"
          id=""
          rows="10"
          required
        ></textarea>
      </div>
      <div class="form-check">
        <label class="form-check-label">
          <input name="notify" type="checkbox" class="form-check-input"/>
          Notify me upon reply
        </label>
      </div>

      <button type="submit" class="btn btn-primary mt-2 mb-lg-5">
        Create Topic
      </button>
      <button type="reset" class="btn btn-danger mt-2 mb-lg-5">Reset</button>
    </form>
    <div></div>

  </div>

@endsection
