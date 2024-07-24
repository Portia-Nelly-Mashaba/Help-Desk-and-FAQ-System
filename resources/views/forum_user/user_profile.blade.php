@extends('layouts.app')

@section('content')

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset($user->profile_photo) }}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ $user->name }}</h3>

                        <p class="text-muted text-center">{{ $user->email }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Posts</b> <a class="float-right">{{ $user->topics->count() }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Comments</b> <a class="float-right">{{ $user->reply->count() }}</a>
                            </li>
                            {{-- <li class="list-group-item">
                                <b>Likes</b> <a class="float-right">{{ $user->likes->count() }}</a>
                            </li> --}}
                        </ul>

                        <a href="#" class="btn btn-dark btn-block"><b>Follow</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills black">
                            <li class="nav-item"><a class="nav-link active" href="#feeds" data-toggle="tab">Feeds</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="feeds">
                                @foreach ($user->topics as $post)
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" height="50" width="50" src="{{ asset($user->profile_photo) }}" alt="user image">
                                        <span class="username">
                                            <a href="#">{{ $user->name }}</a>
                                        </span>
                                        <span class="description">Started a discussion - {{ $post->created_at }}</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>{{ $post->desc }}</p>
                                    <p>
                                        <a href="#" class="link-black text-sm"><i class="far fa-eye mr-1"></i>{{ $post->views }} views</a>
                                        <a href="#" class="link-black text-sm"><i class="far fa-comments mr-1"></i> {{ $post->reply->count() }} replies</a>
                                        <span class="float-right">
                                            <button class="btn btn-dark"><i class="far fa-thumbs-up mr-1"></i> Like</button>
                                            <button class="btn btn-dark"><i class="far fa-thumbs-down mr-1"></i> Dislike</button>
                                        </span>
                                    </p>
                                    <form class="form-horizontal" action="{{ route('reply.discussion', $post->id) }}" method="POST">
                                        @csrf
                                        <div class="input-group input-group-sm mb-0">
                                            <input class="form-control form-control-sm" name="desc" placeholder="Comment">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-dark">Reply</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
