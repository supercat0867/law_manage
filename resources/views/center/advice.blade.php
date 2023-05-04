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
    <h3 style="text-align: center">{{$advice->title}}</h3>
    <span>&nbsp;&nbsp;&nbsp;&nbsp;{{$advice->content}}</span>
</div>
</body>
</html>
