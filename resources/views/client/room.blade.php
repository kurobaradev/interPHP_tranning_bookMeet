@extends('layouts.app')
@section('content')
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ session()->get('success') }}
</div>
@endif
{{-- <div class=""></div> --}}
<div class="container">
    <div class="row">
    @foreach ($rooms as $room)
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card ">
                        <img class="card-img-top" style="height: 150px" src="{{ $room->feature_image_path }}" />
                        <div class="card-body">
                            <h4 class="card-title"><strong>Phòng</strong> : {{ $room->room_name }}</h4>
                            <h6 class="card-subtitle mb-2"><strong>Số ghế</strong> : {{ $room->room_size }}</h6>
                            <p class="card-text"><strong>Địa chỉ</strong> : {{ $room->address }}</p>
                            <a href="{{ route('room.book', ['id' => $room->id]) }}" class="btn btn-primary"><i
                                    class="fas fa-money-bill-alt"></i>Đặt phòng họp</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
@endsection
