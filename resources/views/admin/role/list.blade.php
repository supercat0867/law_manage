<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>角色列表</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
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
  
  <body class="layui-anim layui-anim-up">
    <div class="x-nav">
      <span class="layui-breadcrumb">
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" method="get" action="/admin/role">
          <input type="text" name="rolename" value="{{$request->input('rolename')}}" placeholder="请输入角色名" autocomplete="off" class="layui-input" >
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="x_admin_show('添加客户','{{url("admin/role/create")}}',600,400)"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：{{$count}} 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>角色名</th>
            <th>描述</th>
            <th>操作</th></tr>
        </thead>
        <tbody>
        @foreach($role as $v)
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id={{$v->id}}><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td>{{$v->id}}</td>
            <td>{{$v->role_name}}</td>
            <td>{{$v->describe}}</td>
            <td class="td-manage">
              <a title="授权"  onclick="x_admin_show('授权','{{url('admin/role/auth/'.$v->id)}}',600,400)" href="javascript:;">
                <i class="layui-icon">&#xe672;</i>
              </a>
              <a title="编辑"  onclick="x_admin_show('编辑','{{url('admin/role/'.$v->id.'/edit')}}',600,400)" href="javascript:;">
                <i class="layui-icon">&#xe642;</i>
              </a>
              <a title="删除" onclick="member_del(this,{{$v->id}})" href="javascript:;">
                <i class="layui-icon">&#xe640;</i>
              </a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <script>
      layui.use('laydate', function(){
        var laydate = layui.laydate;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });

      /*删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
            $.post('/admin/role/'+id,{"_method":"delete","_token":"{{csrf_token()}}"},function (data){
              // console.log(data);
              if(data.status==0){
                $(obj).parents("tr").remove();
                layer.msg(data.message,{icon:6,time:1000});
              }
              else {
                layer.msg(data.message,{icon:5,time:1000});
              }
            })

          });
      }

      function delAll (argument) {
        var arr =[];
        $(".layui-form-checked").not('.header').each(function (i,v){
          var u=$(v).attr('data-id');
          arr.push(u);
        })
        var ids=arr.join(',');
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
              type:'POST',
              url:'/admin/role/del',
              dataType:'json',
              data:{
                _token: "{{csrf_token()}}",
                id:ids,
              },
              success:function (data){
                if(data.status==0){
                  $(".layui-form-checked").not('.header').parents('tr').remove();
                  layer.msg(data.message,{icon:6,time:1000});
                }
                else {
                  layer.msg(data.message,{icon:5,time:1000});
                }
              }
            })
        });
      }
    </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>
  </body>

</html>