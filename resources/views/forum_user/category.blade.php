@extends('layouts.app')

@section('content')

<div class="container">
    <nav class="breadcrumb">
      <a href="/" class="breadcrumb-item">Categories </a>
      <span class="breadcrumb-item active">{{$category->title}}</span>
    </nav>

    <div class="row">
      <div class="col-lg-8">
        <div class="row">
          <!-- Category one -->
          <div class="col-lg-12">
            <!-- second section  -->
            <h4 class="text-white bg-dark mb-0 p-4 rounded-top">
              {{$category->title}}
            </h4>
            <table class="table table-striped table-responsive table-bordered mb-xl-0">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Forum</th>
                  <th scope="col">Discussions</th>
                  <th scope="col">Comments</th>
                </tr>
              </thead>
              <tbody>
                @if(count($category->forums) >0)
                    @foreach ($category->forums as $forum)
                    <tr>
                        <td>
                          <h3 class="h5">
                            <a href="{{route('forum.overview', $forum->id)}}" class="text-uppercase">{{$forum->title}}</a>
                          </h3>
                          <p class="mb-0">{{$forum->desc}}</p>
                        </td>
                        <td><div>{{count($forum->discussion)}}</div></td>
                        <td><div>{{count($forum->discussion)}}</div></div></td>

                      </tr>
                    @endforeach
                @else
                    <p>No Forums in this Category</p>
                @endif

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <aside>
          <div class="card">
            <div class="card-footer">
              <h4 class="card-title">FAQ</h4>
              <dl class="row">
                <dt class="col-8 mb-0">Question1:</dt>
                <dd class="col-4 mb-0">+</dd>
              </dl>
              <dl class="row">
                <dt class="col-8 mb-0">Question2:</dt>
                <dd class="col-4 mb-0">+</dd>
              </dl>
              <dl class="row">
                <dt class="col-8 mb-0">Question3:</dt>
                <dd class="col-4 mb-0">+</dd>
              </dl>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Statistics</h4>
              <dl class="row">
                <dt class="col-8 mb-0">Total Forums:</dt>
                <dd class="col-4 mb-0">{{$forumsCount}}</dd>
              </dl>
              <dl class="row">
                <dt class="col-8 mb-0">Total Posts/Discussions:</dt>
                <dd class="col-4 mb-0">{{$discussionCount}}</dd>
              </dl>
              <dl class="row">
                <dt class="col-8 mb-0">Total Replies:</dt>
                <dd class="col-4 mb-0">{{$totalRepliesCount}}</dd>
              </dl>
              <dl class="row">
                <dt class="col-8 mb-0">Total Likes:</dt>
                <dd class="col-4 mb-0">{{$totalLikesCount}}</dd>
              </dl>
              <dl class="row">
                <dt class="col-8 mb-0">Total Disikes:</dt>
                <dd class="col-4 mb-0">{{$totalDisikesCount}}</dd>
              </dl>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>
  
  
  @endsection
