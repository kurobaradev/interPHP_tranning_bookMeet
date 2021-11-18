<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<link href="{{ asset('vendor/laravel-filemanager/css/errors.css') }}" rel="stylesheet" />

</head>
<body>

<div class="container">
    <div class="error-404">
       <h1 class="text-center"> 404 <br>Địa chỉ web không tồn tại</h1>
       <p><a class="btn btn-dark" href="{{route('home.index')}}">quay lại trang chủ </a></p>
    </div>
</div>

</body>
</html>
