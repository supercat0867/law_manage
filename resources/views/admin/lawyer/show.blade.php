<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title></title>
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
        <form class="layui-form layui-col-md12 x-so" method="get" action="/admin/lawyer/show">
          <div class="layui-input-inline">
            <select name="paging" lay-filter="aihao">
{{--              <option value=""></option>--}}
              <option value="5" @if($request->input('paging')==5)  selected @endif>5</option>
              <option value="10" @if($request->input('paging')==10)  selected @endif>10</option>
            </select>

          </div>
          <input type="text" name="lawyername" value="{{$request->input('lawyername')}}" placeholder="请输入律师名" autocomplete="off" class="layui-input" >
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <span class="x-right" style="line-height:40px">共有数据：{{$count}} 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>形象照</th>
            <th>姓名</th>
            <th>学历</th>
            <th>专业方向</th>
            <th>个人介绍</th>
            <th>聊天链接</th>
            <th>状态</th>
            <th>操作</th></tr>
        </thead>
        <tbody>
        @foreach($lawyer as $v)
          <tr>
            <td>{{$v->lawyer_id}}</td>
            <td><img src="{{asset($v->perimgpath)}}" alt=""></td>
            <td>{{$v->lawyer_name}}</td>
            <td>{{$v->education}}</td>
            <td>{{$v->organization}}</td>
            <td>{{$v->perintroduction}}</td>
            <td>{{$v->connectlink}}</td>
            @php
              if($v->show_status==1){
                  $status="展示中";
                  $operate='隐藏';
                  $class='layui-btn layui-btn-normal layui-btn-mini ';
                  $icon="&#xe601;";
              }
              else{
                  $status="已隐藏";
                  $operate='展示';
                  $class='layui-btn layui-btn-normal layui-btn-mini layui-btn-disabled';
                  $icon="&#xe62f;";
              }
            @endphp
            <td class="td-status">
              <span class="{{$class}}">{{$status}}</span></td>
            <td class="td-manage">
              <a onclick="member_stop(this,{{$v->lawyer_id}})" href="javascript:;"  title="{{$operate}}">
                <i class="layui-icon">{{$icon}}</i>
              </a>
              <a title="编辑"  onclick="x_admin_show('编辑','{{url('admin/lawyer/'.$v->lawyer_id.'/editshow')}}',600,400)" href="javascript:;">
                <i class="layui-icon">&#xe642;</i>
              </a>
              <a title="更换头像"  onclick="x_admin_show('更换头像','{{url('admin/lawyer/'.$v->lawyer_id.'/upload')}}',600,400)" href="javascript:;">
                <i class="layui-icon">&#xe60d;</i>
              </a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <div class="page">
        {!! $lawyer->appends($request->all())->render() !!}
      </div>

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
       /*用户-停用*/
      function member_stop(obj,id){
          var operate=$(obj).attr('title');
          layer.confirm('确认要'+operate+'吗？',function(index){

              if(operate=='隐藏'){

                $.ajax({
                  type:'POST',
                  url:'/admin/lawyer/hidden',
                  dataType:'json',
                  data:{
                    _token: "{{csrf_token()}}",
                    id:id,
                  },
                  success:function (data){
                    if(data.status==0){
                      $(obj).attr('title','展示')
                      $(obj).find('i').html('&#xe62f;');
                      $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已隐藏');
                      layer.msg(data.message,{icon: 5,time:1000});
                    }
                    else {
                      layer.msg(data.message,{icon:5,time:1000});
                    }
                  }
                })

              }else{
                $.ajax({
                  type:'POST',
                  url:'/admin/lawyer/showon',
                  dataType:'json',
                  data:{
                    _token: "{{csrf_token()}}",
                    id:id,
                  },
                  success:function (data){
                    if(data.status==0){
                      $(obj).attr('title','隐藏')
                      $(obj).find('i').html('&#xe601;');
                      $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('展示中');
                      layer.msg(data.message,{icon: 6,time:1000});
                    }
                    else {
                      layer.msg(data.message,{icon:5,time:1000});
                    }
                  }
                })
              }
              
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