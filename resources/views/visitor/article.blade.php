<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @include("public.title")
    <meta name="viewport" content="width=device-width, initial-scale=1  maximum-scale=1 user-scalable=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="HandheldFriendly" content="True">
    <link rel="stylesheet" href="{{asset('visitor/css/materialize.min.css')}}">
    <link rel="stylesheet" href="{{asset('visitor/css/style.css')}}">
</head>
<body class="home-pages">
<div class="navbar-top">
    <div class="site-brand">
        <a><h1>律冠法研</h1></a>
    </div>
</div>
<br><br>
<div class="blog-home section">
    <div class="container">
        @foreach($article as $v)
            @if($v->status==1)
                <div class="row"><div class="col s12"><div class="content">
                            <img src='{{asset($v->cover)}}'>
                            <div class="post"><div class="category"></div>
                                <h3><a href="{{$v->link}}">{{$v->title}}</a></h3>
                                <div class="date">{{$v->created_at}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
                <!--			<div class="pagination-blog-home">-->
        <!--				<ul>-->
        <!--					<li class="active"><a href="">1</a></li>-->
        <!--					<li><a href="">2</a></li>-->
        <!--					<li><a href="">3</a></li>-->
        <!--					<li><a href="">4</a></li>-->
        <!--					<li><a href="">5</a></li>-->
        <!--				</ul>-->
        <!--			</div>-->
    </div>
</div>
<div class="footer">
    <div class="container">
        <div class="about-us-foot">
            <h6>负责人：邵建炜</h6>
            <p>联系电话：13558789376</p>
            <p>微信号：s13092801616</p>
        </div>
    </div>
</div></body></html>
