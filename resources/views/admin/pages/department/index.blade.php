@extends('admin.layouts.index')
@section('title')
<title>Quản lí phòng ban</title>
@endsection
@section('js')
 
<script src="{{asset('vendors/sweetAlert2/sweetalert2@10.js')}}"></script>
<script src="{{asset('vendors/action/delete.js')}}"></script>

@endsection
@section('css')
<link href="{{asset('vendors/admin/index/list.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    @include('admin.partials.content-header',['name'=>'Quản lí phòng ban','key'=>'Danh sách'])
    @if(session()->has('success'))
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
    @endif
    <!-- DataTales Example -->
    <a class="text-danger btn" href="{{Route('department.create')}}"><i class="fas fa-plus"> Thêm phòng ban</i>
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
                            <th style="">Thành viên</th>
                            <th style=""></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                        <tr>
                            
                            <td><img class="image_100_100" src="{{$department->feature_image_path}}" alt="hinh anh"></td>
                            <td>{{$department->department_number}}</td>
                            <td>{{$department->address}}</td>
                            
                            <td><a class="btn" data-toggle="modal" data-target="#myModal"><i class="fas fa-eye"> Hiển thị danh sách</i></a></td>
                            <td>
                                <a href="{{route('department.edit',['id'=>$department->id])}}"><i class="fas fa-edit"></i>
                                <a href=""
                                data-url="{{route('department.delete',['id'=>$department->id])}}"
                                class="text-danger action_delete"><i class="fas fa-trash-alt"></i>
                            </td>
                        </tr>
                        @endforeach 
                    </tbody>
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                      
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Danh sách thành viên phòng ban</h4>
                            </div>
                            <div class="modal-body">
                              <p>Some text in the modal.</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                      
                        </div>
                      </div>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection