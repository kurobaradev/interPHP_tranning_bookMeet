@extends('admin.layouts.index')
@section('title')
<title>Quản lí tour</title>
@endsection
@section('css')
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
{{-- <script src="{{asset('vendors/admin/tour/add/add.css')}}"></script> --}}

@endsection
@section('content')
<div class="container-fluid">
  {{-- @error('title') is-invalid @enderror
  value="{{old('title')}}
  @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror --}}
    <!-- Page Heading -->
    @include('admin.partials.content-header',['name'=>'Quản lí tour','key'=>'Thêm tour'])
    <!-- DataTales Example -->
    <form action="{{route('tour.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label >Tên tour</label>
          <input  type="text" 
                  class="form-control @error('name') is-invalid @enderror"
                  placeholder="Tên tour"
                  name="name"
                  value="{{old('name')}}"
                  >
          @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label >Mô tả</label>
          <textarea name="description"  class="form-control @error('description') is-invalid @enderror" rows="5" cols="50">{{old('description')}}</textarea>
          @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label >Loại tour</label>
          <select class="form-control @error('category_tour_id') is-invalid @enderror" name="category_tour_id">
            <option value=""></option>
            {!! $htmlOption !!}
          </select>
          @error('category_tour_id')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label >Giá tour</label>
          <input  type="text" 
                  class="form-control @error('price') is-invalid @enderror"
                  placeholder="Giá tour"
                  name="price"
                  value="{{old('price')}}"
                  >
          @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div action="form-group" class="row">
          <div class="col-6">
            <label >Ngày khởi hành</label>
            <input type="datetime-local" class="form-control @error('departed') is-invalid @enderror" value="{{old('departed')}}" name="departed">
            @error('departed')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-6">
            <label >Số ngày</label>
            <input type="number" class="form-control @error('duration') is-invalid @enderror" value="{{old('duration')}}" name="duration">
            @error('duration')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <br>
        <div class="form-group">
          <label >Hình ảnh</label>
          <input  type="file" 
            class="form-control-file @error('feature_image_path') is-invalid @enderror"
            name="feature_image_path"
            >
          @error('feature_image_path')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        {{-- <div class="form-group">
          <label >Nhập tag cho tour</label>
          <select  name="tags[]" class="form-control tag_select_choose" multiple="multiple">
          </select>
        </div> --}}
        <div class="form-group">
          <label >Nội dung</label>
          <textarea name="content" id="editor1" rows="10" cols="80" class="@error('content') is-invalid @enderror">{{old('content')}}</textarea>
          @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror  
        </div>

        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
      </form>

</div>
@endsection
@section('js')
{{-- <script src="https://cdn.tiny.cloud/1/yoq2e98eie626pyeibu02i0ap1dn96a3xzcq356c01k1jyjr/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
{{-- id="editor1" rows="10" cols="80" --}}
<script type="text/javascript" src="{{asset('vendors/ckeditor/ckeditor.js')}}"></script>
<script>CKEDITOR.replace( 'editor1' );</script>
{{-- <script>tinymce.init({selector:'textarea'});</script> --}}
<script src="{{asset('vendors/ckfinder/ckfinder.js')}}"></script>
<script>
  CKEDITOR.replace('editor', {
  filebrowserBrowseUrl: "{{asset('vendors/ckfinder/ckfinder.html')}}",
  filebrowserUploadUrl: "{{asset('vendors/ckfinder/core/connector/php/connector.php?
command=QuickUpload&amp;type=Files')}}"});
</script>
<script src="{{asset('vendors/admin/tour/add/add.js')}}"></script>
{{-- <script>$('#textareaId_ifr').contents().find("html").html();</script> --}}

@endsection