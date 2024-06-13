@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="breadcrumb">
      <a href="/" class="breadcrumb-item">Categories</a>
      <a href=" {{route('category.overview', $discussion->forum->category->id)}}" class="breadcrumb-item">{{$discussion->forum->category->title}}</a>
      <a href="{{route('forum.overview', $discussion->forum->id)}}" class="breadcrumb-item">{{$discussion->forum->title}}</a>
      <span class="breadcrumb-item active">{{$discussion->title}}</span>
    </nav>

    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <!-- Category one -->
          <div class="col-lg-12">
            <!-- second section  -->
            <h4 class="text-white bg-dark mb-0 p-4 rounded-top">
                {{$discussion->title}}
            </h4>
            <table
              class="table table-striped table-responsivelg table-bordered"
            >
              <thead class="thead-light">
                <tr>
                  <th scope="col">Author</th>
                  <th scope="col">Message</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="author-col">
                    <div>by<a href="#"> {{$discussion->user->name}}</a></div>
                  </td>
                  <td class="post-col d-lg-flex justify-content-lg-between">
                    <div>
                      <span class="font-weight-bold">Post subject:</span>
                      {{$discussion->title}}
                    </div>
                    <div>
                      <span class="font-weight-bold">Posted:</span> {{$discussion->created_at->diffForHumans()}}
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div>
                      <span class="font-weight-bold">Joined:</span>{{$discussion->user->created_at->diffForHumans()}}
                    </div>
                    <div>
                      <span class="font-weight-bold">Number of Posts:</span>{{count($discussion->user->topics)}}
                    </div>
                  </td>
                  <td>
                    <p>
                      {{$discussion->desc}}
                    </p>

                  </td>
                </tr>
              </tbody>
            </table>

            @if(isset($discussion->reply) && is_countable($discussion->reply) && count($discussion->reply) > 0)
            @foreach ($discussion->reply as $reply)
                <table class="table table-striped table-responsivelg table-bordered">
                    <tbody>
                        <tr>
                            <td class="author-col">
                                <div>by <a href="#">{{$reply->user->name}}</a></div>
                            </td>
                            <td class="post-col d-lg-flex justify-content-lg-between">
                                <div>
                                    <span class="font-weight-bold">Post subject:</span>
                                    {{$discussion->title}}
                                </div>
                                <div>
                                    <span class="font-weight-bold">Replied:</span> {{$reply->created_at->diffForHumans()}}
                                </div>
                                @if(auth()->id() == $reply->user_id)
                                <div>
                                    <a href="{{route('delete.reply', $reply->id)}}"><i class="fa fa-trash text-dark"></i></a>
                                    {{-- <a href="{{route('delete.reply', $reply->id)}}" class="btn btn-dark">Delete</a> --}}
                                </div>
                                @else
                                <div>
                                    <a href="{{route('like.reply', $reply->id)}}" class="mr-3"><i class="fa fa-thumbs-up text-dark"></i>20</a>
                                    {{-- <a href="{{route('like.reply', $reply->id)}}" class="btn btn-dark">Like</a> --}}
                                    <a href="{{route('dislike.reply', $reply->id)}}"><i class="fa fa-thumbs-down text-dark"></i>16</a>
                                    {{-- <a href="{{route('dislike.reply', $reply->id)}}" class="btn btn-dark">Dislike</a> --}}
                                </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <span class="font-weight-bold">Joined:</span>{{$reply->user->created_at->diffForHumans()}}</span>
                                </div>
                            </td>
                            <td>
                                <p>
                                    {{$reply->desc}}
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endforeach
        @else
            <h3>No replies to this discussion!</h3>
        @endif
          </div>
        </div>
      </div>
    </div>


    <form action="{{route('reply.discussion', $discussion->id)}}" class="mb-3" method="POST">
        @csrf
      <div class="form-group">
        <label for="comment">Reply to this post</label>
        <textarea
          class="form-control"
          name="desc"
          rows="10"
          required
        ></textarea>
        <button type="submit" class="btn btn-primary mt-2 mb-lg-5">
          Submit reply
        </button>
        <button type="reset" class="btn btn-danger mt-2 mb-lg-5">
          Reset
        </button>
      </div>
    </form>
</div>
    {{-- <div>
      <div class="d-lg-flex align-items-center mb-3">
        <form
          action=""
          class="form-inline d-block d-sm-flex mr-2 mb-3 mb-lg-0"
        >
          <div class="form-group mr-2 mb-3 mb-md-0">
            <label for="email" class="mr-2">Email:</label>
            <input
              type="email"
              class="form-control"
              placeholder="example@gmail.com"
              required
            />
          </div>

          <div class="form-group mr-2 mb-3 mb-md-0">
            <label for="password" class="mr-2">Password:</label>
            <input
              type="password"
              class="form-control"
              name="password"
              required
            />
          </div>

          <button class="btn btn-primary">Login</button>
        </form>
        <span class="mr-2">or...</span>
        <button class="btn btn-success">Create Account</button>
      </div>
    </div>
    <p class="small">
      <a href="#">Have you forgotten your account details?</a>
    </p>
  </div> --}}



@endsection
