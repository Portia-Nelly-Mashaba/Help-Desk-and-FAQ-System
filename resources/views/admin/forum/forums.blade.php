@extends('layouts.admin_auth')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Forums Table</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">CategoryForum</a></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Show Forums</h4>
                            <p class="card-title-desc">Lists of Forums.
                            </p>

                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="custom-select custom-select-sm form-control form-control-sm form-select form-select-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" aria-describedby="datatable_info">
                                <thead>
                                <tr><th class="sorting sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 104px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Title</th>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 104px;" aria-sort="ascending" aria-label="Title: activate to sort column descending">Category</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 165px;" aria-label="Desc: activate to sort column ascending">Description</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 71px;" aria-label="Created By: activate to sort column ascending">Created By</th>
                                    <th rowspan="1" colspan="1" style="width: 27px;">View</th>
                                    <th rowspan="1" colspan="1" style="width: 27px;">Edit</th>
                                    <th rowspan="1" colspan="1" style="width: 27px;">Delete</th>
                                    
                                </tr>
                                </thead>


                                <tbody>
                                    @if (count($forums)> 0)
                                        @foreach ($forums as $forum)
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">{{$forum->title}}</td>
                                                <td>{{$forum->category->title}}</td>
                                                <td>{{$forum->desc}}</td>
                                                <td>{{ $forum->user->name}}</td>
                                                <td><a href="{{ route('forum.show', $forum->id)}}"><i class="fa fa-eye" aria-hidden="true" class="text-danger"></i></a></td>
                                                <td><a href="{{ route('forum.edit', $forum->id)}}"><i class="fas fa-edit" class="text-danger"></i></a></td>
                                                <td><a href="{{ route('forum.delete', $forum->id)}}"><i class="fa fa-trash" aria-hidden="true" class="text-danger"></i></a></td>
                                            </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="6">No forums found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination pagination-rounded"><li class="paginate_button page-item previous disabled" id="datatable_previous"><a aria-controls="datatable" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1" class="page-link"><i class="mdi mdi-chevron-left"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="datatable" role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" role="link" data-dt-idx="1" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" role="link" data-dt-idx="2" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" role="link" data-dt-idx="3" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" role="link" data-dt-idx="4" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" role="link" data-dt-idx="5" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="datatable_next"><a href="#" aria-controls="datatable" role="link" data-dt-idx="next" tabindex="0" class="page-link"><i class="mdi mdi-chevron-right"></i></a></li></ul></div></div></div></div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

    {{-- <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script>2024 © Yowza.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                    </div>
                </div>
            </div>
        </div>
    </footer> --}}
    
</div>
<!-- end main content-->

</div>
@endsection