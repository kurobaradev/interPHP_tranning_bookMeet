@extends('admin.layouts.index')
@section('title')
    <title>Quản lí phòng họp</title>
@endsection
@section('js')

    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@10.js') }}"></script>
    <script src="{{ asset('vendors/action/delete.js') }}"></script>

@endsection
@section('css')
    <link href="{{ asset('vendors/admin/index/list.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        @include('admin.partials.content-header',['name'=>'Quản lí phòng họp','key'=>'Danh sách'])
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

        <a class="text-danger btn" href="{{ route('room-meet.create') }}"><i class="fas fa-plus"> Thêm phòng họp</i></a>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="">Hình ảnh</th>
                                <th style="">Số phòng</th>
                                <th style="">Số người</th>
                                <th style="">Địa chỉ</th>
                                <th style="">Trạng thái</th>
                                <th style=""></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roomMeets as $roomMeet)
                                <tr>

                                    <td><img class="image_100_100" src="{{ $roomMeet->feature_image_path }}" alt="#"></td>
                                    <td>{{ $roomMeet->room_name }}</td>
                                    <td>{{ $roomMeet->room_size }}</td>
                                    <td>{{ $roomMeet->address }}</td>
                                    <td>{{ $roomMeet->status }}</td>
                                    <td>
                                        <!-- DataTales Example -->
                                        <a href="{{ route('room-meet.edit', ['id' => $roomMeet->id]) }}"
                                            class="text-primary"><i class="fas fa-edit"></i>
                                            <a href="" data-url="{{ route('room-meet.delete', ['id' => $roomMeet->id]) }}"
                                                class="text-danger action_delete"><i class="fas fa-trash-alt"></i></a>
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
