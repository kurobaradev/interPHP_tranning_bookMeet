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
        {{-- @error('title') is-invalid @enderror
  value="{{old('title')}}
  @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror --}}
        <!-- Page Heading -->
        @include('admin.partials.content-header',['name'=>'Quản lí phòng họp','key'=>'Thêm phòng họp'])
        <!-- DataTales Example -->
        <form action="{{ route('room-meet.store') }}" method="POST" enctype="multipart/form-data"
            class="row  d-flex justify-c  ontent-center">
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
                    <input type="text" class="form-control @error('number_room') is-invalid @enderror"
                        placeholder="Tên phòng họp" name="number_room" value="{{ old('number_room') }}">
                    {{-- @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror --}}
                </div>
                <div class="form-group">
                    <div class="">
                        <label>Số người</label>
                        <input type="number" class="form-control @error('number_join') is-invalid @enderror"
                            value="{{ old('number_join') }}" name="number_join">
                        @error('number_join')
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
            {{-- <div class="form-group">
          <label >Nhập tag cho tour</label>
          <select  name="tags[]" class="form-control tag_select_choose" multiple="multiple">
          </select>
        </div> --}}

            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>

    </div>
@endsection
@section('js')
    {{-- <script src="https://cdn.tiny.cloud/1/yoq2e98eie626pyeibu02i0ap1dn96a3xzcq356c01k1jyjr/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
    {{-- id="editor1" rows="10" cols="80" --}}
    {{-- <script type="text/javascript" src="{{asset('vendors/ckeditor/ckeditor.js')}}"></script>
<script>CKEDITOR.replace( 'editor1' );</script> --}}
    {{-- <script>tinymce.init({selector:'textarea'});</script> --}}
    {{-- <script src="{{asset('vendors/ckfinder/ckfinder.js')}}"></script> --}}
    {{-- <script>
  CKEDITOR.replace('editor', {
  filebrowserBrowseUrl: "{{asset('vendors/ckfinder/ckfinder.html')}}",
  filebrowserUploadUrl: "{{asset('vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&amp;type=Files')}}"});
</script> --}}
    <script src="{{ asset('vendors/admin/tour/add/add.js') }}"></script>
    <script>$('#textareaId_ifr').contents().find("html").html();</script>

@endsection
