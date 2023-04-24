<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    @include('public.title')
    <link rel='stylesheet' href="{{asset('center/css/bootstrap.min.css')}}">
    <link rel='stylesheet' href="{{asset('center/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('center/css/style.css')}}">
</head>
<body>

<section class="pt-80 pb-70">
    <div class="text-center mb-60 position-relative">
        <h5 style="font-size: 45px" class="font__family-montserrat font__weight-light text-uppercase font__size-18 text-blue brk-library-rendered" data-brk-library="component__title">{{$type}}</h5>

        <hr class="divider wow zoomIn brk-library-rendered" data-brk-library="component__title" style="visibility: visible; animation-name: zoomIn;">
    </div>
    <div class="container">
        <div class="panel__wrapper-icon mb-100 brk-library-rendered" data-brk-library="component__panel">
            <ul class="panel__list">
                @if($path)
                    @foreach($path as $k=>$v)
                        <a href="/lvguan/case/preview?path={{$v}}" style="height: 100px;width: 100px"><li style="font-size: 30px">
                                <span class="line"></span>
                                <i class="icon fab fa-gg"></i>{{$k}}--点击预览
                            </li></a>
                    @endforeach
                @else
                    <li style="font-size: 30px">
                        <span class="line"></span>
                        <i class="icon fab fa-gg"></i>暂无{{$type}}
                    </li>
                @endif
            </ul>
        </div>
    </div>
</section>
</body>
</html>