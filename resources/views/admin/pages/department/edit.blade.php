@extends('admin.layouts.index')
@section('title')
    <title>Quản lí phòng ban</title>
@endsection
@section('css')
    <link href="{{ asset('vendors/admin/tour/add.css') }}" rel="stylesheet" />

@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        @include('admin.partials.content-header',['name'=>'Quản lí phòng ban','key'=>'Sửa phòng ban'])
        <!-- DataTales Example -->
        <form action="{{ route('departments.update', ['id' => $departments->id]) }}" method="POST" enctype="multipart/form-data"
            class="row d-flex justify-content-center">
            @csrf

            <div class="form-group col-6">
                <label>Hình ảnh</label>
                <input type="file" class="form-control-file" name="feature_image_path">
                <div class="col-md-12">
                    <div class="row">
                        <img class="image_edit_tour" src="{{ $departments->feature_image_path }} " alt="">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group ">
                    <label>Tên phòng ban</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Tên phòng họp" name="name" value="{{ $departments->name }}">
                    {{-- @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror --}}
                </div>
                <div class="form-group ">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Địa chỉ"
                        name="address" value="{{ $departments->address }}">
                    {{-- @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror --}}
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>

    </div>
@endsection
@section('js')
    <script src="{{ asset('vendors/admin/tour/add/add.js') }}"></script>
@endsection
