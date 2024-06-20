@extends('layouts.admin_auth')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Registered Users</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Registered Users</a></li>
                                <li class="breadcrumb-item active">Registered Users on the User Forum</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

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
                                {{ $users->links() }}
                            </div>
                        </div><!-- end card -->
                    </div>

         </div>

    </div>
</div>

      <!--main content end-->
@endsection
