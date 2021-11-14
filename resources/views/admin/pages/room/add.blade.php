@extends('admin.layouts.index')
@section('title')
    <title>Quản lí tour</title>
@endsection
@section('css')

@endsection
@section('content')
    <div class="container-fluid">
        {{-- @error('title') is-invalid @enderror
  value="{{old('title')}}
  @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror --}}
        <!-- Page Heading -->
        @include('admin.partials.content-header',['name'=>'Quản lí phòng họp','key'=>'Thêm phòng họp'])
        <!-- DataTales Example -->
        <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data"
            class="row  d-flex justify-content-center">
            @csrf
            <div class="form-group col-6">
                <label>Hình ảnh</label>
                <input type="file" class="form-control-file @error('feature_image_path') is-invalid @enderror"
                    name="feature_image_path">
                @error('feature_image_path')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <div class="form-group ">
                    <label>Tên phòng</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Tên phòng họp" name="name" value="{{ old('name') }}">
                    {{-- @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror --}}
                </div>
                <div class="form-group">
                    <div class="">
                        <label>Số người</label>
                        <input type="number" class="form-control @error('size') is-invalid @enderror"
                            value="{{ old('size') }}" name="size">
                        @error('size')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
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

@endsection
