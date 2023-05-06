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
                <span class="x-red">*</span>案件标题
            </label>
            <div class="layui-input-inline">
                <input type="hidden" name='caseid' value="{{$case->caseid}}">
                <input type="text" id="L_username" name="title" required="" lay-verify="title"
                       autocomplete="off" class="layui-input" value="{{$case->title}}">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>输入案件标题
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>案件类型
            </label>
            <div class="layui-input-inline">
                <select name="type" id="" autocomplete="off" class="layui-input">
                    <option value="1" @if($case->type==1) selected @endif>刑事类</option>
                    <option value="2" @if($case->type==2) selected @endif>民事类</option>
                    <option value="3" @if($case->type==3) selected @endif>行政类</option>
                    <option value="4" @if($case->type==4) selected @endif>财税类</option>
                </select>
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>选择案件类型
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_phone" class="layui-form-label">
                <span class="x-red">*</span>客户手机号
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_phone" name="phone" required="" autocomplete="off" class="layui-input" value="{{$case->party_phone}}">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>将会成为客户的登入手机号
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>律师
            </label>
            <div class="layui-input-inline">
                <select name="lawyer" id="" autocomplete="off" class="layui-input">
                    @foreach($lawyers as $v)
                        @if($v->lawyer_name==$lawyer)
                            <option value="{{$v->lawyer_phone}}" selected>{{$v->lawyer_name}}</option>
                        @else
                            <option value="{{$v->lawyer_phone}}">{{$v->lawyer_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>选择律师
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
            title: function(value){
                if(value.length < 5){
                    return '标题至少5个字!';
                }
            }
        });
        //监听提交
        form.on('submit(edit)', function(data){
            var caseid=$("input[name='caseid']").val();
            //发异步，把数据提交给php
            $.ajax({
                type:'PUT',
                url:'/admin/case/'+caseid,
                dataType:'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:data.field,
                success:function (data){
                    // 弹层提示添加成功，并刷新父页面
                    // console.log(data);
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
</body>

</html>