<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>预览</title>
    <style>
        img{
            width: 100%;
            height: 100%;
        }
    </style>
    <script src="{{asset('center/js/lazy.js')}}"></script>
</head>
<body>
@foreach($images as $v)
    <img class="image" src="{{asset('center/images/loading.gif')}}" data-src="{{asset($v)}}">
@endforeach

</body>
</html>
