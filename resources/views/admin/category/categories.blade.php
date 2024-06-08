@extends('layouts.dashboard')

@section('content')
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">

              <!--overview start-->
          <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-edit"></i>Category > Home > Categories</h3>
            </div>
          </div>

          <div class="row">

            <div class="col-lg-12 col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h2><i class="fa fa-flag-o red"></i><strong>Categories</strong></h2>
                  <div class="panel-actions">
                    <a href="/dashboard/home" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                    <a href="/dashboard/home" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                    <a href="/dashboard/home" class="btn-close"><i class="fa fa-times"></i></a>
                  </div>
                </div>
                <div class="panel-body">
                  <table class="table bootstrap-datatable countries">
                    <thead>
                      <tr>
                        <th>Title</th>
                        {{-- <th>Image</th> --}}
                        <th>Description</th>
                        <th>Created By</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>

                      </tr>
                    </thead>
                    <tbody>
                        @if (count($categories)> 0)
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->title}}</td>
                                {{-- Image if you include --}}
                                {{-- <td>{{ asset('storage/images/categories/'.$category->image) }}</td> --}}
                                <td>{{$category->desc}}</td>
                                {{-- <td>{!!$category->desc!!}</td> --}}
                                <td>{{ $category->user_id}}</td>
                                <td><a href="{{ route('category.show', $category->id)}}" class="text-success">View</a></td>
                                <td><a href="{{ route('category.update', $category->id)}}">Edit</a></td>
                                <td><a href="{{ route('category.delete', $category->id)}}" class="text-danger">Delete</a></td>

                              </tr>
                            @endforeach
                        @endif
                    </tbody>
                  </table>

                  {{-- {{ $users->links() }} --}}
                </div>

              </div>

            </div>

            </div>
            <!--/col-->

          </div>



        </section>


      </section>
      <!--main content end-->
@endsection
