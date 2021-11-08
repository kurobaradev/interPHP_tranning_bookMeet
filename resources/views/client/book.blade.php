@extends('layouts.app')
@section('js')

    <script src="{{ asset('vendors/action/getTime.js') }}"></script>

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card ">
                    <img class="card-img-top" src="{{ $room->feature_image_path }}" />
                    <div class="card-body">
                        <h4 class="card-title"><strong>Số phòng</strong> : {{ $room->number_room }}</h4>
                        <h6 class="card-subtitle mb-2"><strong>Số ghế</strong> : {{ $room->number_join }}</h6>
                        <p class="card-text"><strong>Địa chỉ</strong> : {{ $room->address }}</p>
                    </div>
                </div>
            </div>

            <form class="col-6">
                <div class="6">
                    <label>Chọn ngày</label>
                    <input  type="date" min="<?php echo date('Y-m-d'); ?>" idroom="{{ $room->id }}" class="form-control"
                            onchange="myFunction()" id="getData" name="departed">

                </div>
                <form action="">
                    <div class="row col-12" id="listTimeSlots">

                    </div>
                    <button type="submit" class="btn btn-primary">Đặt phòng</button>
                </form>
            </form>

        </div>
        

    </div>
@endsection
