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
                    <span class="x-red">*</span>客户名
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="L_username" name="username" required="" lay-verify="nikename"
                           autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>输入客户的真实姓名
                </div>
            </div>
          <div class="layui-form-item">
              <label for="L_phone" class="layui-form-label">
                  <span class="x-red">*</span>手机号
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="L_phone" name="phone" required="" lay-verify="phone"
                  autocomplete="off" class="layui-input">
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
                        @foreach($lawyer as $v)
                            <option value="{{$v->lawyer_id}}">{{$v->lawyer_name}}</option>
                        @endforeach
                    </select>
{{--                    <input type="text" id="L_username" name="lawyer" required="" lay-verify="nikename"--}}
{{--                           autocomplete="off" class="layui-input">--}}
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>选择律师
                </div>
          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  增加
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
                return '姓名至少2个字!';
              }
            }
          });

          //监听提交
          form.on('submit(add)', function(data){
            //发异步，把数据提交给php
              $.ajax({
                  type:'POST',
                  url:'/admin/user',
                  dataType:'json',
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  data:data.field,
                  success:function (data){
                      // 弹层提示添加成功，并刷新父页面
                      if(data.status==2){
                          layer.alert(data.message,{icon:6},function (){
                              parent.location.reload(true);
                          })
                      }
                      else {
                          layer.alert(data.message,{icon:5})
                      }
                  },
                  error:function (){
                      layer.alert("未知错误，请联系开发者!",{icon:5})
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