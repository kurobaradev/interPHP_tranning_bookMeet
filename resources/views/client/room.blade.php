@extends('layouts.app')
@section('content')
    @foreach ($rooms as $room)
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card ">
                        <img class="card-img-top" src="{{ $room->feature_image_path }}" />
                        <div class="card-body">
                            <h4 class="card-title"><strong>Số phòng</strong> : {{ $room->number_room }}</h4>
                            <h6 class="card-subtitle mb-2"><strong>Số ghế</strong> : {{ $room->number_join }}</h6>
                            <p class="card-text"><strong>Địa chỉ</strong> : {{ $room->address }}</p>
                            <a href="{{ route('room.book', ['id' => $room->id]) }}" class="btn btn-primary"><i
                                    class="fas fa-money-bill-alt"></i>Đặt phòng họp</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
