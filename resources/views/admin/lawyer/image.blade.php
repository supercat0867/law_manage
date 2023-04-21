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
    <form class="layui-form" empty="multipart/form-data" id="art_form">
        <div class="layui-form-item ">
                <input type="hidden" id="uid" class="hidden" name="uid" value="{{$lawyer->lawyer_id}}">
                <button type="button" class="layui-btn" id="image"><i class="layui-icon"> </i>上传图片</button>
                <input type="file" name="photo" id="photo_upload" style="visibility: hidden;">
        </div>
        <div class="layui-form-item">
                <img src="" alt="" id="art_thumb_img" style="width: 200px;height: 400px">
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button  class="layui-btn" lay-filter="edit" lay-submit="">
                更换
            </button>
        </div>
    </form>
</div>
<script>
    layui.use(['form','layer'], function(){
        $ = layui.jquery;
        var form = layui.form
            ,layer = layui.layer;
        var upload = layui.upload;

        $('#image').on('click',function (){
            $('#photo_upload').trigger('click')
            $('#photo_upload').on('change',function (){
                var obj=this;
                var formData=new FormData($('#art_form')[0]);
                $.ajax({
                    url:'/admin/lawyer/upload',
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    type:'post',
                    data:formData,
                    processData:false,
                    contentType:false,
                    success:function (data){
                        if(data['ServerNo']=='200'){
                            $('#art_thumb_img').attr('src','/uploads/'+data['ResultData']);
                            $(obj).off('change');
                        }
                        else {
                            alert(data['ResultData'])
                        }
                    }
                }
                )
            })
        })

        //监听提交
        form.on('submit(edit)', function(data){
            var uid=$("input[name='uid']").val();
            var path=$("#art_thumb_img").attr("src");
            $.ajax({
                type:'PUT',
                url:'/admin/lawyer/upload/'+uid,
                dataType:'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    'path':path
                },
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