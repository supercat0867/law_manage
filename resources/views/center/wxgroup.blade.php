<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no,viewport-fit=cover" />
    @include('public.title')
    <script>
        (function(win, doc) {
            if (!win.addEventListener) return;
            var html = document.documentElement;

            function setFont() {
                var html = document.documentElement;
                var k = 750;
                html.style.fontSize = html.clientWidth / k * 100 + "px";
            }
            setFont();
            setTimeout(function() {
                setFont();
            }, 300);
            doc.addEventListener('DOMContentLoaded', setFont, false);
            win.addEventListener('resize', setFont, false);
            win.addEventListener('load', setFont, false);
        })(window, document);
    </script>
</head>
<style type="text/css">
    * {
        margin: 0;
        padding: 0;
    }
    .wrap {
        width: 7.5rem;
        height: 100vh;
        overflow: hidden;
        margin: 0 auto;
        background-color: #f6f6f6;
    }

    .jinqun {
        text-align: center;
        font-family: "思源黑体";
        font-weight: bold;
        font-size: 20px;
        margin: 14px auto;
    }

    .img {
        width: 80%;
        margin: 0 auto;
        display: block;

    }
    .SignContainer-tip {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        padding: 12px 24px;
        color: grey;
        font-size: 13px;
        text-align: center;
    }
</style>
<body>

<div class="wrap">
    <div class="content">
        @if($wxgroup)
            <p class='jinqun'>微信沟通群(长按下方二维码进群)</p>
            <img class="img" src="{{asset($wxgroup)}}" alt="">
        @else
            <p class='jinqun'>暂未开通微信沟通群，请联系律师处理</p>
        @endif
    </div>
</div>

</body>
</html>
