@extends('admin.layouts.index')
@section('title')
    <title>Quản lí phòng ban</title>
@endsection
@section('js')

    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@10.js') }}"></script>
    <script src="{{ asset('vendors/Action/delete.js') }}"></script>

@endsection
@section('css')
    <link href="{{ asset('vendors/admin/index/list.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    @include('admin.partials.content-header',['name'=>'Quản lí phòng ban','key'=>'Danh sách'])
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session()->get('success') }}
        </div>
    @endif
    @if (session()->has('fail'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session()->get('fail') }}
        </div>
    @endif
    <!-- DataTales Example -->
    <a class="text-danger btn" href="{{ Route('departments.create') }}"><i class="fas fa-plus"> Thêm phòng ban</i>
    </a>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="">Hình ảnh</th>
                            <th style="">Số phòng</th>
                            <th style="">Địa chỉ</th>
                            <th style="">Danh sách thành viên</th>
                            <th style=""></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr>

                                <td><img class="image_100_100" src="{{ $department->feature_image_path }}"
                                        alt="hinh anh"></td>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->address }}</td>

                                <td>
                                    <a href="#" class="btn" data-toggle="modal" data-target="#data{{ $department->name }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i> Xem danh sách thành viên
                                    </a>
                                    <div class="modal fade" id="data{{ $department->name }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle"> Danh Sách thành viên {{ $department->name }}</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                @if (count($department->users))
                                                    @foreach ($department->users as $user)
                                                        <p>{{ $user->name }} </p>
                                                        {{-- {{dd( $user)}} --}}
                                                    @endforeach
                                                @else
                                                    <p>Chưa có thành viên nào trong danh sách</p>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                </td>
                                <td>
                                    <a href="{{ route('departments.edit', ['id' => $department->id]) }}"><i class="fas fa-edit"></i>
                                    <a data-url="{{ route('departments.delete', ['id' => $department->id]) }}" class="text-danger action_delete"><i class="fas fa-trash-alt"></i>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>
@endsection
