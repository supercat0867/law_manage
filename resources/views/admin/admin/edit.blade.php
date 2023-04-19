<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    @include('admin.public.style')
    @include('admin.public.script')
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="x-body layui-anim layui-anim-up">
    <form class="layui-form">
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>登录名
            </label>
            <div class="layui-input-inline">
                <input type="hidden" name="uid" value="{{$admin->admin_id}}">
                <input type="text" id="L_username" name="username" required="" lay-verify="nikename" value="{{$admin->admin_name}}"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">
                <span class="x-red">*</span>角色
            </label>
            <div class="layui-input-block">
                <select name="role" lay-filter="aihao">
                    @foreach($role as $v)
                        @if(in_array($v->id,$own_role))
                            <option value="{{$v->id}}" selected>{{$v->role_name}}</option>
                        @else
                            <option value="{{$v->id}}">{{$v->role_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">
                <span class="x-red">*</span>密码</label>
            <div class="layui-input-inline">
                <input type="password" name="password" lay-verify="pass" id="pass" autocomplete="off" class="layui-input" value="{{$pass}}">
            </div>
            <div class="layui-form-mid layui-word-aux">请填写6到12位密码</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">
                <span class="x-red">*</span>确认密码</label>
            <div class="layui-input-inline">
                <input type="password" name="password" lay-verify="repass" id="repass" autocomplete="off" class="layui-input" value="{{$pass}}">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button  class="layui-btn" lay-filter="edit" lay-submit="">
                修改
            </button>
        </div>
    </form>
</div>
<script>
    layui.use(['form','layer'], function(){
        $ = layui.jquery;
        var form = layui.form
            ,layer = layui.layer;

        //自定义验证规则
        form.verify({
            nikename: function(value){
                if(value.length < 2){
                    return '登录名至少2个字!';
                }
            },
            pass:function (value){
                if(value.length<6||value.length>12){
                    return '密码长度必须为6~12位';
                }
            },
            repass: function(value){
                if($('#pass').val()!=$('#repass').val()){
                    return '两次密码不一致';
                }
            }
        });

        //监听提交
        form.on('submit(edit)', function(data){
            var uid=$("input[name='uid']").val();
            //发异步，把数据提交给php
            $.ajax({
                type:'PUT',
                url:'/admin/admin/'+uid,
                dataType:'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:data.field,
                success:function (data){
                    if(data.status==0){
                        layer.alert(data.message,{icon:6},function (){
                            parent.location.reload(true);
                        })
                    }
                    else {
                        layer.alert(data.message,{icon:5})
                    }
                },
                error:function (){
                    //错误信息
                }

            })

            return false;
        });


    });
</script>
<script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();</script>
</body>

</html>