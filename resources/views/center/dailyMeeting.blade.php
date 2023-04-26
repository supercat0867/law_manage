<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no,viewport-fit=cover" />
    @include('public.title')
    <script>
        //屏幕适应
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
        height: 50px;
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
        border: 1px dashed skyblue;
    }
    .list li img{
        width: 50px;
        height: 50px;
    }
    .list li p{
        font-size: 12px;
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
        width: 4rem;
        height: 0.6rem;
        border: 2px solid #FEBF00;
        text-align: center;
        font-size: 0.3rem;
        border-radius: 11px;
        outline: none;
    }
    .button {
        --border-radius: 15px;
        --border-width: 4px;
        appearance: none;
        position: relative;
        padding: 1em 2em;
        border: 0;
        background-color: #212121;
        font-family: "Roboto", Arial, "Segoe UI", sans-serif;
        font-size: 18px;
        font-weight: 500;
        color: #fff;
        z-index: 2;
        border-radius: 20px;
        line-height: 0.2rem;
        height: 0.8rem;
    }

    .button::after {
        --m-i: linear-gradient(#000, #000);
        --m-o: content-box, padding-box;
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        padding: var(--border-width);
        border-radius: var(--border-radius);
        background-image: conic-gradient(
                #488cfb,
                #29dbbc,
                #ddf505,
                #ff9f0e,
                #e440bb,
                #655adc,
                #488cfb
        );
        -webkit-mask-image: var(--m-i), var(--m-i);
        mask-image: var(--m-i), var(--m-i);
        -webkit-mask-origin: var(--m-o);
        mask-origin: var(--m-o);
        -webkit-mask-clip: var(--m-o);
        mask-composite: exclude;
        -webkit-mask-composite: destination-out;
        filter: hue-rotate(0);
        animation: rotate-hue linear 500ms infinite;
        animation-play-state: paused;
    }

    .button:hover::after {
        animation-play-state: running;
    }

    @keyframes rotate-hue {
        to {
            filter: hue-rotate(1turn);
        }
    }

    .button,
    .button::after {
        box-sizing: border-box;
    }

    .button:active {
        --border-width: 5px;
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
        <p class="name">会务记录</p>
        <form class="fom" action="" method="get">
            <input class="inp1" type="date" name="time" value="{{$time}}">
            <button type="submit" class="button" >搜索</button>
        </form>
        <ul class="list">
            @if(!$meeting)
                <p style="font-size: 20px;text-align: center">暂无会议</p>
            @else
                @foreach($meeting as $v)
                    <li>
                        <a  class="dianji" href="/lvguan/daily/{{$v->id}}/meeting"></a>
                        <p><span>{{$v->title}}&nbsp;&nbsp;&nbsp;&nbsp;{{$v->time}}</span></p>
                        <p>参会人员：<span>{{$v->member}}</span></p>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>

</body>
</html>

