<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('public.title')
</head>
<body>
<div style="text-align: left;margin: 20px;">
    <h3 style="text-align: center">{{$meeting->title}}</h3>
    <p>参会人员：{{$meeting->member}}</p>
    <p>会务内容:</p>
    <span>&nbsp;&nbsp;&nbsp;&nbsp;{{$meeting->content}}</span>
</div>
</body>
</html>
