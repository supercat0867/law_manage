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
                <span class="x-red">*</span>文章标题
            </label>
            <div class="layui-input-inline">
                <input type="hidden" name="id" value="{{$article->id}}">
                <input type="text" id="L_username" name="title" required="" lay-verify="title"
                       autocomplete="off" class="layui-input" value="{{$article->title}}">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>输入文章标题
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>原文链接
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_username" name="link" required="" autocomplete="off" class="layui-input" value="{{$article->link}}">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>输入原文链接
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
                if(value.length < 6){
                    return '标题至少6个字!';
                }
            }
        });

        //监听提交
        form.on('submit(edit)', function(data){
            var id=$("input[name='id']").val();
            //发异步，把数据提交给php
            $.ajax({
                type:'PUT',
                url:'/admin/article/'+id,
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
            })
            return false;
        });
    });
</script>
</body>

</html>