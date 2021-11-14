@extends('admin.layouts.index')
@section('title')
    <title>Quản lí tour</title>
@endsection
@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <script src="{{asset('vendors/admin/tour/add/add.css')}}"></script>

@endsection
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        @include('admin.partials.content-header',['name'=>'Quản lí phòng họp','key'=>'Thêm phòng họp'])
        <!-- DataTales Example -->
        <form action="{{ route('departments.store') }}" method="POST" enctype="multipart/form-data"
            class="row  d-flex justify-c  ontent-center">
            @csrf
            <div class="form-group col-6">
                <label>Hình ảnh</label>
                <input type="file" class="form-control-file @error('feature_image_path') is-invalid @enderror"
                    name="feature_image_path"
                    value="{{ old('feature_image_path') }}">
                @error('feature_image_path')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <div class="form-group ">
                    <label>Tên phòng</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Tên phòng họp" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="">
                        <label>Địa chỉ</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                            value="{{ old('address') }}" name="address">
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>

    </div>
@endsection
@section('js')
    <script src="{{ asset('vendors/admin/tour/add/add.js') }}"></script>
    <script>$('#textareaId_ifr').contents().find("html").html();</script>

@endsection
