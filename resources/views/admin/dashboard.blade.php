@extends('layouts.admin_auth')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Help Desk and FAQ System</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <a href="/admin/dashboard/categories"><p class="text-truncate font-size-14 mb-2">Categories</p></a>
                                    @if ($categories->count() > 0)

                                        <h4 class="mb-2">{{$categories->count()}}</h4>

                                    @else
                                    <h4 class="mb-2">0</h4>
                                    @endif
                               </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="fas fa-list-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <a href="/admin/dashboard/forums"><p class="text-truncate font-size-14 mb-2">Forums</p></a>
                                    @if ($forums->count() > 0)

                                        <h4 class="mb-2">{{$forums->count()}}</h4>

                                    @else
                                    <h4 class="mb-2">0</h4>
                                    @endif
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <a href="#users"><p class="text-truncate font-size-14 mb-2">Users</p></a>
                                    @if ($users->count() > 0)

                                        <h4 class="mb-2">{{$users->count()}}</h4>

                                    @else
                                    <h4 class="mb-2">0</h4>
                                    @endif
                                  </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="fa fa-users" font-size-30"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Posts</p>

                                        @if ($discussion->count() > 0)

                                            <h4 class="mb-2">{{$discussion->count()}}</h4>

                                        @else
                                        <h4 class="mb-2">0</h4>
                                        @endif
                               </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="fas fa-comments font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="float-end d-none d-md-inline-block

                                                <h4 class="card-title">New Posts</h4>



                                                <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="custom-select custom-select-sm form-control form-control-sm form-select form-select-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" aria-describedby="datatable_info">
                                                    <thead>
                                                    <tr><th class="sorting sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 104px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Forum Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 165px;" aria-label="Desc: activate to sort column ascending">Post Title</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 71px;" aria-label="Created By: activate to sort column ascending">Author</th>
                                                        <th rowspan="1" colspan="1" style="width: 27px;">View</th>
                                                        <th rowspan="1" colspan="1" style="width: 27px;">Delete</th>

                                                    </tr>
                                                    </thead>


                                                    <tbody>
                                                        {{-- @if (count($categories) > 0)
                                                            @foreach ($categories as $category) --}}
                                                                <tr class="odd">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Row1</td>
                                                                    <td>Row1</td>
                                                                    <td>Row1</td>
                                                                    <td><a href=""><i class="fa fa-eye" aria-hidden="true" class="text-dark"></i></a></td>
                                                                    <td><a href=""><i class="fa fa-trash" aria-hidden="true" class="text-dark"></i></a></td>
                                                                </tr>
                                                    </tbody>
                                                </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination pagination-rounded"><li class="paginate_button page-item previous disabled" id="datatable_previous"><a aria-controls="datatable" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1" class="page-link"><i class="mdi mdi-chevron-left"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="datatable" role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" role="link" data-dt-idx="1" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" role="link" data-dt-idx="2" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" role="link" data-dt-idx="3" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" role="link" data-dt-idx="4" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" role="link" data-dt-idx="5" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="datatable_next"><a href="#" aria-controls="datatable" role="link" data-dt-idx="next" tabindex="0" class="page-link"><i class="mdi mdi-chevron-right"></i></a></li></ul></div></div></div></div>

                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                            </div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <div class="row" id="users">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">User Report</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                </div>
                            </div>

                            <h4 class="card-title mb-4">Registered Users</h4>

                            <div class="table-responsive">
                                <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            {{-- <th>Number Of Posts</th> --}}
                                            <th>View</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        @if (count($users)> 0)
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td><a href="/admin/dashboard/users/{{$user->id}}"><i class="fa fa-eye text-dark"></i></a></td>
                                <td><a href="#"><i class="fa fa-edit text-dark"></i></a></td>
                                {{-- <td><a href="#" class="text-dark"><i class="fa fa-trash"></i>Delete</a></td> --}}
                                <td class="delete-cell">
                                    @if(auth()->user()->isAdmin())
                                        <form action="{{ route('user.delete', [$user->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-dark" style="border: none; background: none;">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    @else
                                        <a href="#" class="text-dark" style="border: none; background: none;">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    @endif
                                </td>

                              </tr>
                            @endforeach
                        @endif
                                    </tbody><!-- end tbody -->
                                </table> <!-- end table -->
                            </div>
                        </div><!-- end card -->
                    </div><!-- end card -->
        </div>

    </div>
    <!-- End Page-content -->

</div>

@endsection
