<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
    <title>supercat's information</title>
    <link rel="stylesheet" type="text/css" href="{{asset('reception/css/FiraCode.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('reception/css/nutssss.css')}}">
    <link rel="icon" href="{{asset('reception/img/favicon.ico')}}">
    <script>
        function contact(){
            var div=document.getElementById('contact');
            div.style.display = "block";
        }
        function about(){
            var div=document.getElementById('about');
            div.style.display = "block";
        }
    </script>
</head>

<body>
<div id="box">
    <!-- 个人资料卡片 -->
    <div class="meBox">
        <!-- 头像 -->
        <div class="headPhoto"></div>
        <!-- 介绍 -->
        <div class="meBox-title">
            <p>I'm SuperCattt</p>
            <div class="fg"></div>
        </div>
        <div class="meBox-text">
            <p>坐标：成都<img src="{{asset('reception/img/002.png')}}" style="width: 30px; vertical-align: middle;" alt=""></p>
            <p>爱好游泳，计算机</p>
            <p>喜欢撸猫<img src="{{asset('reception/img/003.png')}}" style="width: 20px; vertical-align: middle;" alt="">，养了只银渐层</p>
            <p>励志做一名不秃头的程序员<img src="{{asset('reception/img/001.png')}}" style="width: 20px; vertical-align: middle;" alt=""></p>
        </div>
        <!-- 两个按钮 -->
        <div class="meBox-Button">
            <a onclick="about()">关于</a>
            <a onclick="contact()">联系</a>
        </div>
    </div>

    <!-- 伪终端介绍 -->
    <div id="cmdBox">
        <!-- 第一个终端 -->
        <div class="cmd">
            <!-- 三个按钮 -->
            <div class="click">
                <div class="red"></div>
                <div class="yellow"></div>
                <div class="green"></div>
            </div>
            <!-- 顶部标题 -->
            <div class="title">
                <span>supercattt - bash</span>
            </div>
            <!-- 终端内文字 -->
            <div class="cmdText">
                <span style="color: rgb(0, 190, 0);">root@supercattt</span>
                <span style="color: blue;">~</span>
                <span style="color: rgb(39, 39, 39);">./tianqi.sh</span>
                <br />
                <iframe scrolling="no" src="https://tianqiapi.com/api.php?style=tc&skin=pitaya" frameborder="0"
                        width="350" height="24" allowtransparency="true"></iframe>
                <br />
                <div id="about" style="display: none">
                <span style="color: rgb(0, 190, 0);">root@supercattt</span>
                <span style="color: blue;">~</span>
                <span style="color: rgb(39, 39, 39);">cat /me.txt</span>
                <p>爱好计算机，会去自学自己感兴趣的一切东西</p>
                <p>略懂H5，PHP，Go；喜欢用python写脚本</p>
                <p>同时我也很喜欢网络安全</p>
                <p>这条路我才刚刚迈开了我的第一步</p>
                <p>路上的坎一定会非常多，但</p>
                <p>在我眼里</p>
                <p>没有什么问题是尝试不能解决的，如果有那就多尝试几次甚至上百次</p>
                <p>即使前方的路看似绝境，也要有硬生生给自己开出一条路的勇气</p>
                <span style="color: rgb(0, 190, 0);">root@supercattt</span>
                <span style="color: blue;">~</span>
                </div>
            </div>
        </div>
        <!-- 第二个终端 -->
        <div class="cmd cmd2" id="contact" style="display: none">
                    <!-- 三个按钮 -->
                    <div class="click">
                        <div class="red"></div>
                        <div class="yellow"></div>
                        <div class="green"></div>
                    </div>
                    <!-- 顶部标题 -->
                    <div class="title">
                        <span>supercattt - bash</span>
                    </div>
                    <!-- 终端内文字 -->
                    <div class="cmdText">
                        <span style="color: rgb(0, 190, 0);">root@supercattt</span>
                        <span style="color: blue;">~</span>
                        <span style="color: rgb(39, 39, 39);">./ContactMe.sh</span>
                        <p>我的联系方式：</p>
                        <ul class="ul">
                            <li>微信：ms08_067_</li>
                        </ul>
                        <span style="color: rgb(0, 190, 0);">root@supercattt</span>
                        <span style="color: blue;">~</span>
                    </div>
                </div>
    </div>
</div>

<!-- 页脚 -->
<div id="footer">
    <p>© 2023 SuperCattt | <a href="http://beian.miit.gov.cn">蜀ICP备2023003351号</a></p>
</div>
</body>

</html>
