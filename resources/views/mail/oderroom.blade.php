<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title></title>
</head>

<body>
    <div class="es-wrapper-color">
       <p>Cảm ơn{{$Tickets->user->name}} đã đặt phòng họp</p><br>
       <p>Cuộc họp bắt đầu vào <strong>{{$Tickets->start}}</strong></p><br>
       <p>Cuộc họp kết thúc vào <strong>{{$Tickets->end}}</strong></p><br>
       <p>Số phòng <strong>{{$Tickets->roomMeet->room_name}}</strong></p><br>
       <p>Địa chỉ <strong>{{$Tickets->roomMeet->address}}</strong></p><br>
    </div>
</body>

</html>