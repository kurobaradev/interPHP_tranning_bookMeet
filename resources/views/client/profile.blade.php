@extends('layouts.app')
@section('css')
<link href="{{ asset('vendors/admin/index/list.css') }}" rel="stylesheet" />

@endsection
@section('content')
<div class="container">


@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ session()->get('success') }}
</div>
@endif

@foreach ($users as $item)
<form action="{{ route('profile.update',['id' => $item->id]) }}" method="POST" enctype="multipart/form-data"
class="">
@csrf
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" name="email" value="{{$item->email}}">
      </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Phòng ban</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" value="{{$item->department->name}}">
        </div>
        <input type="hidden" name="department_id" value="{{ $item->department->id}}">
      </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Tên</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="name" placeholder="Tên" value="{{$item->name}}">
      </div>
    </div>
    <div class="form-group row">
      <label  class="col-sm-2 col-form-label">Số điện thoại</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="phone" placeholder="Số điện thoại" value="{{$item->phone}}">
      </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Lưu chỉnh sửa</button>
    </div>
  </form>
{{-- <p>{{$item->name}}</p>
<p>{{$item->name}}</p>--}}
<br>
<br>
<h3 class="text-center">Các phòng đã đặt</h3>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Mã đặt phòng</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Thời gian</th>
      <th scope="col">Ngày</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($item->tickets as $room)
      <tr>
        <th scope="row">{{$room->id}}</th>
        <td><img class="image_100_100" src="{{  $room->room->feature_image_path }}" alt="#"></td>
        <td>{{date("H:i", strtotime($room->start))}} - {{date("H:i", strtotime($room->end))}}</td>
        <td>{{date("d/m/Y", strtotime($room->date))}}</td>
            
      </tr>
      @endforeach
    </tbody>
  </table>
@endforeach
</div>
@endsection
