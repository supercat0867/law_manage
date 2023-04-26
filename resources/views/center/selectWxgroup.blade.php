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
    *{
        margin: 0 ;
        padding: 0;
    }
    .wrap {
        width: 7.5rem;
        height: 100vh;
        margin: -0.25rem auto 0;
        background-color: #f6f6f6;
    }
    .name{
        text-align: center;
        font-family: cursive;
        font-weight: bold;
        font-size: 30px;
        margin: 14px auto;
    }
    .list{
        width: 88%;
        height: auto;
        margin: 0 auto;
    }
    .list li{
        height: 40px;
        /* background: skyblue; */
        border-radius: 5px;
        padding: 10px 12px;
        box-sizing: border-box;
        position: relative;
        overflow: hidden;
        margin-bottom: 16px;
        display: flex;
        flex-direction:column ;
        align-items: baseline;
        justify-content: space-between;
        box-shadow: 0 1px 3px 1px rgba(0,0,0,.1);
        position: relative;
        margin-bottom: 28px;
        border: 1px solid #38a7d9;
    }
    .list li img{
        width: 50px;
        height: 50px;
    }
    .list li p{
        font-size: 14px;
        font-weight: bold;
        /* padding-left: 15px; */
    }
    .dianji{
        display: block;
        width: 100%;
        height: 100%;
        position: absolute;
        z-index: 999;
        cursor: pointer;
    }
    .inp1{
        width: 7rem;
        height: 0.6rem;
        border: 2px solid #FEBF00;
        /*text-align: center;*/
        font-size: 0.3rem;
        border-radius: 11px;
        outline: none;
    }
    @keyframes rotate-hue {
        to {
            filter: hue-rotate(1turn);
        }
    }
    .fom{
        margin: -14px auto 21px;
        width: 6.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 0;
    }
    .SignContainer-tip {
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
        <p class="name">微信沟通群</p>
        <form class="fom" action="" method="get">
            <input class="inp1" type="text" name="key" placeholder="输入当事人、常法服务方" value="{{$key}}">
        </form>
        <ul class="list">
            @if(!$customer)
                <p style="font-size: 20px;text-align: center">暂无微信沟通群</p>
            @else
                @foreach($customer as $v)
                    <li>
                        <a class="dianji" href="/lvguan/daily/wxgroup/info?path={{$v->wxgroup}}">
                        </a>
                        <p><span>当事人/常法服务方：{{$v->customer_name}}</span>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
</body>
</html>




