<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    @include('public.title')
    <link rel="stylesheet" type="text/css" href="{{asset('center/css/base.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('center/css/home.css')}}">
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
<body>
<section class="aui-content">
    <div style="height:20px;"></div>
    <div class="aui-content-up">
        <form name="form1">
            <div class="aui-content-up-form">
                <h2>案件信息上传</h2>
            </div>
            <div class="aui-form-group clear">
                <label class="aui-label-control">
                    客户/当事人<em>*</em>
                </label>
                <div class="aui-form-input">
                    <input type="text" class="aui-form-control-two" name="yourname" id="username" required  placeholder="请输入客户/当事人名字">
                </div>
            </div>
            <div class="aui-form-group clear">
                <label class="aui-label-control">
                    手机号码 <em>*</em>
                </label>
                <div class="aui-form-input">
                    <input type="text" class="aui-form-control-two" name="youphone" id="userphone" placeholder="请输入客户/当事人手机号码"  required />
                </div>
            </div>
            <div class="aui-form-group clear">
                <label class="aui-label-control">
                    案件标题 <em>*</em>
                </label>
                <div class="aui-form-input">
                    <textarea class="aui-form-control" name="description" id="title" minlength="0" placeholder="请输入案件标题" required></textarea>
                </div>
            </div>
            <div class="aui-form-group clear">
                <label class="aui-label-control">
                    案件类型 <em>*</em>
                </label>
                <div class="aui-form-input">
                    <select class="aui-form-control-two" name="type" id="type">
                        <option value="1">刑事类</option>
                        <option value="2">民事类</option>
                        <option value="3">行政类</option>
                        <option value="4">财税类</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="aui-form-group clear" style="text-align: center">
                <div class="aui-btn-default">
                    <input type="button" class="aui-btn aui-btn-account"  name="submit" onclick="submitdata()" value="保存并提交">
                </div>
            </div>
        </form>
    </div>
</section>

<script src="{{asset('center/js/jquery.min.js')}}"></script>

<script type="text/javascript">

    function submitdata(){
        var userphone=$("#userphone").val();
        var customer=$("#username").val();
        var title=$("#title").val();
        var type=$("#type").val();
        if (userphone.length!=11){
            alert("请输入正确的手机号");
        }
        else{
            $.ajax({
                url:"/lvguan/lawyer/post/case",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                data:{
                    userphone:userphone,
                    customer:customer,
                    title:title,
                    type:type,
                },
                dataType:'json',
                success:function (data){
                    if (data.status==1){
                        alert(data.message);
                        location.reload();
                    }
                    else{
                        alert(data.message);
                    }
                }
            });
        }
    }
</script>

</body>
</html>




