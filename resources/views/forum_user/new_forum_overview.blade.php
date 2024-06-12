@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="breadcrumb">
      <a href="/" class="breadcrumb-item">Categories</a>
      <a href="{{route('category.overview', $forum->category->id)}}" class="breadcrumb-item">{{$forum->category->title}}</a>
      <span class="breadcrumb-item active">{{$forum->title}}</span>
    </nav>

    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <!-- Category one -->
          <div class="col-lg-12">
            <!-- second section  -->
            <h4 class="text-white bg-dark mb-0 p-4 rounded-top"> {{$forum->title}}</h4>

            <table class="table table-striped table-responsivelg table-bordered">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Topic</th>
                  <th scope="col ">Created</th>
                  <th scope="col">Statistics</th>
                </tr>
              </thead>
              <tbody>
                @if(isset($forum->discussion) && is_countable($forum->discussion) && count($forum->discussion) > 0)
                    @foreach ($forum->discussion as $topic )
                    <tr>
                    <td>
                        <h3 class="h6">
                        <span class="badge badge-primary">7 unread</span>
                        <a href="{{route('topic', $topic->id)}}" class="">{{$topic->title}}</a>
                        </h3>

                    </td>
                    <td>
                        <div>by <a href="#">{{$topic->user->name}}</a></div>
                        <div>{{$topic->created_at}}</div>
                    </td>
                    <td>
                        <div>{{$topic->reply->count()}} replies</div>
                        <div>{{$topic->views}}  views</div>
                    </td>
                    </tr>
                    @endforeach

                @else
                      <p>No Topics Found in this Forum</p>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <a href="{{route('create.discussion', $forum->id)}}" class="btn btn-lg btn-primary mb-2">New Discussion</a>
  </div>

@endsection
