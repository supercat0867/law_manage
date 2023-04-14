<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="Author" content="Noah">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="{{asset('guide/js/downloadpage.js')}}" ></script>
    @include("public.title")
    <style>@font-face {
	font-family:iconfont;
	src:url({{asset('guide/font/font_1706200_3sgw4esvyq9.eot')}});
}
.iconfont {
	font-family:iconfont!important;
	font-size:16px;
	font-style:normal;
	-webkit-font-smoothing:antialiased;
	-moz-osx-font-smoothing:grayscale
}
.icon-querenzhengque:before {
	content:"\e600"
}
.icon-tishi:before {
	content:"\e640"
}
.icon-cuowu:before {
	content:"\e602"
}
.icon-jinggao:before {
	content:"\e62b"
}
* {
	box-sizing:border-box;
	margin:0;
	padding:0;
	font-weight:300
}
body,body::-webkit-input-placeholder {
	font-family:Source Sans Pro,sans-serif;
	color:#fff;
	font-weight:300
}
body:-moz-placeholder,body::-moz-placeholder {
	font-family:Source Sans Pro,sans-serif;
	color:#fff;
	opacity:1;
	font-weight:300
}
body:-ms-input-placeholder {
	font-family:Source Sans Pro,sans-serif;
	color:#fff;
	font-weight:300
}
a {
	text-decoration:none
}
.wrapper {
	background:#01a982;
	background:linear-gradient(to bottom right,#01a982 0,#60ae80 100%);
	overflow:hidden;
}
.bg-bubbles,.wrapper {
	position:absolute;
	left:0;
	width:100%;
	height:100%
}
.bg-bubbles {
	top:0;
	z-index:1
}
.bg-bubbles li {
	position:absolute;
	list-style:none;
	display:block;
	width:40px;
	height:40px;
	background-color:hsla(0,0%,100%,.15);
	bottom:-160px;
	animation:square 25s infinite;
	transition-timing-function:linear
}
.bg-bubbles li:nth-child(1) {
	left:10%
}
.bg-bubbles li:nth-child(2) {
	left:20%;
	width:80px;
	height:80px;
	animation-delay:2s;
	animation-duration:17s
}
.bg-bubbles li:nth-child(3) {
	left:25%;
	animation-delay:4s
}
.bg-bubbles li:nth-child(4) {
	left:40%;
	width:60px;
	height:60px;
	animation-duration:22s;
	background-color:hsla(0,0%,100%,.25)
}
.bg-bubbles li:nth-child(5) {
	left:70%
}
.bg-bubbles li:nth-child(6) {
	left:80%;
	width:120px;
	height:120px;
	animation-delay:3s;
	background-color:hsla(0,0%,100%,.2)
}
.bg-bubbles li:nth-child(7) {
	left:32%;
	width:160px;
	height:160px;
	animation-delay:7s
}
.bg-bubbles li:nth-child(8) {
	left:55%;
	width:20px;
	height:20px;
	animation-delay:15s;
	animation-duration:40s
}
.bg-bubbles li:nth-child(9) {
	left:25%;
	width:10px;
	height:10px;
	animation-delay:2s;
	animation-duration:40s;
	background-color:hsla(0,0%,100%,.3)
}
.bg-bubbles li:nth-child(10) {
	left:90%;
	width:160px;
	height:160px;
	animation-delay:11s
}
@keyframes square {
	0% {
	transform:translatey(0)
}
to {
	transform:translatey(-700px) rotate(600deg)
}
}@media (max-width:500px) {
	.container h1 {
	font-size:60px
}
form button,form input {
	width:500px
}
}.main {
	padding:50px 0;
	z-index:999;
	position:relative
}
.main h1 {
	font-size:40px;
	text-align:center;
	color:#fff;
	margin-bottom:30px;
	text-transform:uppercase
}
.content {
	margin:0 auto;
	width:28%;
	background:#fff;
	border-radius:5px
}
p.footer {
	font-size:16px;
	text-align:center;
	color:#fff;
	font-weight:500;
	margin-top:30px
}
p.footer a {
	color:#55acee
}
p.footer a:hover {
	color:#000;
	transition:.5s all;
	-webkit-transition:.5s all;
	-moz-transition:.5s all;
	-o-transition:.5s all;
	-ms-transition:.5s all
}
.content-top h2 {
	font-size:22px;
	color:#fff;
	text-align:center;
	background:#02a982;
	padding:12px 0;
	border-radius:5px
}
.content-top p {
	text-align:center;
	font-size:16px;
	color:#000;
	margin-top:15px
}
.content-top ul li {
	display:block;
	font-size:15px;
	color:#000;
	line-height:1.8em;
	padding:1em 0 1em 1em;
	border-bottom:1px solid #e2e0de
}
.content-top ul li a {
	color:#000;
	font-weight:400
}
.content-top ul li a i {
	color:#02a982;
	font-style:normal;
	display:block;
	margin:2px 0
}
.content-top ul li span {
	display:block;
	color:#999
}
.content-top {
	padding:1.5em
}
.content-top p a {
	color:#55acee;
	margin-left:5px
}
@media (max-width:1366px) {
	.content {
	width:31%
}
}@media (max-width:1280px) {
	.content {
	width:32%
}
}@media (max-width:1080px) {
	.content {
	width:38%
}
.main h1 {
	font-size:36px
}
.content-top h2 {
	font-size:20px;
	padding:10px 0
}
.content-top p,.content-top ul li,p.footer {
	font-size:14px
}
}@media (max-width:800px) {
	.main h1 {
	font-size:34px
}
.content {
	width:46%
}
}@media (max-width:768px) {
	.main {
	padding:90px 0
}
.main h1 {
	margin-bottom:55px
}
p.footer {
	margin-top:75px
}
}@media (max-width:736px) {
	.main {
	padding:70px 0
}
.main h1 {
	margin-bottom:45px
}
.content {
	width:53%
}
p.footer {
	margin-top:50px
}
}@media (max-width:667px) {
	.main h1 {
	font-size:32px;
	margin-bottom:35px
}
.main {
	padding:60px 0
}
.content {
	width:57%
}
.content-top h2 {
	font-size:18px
}
}@media (max-width:600px) {
	.main h1 {
	font-size:30px
}
.content-top {
	padding:1em
}
.content {
	width:62%
}
}@media (max-width:568px) {
	.content {
	width:68%
}
}@media (max-width:480px) {
	.content {
	width:78%
}
.main h1 {
	font-size:28px
}
p.footer {
	margin-top:42px
}
}@media (max-width:414px) {
	.content-top h2 {
	font-size:16px
}
.content {
	width:85%
}
.main {
	padding:50px 0
}
p.footer {
	line-height:1.8em;
	margin:42px auto 0;
	width:85%
}
}@media (max-width:384px) {
	.main h1 {
	font-size:27px
}
.content,p.footer {
	width:90%
}
p.footer {
	margin:32px auto 0
}
}@media (max-width:375px) {
	.main h1 {
	font-size:26px;
	margin-bottom:25px
}
.main {
	padding:45px 0
}
.content,p.footer {
	width:92%
}
.content-top h2 {
	padding:8px 0
}
}@media (max-width:320px) {
	.main h1 {
	font-size:24px;
	margin-bottom:30px
}
.content-top ul li {
	padding:1em 0 1em 1em;
	background-size:13%!important
}
.content-top {
	padding:1.2em
}
.content-top p,.content-top ul li,p.footer {
	font-size:13px
}
.content,p.footer {
	width:90%
}
}@media(max-width:500px) {
	.bg-bubbles,.wrapper {
	height:auto;
}
}</style>
</head>
<body>
    <div id="all">
        <div class="wrapper">
            <div class="main">
				<h1>查询下载中心</h1>
				<div class="content">
					<div class="content-top">				
							<h2>合同下载</h2>
						<ul>
							<li>
								法天使-中国合同库
								<a href="https://www.fatianshi.cn" target="_blank"><i>https://www.fatianshi.cn</i></a>
							</li>
						</ul>
						<h2>常用查询网站</h2>
							<ul>
								<li>
									企查查
									<a href="https://www.qcc.com" target="_blank"><i>https://www.qcc.com</i></a>
									
								</li>
								<li>
									中国裁判文书网
									<a href="https://wenshu.court.gov.cn" target="_blank"><i>https://wenshu.court.gov.cn</i></a>
									
								</li>
								<li>
									中国执行信息公开网
									<a href="http://zxgk.court.gov.cn" target="_blank"><i>http://zxgk.court.gov.cn</i></a>
									
								</li>
								<li>
									国家企业信用信息公示系统
									<a href="https://www.gsxt.gov.cn" target="_blank"><i>https://www.gsxt.gov.cn</i></a>
									
								</li>
								<li>
									人民法院公告网
									<a href="https://rmfygg.court.gov.cn" target="_blank"><i>https://rmfygg.court.gov.cn</i></a>
								</li>
								<li>
									国家知识产权局
									<a href="https://www.cnipa.gov.cn/col/col1510" target="_blank"><i>https://www.cnipa.gov.cn/col/col1510</i></a>
								</li>
								<li>
									中国庭审公开网
									<a href="http://tingshen.court.gov.cn" target="_blank"><i>http://tingshen.court.gov.cn</i></a>
								</li>
								<li>
									北大法宝法律数据库
									<a href="https://www.pkulaw.com/law?isFromV5=1" target="_blank"><i>https://www.pkulaw.com/law?isFromV5=1</i></a>
								</li>
<!--								<li>-->
<!--                                <span>这是一个说明<span>-->
<!--							</span></span></li>-->
							</ul>

							
					</div>
				</div>
				@include("public.footer")
			</div>	
            <ul class="bg-bubbles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div>
	<div style='display:none'><script type="text/javascript" src="{{asset('guide/js/z_stat-1278893351_1278893351.js')}}"></script></div>
</body>
</html>