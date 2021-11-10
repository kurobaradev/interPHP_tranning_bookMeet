@extends('layouts.app')
@section('css')
    
@endsection
@section('js')

    {{-- <script src="{{ asset('vendors/action/getTime.js') }}"></script> --}}
    <script>
        //    var day = document.getElementById('getData').value;
            // var div1 = document.getElementById('getDate')
            var url = window.location.pathname;
            var room_id = url.split('/')[2];
            $.ajax({
                // urk api get ticket/id
                url:'/api/room/'+room_id,
                type: 'GET',
                success:function(e){
                    $('#mydate').change(function() {
                        // bỏ biến i là hiện
                        $('label.btn.btn-outline-primary').removeClass('disabled');
                        for(let i=8;i < 23; i++){
                            for(let n=0;n < e.length; n++){
                                var time;
                                $('#time').val(this.value);
                                // gán dữ liệu cho time
                                if(i==8 ){
                                    time = $('#time').val() +' '+'0'+(i) +':00';
                                }
                                else if(i==9){
                                    time = $('#time').val() +' '+'0'+(i) +':00';
                                }
                                else{
                                    time = $('#time').val() +' '+(i) +':00';
                                }
                                // nếu dữ liệu trả về = time thì ẩn đi
                                if(e[n].start === time+':00'){
                                    $('label.btn.btn-outline-primary.'+i).addClass('disabled');
                                    // console.log(e[n].end);
                                // console.log(e[n].start);
                                }
                             
                            }
                        }
                    });
                }
            });
    
    
        </script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card ">
                    <img class="card-img-top" src="{{ $room->feature_image_path }}" />
                    <div class="card-body">
                        <h4 class="card-title"><strong>Phòng</strong> : {{ $room->room_name }}</h4>
                        <h6 class="card-subtitle mb-2"><strong>Số ghế</strong> : {{ $room->room_size }}</h6>
                        <p class="card-text"><strong>Địa chỉ</strong> : {{ $room->address }}</p>
                    </div>
                </div>
            </div>

            <form class="col-6" action="{{route('room.bookroom')}}" method="post" id="timeSlot">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">Ngày</label>
                    {{-- nhập ngày --}}
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    <input min="<?php echo (new \DateTime())->format('Y-m-d'); ?>" type="date" class="form-control col-7" name="date" id="mydate"
                        aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-danger">
                        @error('datebook')
                            {{ $message }}
                        @enderror
                    </small>
                    <input type="hidden" id="time">
                    {{-- radio --}}
                    {{-- khởi tạo danh sách thời gian và chèn vào biến class 1 tham số i để sau bắt sự kiện thay đổi --}}
                    <div class="btn-group-toggle " data-toggle="buttons" >
                        @for ($i = 8; $i < 23; $i++)
                            <label class="btn btn-outline-primary {{ $i }}" style="margin: 5px">
                                {{-- in vòng lặp thời gian với value nếu i = 8 hoặc 9 thì cộng số 0 ở đầu và gán value = 08:00 --}}
                                <input type="radio" value="{{($i==8 || $i==9)?'0'.$i:$i}}:00?{{($i+1==9)?'0'.$i+1:$i+1}}:00" name="timeSlot" id="{{ $i }}" > {{($i==8 || $i==9)?'0'.$i:$i}}:00 - {{($i+1==9)?'0'.$i+1:$i+1}}:00
                            </label>
                        @endfor
                    </div>
                    {{-- bắt lỗi --}}
        
                    {{-- end radio --}}
                </div>
                <button class="btn btn-primary ">Book Room</button>
            </form>

        </div>
        

    </div>

    
@endsection
