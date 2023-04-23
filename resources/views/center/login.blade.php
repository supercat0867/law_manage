<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @include('public.title')
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('center/css/login_ercode.css')}}">
    <script src="{{asset('center/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('center/js/login.js')}}"></script>
    <style>
        html, body {width: 100%;height: 100%;overflow: hidden}
        body {background: #009688;}
        body:after {content:'';background-repeat:no-repeat;background-size:cover;-webkit-filter:blur(3px);-moz-filter:blur(3px);-o-filter:blur(3px);-ms-filter:blur(3px);filter:blur(3px);position:absolute;top:0;left:0;right:0;bottom:0;z-index:-1;}
        .layui-container {width: 100%;height: 100%;overflow: hidden}
        .admin-login-background {width:360px;height:300px;position:absolute;left:50%;top:40%;margin-left:-180px;margin-top:-100px;}
        .logo-title {text-align:center;letter-spacing:2px;padding:14px 0;}
        .logo-title h1 {color:#009688;font-size:25px;font-weight:bold;}
        .login-form {background-color:#fff;border:1px solid #fff;border-radius:3px;padding:14px 20px;box-shadow:0 0 8px #eeeeee;}
        .login-form .layui-form-item {position:relative;}
        .login-form .layui-form-item label {position:absolute;left:1px;top:1px;width:38px;line-height:36px;text-align:center;color:#d2d2d2;}
        .login-form .layui-form-item input {padding-left:36px;}
        .captcha {width:60%;display:inline-block;}
        .captcha-img {display:inline-block;width:34%;float:right;}
        .captcha-img img {height:34px;border:1px solid #e6e6e6;height:36px;width:100%;}
    </style>
</head>
<body>
<div class="layui-container">
    <div class="admin-login-background">
        <div class="loginBox">
            <!-- signContent -->
            <div class="signContent">
                <div class="signContainer">
                    <form action="" class="loginForm" id="form_key" data-module="smsFrom" method="post">
                        <!-- tab -->
                        <div class="tabBox">
                            <div class="tabBoxSwitch">
                                <ul class="tabBoxSwitchUl">
                                    <li class="tab-active" data-id="0">免密码登录</li>
                                </ul>
                            </div>
                        </div>
                        <!-- tabContent -->
                        <div class="tabContent">
                            <!-- tabContentPhone -->
                            <div class="tabcont  tabContentPhone active">
                                <div class="tabcontent">
                                    <div class="phoneBox">
                                        <div class="phoneGroup">
                                            <span>中国 +86</span>
                                        </div>
                                    </div>
                                    <span class="line-show"></span>
                                    <div class="phoneInputGroup">
                                        <label for="" class="inputLabel phoneLabel">
                                            <input type="text" value="" name="userphone" id="phoneInput"
                                                   class="inputStyle phoneInput" placeholder="手机号"
                                                   autocomplete="off">
                                        </label>
                                    </div>
                                </div>
                                <div class="tabcontent">
                                    <div class="phoneInputGroup">
                                        <label for="" class="inputLabel">
                                            <input type="number" value="" name="code" id="msgInput"
                                                   class="inputStyle msgInput" placeholder="输入 5 位短信验证码"
                                                   autocomplete="off">
                                        </label>
                                    </div>
                                    <div class="phoneGroup">
                                        <button class="phone-btn msgBtn" type="button">
                                            获取短信验证码
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="button" type="button" class="button fromSubmit" data-type="smsSubmit"
                                onclick="login()">注册/登录</button>
                        <div class="SignContainer-tip">
                            @include('public.footer')
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
<script src="{{asset('center/js/layui.all.js')}}" charset="utf-8" type="text/javascript"></script>
<script src="{{asset('center/js/jquery.particleground.min.js')}}" charset="utf-8" type="text/javascript"></script>
<script>
    layui.use(['form'], function () {
        var form = layui.form,
            layer = layui.layer,
            $ = layui.jquery;
        if (top.location != self.location) top.location = self.location;
        $(document).ready(function(){
            $('.layui-container').particleground({
                dotColor:'#5cbdaa',
                lineColor:'#5cbdaa'
            });
        });
    });
</script>
</body>
</html>