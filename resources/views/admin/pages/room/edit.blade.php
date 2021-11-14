@extends('admin.layouts.index')
@section('title')
    <title>Quản lí phòng họp</title>
@endsection
@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendors/admin/tour/add.css') }}" rel="stylesheet" />

@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        @include('admin.partials.content-header',['name'=>'Quản lí phòng họp','key'=>'Sửa phòng họp'])
        <!-- DataTales Example -->
        <form action="{{ route('rooms.update', ['id' => $room->id]) }}" method="POST" enctype="multipart/form-data"
            class="row d-flex justify-content-center">
            @csrf

            <div class="form-group col-6">
                <div class="col-md-12">
                    <div class="row">
                        <img class="image_edit_tour" src="{{ $room->feature_image_path }} " alt=""
                            style="width: 300px;">
                    </div>
                </div>
                <label>Hình ảnh</label>
                <input type="file" class="form-control-file" name="feature_image_path">

            </div>
            <div class="col-6">
                <div class="form-group ">
                    <label>Tên phòng</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Tên phòng họp" name="name" value="{{ $room->name }}">
                    {{-- @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror --}}
                </div>
                <div class="form-group">
                    <div class="">
                        <label>Số người</label>
                        <input type="number" class="form-control @error('size') is-invalid @enderror"
                            value="{{ $room->size }}" name="size">
                        @error('size')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group ">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Địa chỉ"
                        name="address" value="{{ $room->address }}">
                    {{-- @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror --}}
                </div>
                <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>

    </div>
@endsection
@section('js')

    <script src="{{ asset('vendors/admin/tour/add/add.js') }}"></script>
    {{-- <script>$('#textareaId_ifr').contents().find("html").html();</script> --}}

@endsection
