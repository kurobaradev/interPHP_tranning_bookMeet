@extends('admin.layouts.index')
@section('title')
<title>Quản lí tour</title>
@endsection
@section('js')

{{-- <script src="{{asset('vendors/sweetAlert2/sweetalert2@10.js')}}"></script>
<script src="{{asset('vendors/action/delete.js')}}"></script> --}}

@endsection
@section('css')
{{-- <link href="{{asset('vendors/admin/product/index/list.css')}}" rel="stylesheet" /> --}}
@endsection
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    @include('admin.partials.content-header',['name'=>'Quản lí người dùng','key'=>'Danh sách'])
    {{-- @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session()->get('success') }}
    </div>
    @endif
    @if(session()->has('fail'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session()->get('fail') }}
        </div>
    @endif --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="">Tên</th>
                            <th style="">Email</th>
                            <th style="">Số điện thoại</th>
                            <th style=""></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                         
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                                {{-- <a href="{{route('tour.edit',['id'=>$tour->id])}}" class="btn btn-primary">Sửa</a>
                                <a href=""
                                data-url="{{route('tour.delete',['id'=>$tour->id])}}"
                                class="btn btn-danger action_delete">Xóa</a> --}}
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