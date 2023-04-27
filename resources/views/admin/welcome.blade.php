<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        @include('admin.public.style')
    </head>
    <body>
    <div class="x-body layui-anim layui-anim-up">
        <blockquote class="layui-elem-quote">欢迎管理员：
            <span class="x-red">{{$adminInfo->admin_name}}</span>！当前时间:{{ date('Y-m-d', time()) }}</blockquote>
{{--        <fieldset class="layui-elem-field">--}}
{{--            <legend>数据统计</legend>--}}
{{--            <div class="layui-field-box">--}}
{{--                <div class="layui-col-md12">--}}
{{--                    <div class="layui-card">--}}
{{--                        <div class="layui-card-body">--}}
{{--                            <div class="layui-carousel x-admin-carousel x-admin-backlog" lay-anim="" lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 90px;">--}}
{{--                                <div carousel-item="">--}}
{{--                                    <ul class="layui-row layui-col-space10 layui-this">--}}
{{--                                        <li class="layui-col-xs2">--}}
{{--                                            <a href="javascript:;" class="x-admin-backlog-body">--}}
{{--                                                <h3>文章数</h3>--}}
{{--                                                <p>--}}
{{--                                                    <cite>66</cite></p>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="layui-col-xs2">--}}
{{--                                            <a href="javascript:;" class="x-admin-backlog-body">--}}
{{--                                                <h3>会员数</h3>--}}
{{--                                                <p>--}}
{{--                                                    <cite>12</cite></p>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="layui-col-xs2">--}}
{{--                                            <a href="javascript:;" class="x-admin-backlog-body">--}}
{{--                                                <h3>回复数</h3>--}}
{{--                                                <p>--}}
{{--                                                    <cite>99</cite></p>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="layui-col-xs2">--}}
{{--                                            <a href="javascript:;" class="x-admin-backlog-body">--}}
{{--                                                <h3>商品数</h3>--}}
{{--                                                <p>--}}
{{--                                                    <cite>67</cite></p>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="layui-col-xs2">--}}
{{--                                            <a href="javascript:;" class="x-admin-backlog-body">--}}
{{--                                                <h3>文章数</h3>--}}
{{--                                                <p>--}}
{{--                                                    <cite>67</cite></p>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="layui-col-xs2">--}}
{{--                                            <a href="javascript:;" class="x-admin-backlog-body">--}}
{{--                                                <h3>文章数</h3>--}}
{{--                                                <p>--}}
{{--                                                    <cite>6766</cite></p>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </fieldset>--}}
        <fieldset class="layui-elem-field">
            <legend>系统通知</legend>
            <div class="layui-field-box">
                <table class="layui-table" lay-skin="line">
                    <tbody>
                        <tr>
                            <td >
                                <a class="x-a" target="_blank">律冠2.0 上线啦！</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>系统信息</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                        <tr>
                            <th>系统版本</th>
                            <td>{{ php_uname('r')}}</td></tr>
                        <tr>
                            <th>服务器地址</th>
                            <td>{{$_SERVER["HTTP_HOST"]}}</td></tr>
                        <tr>
                            <th>操作系统</th>
                            <td>{{ PHP_OS}}</td></tr>
                        <tr>
                            <th>运行环境</th>
                            <td>{{ php_sapi_name()}}</td></tr>
                        <tr>
                            <th>PHP版本</th>
                            <td>{{ PHP_VERSION}}</td></tr>
{{--                        <tr>--}}
{{--                            <th>PHP运行方式</th>--}}
{{--                            <td>{{PHP_SAPI}}</td></tr>--}}
                        <tr>
                            <th>Laravel</th>
                            <td>{{app()::VERSION}}</td></tr>
                        <tr>
                            <th>上传附件限制</th>
                            <td>{{ini_get('post_max_size')}}</td></tr>
                        <tr>
                            <th>执行时间限制</th>
                            <td>{{ini_get('max_execution_time')}}s</td></tr>
                        <tr>
                            <th>剩余空间</th>
                            <td>{{disk_free_space('.')/(1024*1024*1024)}}GB</td></tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>开发团队</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                        <tr>
                            <th>版权所有</th>
                            <td>四川律冠法律咨询有限公司
                                <a href="" class='x-a' target="_blank"></a></td>
                        </tr>
                        <tr>
                            <th>开发者</th>
                            <td>唐博浩(howietung@163.com)</td></tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
{{--        <blockquote class="layui-elem-quote layui-quote-nm"></blockquote>--}}
    </div>
    </body>
</html>