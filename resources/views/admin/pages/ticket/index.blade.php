@extends('admin.layouts.index')
@section('title')
    <title>Quản lí phòng họp</title>
@endsection
@section('js')

    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@10.js') }}"></script>
    <script src="{{ asset('vendors/action/ban.js') }}"></script>

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
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="">Mã đặt phòng</th>
                                <th style="">ảnh phòng họp</th>
                                <th style="">tên phòng</th>
                                <th style="">người đặt phòng</th>
                                <th style="">Bắt đầu</th>
                                <th style="">Kết thúc</th>
                                <th style="">Ngày</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>

                                    <td>{{ $ticket->id }}</td>
                                    <td><img class="image_100_100" src="{{  $ticket->roomMeet->feature_image_path }}" alt="#"></td>
                                    <td>{{ $ticket->roomMeet->room_name }}</td>
                                    <td>{{ $ticket->user->name }}</td>
                                    <td>{{date("H:i", strtotime($ticket->start))}}</td>
                                    <td>{{date("H:i", strtotime($ticket->start))}}</td>
                                    <td>{{date("d/m/Y", strtotime($ticket->date))}}</td>
                                
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
