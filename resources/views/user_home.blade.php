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
                            <img class="profile-user-img img-fluid img-circle" src="{{asset('backend/profile.png')}}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>

                        <p class="text-muted text-center">{{auth()->user()->email}}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Posts</b> <a class="float-right">{{count(auth()->user()->topics)}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Comments</b> <a class="float-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Likes</b> <a class="float-right">13,287</a>
                            </li>
                        </ul>

                        {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-phone mr-1"></i> Phone</strong>

                        <p class="text-muted">
                            {{ auth()->user()->phone}}
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                        <p class="text-muted">{{ auth()->user()->country}}</p>

                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Sector</strong>

                        <p class="text-muted">
                            {{ auth()->user()->sector}}
                        </p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Bio</strong>

                        <p class="text-muted">{{ auth()->user()->bio}}</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills black">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Notifications</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">

                                <!-- Post -->
                                @if ($latest_Posts)
                                <div class="post">

                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" height="50" width="50" src="{{asset('backend/profile.png')}}" alt="user image">
                                        <span class="username">
                                            <a href="#">You | </a>
                                            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                        </span>
                                        <span class="description">Started a discussion - {{$latest_Posts->created_at}}</span>
                                    </div>
                                    <!-- /.user-block -->

                                        <p>{{ $latest_Posts->desc }}</p>

                                    <p>
                                        <a href="#" class="link-black text-sm"><i class="far fa-eye mr-1"></i>{{$latest_Posts->views}} views</a>
                                        <a href="#" class="link-black text-sm"><i class="far fa-comments mr-1"></i> {{$latest_Posts->reply->count()}} replies</a>
                                        <span class="float-right">
                                            @if ($latest_Posts && $latest_Posts->reply && $latest_Posts->reply->count() > 0)
                                            <button class="btn btn-dark disabled"><i class="fa fa-trash"></i></button>
                                            @else
                                            <a href="{{route('delete.topic', $latest_Posts->id)}}" class="link-black text-sm">
                                                <button class="btn btn-dark"><i class="fa fa-trash"></i></button>
                                            </a>
                                            @endif
                                        </span>

                                    </p>

                                    <br></br>
                                </div>
                                @else
                                <p>You have not started any discussion yet</p>
                            @endif
                                <!-- /.post -->

                            @if ($latest)
                                <!-- Post -->
                                <div class="post clearfix">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" height="50" width="50"  src="{{asset('backend/profile.png')}}" alt="User Image">
                                        <span class="username">
                                            <a href="#">{{$latest->user->name}} | </a>
                                            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                        </span>
                                        <span class="description">Started a discussion - {{$latest->created_at}}</span>
                                    </div>
                                    <!-- /.user-block -->
                                    @if ($latest)
                                        <p>{{$latest->desc}}</p>
                                    @else
                                        <p>There are no discussions yet</p>
                                    @endif

                                    <form  class="form-horizontal" action="{{route('reply.discussion', $latest->id)}}" method="POST">
                                        @csrf
                                        <div>
                                            <p>
                                                <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                                                    <a href="#" class="link-black text-sm">
                                                        <i class="far fa-comments mr-1"></i> Comments (5)
                                                    </a>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="input-group input-group-sm mb-0">
                                            <input class="form-control form-control-sm" name="desc" placeholder="Comment">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-dark">Reply to the post</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.post -->


                            @else

                                <h3>No Discussions found!</h3>
                            @endif

                            </div>










                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">


                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">


                                <form action="{{ route('update.user', auth()->id())}}" method="POST" class="form-horizontal">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{auth()->user()->name}}" id="inputName" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" value="{{auth()->user()->email}}" id="inputEmail" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="phone" value="{{auth()->user()->phone}}" class="form-control"  placeholder="mobile">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2 col-form-label">Country</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="country" value="{{auth()->user()->country}}" class="form-control"  placeholder="South Africa">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Bio</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="bio" value="{{auth()->user()->bio}}" placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Sector</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{auth()->user()->sector}}" name="sector" placeholder="NPO/NGO">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-dark">Update Details</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
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
