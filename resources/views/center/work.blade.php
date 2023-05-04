<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    @include("public.title")
    <meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">
    <meta name="author" content="Vincent Garreau" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" media="screen" href="{{asset('center/css/style2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('visitor/css/reset.css')}}">
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

<style>
    .name{
        text-align: center;
        font-family: cursive;
        font-weight: bold;
        font-size: 30px;
        margin: 14px auto;
        color: white;
    }
    .list{
        width: 88%;
        height: auto;
        margin: 0 auto;
    }
    .list li{
        height: 70px;
        background: white;
        border-radius: 5px;
        padding: 10px 12px;
        box-sizing: border-box;
        position: relative;
        overflow: hidden;
        margin-bottom: 16px;
        display: flex;
        flex-direction: row;
        align-items: center;
        box-shadow: 0 1px 3px 1px rgba(0,0,0,.1);
        position: relative;
        margin-bottom: 28px;
        /* border: 1px solid skyblue; */
    }
    .list li img{
        width: 50px;
        height: 50px;
    }
    .list li span{
        font-size: 16px;
        font-weight: bold;
        padding-left: 15px;
    }
    .dianji{
        display: block;
        width: 100%;
        height: 100%;
        position: absolute;
        z-index: 999;
        cursor: pointer;
    }
</style>
<body>
<div id="particles-js">
    <div class="content" style="padding-top: 35px;">
        <p class="name">工作记录</p>
        <ul class="list">
            <li><a class="dianji" href="/lvguan/daily/meeting"></a>
                <img src="{{asset("center/images/icon2.png")}}" alt="">
                <span>会务记录</span></li>
            <li>
                <a class="dianji" href="/lvguan/daily/advice"></a>
                <img src="{{asset("center/images/icon3.png")}}" alt="">
                <span>法律意见书</span>
            </li>
            <li>
                <a class="dianji" href="/lvguan/daily/other"></a>
                <img src="{{asset("center/images/icon4.png")}}" alt="">
                <span>其他工作事务</span>
            </li>
        </ul>
    </div>
    <div class="sk-rotating-plane"></div>
</div>

<script src="{{asset('visitor/js/particles.min.js')}}"></script>
<script src="{{asset('visitor/js/app.js')}}"></script>
</body>
</html>



