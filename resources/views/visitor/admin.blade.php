<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    @include("public.title")
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('visitor/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('visitor/css/teams-ui.css')}}">
    <style>
        pre {
            background-color: #000;
            color: #fff;
        }
    </style>
    <script src="{{asset('visitor/js/lazy.js')}}"></script>
</head>
<body>
    <main class="wrapper">
        <br>
            <div class="container">
                <div class="row mobile-gap">
                    <div class="col-lg-6">
                        <form action="" method="get">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="请输入行政人员姓名" name="admin">
                        </div>
                        </form>
                    </div>
                    @foreach($admin as $v)
                        @if($v->show_status==1)
                            <div class="col-md-6 col-xl-5"><div class="team-ui--item style-1 bg-white">
                                    <figure>
                                        <div class="team-col--sm team-image">
                                            <img src="{{asset('visitor/images/pixel.gif')}}" data-src='{{asset($v->head)}}' alt="image" class="team-ui--image">
                                        </div>
                                        <div class="team-col--lg team-ui--content">
                                            <figcaption>
                                                <h3 class="team-title">{{$v->name}}</h3>
                                                <span class="team-subheading">{{$v->duty}}</span>
                                                <p class="team-body">{{$v->education}}。{{$v->intro}}</p>
                                            </figcaption>
                                        </div>
                                    </figure>
                                </div>
                            </div>

                        @endif
                    @endforeach
                </div>
            </div>
    </main>
</body>
</html>