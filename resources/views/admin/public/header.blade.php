<!-- 顶部开始 -->
<div class="container">
    <div class="logo"><a href="./index.html">XX后台管理 v2.0</a></div>
    <div class="left_open">
        <i title="展开左侧栏" class="iconfont">&#xe699;</i>
    </div>
    <ul class="layui-nav left fast-add" lay-filter="">
        <li class="layui-nav-item">
{{--            <a href="javascript:;">+新增</a>--}}
{{--            <dl class="layui-nav-child"> <!-- 二级菜单 -->--}}
{{--                <dd><a onclick="x_admin_show('资讯','http://www.baidu.com')"><i class="iconfont">&#xe6a2;</i>资讯</a></dd>--}}
{{--                <dd><a onclick="x_admin_show('图片','http://www.baidu.com')"><i class="iconfont">&#xe6a8;</i>图片</a></dd>--}}
{{--                <dd><a onclick="x_admin_show('用户','http://www.baidu.com')"><i class="iconfont">&#xe6b8;</i>用户</a></dd>--}}
{{--            </dl>--}}
        </li>
    </ul>
    <ul class="layui-nav right" lay-filter="">
        <li class="layui-nav-item">
            <a href="javascript:;">{{$name}}</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
{{--                <dd><a onclick="x_admin_show('个人信息','http://www.baidu.com')">个人信息</a></dd>--}}
{{--                <dd><a onclick="x_admin_show('切换帐号','http://www.baidu.com')">切换帐号</a></dd>--}}
                <dd><a href="{{url('admin/logout')}}">退出</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item to-index"><a href="/">前台首页</a></li>
    </ul>

</div>
<!-- 顶部结束 -->
