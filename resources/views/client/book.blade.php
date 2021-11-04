@extends('layouts.app')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="card ">
                        <img class="card-img-top" src="{{$room->feature_image_path}}"/>
                        <div class="card-body">
                            <h4 class="card-title"><strong>Số phòng</strong> : {{$room->number_room}}</h4>
                            <h6 class="card-subtitle mb-2"><strong>Số ghế</strong> : {{$room->number_join}}</h6>
                            <p class="card-text"><strong>Địa chỉ</strong> : {{$room->address}}</p>
                        </div>
                    </div>
                </div>
                <div action="form-group" class="row col-6">
                    <div class="col-6">
                    <label >Chọn ngày</label>
                    <input type="datetime-local" class="form-control @error('departed') is-invalid @enderror" value="{{old('departed')}}" name="departed">
                    @error('departed')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
            </div>
        </div>
@endsection 