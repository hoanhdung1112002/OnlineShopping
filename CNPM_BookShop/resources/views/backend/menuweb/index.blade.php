@extends('backend.layouts.master')

@section('main-content')
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>
        <div class="card-header py-3">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <i class="nav-icon fas fa fa-home"></i> Trang
                            chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Danh mục</a></li>
                    <li class="breadcrumb-item active">Menu</li>
                </ol>
            </div>
            <a href="{{ route('menuweb.create') }}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
                data-placement="bottom" title="Add Menu"><i class="fas fa-plus"></i>Thêm mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (count($listMenus) > 0)
                    <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Tên danh mục</th>
                                <th>Cấp</th>
                                <th>Tên Controller</th>

                                <th>Tên Action</th>
                                <th>Người tạo</th>
                                <th>Trạng thái</th>
                                <th>Tùy chọn</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($listMenus as $item)
                                @php
                                @endphp
                                <tr>
                                    <td>{{ $item->menu_id }}</td>
                                    <td>{{ $item->menu_name }}</td>
                                    <td>{{ $item->level }}</td>
                                    <td>{{ $item->controller_name }}</td>
                                    <td>{{ $item->action_name }}</td>
                                    <td>{{ $item->create_by }}</td>
                                    <td>
                                        @if ($item->status == 'active')
                                            <span class="badge badge-success">{{ $item->status }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ $item->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('menuweb.edit', $item->menu_id) }}"
                                            class="btn btn-primary btn-sm float-left mr-1"
                                            style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                            title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                        <form method="POST" action="{{route('menuweb.destroy',[$item->menu_id])}}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm dltBtn" data-id={{ $item->menu_id }}
                                                style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                                data-placement="bottom" title="Delete"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <span style="float:right">{{ $listMenus->links() }}</span>
                @else
                    <h6 class="text-center">Không có dữ liệu vui lòng tạo mới</h6>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <style>
        div.dataTables_wrapper div.dataTables_paginate {
            display: none;
        }
    </style>
@endpush

@push('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>
    <script>
        $('#banner-dataTable').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": [3, 4, 5]
            }]
        });

        // Sweet alert
        function deleteData(id) {}
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.dltBtn').click(function(e) {
                var form = $(this).closest('form');
                var dataID = $(this).data('id');
                // alert(dataID);
                e.preventDefault();
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this data!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        } else {
                            swal("Your data is safe!");
                        }
                    });
            })
        })
    </script>
@endpush
