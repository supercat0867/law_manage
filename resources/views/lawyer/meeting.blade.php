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
                <h2>工作记录上传</h2>
            </div>
            <div class="aui-form-group clear">
                <label class="aui-label-control">
                    标题 <em>*</em>
                </label>
                <div class="aui-form-input">
                    <input type="text" class="aui-form-control-two" name="title" id="title" placeholder="请输入会议名称"  required />
                </div>
            </div>
            <div class="aui-form-group clear">
                <label class="aui-label-control">
                    类型 <em>*</em>
                </label>
                <div class="aui-form-input">
                    <select class="aui-form-control-two" name="type" id="type">
                        <option value="1">会务记录</option>
                        <option value="2">法律意见书</option>
                        <option value="3">其他工作事务</option>
                    </select>
                </div>
            </div>
            <div class="aui-form-group clear">
                <label class="aui-label-control">
                    常法服务方 <em>*</em>
                </label>
                <div class="aui-form-input">
                    <select class="aui-form-control-two" name="customer" id="customer">
                        @foreach($customer as $v)
                            <option value="{{$v->customer_id}}">{{$v->customer_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="aui-form-group clear">
                <label class="aui-label-control">
                    参会人员
                </label>
                <div class="aui-form-input">
                    <input type="text" class="aui-form-control-two" name="member" id="member" placeholder="会务记录请输入参会人员"  required />
                </div>
            </div>
            <div class="aui-form-group clear">
                <label class="aui-label-control">
                    时间 <em>*</em>
                </label>
                <div class="aui-form-input">
                    <input type="date" class="aui-form-control-two" name="date" id="date" required />
                </div>
            </div>
            <div class="aui-form-group clear">
                <label class="aui-label-control">
                    内容 <em>*</em>
                </label>
                <div class="aui-form-input">
                    <textarea class="aui-form-control" name="description" id="content" minlength="0" required></textarea>
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
        var title=$("#title").val();
        var member=$("#member").val();
        var date=$("#date").val();
        var customer_id=$("#customer").val();
        var content=$("#content").val();
        var type=$("#type").val();
        $.ajax({
                url:"/lvguan/lawyer/post/meeting",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                data:{
                    title:title,
                    member:member,
                    date:date,
                    customer_id:customer_id,
                    content:content,
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
</script>

</body>
</html>




